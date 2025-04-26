<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("1");
?><?$APPLICATION->IncludeComponent(
	"sebekon:delivery.calc",
	"",
	Array(
		"ADD2BASKET" => "N",
		"CUSTOM_CALC" => "Y",
		"CUSTOM_PRICE" => "",
		"CUSTOM_WEIGHT" => "",
		"MAP" => array(),
		"MAP_GPS" => "",
		"MAP_SCALE" => "",
		"MULTI_POINTS" => "Y",
		"SHOW_ROUTE" => "N"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>