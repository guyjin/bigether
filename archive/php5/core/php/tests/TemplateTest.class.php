<?php

/**
 * The template class is used to build a page with a specified
 * layout and to include that page's content before sending the page to
 * the browser.
 *
 * @author bvaughan
 */


// include the Template class to be tested.
require_once('/apache2/htdocs/php5/core/php/Template.class.php');

class TemplateTest extends PHPUnit_Framework_TestCase {

    private $t;  // handle for template object

    protected function setUp(){
        $this->t = new Template($template = 'template',$header = 'header',$footer = 'footer',$nav = 'nav',$content = 'content');

    }

    public function testGetTemplate(){
        $this->assertEquals('template',$this->t->getTemplate());
    }

    public function testGetHeader(){
        $this->assertEquals('header',$this->t->getHeader());
    }

    public function testGetFooter(){
        $this->assertEquals('footer',$this->t->getFooter());
    }

    public function testGetNav(){
        $this->assertEquals('nav', $this->t->getNav());
    }

    public function testLoadTemplate(){
       
    }



}

?>
