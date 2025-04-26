<?php
	global $arRegion;
	$addr = (CMain::IsHTTPS() ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'];
	$curDir = $APPLICATION->GetCurDir();
	$arSelect = ['PROPERTY_OG_IMAGE'];
	$arFilter = ['IBLOCK_ID' => 40, 'ACTIVE_DATE'=>'Y', 'ACTIVE'=>'Y', 'PROPERTY_PAGE_URL' => $curDir, 'PROPERTY_REGION' => $arRegion['ID']];
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

	$ob = $res->GetNextElement();
	if ($ob) {
		$arFields = $ob->GetFields();
		if (!empty($arFields['PROPERTY_OG_IMAGE_VALUE'])) {
			$picture = CFile::GetFileArray($arFields['~PROPERTY_OG_IMAGE_VALUE']);
			CMax::AddMeta(
	            [
	            	'og:image' => $picture['SRC'],
	            	'og:image:secure_url' => $addr. $picture['SRC'],
	            	'twitter:image' => $addr. $picture['SRC'],
	            	'og:image:width' => $picture['WIDTH'],
	            	'og:image:height' => $picture['HEIGHT'],
	            	'og:image:alt' => $arFields['~PROPERTY_OG_IMAGE_DESCRIPTION'],
	            	'og:image:type' => $picture['CONTENT_TYPE'],
	            ]
	        );
		}
	}
?>