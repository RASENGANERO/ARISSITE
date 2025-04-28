<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$arResult['CATALOG_SECTION'] = !empty($arResult['PROPERTIES']['CATALOG_SECTION']['VALUE']) ? $arResult['PROPERTIES']['CATALOG_SECTION']['VALUE'] : 0;
$arResult['PRICE_TITLE'] = !empty($arResult['PROPERTIES']['PRICE_TITLE']['VALUE']) ? $arResult['PROPERTIES']['PRICE_TITLE']['VALUE'] : null;
$arResult['NOT_PRODUCT_LINK'] = !empty($arResult['PROPERTIES']['NOT_PRODUCT_LINK']['VALUE']) ? boolval($arResult['PROPERTIES']['NOT_PRODUCT_LINK']['VALUE']) : false;
$this->__component->SetResultCacheKeys(array('CATALOG_SECTION', 'PRICE_TITLE', 'NOT_PRODUCT_LINK', 'DETAIL_TEXT'));