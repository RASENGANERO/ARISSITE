<?php
$ob = null;
$curDirArr = explode('/', $curDir);
if (count($curDirArr) > 2) {
	unset($curDirArr[count($curDirArr) -2]);
	$curDir = implode('/', $curDirArr);
	$arFilter["PROPERTY_PAGE_URL"] = $curDir;
	$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	$ob = $res->GetNextElement();
}
return $ob;
?>