<?define("STATISTIC_SKIP_ACTIVITY_CHECK", "true");?>
<?define('STOP_STATISTICS', true);
define('PUBLIC_AJAX_MODE', true);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?if(\Bitrix\Main\Loader::includeModule('aspro.max')):?>
	<?$context = \Bitrix\Main\Context::getCurrent();
	$request = $context->getRequest();?>
	<?if($request["ELEMENT_ID"] && $request->isPost() && CMax::checkAjaxRequest()):?>

	<?
	$arRegion = CMaxRegionality::getCurrentRegion();
	$arRegionStores = array();

	if($arRegion)
	{
		if($arRegion['LIST_STORES'])
		{
			if(reset($arRegion['LIST_STORES']) != 'component')
				$arRegionStores = array_values($arRegion['LIST_STORES']);
		}
	}
	?>

		<div class="js-info-block rounded3 ">
			<?$APPLICATION->IncludeComponent("bitrix:catalog.store.amount", "popup", array(
					"PER_PAGE" => "100",
					"USE_STORE_PHONE" => "N",
					"SCHEDULE" => "N",
					"USE_MIN_AMOUNT" => "N",
					"MIN_AMOUNT" => "",
					"ELEMENT_ID" => $request["ELEMENT_ID"],
					"CACHE_GROUPS" => "Y",
					//"CACHE_TYPE" => "A", bug fix clear cache
					"CACHE_TYPE" => "N",
					"STORES" => $arRegionStores,
					"STORE_PATH" => "/contacts/stores/#store_id#/",
					"FIELDS" => $_POST['FIELDS'] ? $_POST['FIELDS'] : false,
					"USER_FIELDS" => $_POST['USER_FIELDS'] ? $_POST['USER_FIELDS'] : false,
				),
				false, array('HIDE_ICONS' => 'Y')
			);?>
		</div>
	<?endif;?>
<?endif;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>