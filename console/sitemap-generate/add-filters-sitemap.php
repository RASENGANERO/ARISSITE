<?php
$_SERVER["DOCUMENT_ROOT"] = '/home/bitrix/ext_www/beton-gost.ru';
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
set_time_limit(0);

//use MoscowBeton\SitemapGenerate\Filters;

//require __DIR__.'/vendor/autoload.php';

//new Filters();

$sitemapPath = $_SERVER["DOCUMENT_ROOT"]. '/sitemap.xml';
if (file_exists($sitemapPath)) {
	$fileContent = file_get_contents($sitemapPath);
	if (strpos($fileContent, 'sitemap-filters-iblock-26') === false) {
		$fileParts = explode('</sitemapindex>', $fileContent);
		$time = new \DateTime;
		$fltersSitemap = '<sitemap><loc>https://beton-gost.ru/sitemap-filters-iblock-26.xml</loc><lastmod>' . $time->format(\DateTime::ATOM) . '</lastmod></sitemap>';
		$fileContent = $fileParts[0] . $fltersSitemap . '</sitemapindex>';
		file_put_contents($sitemapPath, $fileContent);
	}
}