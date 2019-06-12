<?php

function redirect($url)
{
   echo "<script>location.replace('$url')</script>";
//    exit(header('Location: ' . $url));
}
