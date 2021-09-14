<?php
use PHPUnit\Framework\TestCase;
class Test_TreePath extends TestCase
{
    /**
     * It specify the title for a test case.
     * @param string $msg It is the title of the test case.
     */
    protected function title( $msg = '' )
    {
        $this->writeln( "\r\n=============================".$msg ."=============================" );
    }

    /**
     * It is the message to display during the execution of the test case.
     * @param string $msg
     */
    protected function writeln( $msg = '' )
    {

        echo $msg ."\r\n";
    }

    /**
     * It test case verify the add method and the to string method are working correctly.
     */
    public function test_TreePath_add()
    {
        $this->title('test_TreePath_add');
        $test = new \ArpaBlue\TreePath\TreePath();


        $test->add('first',1);
        $test->add('second',2.5);
        $test->add('third','3');
        $test->add('fourthy',true);

        $this->writeln( $test->toJSONbeauty() );
        $this->assertEquals(1,1,"Are not equals.");
    }
    /**
     * It test case verify the add method and the to string method are working correctly.
     */
    public function test_TreePath_addVector()
    {
        $this->title('test_TreePath_addVector');
        $test = new \ArpaBlue\TreePath\TreePath();


        $test->add('first',1);
        $test->add('second/a',2.5);
        $test->add('second/b',3.5);
        $test->add('second/c',4.5);
        $test->add('third','3');
        $test->add('fourthy',true);

        $this->writeln( $test->toJSONbeauty() );
        $this->assertEquals(1,1,"Are not equals.");
    }
    /**
     * It test case verify the add method and the to string method are working correctly.
     */
    public function test_TreePath_addtree()
    {
        $this->title('test_TreePath_addVector');
        $test = new \ArpaBlue\TreePath\TreePath();


        $test->add('first',1);
        $test->add('second/a',2.5);
        $test->add('second/b',3.5);
        $test->add('second/c',4.5);
        $test->add('third/x1','i');
        $test->add('third/x2','ii');
        $test->add('third/x3','iii');
        $test->add('third/x4/y/z/0','The deepest level.');
        $test->add('fourthy',true);

        $this->writeln( $test->toJSONbeauty() );
        $this->assertEquals(1,1,"Are not equals.");
    }
    /**
     * It test case verify the add method and the to string method are working correctly.
     */
    public function test_TreePath_addtree_sus()
    {
        $this->title('test_TreePath_addVector');
        $test = new \ArpaBlue\TreePath\TreePath();


        $test->add('first',1);
        $test->add('second',2.5);
        $test->add('third','aaa');
        $test->add('third/a','bbb');
        $test->add('fourthy',true);

        $this->writeln( $test->toJSONbeauty() );
        $this->assertEquals(1,1,"Are not equals.");
    }
    /**
     * It verify the an array can be correctly displayed.
     */
    public function test_TreePath_addtree_vector_1()
    {
        $this->title('test_TreePath_addtree_vector_1');
        $test = new \ArpaBlue\TreePath\TreePath();

        $ray = array();
        $ray[0] = 10;
        $ray[1] = 20;
        $ray[2] = 30;

        $test->add('first',1);
        $test->add('second', $ray );
        $test->add('third','aaa');

        $this->writeln( $test->toJSONbeauty() );
        $this->assertEquals(1,1,"Are not equals.");
    }
}