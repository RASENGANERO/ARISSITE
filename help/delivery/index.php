<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "Условия доставки раствора бетона");
$APPLICATION->SetPageProperty("description", "Предлагаем ознакомиться с условиями доставки раствора бетона от завода «#SELECT_3#» в #REGION_NAME_DECLINE_PP#. Эти несложные правила помогут спланировать проведение монолитных работ и не совершить ошибки «новичка».");
//$APPLICATION->SetPageProperty("title", "Условия доставки раствора бетона миксером от завода «#SELECT_3#»");
$APPLICATION->SetTitle("Условия доставки раствора бетона от завода «#SELECT_3#»");
?><?
if($regionDescriptionTop = show_region_descripotion()){
    echo $regionDescriptionTop;
}else{?>
<div class="">
	<div class="tabs">
		<ul class="nav nav-tabs">
			<li class="box-shadow bordered active"><a href="#1m3 " data-toggle="tab">Объем от 1 м3</a></li>
			<li class="box-shadow bordered"><a href="#segodnya" data-toggle="tab">Срочная</a></li>
			<li class="box-shadow bordered"><a href="#bez-oplaty" data-toggle="tab">Без оплаты</a></li>
			<li class="box-shadow bordered"><a href="#cena" data-toggle="tab">Ко времени</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="1m3">
			<b>Доставим даже небольшой объем раствора бетона</b>. Заказать доставку у завода «#SELECT_3#» можно от 1 куба.
 		</div>
		<div class="tab-pane" id="segodnya">
			<b>Срочная доставка бетона</b>. Привезем раствор через 2 часа после получения заявки на производство в случае наличия свободных мощностей и техники. К сожалению, не всегда получается привезти бетон по требованию. Завод может производить бетон под заливку плиты и не сможет отвлечься на производство дополнительного объема. 
		</div>
		<div class="tab-pane" id="bez-oplaty">
			<b>Привезем бетон без предварительной оплаты</b>. С оплатой при получении можно заказать машину бетона до 12 м3. Оплатить можно будет водителю после приемки товара и подписания документов. При больших объемах требуется предоплата.
		</div>
<div class="tab-pane" id="cena">
    <p>
			<b>Подвезем строительный материал к определенному времени</b>. Время доставки утверждается за сутки до поставки. В случае не готовности объекта принять раствор будут начисляться простои спецтехники. Однако, время поставки можно перенести по согласованию сторон.
	</p>
		</div>
	</div>
</div>
<hr class="long"/>
    <p>
		<b>Узнайте условия поставки указав адрес объекта и объем бетона.</b>
	</p>
<div class="swipeignore">
	 <?$APPLICATION->IncludeComponent(
	"sebekon:delivery.calc",
	"fastCalc",
	Array(
		"ADD2BASKET" => "N",
		"COMPONENT_TEMPLATE" => "fastCalc",
		"CUSTOM_CALC" => "Y",
		"CUSTOM_PRICE" => "",
		"CUSTOM_WEIGHT" => "",
		"MAP" => array(1520),
		"MAP_GPS" => $mapGPS,
		"MAP_SCALE" => $mapScale,
		"MULTI_POINTS" => "Y",
		"SHOW_ROUTE" => "Y"
	)
);?>
</div>
<?}?>
<div class="areaBlockquiz quiz_block" id="cquiz_248"></div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>