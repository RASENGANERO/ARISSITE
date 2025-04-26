<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>


<?$APPLICATION->IncludeComponent(
	"sebekon:delivery.calc",
	"fastCalc",
	Array(
		"ADD2BASKET" => "N",
		"COMPONENT_TEMPLATE" => "fastCalc",
		"CUSTOM_CALC" => "Y",
		"CUSTOM_PRICE" => "",
		"CUSTOM_WEIGHT" => "",
		"MAP" => array(1520),
		"MAP_GPS" => $mapGPS,
		"MAP_SCALE" => $mapScale,
		"MULTI_POINTS" => "Y",
		"SHOW_ROUTE" => "Y"
	)
);?>









<div class="areaBlockquiz quiz_block" id="cquiz_248"></div>


<a class="call-wqec" style="background: #d83d38; font-size: 16px; line-height: 16px; color: #fff; padding: 17px 40px; margin-top: 15px; margin-bottom: 15px; border-radius: 4px;" data-wqec-section-id="248">Открыть опрос</a>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>