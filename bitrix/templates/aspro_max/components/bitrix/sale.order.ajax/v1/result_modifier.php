<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */

$component = $this->__component;

/*
function d($data, $die = false) {
	echo'<pre>'; print_r($data); echo'</pre>';
	if ($die != false) die();
}
*/
//d($arResult['DELIVERY']);
//d($arResult['BASKET_ITEMS']);
//d($arResult['ORDER_DATA']);
/*
$BASKET_ITEMS_QUANTITY = 0;
foreach ($arResult['BASKET_ITEMS'] as $item) {
	$BASKET_ITEMS_QUANTITY += $item['QUANTITY'];
}

if ($BASKET_ITEMS_QUANTITY > 6) {
	$DELIVERY_ID	= reset($arResult['DELIVERY'])['ID'];
	$DELIVERY_PRICE = reset($arResult['DELIVERY'])['PRICE'];
	$DELIVERY_SUMM 	= $DELIVERY_PRICE * $BASKET_ITEMS_QUANTITY;

	$arResult['DELIVERY'][$DELIVERY_ID]['PRICE'] = $DELIVERY_SUMM;
	$arResult['DELIVERY'][$DELIVERY_ID]['PRICE_FORMATED'] = $DELIVERY_SUMM.' руб.'; //CURRENCY

	$arResult['JS_DATA']['TOTAL']['DELIVERY_PRICE'] 			= $DELIVERY_SUMM;
	$arResult['JS_DATA']['TOTAL']['DELIVERY_FORMATED'] 			= number_format($DELIVERY_SUMM, 0, ',', ' ').' руб.'; //CURRENCY
	$arResult['JS_DATA']['TOTAL']['DELIVERY_PRICE_FORMATED'] 	= number_format($DELIVERY_SUMM, 0, ',', ' ').' руб.'; //CURRENCY
	
	$orderTotalPrice = $arResult['JS_DATA']['TOTAL']['PRICE_WITHOUT_DISCOUNT_VALUE'] + $DELIVERY_SUMM;
	$arResult['JS_DATA']['TOTAL']['ORDER_TOTAL_PRICE'] 			= $orderTotalPrice;
	$arResult['JS_DATA']['TOTAL']['ORDER_TOTAL_PRICE_FORMATED'] = number_format($orderTotalPrice, 0, ',', ' ').' руб.'; //CURRENCY
}

//array_pop($arResult['BASKET_ITEMS']);
//d($arResult['DELIVERY']);
//d($arResult['BASKET_ITEMS']);
//d(reset($arResult['DELIVERY'])['PRICE']);


// BX.Sale.OrderAjaxComponent.init
$arResult['JS_DATA']['DELIVERY'] = $arResult['DELIVERY'];
//d($arResult['JS_DATA']['TOTAL']);
*/

$component::scaleImages($arResult['TOTAL'], $arParams['SERVICES_IMAGES_SCALING']);
