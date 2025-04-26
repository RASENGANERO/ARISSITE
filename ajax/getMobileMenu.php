<?
use Bitrix\Main\Loader;

define("NO_KEEP_STATISTIC", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//$APPLICATION->IncludeFile('/bitrix/templates/aspro_max/page_blocks/header_mobile_menu_1.php');
$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"top_mobile",
	Array(
		"COMPONENT_TEMPLATE" => "top_mobile",
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"DELAY" => "N",
		"MAX_LEVEL" => \Bitrix\Main\Config\Option::get("aspro.max", "MAX_DEPTH_MENU", 2),
		"ALLOW_MULTI_SELECT" => "Y",
		"ROOT_MENU_TYPE" => "top_content_multilevel",
		"CHILD_MENU_TYPE" => "left",
		"CACHE_SELECTED_ITEMS" => "N",
		"ALLOW_MULTI_SELECT" => "Y",
		"USE_EXT" => "Y"
	)
);
exit;