<?	
if ($arParams["SHOW_MORE_SUBSECTIONS"] && $arParams["DEPTH_LEVEL"]) {

	$rootLevel = $arParams["DEPTH_LEVEL"] + 1;
	$childLevel = $rootLevel + 1;
	$arSections = array();

	foreach( $arResult["SECTIONS"] as $arItem ) {
		if( $arItem["DEPTH_LEVEL"] == $rootLevel ) { $arSections[$arItem["ID"]] = $arItem;}
		elseif( $arItem["DEPTH_LEVEL"] == $childLevel ) {$arSections[$arItem["IBLOCK_SECTION_ID"]]["SECTIONS"][$arItem["ID"]] = $arItem;}
	}
	$arResult["SECTIONS"] = $arSections;

} elseif ($arParams["TOP_DEPTH"]>1) {

	$arSections = array();
	$arSectionsDepth3 = array();
	foreach( $arResult["SECTIONS"] as $arItem ) {
		if( $arItem["DEPTH_LEVEL"] == 1 ) { $arSections[$arItem["ID"]] = $arItem;}
		elseif( $arItem["DEPTH_LEVEL"] == 2 ) {$arSections[$arItem["IBLOCK_SECTION_ID"]]["SECTIONS"][$arItem["ID"]] = $arItem;}
		elseif( $arItem["DEPTH_LEVEL"] == 3 ) {$arSectionsDepth3[] = $arItem;}
	}
	if($arSectionsDepth3){
		foreach( $arSectionsDepth3 as $arItem) {
			foreach( $arSections as $key => $arSection) {
				if (is_array($arSection["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]]) && !empty($arSection["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]])) {
					$arSections[$key]["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]]["SECTIONS"][$arItem["ID"]] = $arItem;
				}
			}
		}
	}
	$arResult["SECTIONS"] = $arSections;

}?>

<?php
if (!empty($arParams['arRegionId'])) {
	foreach( $arResult["SECTIONS"] as $k => $arItems ){
		$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
		$arFilter = Array(
			"IBLOCK_ID"=> $arItems['IBLOCK_ID'], 
			"SECTION_ID"=> $arItems['ID'], 
			"INCLUDE_SUBSECTIONS" => 'Y', 
			"ACTIVE_DATE"=> "Y", 
			"ACTIVE"=> "Y", 
			'PROPERTY_LINK_REGION' => $arParams['arRegionId']
		);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		$arResult["SECTIONS"][$k]["ELEMENT_CNT"] = $res->SelectedRowsCount();

		foreach($arItems["SECTIONS"] as $key => $arItem) {
			$arSelect2 = Array("ID", "NAME", "DATE_ACTIVE_FROM");
			$arFilter2 = Array(
				"IBLOCK_ID"=> $arItem['IBLOCK_ID'], 
				"SECTION_ID"=> $arItem['ID'], 
				"INCLUDE_SUBSECTIONS" => 'Y', 
				"ACTIVE_DATE"=> "Y", 
				"ACTIVE"=> "Y", 
				'PROPERTY_LINK_REGION' => $arParams['arRegionId']
			);
			$res2 = CIBlockElement::GetList(Array(), $arFilter2, false, false, $arSelect2);
			$arResult["SECTIONS"][$k]["SECTIONS"][$key]["ELEMENT_CNT"] = $res2->SelectedRowsCount();
		}
	}	
}
?>