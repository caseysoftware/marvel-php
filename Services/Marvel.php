<?php

function Services_Marvel_autoload($className) {
    $library_name = 'Services_Marvel';

    if (substr($className, 0, strlen($library_name)) != $library_name) {
        return false;
    }
    $file = str_replace('_', '/', $className);
    $file = str_replace('Services/', '', $file);
    return include dirname(__FILE__) . "/$file.php";
}

class Services_Marvel
{

}