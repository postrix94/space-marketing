<?php
define('ROOT_PATH', dirname(__DIR__));
define('PUBLIC_PATH', dirname(__DIR__) . '/public');
define('VIEW_PATH', ROOT_PATH . '/resources/view');
define("SPACE_MARKETING_TOKEN", "ba67df6a-a17c-476f-8e95-bcdb75ed3958");
function debug(bool $isReporting = true): void
{
    $isReporting ? error_reporting(E_ALL) : error_reporting(0);
}



