<?php
$target_dir = "assets/ct-uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . basename(hash('md5', $target_file) . '.' . $imageFileType);

if(isset($_FILES["image"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check == false) {
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $uploadOk = 0;
}

if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], '../' .$target_file)) {
    }
}

$array = ['url' => $target_file, 'size' => [$check[0], $check[1]], 'alt' => str_replace(['-', '_', '+', '%20', '/'], ' ', str_replace('.' . $imageFileType, '', $_FILES["image"]["name"])) ];
echo json_encode($array);