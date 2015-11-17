<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class to verify the functionality of the Page.class.php file.
 *
 * @author bvaughan
 */

require_once '/apache2/htdocs/php5/core/php/Page.class.php';
require_once '/apache2/htdocs/php5/core/php/WebPage.class.php';

class WebPageTest extends PHPUnit_Framework_TestCase {
    //put your code here

    private $w;

    protected function setUp(){
        $this->w = new WebPage(
                $id="foo",
                $title="footitle",
                $template="bar",
                $js="jQuery.min,zebra",
                $css="main,layout",
                $pageTitle="foo",
                $pageSubTitle="bar"
        );
        $this->w->setDB('dbfoo');
        $this->w->setState('barstate');
        $this->w->setContent('foo/bar');

    }

    public function testID(){
        $this->assertEquals('foo', $this->w->getID());
    }

    public function testTitle(){
        $this->assertEquals('footitle',$this->w->getTitle());
    }

    public function testTemplate(){
        $this->assertEquals('bar',$this->w->getTemplate());
    }

    public function testCSS(){
        $y = $this->w->getCSS();
        $a = (string)$y[0];
        $this->assertNotEmpty($y);
        $this->assertEquals(2, sizeof($y));
        $this->assertTrue($a == 'main');
    }

    public function testJS(){
        $j = $this->w->getJS();
        $y = (string)$j[0];
        $this->assertNotEmpty($j);
        $this->assertEquals(2, sizeof($j));
        $this->assertTrue($y == 'jQuery.min');
    }

    public function testAgent(){
        $t = $this->w->getUserAgent();
        $this->assertEquals('MSIE',$t);
    }

    public function testState(){
        $this->assertEquals('barstate',$this->w->getState());
    }

    public function testDB(){
        $this->assertEquals('dbfoo',$this->w->getDB());
    }

    public function testContent(){
        $this->assertEquals('foo/bar',$this->w->getContent());
    }

}

?>
