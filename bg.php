<?php
    $imageName = "";
    $size = "jumbo";

    // Capture the size of the image to be returned

    if(isset($_GET['s']) && $_GET['s'] != ''){
        $size = $_GET['s'];
    }

    // Capture the name of the image if set

    if(isset($_GET['i']) && $_GET['i'] != ''){
        $imageName = $_GET['i'];
    } else {
        // begin an array to hold the image names.
        $imageDirList = '';
        // var to hold random num for picking an image.
        $imageIndex = '';

        // read folders in background directory.  Use folder names as image names.
        if( $handle = opendir('img/backgrounds')) {
            while (false !== ($entry = readdir($handle))) {
                if($entry != '.' && $entry != '..')
                $imageDirList[] = $entry;
            }
            // Grab a random (sorta) index from the image array
            $imageIndex = rand(0, count($imageDirList)-1);

            $imageName = $imageDirList[$imageIndex];

        }
    }
    //Put together the image name and path, read it to a variable.
    //Not worried about the file extension at this point
    $theImage = file_get_contents('img/backgrounds/' . $imageName . "/" . $size . ".jpg");
    //return the image.
    header('content-type: image/jpg');
    echo $theImage;
?>