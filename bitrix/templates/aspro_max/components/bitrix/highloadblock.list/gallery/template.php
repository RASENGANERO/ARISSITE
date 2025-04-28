<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}

/** @global CMain $APPLICATION */
/** @var array $arParams */
/** @var array $arResult */


if (!empty($arResult['ERROR']))
{
	echo $arResult['ERROR'];
	return false;
}

if(count($arResult['rows']) > 0) {
?>
<h2 class="top_block_title video-gallery-caption">Наше видео</h2>
<div class="items row">
	<?php
	foreach ($arResult['rows'] as $row) {
		echo '<div class="col-md-4 col-sm-6 col-xs-12"><div class="item video-gallery-item"><div class="wrap">';
		echo htmlspecialcharsBack(htmlspecialcharsBack($row["UF_CODE"]));
		echo '</div></div></div>';
	}?>
</div>
<?php
}