<?php

$legajo = $_REQUEST['legajo'];
$dni = $_REQUEST['dni'];

if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/$legajo/$dni.jpg")) {
        //more code here...
        echo "images/$legajo/$dni.jpg";
    } else {
        echo 0;
    }
} else {
    echo 0;
}
