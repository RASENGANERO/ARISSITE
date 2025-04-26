<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

// $request = array(
//     array(
//         "id" => "1694",
//         "quantity" => "2",
//     ),
//     array(
//         "id" => "1815",
//         "quantity" => "3",
//     ),
// );
// $request = json_encode($request);

global $USER;
$dbBasketItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "ORDER_ID" => "NULL"
    ),
    false,
    false,
    array(
        "ID",
        "NAME"
    )
);
while ($arItems = $dbBasketItems->Fetch()) {
    CSaleBasket::Delete($arItems["ID"]);
}

file_put_contents("/home/bitrix/ext_www/moscow-beton.ru/req1.txt", "request: " . print_r($_REQUEST, true) . "\r\n", FILE_APPEND);
$request = $_REQUEST["prods"];
$arProds = json_decode($request, true);
$addedProds = array();
if (CModule::IncludeModule("sale") && isset($arProds[0]["id"]) && $arProds[0]["id"] > 0) {
    $arIds = array();
    foreach ($arProds as $product) {
        $arIds[] = $product["id"];
    }

    $arSelect = Array("ID", "NAME");
    $arFilter = Array("IBLOCK_ID" => array(26,28), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $arIds);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $arNames = array();
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arNames[$arFields["ID"]] = $arFields["NAME"];
    }

    $rsPrices = CPrice::GetList(
        array(),
        array(
            "PRODUCT_ID" => $arIds,
        )
    );

    $arPrices = array();
    while ($price = $rsPrices->Fetch()) {
        $arPrices[$price["PRODUCT_ID"]] = array(
            "price" => (float) $price["PRICE"],
            "currency" => $price["CURRENCY"],
            "PRODUCT_PRICE_ID" => $price["ID"],
        );
    }
    foreach ($arProds as $product) {
        $productId = $product["id"];
        $addProduct = array(
            "PRODUCT_ID" => $productId,
            "QUANTITY" => $product["quantity"],
            "NAME" => $arNames[$productId],
            "PRICE" => $arPrices[$productId]["price"],
            "CURRENCY" => $arPrices[$productId]["currency"],
            "PRODUCT_PRICE_ID" => $arPrices[$productId]["PRODUCT_PRICE_ID"],
            "LID" => SITE_ID,
            'CUSTOM_PRICE' => 'Y',
            'PRODUCT_PROVIDER_CLASS' => '',
        );
        //$r = CSaleBasket::Add($addProduct);
        $r = Add2BasketByProductID($productId, $product["quantity"]);
        if ($r) {
            $addedProds[] = $productId;
        }
    }
}

if ($addedProds) {
    $result = json_encode($addedProds);
} else {
    $result = "false";
}

echo $result;
