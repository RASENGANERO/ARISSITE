<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::RegisterExt('bidding', ['lang'=> $templateFolder.'/lang/ru/template.php']);
CJSCore::Init(['bidding']);

$APPLICATION->SetAdditionalCSS("/bitrix/css/main/font-awesome.css");
if($arParams['AJAX']){
	include $_SERVER["DOCUMENT_ROOT"]."/".$templateFolder."/includes/step-".$arParams['STEP'].".php";
}else{
	if($arParams["ONLY_BUTTON"] == 0){?>
		<div class="skyweb24bidding biddingOptions" id="bidding<?=$arParams["ID_PRODUCT"];?>" style="width: 800px;">

			<script>
				BX.ready(function() {

					BiddingManager<?=$arParams["ID_PRODUCT"];?> = new Skyweb24BiddingManager({
						templateFolder: '<?=$templateFolder?>',
						step: <?=$arParams['STEP'];?>,
						process: <?=$arParams['PROCESS'];?>,
						idProduct: '<?=$arParams["ID_PRODUCT"];?>',
                        test: '<?=$arParams["TEST_VIEW"];?>',
                        onlyButton:'<?=$arResult["ONLY_BUTTON"]?>',
                        condition: JSON.parse('<?=$arResult['DATA']["CONDITION"];?>')
					});

					Bidding<?=$arParams["ID_PRODUCT"];?> = new Skyweb24Bidding({
						priceMin: <?=round($arResult['DATA']['MIN'])?>,
						priceMax: <?=round($arResult['DATA']['MAX'])?>,
						idProduct: '<?=$arParams["ID_PRODUCT"];?>'
					})

				})
			</script>

		</div>
		<?if($arParams["PROCESS"]) {
			include $_SERVER["DOCUMENT_ROOT"] . "/" . $templateFolder . "/includes/button.php";
		}
	}else{
		include $_SERVER["DOCUMENT_ROOT"] . "/" . $templateFolder . "/includes/button.php";
	}
}
?>

