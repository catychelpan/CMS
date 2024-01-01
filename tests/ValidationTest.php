<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;


require_once '/src/Auth.php';
final class ValidationTest extends TestCase
{
    public function testLoginAndPassword(): void
    {

        $auth = new Auth();
        $result = $auth->checkLogin('admin', 'TopSecret');
        $this->assertTrue($result);

        
      
    }

  
}