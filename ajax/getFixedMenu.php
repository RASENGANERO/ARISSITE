<?
use Bitrix\Main\Loader;

define("NO_KEEP_STATISTIC", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//$APPLICATION->IncludeFile('/bitrix/templates/aspro_max/page_blocks/header_fixed_2.php');
global $arTheme;
$arTheme['MAX_VISIBLE_ITEMS_MENU'] = ['VALUE' => 10];
$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."include/menu/menu.top.php",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "include_area.php"
	),
	false, array("HIDE_ICONS" => "Y")
);
exit;