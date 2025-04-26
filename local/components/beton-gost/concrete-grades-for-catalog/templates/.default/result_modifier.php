<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php



$cp = $this->__component;

if (is_object($cp)) {
   $cp->arResult['CONCRETE_GRADES_IDS'] = $arResult['CONCRETE_GRADES_IDS'];
   $cp->arResult['TITLE'] = $arResult['TITLE'];
   $cp->SetResultCacheKeys(['CONCRETE_GRADES_IDS', 'TITLE']);
}
?>