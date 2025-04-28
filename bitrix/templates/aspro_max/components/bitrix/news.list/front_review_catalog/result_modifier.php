<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
//var_dump($arParams["STAFF_IBLOCK_ID"]);
if($arParams["NOT_SLIDER"] == "Y" && $arResult['ITEMS'] && $arParams["STAFF_IBLOCK_ID"]){
	$arStaffsID = $arResult['STAFF'] = array();
	/*foreach($arResult['ITEMS'] as $i => $arItem){
		$arItemsResponse[$i] = $arItem['DISPLAY_PROPERTIES']['COMPANY_RESPONSE']["VALUE"];
	}
	$arCompanyResponse = CMaxCache::CIBLockElement_GetList(array('CACHE' => array("MULTI" =>"Y", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["RESPONSE_IBLOCK_ID"]))), array("IBLOCK_ID" => $arParams["RESPONSE_IBLOCK_ID"], "ACTIVE"=>"Y", "ID" => $arItemsResponse), false, false, array('ID', 'PREVIEW_TEXT','NAME', 'IBLOCK_ID', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PROPERTY_TITLE_RESPONSE'));
	//var_dump($arCompanyResponse);
	$arCompanyResponse = array_column($arCompanyResponse, NULL, "ID");
	foreach($arItemsResponse as $itemID => $arItemResp){
		$arResult['ITEMS'][$itemID]["COMPANY_RESPONSE"] = $arCompanyResponse[$arItemResp];
	}*/

	foreach($arResult['ITEMS'] as $key => $arItem){
		if(isset($arItem['DISPLAY_PROPERTIES']['STAFF'])){
			$arStaffsID[] = $arItem['DISPLAY_PROPERTIES']['STAFF']['VALUE'];
		}
		
		if($arStaffsID){
			$arResult['STAFF'] = CMaxCache::CIblockElement_GetList(array('CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($arParams['STAFF_IBLOCK_ID']), 'MULTI' => 'N', 'GROUP' => 'ID')), array('IBLOCK_ID' => $arParams['STAFF_IBLOCK_ID'], 'ID' => $arStaffsID), false, false, array('ID', 'NAME', 'PROPERTY_POST', 'PREVIEW_PICTURE'));
		}
	}
	
}

if($arResult['ITEMS']){
	foreach($arResult['ITEMS'] as $itemKey => $arItem){
	    if($arItem['PROPERTIES'])
	    {
	        foreach($arItem['PROPERTIES'] as $key2 => $arProp)
	        {
	            if(($key2 == 'EMAIL' || $key2 == 'PHONE') && $arProp['VALUE'])
	                $arItem['MIDDLE_PROPS'][] = $arProp;
	            if(strpos($key2, 'SOCIAL') !== false && $arProp['VALUE']){
	                switch($key2){
	                    case('SOCIAL_VK'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_vk.svg';
	                        break;
	                    case('SOCIAL_ODN'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_odnoklassniki.svg';
	                        break;
	                    case('SOCIAL_FB'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_facebook.svg';
	                        break;
	                    case('SOCIAL_MAIL'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_mail.svg';
	                        break;
	                    case('SOCIAL_TW'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_twitter.svg';
	                        break;
	                    case('SOCIAL_INST'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_instagram.svg';
	                        break;
	                    case('SOCIAL_GOOGLE'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_google.svg';
	                        break;
	                    case('SOCIAL_SKYPE'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_skype.svg';
	                        break;
	                    case('SOCIAL_BITRIX'):
	                        $arProp['FILE'] = SITE_TEMPLATE_PATH.'/images/svg/social/social_bitrix24.svg';
	                        break;
	                }
	
	                $arItem['SOCIAL_PROPS'][] = $arProp;
	            }
	        }
	    }
	    $arResult['ITEMS'][$itemKey] = $arItem;
	}
}

foreach($arResult['ITEMS'] as $arItem){
	if($SID = $arItem['IBLOCK_SECTION_ID']){
		$arSectionsIDs[] = $SID;
	}
}

if($arSectionsIDs){
	$arResult['SECTIONS'] = CMaxCache::CIBLockSection_GetList(array('SORT' => 'ASC', 'NAME' => 'ASC', 'CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($arParams['IBLOCK_ID']), 'GROUP' => array('ID'), 'MULTI' => 'N')), array("IBLOCK_ID" => $arParams['IBLOCK_ID'], 'ID' => $arSectionsIDs, 'ACTIVE' => 'Y'), false, ['UF_CATALOG_SECTION_ID']);
}

// group elements by sections
foreach($arResult['ITEMS'] as $arItem){
	$SID = ($arItem['IBLOCK_SECTION_ID'] ? $arItem['IBLOCK_SECTION_ID'] : 0);
	$arResult['SECTIONS'][$SID]['ITEMS'][$arItem['ID']] = $arItem;
}

// unset empty sections
if(is_array($arResult['SECTIONS'])){
	foreach($arResult['SECTIONS'] as $i => $arSection){
		if(!$arSection['ITEMS']){
			unset($arResult['SECTIONS'][$i]);
		}

		if (!empty($arParams['CATALOG_SECTION_ID'])) {
			if (!is_array($arSection['UF_CATALOG_SECTION_ID']) || !in_array($arParams['CATALOG_SECTION_ID'], $arSection['UF_CATALOG_SECTION_ID'])) {
				unset($arResult['SECTIONS'][$i]);
			}
		}
	}
}

?>