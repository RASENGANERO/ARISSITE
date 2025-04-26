<?
$isInline = strpos($_SERVER['SCRIPT_NAME'], '/ajax/') === false ? 'Y' : 'N';
$isPreview = isset($_POST['is_preview']) && $_POST['is_preview'] === 'Y' ? 'Y' : 'N';
$isPopup = $isInline === 'N' && $isPreview === 'N' ? 'Y' : 'N';

$productId = isset($_REQUEST['product_id']) && intval($_REQUEST['product_id']) > 0 ? intval($_REQUEST['product_id']) : false;
$quantity = isset($_REQUEST['quantity']) && floatval($_REQUEST['quantity']) > 0 ? floatval($_REQUEST['quantity']) : 0;


if (!empty($_REQUEST['data-trigger'])) {
	$dataTrigger = json_decode($_REQUEST['data-trigger'], true);
	if (is_array($dataTrigger) && !empty($dataTrigger['data-delivery-map-id'])) {
		$mapIds = [intval($dataTrigger['data-delivery-map-id'])];
	}
}

if($isInline === 'N'){
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

	if($isPopup === 'Y'){
		$GLOBALS['APPLICATION']->ShowAjaxHead();
		$areaIndex = 1000;
	}
	else{
		$areaIndex = isset($_POST['index']) && intval($_POST['index']) > 0 ? intval($_POST['index']) : 1001;
	}

	if($GLOBALS['APPLICATION']->GetShowIncludeAreas()){
		$GLOBALS['APPLICATION']->editArea = new CEditArea();
		$GLOBALS['APPLICATION']->editArea->includeAreaIndex = array(0 => $areaIndex);
		if($isPopup === 'Y'){
			?><style>.bx-core-adm-dialog, div.bx-component-opener, .bx-core-popup-menu{z-index:3001 !important;}</style><?
		}
	}
}
?>
<?if($isPopup === 'Y'):?><a href="#" class="close jqmClose"><?=CMax::showIconSvg('', SITE_TEMPLATE_PATH.'/images/svg/Close.svg')?></a><?endif;?>
<div class="catalog-delivery form cansearch search">
	<div class="catalog-delivery-title">
		<h2>Стоимость доставки</h2>
	</div>
	<?$APPLICATION->IncludeComponent(
								"sebekon:delivery.calc",
								"fastCalc",
								Array(
									"MAP" => $mapIds,
									"ORDER_MAP_ID" => $_REQUEST['ORDER_MAP_ID'],
									"MAP_GPS" => $mapGPS,
									"MAP_SCALE" => $mapScale,
									"SHOW_ROUTE" => (\COption::GetOptionString('sebekon.deliveryprice', 'DP_HIDE_ROUTE', 'N')=='Y')?'N':'Y',
									"ADD2BASKET" => "N"
								)
							);
	?>
	 
</div>
	<script>
	$(document).ready(function(){
<?if($isPopup === 'Y'){?>
		$.getScript('/bitrix/templates/aspro_max/js/jquery.easing.1.3.min.js');
		$('.jqmClose').on('click', function(e){
			e.preventDefault();
			$(this).closest('.jqmWindow').jqmHide();
		})
		$('.popup').jqmAddClose('button[name="web_form_reset"]');
<?} else {?>
			$('.jqmClose').click(function(){
				history.back();
			});
<?}?>
	});
	</script>
<?
if($isInline === 'N'){
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');
}



 
?>