<?php
    header('Content-Type: text/css');
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

.backgroundsize body {
    background: url(/img/backgrounds/<?php echo $imageName; ?>/normal.jpg) no-repeat center;
    background-size: cover;
    background-position: center;
    background-color: #000;
}