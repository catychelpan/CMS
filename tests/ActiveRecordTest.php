<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once 'C:/xampp1/htdocs/CMS/src/Entity.php';
require_once 'C:/xampp1/htdocs/CMS/source/modules/page/models/Page.php';


class FakeStatement {

    function execute() {}
    function fetchAll() {
        return [
            ['id'=> 12, 'title' => 'fake title', 'content' => 'fake content'],
            ['id'=> 2, 'title' => 'fake title2', 'content' => 'fake content2']
        ];
    }
}
class FakeDatabaseConnection {

    function prepare(){
        return new FakeStatement();
    }
}

final class ActiveRecordTest extends TestCase
{
    public function testFindAll(): void
    {
        $dbc = new FakeDatabaseConnection();
        $page = new Page($dbc); 
        $results = $page->findAll();
        $this->assertEquals(2, count($results));
        $this->assertEquals(12, $results[0]->id);
    }

    public function testFindBy(): void
    {
        $dbc = new FakeDatabaseConnection();
        $page = new Page($dbc); 
        $page->findBy('id', 12);
        $this->assertEquals(12, $page->id);
        
    }

   
}