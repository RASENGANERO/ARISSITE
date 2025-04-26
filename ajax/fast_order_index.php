<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(isset($_POST['id']) && isset($_POST['count'])) {
	$productId = intval($_POST['id']);

	$quantity = intval($_POST['count']);

	//Чистим коризину
	CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());

	$siteId = \Bitrix\Main\Context::getCurrent()->getSite();
	$userId = $USER->GetID();
								
	$order = Bitrix\Sale\Order::create($siteId, $userId);
	$fields = ['PRODUCT_ID' => $productId,'QUANTITY' => $quantity];
	Bitrix\Catalog\Product\Basket::addProduct($fields);
	$order->save();
	echo 'true';
} else {
	echo 'false';
}

