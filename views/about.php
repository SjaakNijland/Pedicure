<?php
$content = $pdo->query("SELECT * FROM content JOIN content_body ON content_body.id=content.body_id WHERE name LIKE 'about%'")->fetchAll(PDO::FETCH_ASSOC);
//var_dump($content);

function ak_img_resize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
        $w = $h * $scale_ratio;
    } else {
        $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){
        $img = imagecreatefromgif($target);
    } else if($ext =="png"){
        $img = imagecreatefrompng($target);
    } else {
        $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagejpeg($tci, $newcopy, 80);
}

if(isset($_POST['upload'])) {
    $fileName = $_FILES["uploaded_file"]["name"]; // The file name
    $fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["uploaded_file"]["type"]; // The type of file it is
    $fileSize = $_FILES["uploaded_file"]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["uploaded_file"]["error"]; // 0 for false... and 1 for true
    $kaboom = explode(".", $fileName); // Split file name into an array using the dot
    $fileExt = end($kaboom); // Now target the last array element to get the file extension
    if (!$fileTmpLoc) { // if file not chosen
        echo "ERROR: Please browse for a file before clicking the upload button.";
        exit();
    } else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
        echo "ERROR: Your file was larger than 5 Megabytes in size.";
        unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
        exit();
    } else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
        // This condition is only if you wish to allow uploading of specific file types
        echo "ERROR: Your image was not .gif, .jpg, or .png.";
        unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
        exit();
    } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
        echo "ERROR: An error occured while processing the file. Try again.";
        exit();
    }
// Place it into your "uploads" folder mow using the move_uploaded_file() function
    $moveResult = move_uploaded_file($fileTmpLoc, "assets/ct-uploads/$fileName");
// Check to make sure the move result is true before continuing
    if ($moveResult != true) {
        echo "ERROR: File not uploaded. Try again.";
        unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
        exit();
    }
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
// ---------- Include Universal Image Resizing Function --------
    $target_file = "assets/ct-uploads/$fileName";
    $resized_file = "assets/ct-uploads/resized_$fileName";
    $wmax = 1920;
    $hmax = 1080;
    ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

    unlink($target_file);
// ----------- End Universal Image Resizing Function -----------
// Display things to the page so you can see what is happening for testing purposes
    echo "The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
    echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";
    echo "It is an <strong>$fileType</strong> type of file.<br /><br />";
    echo "The file extension is <strong>$fileExt</strong><br /><br />";
    echo "The Error Message output for this upload is: $fileErrorMsg";
}


?>

<div class="container">
    <div class="page-banner">
        <img src="img/banner.png">
        <div class="background-layer"></div>
    </div>
    <div class="inner">
        <div class="page-info">
            <p class="title">Over mij</p>
            <div data-editable data-name="content[9]" class="quote">
                <?php echo $content[0]['body']; ?>
            </div>
            <div class="about-image">
                <div data-editable data-name="content[10]" class="about-blue-title mobile" >
                    <?php echo $content[1]['body']; ?>
                </div>
                <div class="layer-1">
                    <img src="img/shape-blue.png" alt="">
                    <img class="layer-2" src="img/about.jpg" alt="">
                </div>
            </div>
            <div class="about-text">
                <div data-editable data-name="content[10]" class="about-blue-title desktop">
                    <?php echo $content[1]['body']; ?>
                </div>
                <div data-editable data-name="content[11]" class="about-title">
                    <?php echo $content[2]['body']; ?>
                </div>
                <div data-editable data-name="content[12]">
                    <?php echo $content[3]['body']; ?>
                </div>
          </div>
        </div>
    </div>
    <div class="partners">
        <div class="inner">
            <div data-editable data-name="content[13]" class="title">
                <?php echo $content[4]['body']; ?>
            </div>
        </div>
        <div class="partners-logo">
            <div class="inner">
                <div class="logos">
                    <img src="img/provoet.png" alt="">
                    <img src="img/hyp.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="more-info">
        <div class="inner">
            <div class="info-block blue">
                <div data-editable data-name="content[14]">
                    <?php echo $content[5]['body']; ?>
                </div>
                <a href="behandelingen" class="button"> Bekijk Behandelingen</a>
            </div>
            <div class="info-block orange">
                <div data-editable data-name="content[15]">
                    <?php echo $content[6]['body']; ?>
                </div>
                <a href="tips" class="button"> Bekijk Tips</a>
            </div>
            <div class="info-block blue">
                <div data-editable data-name="content[16]">
                    <?php echo $content[7]['body']; ?>
                </div>
                <a href="tarieven" class="button"> Bekijk Tarieven</a>
            </div>
        </div>
    </div>
</div>
<!--<form method='post' action='' enctype='multipart/form-data'>-->
<!--    <input type='file' name='imagefile' >-->
<!--    <input type='file' name='uploaded_file' >-->
<!--    <input type='submit' value='Upload' name='upload'>-->
<!--</form>-->