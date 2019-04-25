<?php
function redirect($url)
{
    exit(header('Location: ' . $url));
}

