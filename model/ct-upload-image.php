<?php
function img_resize($target, $newcopy, $w, $h, $ext) {
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
    return [$w, $h];
}

//$target_dir = "assets/ct-uploads/";
//$target_file = $target_dir . basename($_FILES["image"]["name"]);
//
//$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//$target_file = $target_dir . basename(hash('md5', $target_file) . '.' . $imageFileType);
//
//if(isset($_FILES["image"])) {
//    $check = getimagesize($_FILES["image"]["tmp_name"]);
//    if($check == false) {
//        $uploadOk = 0;
//    }
//}
//
//if (file_exists($target_file)) {
//    $uploadOk = 0;
//}
//
//if ($uploadOk == 1) {
//    if (move_uploaded_file($_FILES["image"]["tmp_name"], '../' .$target_file)) {
//    }
//}

if(isset($_FILES["image"])) {
//    echo $_FILES["image"]["type"];
    $fileName = $_FILES["image"]["name"]; // The file name
    $fileTmpLoc = $_FILES["image"]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["image"]["type"]; // The type of file it is
    $fileSize = $_FILES["image"]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["image"]["error"]; // 0 for false... and 1 for true
    $kaboom = explode(".", $fileName); // Split file name into an array using the dot
    $fileExt = end($kaboom); // Now target the last array element to get the file extension
    if (!$fileTmpLoc) { // if file not chosen
        echo "ERROR: Please browse for a file before clicking the upload button.";
        exit();
    } else if($fileSize > 10485760) { // if file size is larger than 5 Megabytes
        echo "ERROR: Your file was larger than 5 Megabytes in size.";
        unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
        exit();
    } else if (!preg_match("/.(gif|jpg|png|jpeg)$/i", $fileName) ) {
        // This condition is only if you wish to allow uploading of specific file types
        echo "ERROR: Your image was not .gif, .jpg, or .png.";
        unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
        exit();
    } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
        echo "ERROR: An error occured while processing the file. Try again.";
        exit();
    }
    $moveResult = move_uploaded_file($fileTmpLoc, '../' . 'assets/ct-uploads/' . $fileName);
    if ($moveResult != true) {
        echo "ERROR: File not uploaded. Try again.";
        unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
        exit();
    }
//    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder

    $target_dir = "assets/ct-uploads/resized_";
    $resized_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($resized_file,PATHINFO_EXTENSION));
    $resized_file = $target_dir . basename(hash('md5', $resized_file) . '.' . $imageFileType);

    $target_file = "../assets/ct-uploads/$fileName";
    $wmax = 1920;
    $hmax = 1080;
    if (!file_exists($resized_file)) {
        $resized = img_resize($target_file, ('../'.$resized_file), $wmax, $hmax, $fileExt);
        unlink($target_file);
    }
//    unlink($fileName);

//    echo $fileName;
}

$array = ['url' => $resized_file, 'size' => [round($resized[0]/3), round($resized[1]/3)], 'alt' => str_replace(['-', '_', '+', '%20', '/'], ' ', str_replace('.' . $imageFileType, '', $_FILES["image"]["name"])) ];
echo json_encode($array);