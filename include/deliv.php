<? 
$APPLICATION->IncludeComponent(
	"sebekon:delivery.calc",
	"fastCalc",
	Array(
		"ADD2BASKET" => "N",
		"CUSTOM_CALC" => "Y",
		"CUSTOM_PRICE" => "",
		"CUSTOM_WEIGHT" => "",
		"MAP" => array(),
		"MAP_GPS" => $mapGPS,
		"MAP_SCALE" => $mapScale,
		"MULTI_POINTS" => "Y",
		"SHOW_ROUTE" => "N"
	)
);?>