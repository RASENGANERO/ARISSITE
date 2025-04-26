<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?
$arEventFields = "a:30:{s:10:\"RS_FORM_ID\";s:1:\"3\";s:12:\"RS_FORM_NAME\";s:29:\"Заказать звонок\";s:15:\"RS_FORM_VARNAME\";s:8:\"CALLBACK\";s:11:\"RS_FORM_SID\";s:8:\"CALLBACK\";s:12:\"RS_RESULT_ID\";s:3:\"109\";s:14:\"RS_DATE_CREATE\";s:19:\"09.11.2020 15:28:53\";s:10:\"RS_USER_ID\";s:35:\"не зарегистрирован\";s:13:\"RS_USER_EMAIL\";s:0:\"\";s:12:\"RS_USER_NAME\";s:0:\"\";s:12:\"RS_USER_AUTH\";s:0:\"\";s:16:\"RS_STAT_GUEST_ID\";s:1:\"0\";s:18:\"RS_STAT_SESSION_ID\";s:1:\"0\";s:11:\"CLIENT_NAME\";s:27:\"Максим Голубюк\";s:15:\"CLIENT_NAME_RAW\";s:27:\"Максим Голубюк\";s:5:\"PHONE\";s:18:\"+7 (918) 022-99-08\";s:9:\"PHONE_RAW\";s:18:\"+7 (918) 022-99-08\";s:9:\"REGION_ID\";s:2:\"22\";s:18:\"REGION_MAIN_DOMAIN\";s:15:\"moscow-beton.ru\";s:22:\"REGION_MAIN_DOMAIN_RAW\";s:23:\"https://moscow-beton.ru\";s:14:\"REGION_ADDRESS\";s:76:\"Россия, Москва, улица Верхние Поля, 43, стр.1\";s:12:\"REGION_EMAIL\";s:20:\"info@moscow-beton.ru\";s:12:\"REGION_PHONE\";s:38:\"+7 (495) 128-83-80, +7 (969) 555-88-58\";s:11:\"REGION_NAME\";s:12:\"Москва\";s:22:\"REGION_NAME_DECLINE_RP\";s:12:\"Москвы\";s:22:\"REGION_NAME_DECLINE_PP\";s:12:\"Москве\";s:22:\"REGION_NAME_DECLINE_TP\";s:12:\"Москве\";s:21:\"REGION_TAG_YANDEX_MAP\";s:0:\"\";s:22:\"REGION_TAG_CONTACT_IMG\";s:0:\"\";s:23:\"REGION_TAG_CONTACT_TEXT\";s:0:\"\";s:19:\"REGION_TAG_SHEDULLE\";s:0:\"\";}";


// CEvent::Send("FORM_FILLING_CALLBACK", SITE_ID, $arEventFields);
?>





<?$APPLICATION->IncludeComponent(
	"aspro:catalog.delivery.max",
	".default",
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"SET_PAGE_TITLE" => "N",
		"DELIVERY_NO_SESSION" => "Y",
		"DELIVERY_WITHOUT_PAY_SYSTEM" => "Y",
		"PAY_FROM_ACCOUNT" => "N",
		"SPOT_LOCATION_BY_GEOIP" => "Y",
		"USE_LAST_ORDER_DATA" => "Y",
		"USE_PROFILE_LOCATION" => "N",
		"SAVE_IN_SESSION" => "Y",
		"CALCULATE_EACH_DELIVERY_WITH_EACH_PAYSYSTEM" => "N",
		"SHOW_LOCATION_SOURCE" => "N",
		"CHANGEABLE_FIELDS" => array(
			0 => "LOCATION",
			1 => "QUANTITY",
			2 => "ADD_BASKET",
		),
		"SHOW_DELIVERY_PARENT_NAMES" => "Y",
		"SHOW_MESSAGE_ON_CALCULATE_ERROR" => "Y",
		"PREVIEW_SHOW_DELIVERY_PARENT_ID" => array(
			0 => "22",
			1 => "24",
			2 => "52",
		),
		"LOCATION_CODE" => "",
		"PERSON_TYPE_ID" => "",
		"PAY_SYSTEM_ID" => "",
		"ADD_BASKET" => "Y",
		"USE_CUSTOM_MESSAGES" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?><?$APPLICATION->IncludeComponent(
	"aspro:instargam.max",
	"",
	Array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"TITLE" => "Последние новости",
		"TOKEN" => "1056017790.9b6cbfe.81d864a1f0d94689821f63b1867624c7"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
