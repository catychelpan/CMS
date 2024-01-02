<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;


use modules\page\models\Page;
use src\Entity;


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

    public function testSave(): void
    {
        $mock_database = $this->getMockBuilder(FakeDatabaseConnection::class)->enableProxyingToOriginalMethods()->getMock();
        
        $mock_database->expects($this->exactly(2))
                ->method('prepare')
                ->with(
                    $this->logicalOr(
                        $this->equalTo('SELECT * FROM pages WHERE id = :value'),
                        $this->equalTo('UPDATE pagescSET title = :title, content = :content WHERE id = :id')
                    )
                );
                    

       
        $page = new Page($mock_database); 
        $page->findBy('id', 12);

        $page->title = 'new title'; 
        $page->save();

        $this->assertEquals('new title', $page->title);
        
    }

   
}