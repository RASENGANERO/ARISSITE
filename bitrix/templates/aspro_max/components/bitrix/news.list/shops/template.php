<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<div class="title-contacts">
    <h1>Бетонные заводы</h1>
</div>
<?CMax::drawShopsList($arResult['ITEMS'], $arParams, "N");?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]){?>
	<hr/>
	<?=$arResult["NAV_STRING"]?>
<?}?>