<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<pre>
<?

/**
 * Получение стоимости доставки для продукта после применения скидок, правил корзины и ...
 *
 * @param string|int $bitrixProductId Id битриксового продукта
 * @param string     $siteId          Id битриксового сайта, например "s1"
 * @param string|int $userId          Id битриксового пользователя
 * @param string|int $personTypeId    Id битриксового "Тип плательщика" /bitrix/admin/sale_person_type.php?lang=ru
 * @param string|int $deliveryId      Id битриксового "Службы доставки" /bitrix/admin/sale_delivery_service_list.php?lang=ru&filter_group=0
 * @param string|int $paySystemId     Id битриксового "Платежные системы" /bitrix/admin/sale_pay_system.php?lang=ru
 * @param array      $userCityId      Id битриксового города ("куда доставлять")
 *
 * @return null|float null - не удалось получить; float - стоимость (может быть 0 (после применения скидок на доставку))
 *
 * @throws \Bitrix\Main\ArgumentException
 * @throws \Bitrix\Main\ArgumentNullException
 * @throws \Bitrix\Main\ArgumentOutOfRangeException
 * @throws \Bitrix\Main\ArgumentTypeException
 * @throws \Bitrix\Main\LoaderException
 * @throws \Bitrix\Main\NotImplementedException
 * @throws \Bitrix\Main\NotSupportedException
 * @throws \Bitrix\Main\ObjectException
 * @throws \Bitrix\Main\ObjectNotFoundException
 * @throws \Bitrix\Main\SystemException
 */
function getDeliveryPriceForProduct($bitrixProductId, $siteId, $userId, $personTypeId, $deliveryId, $paySystemId, $userCityId)
{
    $result = null;

    \Bitrix\Main\Loader::includeModule('catalog');
    \Bitrix\Main\Loader::includeModule('sale');

    $products = array(
        array(
            'PRODUCT_ID' => $bitrixProductId,
            'QUANTITY'   => 1,
        ),
    );
    /** @var \Bitrix\Sale\Basket $basket */
    $basket = \Bitrix\Sale\Basket::create($siteId);
    foreach ($products as $product) {
        $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
        unset($product["PRODUCT_ID"]);
        $item->setFields($product);
    }

    /** @var \Bitrix\Sale\Order $order */
    $order = \Bitrix\Sale\Order::create($siteId, $userId);
    $order->setPersonTypeId($personTypeId);
    $order->setBasket($basket);

    /** @var \Bitrix\Sale\PropertyValueCollection $orderProperties */
    $orderProperties = $order->getPropertyCollection();
    /** @var \Bitrix\Sale\PropertyValue $orderDeliveryLocation */
    $orderDeliveryLocation = $orderProperties->getDeliveryLocation();
	
	//var_dump($orderDeliveryLocation);die();
    //$orderDeliveryLocation->setValue($userCityId); // В какой город "доставляем" (куда доставлять).

    /** @var \Bitrix\Sale\ShipmentCollection $shipmentCollection */
    $shipmentCollection = $order->getShipmentCollection();

    $delivery = \Bitrix\Sale\Delivery\Services\Manager::getObjectById($deliveryId);
	//var_dump($delivery);die();
    /** @var \Bitrix\Sale\Shipment $shipment */
    $shipment = $shipmentCollection->createItem($delivery);

    /** @var \Bitrix\Sale\ShipmentItemCollection $shipmentItemCollection */
    $shipmentItemCollection = $shipment->getShipmentItemCollection();
    /** @var \Bitrix\Sale\BasketItem $basketItem */
    foreach ($basket as $basketItem) {
        $item = $shipmentItemCollection->createItem($basketItem);
        $item->setQuantity($basketItem->getQuantity());
    }

    /** @var \Bitrix\Sale\PaymentCollection $paymentCollection */
    $paymentCollection = $order->getPaymentCollection();
    /** @var \Bitrix\Sale\Payment $payment */
    $payment = $paymentCollection->createItem(
        \Bitrix\Sale\PaySystem\Manager::getObjectById($paySystemId)
    );
    $payment->setField("SUM", $order->getPrice());
    $payment->setField("CURRENCY", $order->getCurrency());

    // $result = $order->save(); // НЕ сохраняем заказ в битриксе - нам нужны только применённые "скидки" и "правила корзины" на заказ.
    // if (!$result->isSuccess()) {
    //     //$result->getErrors();
    // }

    $deliveryPrice = $order->getDeliveryPrice();
    if ($deliveryPrice === '') {
        $deliveryPrice = null;
    }
    $result = $deliveryPrice;

    return $result;
}

// Использование
$deliveryPriceForProductCourier = getDeliveryPriceForProduct(
    $bitrixProductId,
    SITE_ID,
    $USER->GetID(),
    '1', // Юридическое лицо  /bitrix/admin/sale_person_type.php?lang=ru
    '23', // Доставка курьером до дома (в случае наличия "профиля" - указываем его id)  /bitrix/admin/sale_delivery_service_edit.php?lang=ru
    '80', // Наличными или картой при получении  /bitrix/admin/sale_pay_system.php?lang=ru
    $userCity['ID'] // Город пользователя
);


$bitrixProductId = 1404;
var_dump($deliveryPriceForProductCourier);













$url = '/testxxx.php?zxcxzcxzc_597_2384872834=Y&amp;zxcxzcxzc_597_3388231028=Y&amp;set_filter=y';
$fastOrderParams = str_replace('/testxxx.php?', '', $url);
$fastOrderParams = explode('&amp;',$fastOrderParams);
//var_dump($fastOrderParams);


$productId = 1404;

$quantity = 1;


$siteId = \Bitrix\Main\Context::getCurrent()->getSite();
$userId = $USER->GetID();
							
$order = Bitrix\Sale\Order::create($siteId, $userId);
$fields = ['PRODUCT_ID' => $productId,'QUANTITY' => $quantity];
Bitrix\Catalog\Product\Basket::addProduct($fields);
$result = $order->save();
var_dump($result);
//die();
?>
</pre>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>