<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

// $request = array(
//     "id" => "1694",
//     "quantity" => "2",
// );
// $request = json_encode($request);

$prodId = $_REQUEST["id"];
$quantity = $_REQUEST["quantity"];

$arPrice = CCatalogProduct::GetOptimalPrice($prodId, $quantity);
$basePrice = $arPrice["RESULT_PRICE"]["BASE_PRICE"];
$discountPrice = $arPrice["RESULT_PRICE"]["DISCOUNT_PRICE"];

$totalPrice = $basePrice;
//$totalPrice = $basePrice * $quantity;
//$totalPriceWithDiscount = $discountPrice * $quantity;
$totalPriceWithDiscount = $discountPrice;

$result = array(
    "quantity" => $quantity,
    "total" => $totalPriceWithDiscount,
    "discount" => $totalPrice - $totalPriceWithDiscount,
);

echo json_encode($result);
