<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Ищите бетонный завод рядом с вами? Наши РБУ расположены неподалеку от центральных транспортных развязок. Подробное описание и расположение на карте.");
$APPLICATION->SetTitle("Собственные бетонные заводы в Московской области");
$APPLICATION->SetPageProperty("tags", "Бетонный завод, Производство бетона, РБУ, адреса");
//$APPLICATION->SetPageProperty("title", "Собственные бетонные заводы в Московской области | «#SELECT_3#»");
?><?global $arTheme;?>
<?if($arTheme["STORES_SOURCE"]["VALUE"] != 'IBLOCK'):?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.store",
	"main",
	Array(
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"FILTER_NAME" => "arRegionality",
		"GOOGLE_API_KEY" => "",
		"MAP_TYPE" => "0",
		"PHONE" => "Y",
		"SCHEDULE" => "Y",
		"SEF_FOLDER" => "/contacts/betonnye_zavody/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("element"=>"#store_id#/","liststores"=>""),
		"SET_TITLE" => "Y",
		"TITLE" => ""
	)
);?>
<?else:?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"shops",
	Array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array("NAME","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE",""),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array("EMAIL","ADDRESS","MAP","METRO","SCHEDULE","PHONE","MORE_PHOTOS",""),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PANEL" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FILTER_FIELD_CODE" => array("",""),
		"FILTER_NAME" => "arRegionality",
		"FILTER_PROPERTY_CODE" => array("",""),
		"GOOGLE_API_KEY" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "aspro_max_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array("NAME","PREVIEW_PICTURE",""),
		"LIST_PROPERTY_CODE" => array("EMAIL","ADDRESS","MAP","METRO","SCHEDULE","PHONE",""),
		"MAP_TYPE" => "0",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "Собственные бетонные заводы",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/contacts/betonnye_zavody/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("detail"=>"#ELEMENT_ID#/","news"=>"","section"=>""),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N"
	)
);?>
<?endif;?>
<?php $APPLICATION->IncludeFile("/include/seo_meta.php");?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>