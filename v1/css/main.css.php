<?php
    if( $handle = opendir('../img/backgrounds')) {
            while (false !== ($entry = readdir($handle))) {
                if($entry != '.' && $entry != '..')
                $imageDirList[] = $entry;
            }
            // Grab a random (sorta) index from the image array
            $imageIndex = rand(0, count($imageDirList)-1);

            $imageName = $imageDirList[$imageIndex];

        }
?>

body {
    background-image: url(/img/backgrounds/<?php echo $imageName; ?>/normal.jpg;
}