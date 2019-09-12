<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//urls
define("URL_PRODUCT_ALL", "seller/product/all");
define("URL_PRODUCT", "seller/product");

//tables
define("TABLE_DATA", "tc_data");
define("TABLE_USER", "tc_users");

//data paths
define("DIR_PRIVATE_DATA", "./private/data/");
define("DIR_PUBLIC_DATA", "./public/data/");

//error codes
define("ERR_FAILED", "FAILED");
define("ERR_INVALID_USER", "INVALID_USER");
define("ERR_INVALID_DATA", "INVALID_DATA");
define("ERR_PARAM_MISSING", "PARAM_MISSING");
define("ERR_UNAUTHORIZED_ACCESS", "UNAUTHORIZED_ACCESS");


function toLocalDate($date, $format)
{
    $dt = new DateTime($date);
    $tz = new DateTimeZone('Asia/Kolkata');

    $dt->setTimezone($tz);

    return $dt->format($format);
}
?>