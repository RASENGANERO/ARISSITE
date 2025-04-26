<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "Бетон ГОСТ, #REGION_NAME#, Цементный раствор, купить, гарантия");
$APPLICATION->SetPageProperty("title", "Гарантия бетонного завода «#SELECT_3#» - 1 год на монолит");
//$APPLICATION->SetPageProperty("description", "Гарантия на бетон - 1 год! Мы гарантируем, что в течение этого времени, прочность монолита будет соответствовать заявленной марке и классу.");
$APPLICATION->SetPageProperty("tags", "Гарантия, Бетон, ГОСТ");
$APPLICATION->SetTitle("Гарантия бетонного завода «#SELECT_3#»");
?>
<?if($regionDescriptionTop = show_region_descripotion()){
    echo $regionDescriptionTop;
}else{?>
<blockquote>
	Качество товарного бетона подтверждено <a href="/company/licenses/" title="Сертификаты на бетон ГОСТ" target="_blank">сертификатами ГОСТ</a>.
</blockquote>
<p>
 <span style="color: #333333; font-size: 1.6em;">Согласно ГОСТу, гарантийный срок на бетон - 12 месяцев со дня его изготовления.</span>
</p>
<?}?>
<?php $APPLICATION->IncludeFile("/include/seo_meta.php");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>