<?
foreach($arResult["ITEMS"] as $key=>$arItem){
	$arTmpYear = explode(' ', $arItem["ACTIVE_FROM"]);
	$year = explode('.', $arTmpYear[0]);
	$arResult["ITEMS"][$key]["DETAIL_PAGE_URL"] = str_replace('#YEAR#', $year[2], $arItem["DETAIL_PAGE_URL"]);
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
			if (!in_array($arParams['CATALOG_SECTION_ID'], $arSection['UF_CATALOG_SECTION_ID'])) {
				unset($arResult['SECTIONS'][$i]);
			}
		}
	}
}
?>