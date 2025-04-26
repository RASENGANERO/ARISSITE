<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("viewed_show", "Y");?>
	<?
	global $fastOrder;
	$fastOrder = array("IN_STOCK" => "Y");
	$APPLICATION->IncludeComponent(
	//"bitrix:catalog.smart.filter", 
	"onulln:fastorder", 
	"main_compact_ajax_index",
	array(
		"IBLOCK_TYPE" => "aspro_max_catalog",
		"IBLOCK_ID" => "26",
		"AJAX_FILTER_FLAG" => "Y",
		"SECTION_ID" => (isset($arSection["ID"])?$arSection["ID"]:""),
		"FILTER_NAME" => 'fastOrder',
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "N",
		"SAVE_IN_SESSION" => "N",
		"XML_EXPORT" => "Y",
		"SECTION_TITLE" => "NAME",
		"SECTION_DESCRIPTION" => "DESCRIPTION",
		"SHOW_HINTS" => $arParams["SHOW_HINTS"],
		"CONVERT_CURRENCY" => "N",
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"DISPLAY_ELEMENT_COUNT" => "N",
		"INSTANT_RELOAD" => "Y",
		"VIEW_MODE" => strtolower($arTheme["FILTER_VIEW"]["VALUE"]),
		"SEF_MODE" => "N",
		"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
		"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
		"HIDE_NOT_AVAILABLE" => "N",
		"SEF_RULE_FILTER" => $arResult["URL_TEMPLATES"]["smart_filter"],
		"SORT_BUTTONS" => $arParams["SORT_BUTTONS"],
		"SORT_PRICES" => $arParams["SORT_PRICES"],
		"AVAILABLE_SORT" => $arAvailableSort,
		"SORT" => $sort,
		"SORT_ORDER" => $sort_order,
		"COMPONENT_TEMPLATE" => ".default",
		"SECTION_CODE" => "",
		"PREFILTER_NAME" => "smartPreFilter",
		"TEMPLATE_THEME" => "blue",
		"FILTER_VIEW_MODE" => "vertical",
		"POPUP_POSITION" => "left",
		"PAGER_PARAMS_NAME" => "arrPager"
	),
	$component
);
	?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>