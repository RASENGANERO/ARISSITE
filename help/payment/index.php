<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Условия и способы оплаты продукции бетонного завода «#SELECT_3#»");
$APPLICATION->SetPageProperty("tags", "Оплата, Купить Бетон, Аренда, Условия");
$APPLICATION->SetPageProperty("description", "Мы принимаем оплату любым удобным способом. Оплатить продукцию бетонного завода «#SELECT_3#» можно наличными при получении, по безналичному расчету и переводом.");
$APPLICATION->SetTitle("Условия и способы оплаты");
?><head>
<style>
    .payment-icons {
        display: flex;
        justify-content: space-around;
    }
    .payment-icon {
        text-align: center;
    }
</style>
</head>
<body>

<div class="payment-icons">
    <div class="payment-icon">
        <img src="/upload/medialibrary/04b/Cash.png" alt="Оплата наличными" width="163">
        <p><strong>Наличными</strong></p>
    </div>
    <div class="payment-icon">
        <img src="/upload/medialibrary/04b/Invoice.png" alt="Оплата по счету" width="163">
        <p><strong>По счету</strong></p>
    </div>
    <div class="payment-icon">
        <img src="/upload/medialibrary/04b/Transfer.png" alt="Перечисление переводом" width="163">
        <p><strong>Переводом</strong></p>
    </div>
</div>

</body><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>