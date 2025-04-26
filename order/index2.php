<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>start page here...<br>
 ---<br>
 <?$APPLICATION->IncludeComponent(
	"sebekon:delivery.calc", 
	"order_test", 
	array(
		"ADD2BASKET" => "N",
		"CUSTOM_CALC" => "Y",
		"CUSTOM_PRICE" => "111",
		"CUSTOM_WEIGHT" => "222",
		"MAP" => array(
			0 => "1520",
		),
		"MAP_GPS" => "",
		"MAP_SCALE" => "",
		"MULTI_POINTS" => "Y",
		"SHOW_ROUTE" => "N",
		"COMPONENT_TEMPLATE" => "order_test"
	),
	false
);?><br>
 ---&nbsp;<br>
 end page here...<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>