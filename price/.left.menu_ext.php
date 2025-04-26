<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(CModule::IncludeModule("iblock")) {

$IBLOCK_ID = 44;

$arOrder = ["SORT" => "ASC"];   
$arSelect = ["ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL"];
$arFilter = ["IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y", "PROPERTY_NOT_SHOW_IN_MENU" => false];
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

    while($ob = $res->GetNextElement())  {
	    $arFields = $ob->GetFields();            
	    $aMenuLinksExt[] = [
	                $arFields['NAME'],
	                $arFields['DETAIL_PAGE_URL'],
	                [],
	                [],
	                ''
	            ];
    
    }       
    
}   

if(is_array($aMenuLinksExt)) $aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>