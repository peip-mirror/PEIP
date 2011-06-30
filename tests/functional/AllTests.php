<?php

 class Functional_AllTests extends PHPUnit_Framework_TestSuite {

     const Name = '';

	 public static function suite(){
        $suite = new PHPUnit_Framework_TestSuite('functional');
        $iterator = new DirectoryIterator(__DIR__);
        $iterator->rewind();
        while($iterator->valid()){
            if($iterator->isFile() && $iterator->current() != 'AllTests.php'){
                require_once __DIR__.'/'.$iterator->current();
                $suite->addTestSuite(str_replace('.php', '', $iterator->current()));
            }
            $iterator->next();
        }
		return $suite;
	}
}