<?php
$_SERVER["DOCUMENT_ROOT"] = '/home/bitrix/ext_www/beton-gost.ru';
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
set_time_limit(0);

use MoscowBeton\SitemapGenerate\Main;
use MoscowBeton\SitemapGenerate\Filters;

require __DIR__.'/vendor/autoload.php';

new Main();
new Filters();