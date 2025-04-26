<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>

<?
global $arRegion;

$APPLICATION->IncludeComponent(
	"coffeediz:schema.org.OrganizationAndPlace", 
	".default", 
	array(
		"ADDRESS" => $arRegion["PROPERTY_ADDRESS_VALUE"]["TEXT"],
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COUNTRY" => "",
		"DESCRIPTION" => "",
		"EMAIL" => array(
			0 => $arRegion["PROPERTY_EMAIL_VALUE"][0],
			1 => "",
		),
		"FAX" => "",
		"URL" => "https://".$arRegion["PROPERTY_MAIN_DOMAIN_VALUE"],
		"ITEMPROP" => "",
		"LATITUDE" => "",
		"LOCALITY" => $arRegion["PROPERTY_REGION_NAME_DECLINE_RP_VALUE"],
		"LOGO" => "https://".$arRegion["PROPERTY_MAIN_DOMAIN_VALUE"]."/images/logo_new.svg",
		"LOGO_URL" => "https://".$arRegion["PROPERTY_MAIN_DOMAIN_VALUE"]."/images/logo_new.svg",
		"LOGO_CAPTION" => "moscow-beton.ru",
		"LOGO_DESCRIPTION" => "moscow-beton.ru",
		"LOGO_HEIGHT" => "200",
		"LOGO_NAME" => "",
		"LOGO_TRUMBNAIL_CONTENTURL" => "https://".$arRegion["PROPERTY_MAIN_DOMAIN_VALUE"]."/images/logo_new.svg",
		"LOGO_WIDTH" => "",
		"LONGITUDE" => "",
		"NAME" => "Московский Бетон",
		"OPENING_HOURS_HUMAN" => array(
			0 => "С Понедельника по Пятницу 9-20",
			1 => "Суббота, Воскресенье круглосуточно",
			2 => "",
		),
		"OPENING_HOURS_ROBOT" => array(
			0 => "Mo-Fr 9:00&#8722;20:00",
			1 => "St,Sn",
			2 => "",
		),
		"PARAM_RATING_SHOW" => "N",
		"PHONE" => array(
		"+7 (495) 128-83-80"
		),
		"PHOTO_CAPTION" => "",
		"PHOTO_DESCRIPTION" => "",
		"PHOTO_HEIGHT" => "",
		"PHOTO_NAME" => "",
		"PHOTO_SRC" => array(
		),
		"PHOTO_TRUMBNAIL_CONTENTURL" => "",
		"PHOTO_WIDTH" => "",
		"POST_CODE" => "125438",
		"REGION" => "Московская область",
		"SHOW" => "Y",
		"SITE" => $arRegion["PROPERTY_MAIN_DOMAIN_VALUE"],
		"TAXID" => "7720461150",
		"TYPE" => "Organization",
		"TYPE_2" => "LocalBusiness",
		"TYPE_3" => "",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>