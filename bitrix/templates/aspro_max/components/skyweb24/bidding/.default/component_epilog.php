<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (\Bitrix\Main\Loader::IncludeModule("skyweb24.bidding")){
 $components = new Skyweb24\Bidding\Maincomponent();
$components->setHeaders();
}

