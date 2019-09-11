<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//urls
define("URL_PRODUCT_ALL", "seller/product/all");
define("URL_PRODUCT", "seller/product");

//tables
define("TABLE_CATS", "tb_categories");
define("TABLE_SHAPES", "tb_diamond_shapes");
define("TABLE_PRODUCT_DIAMONDS", "tb_product_diamonds");
define("TABLE_USER", "tb_user");
define("TABLE_PRODUCT", "tb_product");
define("TABLE_PRODUCT_PRICE", "tb_product_prices");
define("TABLE_FILES", "tb_files");
define("TABLE_PRODUCT_FILES", "tb_product_files");

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