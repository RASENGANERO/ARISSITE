<?
use Bitrix\Main\Loader;

define("NO_KEEP_STATISTIC", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//$APPLICATION->IncludeFile('/bitrix/templates/aspro_max/page_blocks/mega_menu_1.php');
$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu_in_burger",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "top",
		"COUNT_ITEM" => "6",
		"DELAY" => "N",
		"MAX_LEVEL" => 4,
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_TYPE" => "N",
		"CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"CACHE_SELECTED_ITEMS" => "N",
		"ALLOW_MULTI_SELECT" => "Y",
		"ROOT_MENU_TYPE" => "top_content_multilevel",
		"USE_EXT" => "Y"
	)
);
exit;