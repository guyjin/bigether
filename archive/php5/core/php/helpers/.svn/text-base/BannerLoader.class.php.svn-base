<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class will read the number of images in a seasonal folder.  It will choose 3 of them at random.
 * It will output those 3 as images to display in a landing page header.
 *
 * @author bvaughan
 */
class bannerLoader {

    /**
     *  @var string Current season
     *  @access private
     */
    private $season = "";

    /**
     *  @var array Hash of banner id's in directory
     *  @access private
     */
    private $banners = array();

    /**
     *  @var array Hash of randomly selected banner ID's
     *  @access private
     */
    private $bannerIDs = array();

    //Initiate the loader
    public function __construct() {
        // What is today's date - number
       $day = date("z");

       //  Days of spring
       $spring_starts = date("z", strtotime("March 21"));
       $spring_ends   = date("z", strtotime("June 20"));

       //  Days of summer
       $summer_starts = date("z", strtotime("June 21"));
       $summer_ends   = date("z", strtotime("September 22"));

       //  Days of autumn
       $autumn_starts = date("z", strtotime("September 23"));
       $autumn_ends   = date("z", strtotime("December 20"));

       //  If $day is between the days of spring, summer, autumn, and winter
       if( $day >= $spring_starts && $day <= $spring_ends ) :
               $season = "spring";
       elseif( $day >= $summer_starts && $day <= $summer_ends ) :
               $season = "summer";
       elseif( $day >= $autumn_starts && $day <= $autumn_ends ) :
               $season = "autumn";
       else :
               $season = "winter";
       endif;

       $this->setSeason($season);
       $this->countBanners();
       $this->getRandomBannerIDs();
       $this->buildBanners();
    }


    /**
     *
     * @param type $season Set value of $this->season
     * @access private
     */
    private function setSeason($season){
        $this->season = $season;
    }

    /**
     *
     * @return string Get value of $this->season
     * @access private
     */
    private function getSeason(){
        return $this->season;
    }

    private function countBanners(){
        $dir = BASEPATH . COREIMG . 'banners/' . $this->getSeason();
        try{
            if(is_dir($dir)) {
                try {
                   $handle = opendir($dir);
                   $h = 1;
                   while(($file = readdir($handle)) !== false) {
                        if (strstr($file,"banner")){
                            $this->banners[$h] = $file;
                            $h++;
                        }
                    }
                    closedir($handle);
                } catch (exception $e) {
                    $this->didError = TRUE;
                    print_r($e);
                }
            }
        } catch(exception $e) {
            $this->didError = TRUE;
            print_r($e);
        }
    }


    /**
     *  @return array Array of random banner ID's to populate header
     *  @access private
     */
    private function getRandomBannerIDs(){
        try {
            $this->bannerIDs = array_rand($this->banners, 3);
        } catch (exception $e) {
            $this->didError = TRUE;
            print_r($e);
        }
    }

    /**
     *  @return full img tags to load banners in header
     *  @access private
     */
    private function buildBanners() {

        try {
           for($x = 0;$x<=count($this->bannerIDs)-1;$x++){
               $c = $x + 1;
               echo '<img id="postcard'.$c.'" src="'.COREIMG.'banners/'.$this->getSeason().'/banner'.$this->bannerIDs[$x].'.jpg" />';

           }
        } catch (exception $e) {
            $this->didError = TRUE;
            print_r($e);
        }
    }

}

?>
