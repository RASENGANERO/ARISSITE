<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */
 //echo "<pre>";
//var_dump($arResult["ITEMS"][0]["OFFERS"][0]["ID"]);die();
$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$discountPositionClass = '';
$labelPositionClass = '';

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
	'LABEL_POSITION_CLASS' => $labelPositionClass,
	'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

if ($arParams['HIDE_SECTION_DESCRIPTION'] !== 'Y')
{
	?>
	<div class="bx-section-desc bx-<?=$arParams['TEMPLATE_THEME']?>">
		<p class="bx-section-desc-post"><?=$arResult['DESCRIPTION']?></p>
	</div>
	<?
}
?>

<? /* ?>
<div class="catalog-section bx-<?=$arParams['TEMPLATE_THEME']?>" data-entity="<?=$containerName?>">
	<?
	if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS']))
	{
		$areaIds = array();

		foreach ($arResult['ITEMS'] as $item)
		{
			$uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
			$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
			$this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
			$this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);
		}
		?>
		<!-- items-container -->
		<?
		foreach ($arResult['ITEM_ROWS'] as $rowData)
		{
			$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
			?>
			<div class="row <?=$rowData['CLASS']?>" data-entity="items-row">
				<?
				switch ($rowData['VARIANT'])
				{
					case 0:
						?>
						<div class="col-xs-12 product-item-small-card">
							<div class="row">
								<div class="col-xs-12 product-item-big-card">
									<div class="row">
										<div class="col-md-12">
											<?
											$item = reset($rowItems);
											$APPLICATION->IncludeComponent(
												'bitrix:catalog.item',
												'',
												array(
													'RESULT' => array(
														'ITEM' => $item,
														'AREA_ID' => $areaIds[$item['ID']],
														'TYPE' => $rowData['TYPE'],
														'BIG_LABEL' => 'N',
														'BIG_DISCOUNT_PERCENT' => 'N',
														'BIG_BUTTONS' => 'N',
														'SCALABLE' => 'N'
													),
													'PARAMS' => $generalParams
														+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
												),
												$component,
												array('HIDE_ICONS' => 'Y')
											);
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?
						break;

					case 1:
						?>
						<div class="col-xs-12 product-item-small-card">
							<div class="row">
								<?
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-xs-6 product-item-big-card">
										<div class="row">
											<div class="col-md-12">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'',
													array(
														'RESULT' => array(
															'ITEM' => $item,
															'AREA_ID' => $areaIds[$item['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
													),
													$component,
													array('HIDE_ICONS' => 'Y')
												);
												?>
											</div>
										</div>
									</div>
									<?
								}
								?>
							</div>
						</div>
						<?
						break;

					case 2:
						?>
						<div class="col-xs-12 product-item-small-card">
							<div class="row">
								<?
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-sm-4 product-item-big-card">
										<div class="row">
											<div class="col-md-12">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'',
													array(
														'RESULT' => array(
															'ITEM' => $item,
															'AREA_ID' => $areaIds[$item['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'Y',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
													),
													$component,
													array('HIDE_ICONS' => 'Y')
												);
												?>
											</div>
										</div>
									</div>
									<?
								}
								?>
							</div>
						</div>
						<?
						break;

					case 3:
						?>
						<div class="col-xs-12 product-item-small-card">
							<div class="row">
								<?
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-xs-6 col-md-3">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								?>
							</div>
						</div>
						<?
						break;

					case 4:
						$rowItemsCount = count($rowItems);
						?>
						<div class="col-sm-6 product-item-big-card">
							<div class="row">
								<div class="col-md-12">
									<?
									$item = array_shift($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
							</div>
						</div>
						<div class="col-sm-6 product-item-small-card">
							<div class="row">
								<?
								for ($i = 0; $i < $rowItemsCount - 1; $i++)
								{
									?>
									<div class="col-xs-6">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'',
											array(
												'RESULT' => array(
													'ITEM' => $rowItems[$i],
													'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								?>
							</div>
						</div>
						<?
						break;

					case 5:
						$rowItemsCount = count($rowItems);
						?>
						<div class="col-sm-6 product-item-small-card">
							<div class="row">
								<?
								for ($i = 0; $i < $rowItemsCount - 1; $i++)
								{
									?>
									<div class="col-xs-6">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'',
											array(
												'RESULT' => array(
													'ITEM' => $rowItems[$i],
													'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								?>
							</div>
						</div>
						<div class="col-sm-6 product-item-big-card">
							<div class="row">
								<div class="col-md-12">
									<?
									$item = end($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
							</div>
						</div>
						<?
						break;

					case 6:
						?>
						<div class="col-xs-12 product-item-small-card">
							<div class="row">
								<?
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-xs-6 col-sm-4 col-md-2">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								?>
							</div>
						</div>
						<?
						break;

					case 7:
						$rowItemsCount = count($rowItems);
						?>
						<div class="col-sm-6 product-item-big-card">
							<div class="row">
								<div class="col-md-12">
									<?
									$item = array_shift($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
							</div>
						</div>
						<div class="col-sm-6 product-item-small-card">
							<div class="row">
								<?
								for ($i = 0; $i < $rowItemsCount - 1; $i++)
								{
									?>
									<div class="col-xs-6 col-md-4">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'',
											array(
												'RESULT' => array(
													'ITEM' => $rowItems[$i],
													'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								?>
							</div>
						</div>
						<?
						break;

					case 8:
						$rowItemsCount = count($rowItems);
						?>
						<div class="col-sm-6 product-item-small-card">
							<div class="row">
								<?
								for ($i = 0; $i < $rowItemsCount - 1; $i++)
								{
									?>
									<div class="col-xs-6 col-md-4">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'',
											array(
												'RESULT' => array(
													'ITEM' => $rowItems[$i],
													'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								?>
							</div>
						</div>
						<div class="col-sm-6 product-item-big-card">
							<div class="row">
								<div class="col-md-12">
									<?
									$item = end($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
							</div>
						</div>
						<?
						break;

					case 9:
						?>
						<div class="col-xs-12">
							<div class="row">
								<?
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-xs-12 product-item-line-card">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								?>

							</div>
						</div>
						<?
						break;
				}
				?>
			</div>
			<?
		}
		unset($generalParams, $rowItems);
		?>
		<!-- items-container -->
		<?
	}
	else
	{
		// load css for bigData/deferred load
		$APPLICATION->IncludeComponent(
			'bitrix:catalog.item',
			'',
			array(),
			$component,
			array('HIDE_ICONS' => 'Y')
		);
	}
	?>
</div>

<? */ ?>

<? $headerTableItems = array(
	119 => array(
		"Марка / Класс",
		"Наименование",
		"Стоимость с НДС",
		"Количество кубов",
		// "Подробнее",
		"К сравнению",
	),
	120 => array(
		"Марка / Класс",
		"Наименование",
		"Стоимость с НДС",
		"Количество кубов",
		// "Подробнее",
		"К сравнению",
	),
	121 => array(
		"Марка / Класс",
		"Наименование",
		"Стоимость с НДС",
		"Количество кубов",
		// "Подробнее",
		"К сравнению",
	),
	122 => array(
		"",
		"Наименование",
		"Стоимость с НДС",
		"Количество смен",
		// "Подробнее",
		"К сравнению",
	),
	"default" => array(
		"Марка / Класс",
		"Наименование",
		"Стоимость с НДС",
		"Количество кубов",
		// "Подробнее",
		"К сравнению",
	)
); ?>

<? $arSections = $arResult["SECTIONS"]; ?>
<? $arBasket = $arResult["USER_BASKET"];?>

<section class="quick_basket maxwidth-theme swipeignore">
  	<div class="quick__basket_list">
    	<div class="d67fa_tab">
			<? $arChilds = array();
			$arSectionsId = array();
			$i = 0;?>
			<? foreach ($arSections as $id => $section) { ?>
				<? if ($section["CHILD"]) {
					$arChilds[$i] = $section["CHILD"];
				} else {
					$arChilds[$i][$section["ID"]] = $section;
				} ?>
				<? $arSectionsId[$i] = $section["ID"]; ?>
				<div class="d67fa_tab_item" tabindex="<?=$i?>"><?=$section["NAME"]?></div>
				<? $i++; ?>
			<? } ?>
    	</div>

    	<!--  table  -->
		<? $arItemsSort = $arResult["ITEMS_SORT"]; ?>
		<? $arMarks = $arResult["ITEMS_MARKS"]; ?>
		<? $arClasses = $arResult["ITEMS_CLASSES"]; ?>
		<? $arCurMeasureProdsId = array(); ?>
		<? foreach ($arChilds as $parentId => $childs) { ?>
			<div class="tab__item" tabindex="<?=$parentId?>">
				<? foreach ($childs as $id => $child) { ?>
					<? if ($arItemsSort[$child["ID"]]) { ?>
              <div class="table_title"><?=$child["NAME"]?></div>
						<div class="table_container">
							<div class="table__header">
								<? if ($headerTableItems[$arSectionsId[$parentId]]) { ?>
									<? foreach ($headerTableItems[$arSectionsId[$parentId]] as $key => $itemName) { ?>
										<div class="a1a01__row_item a1a01__row_item_<?=$key?>"><?=$itemName?></div>
									<? } ?>
								<? } else { ?>
									<? foreach ($headerTableItems["default"] as $key => $itemName) { ?>
										<div class="a1a01__row_item a1a01__row_item_<?=$key?>"><?=$itemName?></div>
									<? } ?>
								<? } ?>
							</div>
							<? foreach ($arItemsSort[$child["ID"]] as $id => $item) { ?>
								<? $minPrice = $item["MIN_PRICE"]["PRINT_VALUE"]; ?>
								<? $markId = $item["PROPERTIES"]["BRAND"]["VALUE"]; ?>
								<? $classId = $item["PROPERTIES"]["CLASSES"]["VALUE"]; ?>
								<? $isCurMeasure = ($item["MIN_PRICE"]["CATALOG_MEASURE"] == "6"); ?>
								<? if ($isCurMeasure) {
									$arCurMeasureProdsId[] = $item["ID"];
								} ?>
								<?
								$compareFlag = false;
								if(array_key_exists($id ,$_SESSION['CATALOG_COMPARE_LIST'][$arParams['IBLOCK_ID']]["ITEMS"]))
									$compareFlag = true;
								?>
								<?
								$minOfferPrice = 999999999;
								$minOfferPriceID = $item['ID'];
								if(count($item["OFFERS"]) > 0) {
									foreach($item["OFFERS"] as $offerx) {
										if($offerx["CATALOG_PRICE_1"] < $minOfferPrice) {
											$minOfferPrice = $offerx["CATALOG_PRICE_1"];
											$minOfferPriceID = $offerx['ID'];
											$itemMeasure = $offerx["ITEM_MEASURE"]["TITLE"];
										}
									}
								} else {
									$itemMeasure = $item["ITEM_MEASURE"]["TITLE"];
								}
								$itemMeasure = str_replace('смена', 'см.', $itemMeasure);
								?>
								<div class="a1a01__row" data-measure="<?=$itemMeasure?>" data-itemId="<?=$item['ID']?>" data-id="<?=$minOfferPriceID?>">
						        	<div class="a1a01__row_item a1a01__row_item_0">
										<? if ($markId) { ?>
											<span class="item__mark"><?=$arMarks[$markId]?></span>
										<? } ?>
										<? if ($classId) { ?>
											<span class="item__class"><?=$arClasses[$classId]?></span>
										<? } ?>
						        	</div>
						        	<div class="a1a01__row_item a1a01__row_item_1">
										<a href="<?=$item["DETAIL_PAGE_URL"]?>" class="product__link" target="_blank"><?=$item["NAME"]?></a>
									</div>
									<? if ($minPrice) { ?>
						        		<div class="a1a01__row_item item__price a1a01__row_item_2"><?=$minPrice?></div>
									<? } ?>
						        	<div class="a1a01__row_item a1a01__row_item_3">
							          	<div class="counter__wrap">
							            	<div class="counter__left">-</div>
											<? $count = 0;
											if ($arBasket[$minOfferPriceID]) {
												$count = $arBasket[$minOfferPriceID]["QUANTITY"];
											} ?>
							            	<input class="counter__value" type="input" value="<?=$count?>" />
							            	<div class="counter__right">+</div>
							          	</div>
						        	</div>
						        	<div class="a1a01__row_item a1a01__row_item_4">
						        	  <span class="a1a01_compare <?=$compareFlag ? 'active' : '';?>">
							  	      	<svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M5.68745 1.0002L0.999999 1.0002L1 21L17.8748 21L17.8748 11.7423L13.1874 11.7423L13.1874 19.4375L11.7811 19.4375L11.7811 4.90639L7.09369 4.90639L7.09369 19.4375L5.68746 19.4375L5.68745 1.0002ZM2.56248 2.56266L2.56249 19.4375L4.12497 19.4375L4.12497 2.56266L2.56248 2.56266ZM14.7499 13.3048L14.7499 19.3985L16.3124 19.3985L16.3124 13.3048L14.7499 13.3048ZM8.65618 6.46888L8.65618 19.3985L10.2187 19.3985L10.2187 6.46888L8.65618 6.46888Z" stroke="white" stroke-width="0.3"/>
										</svg>
										<a href="/catalog/compare.php" class="goCompare" target="_blank">Перейти к сравнению</a>
						    		  </span>
								    </div>
									<input type="hidden" name="measure" value="<?=$isCurMeasure?>">

                  </div>
							<? } ?>
					    </div>
					<? } ?>
				<? } ?>
			</div>
		<? } ?>
	</div>
  <!--  table end -->
  <div>
    <div class="quick__basket_form">
      <div class="form_orderxx">
      <div class="form__header">
        <img class="form__header_img" src="<?=$templateFolder?>/img/box.svg" alt="">
        <span class="form__header_title">Ваш заказ</span>
      </div>
      <div class="basket__list">
        <? $totalQuantity = 0; ?>
        <? $orderPrice = 0; ?>
        <? foreach($arBasket as $productId => $product) { ?>
          <? $quantity = ($product["QUANTITY"] ? $product["QUANTITY"] : 0); ?>
        <? if (in_array($productId, $arCurMeasureProdsId)) {
          $isCurMeasureOrder = true;
          $totalQuantity += $quantity;
        } else {
          $catalogProd = CCatalogProduct::GetByID($productId);
          if ($catalogProd["MEASURE"] == "6") {
            $isCurMeasureOrder = true;
            $totalQuantity += $quantity;
          } else {
            $isCurMeasureOrder = false;
          }
        }
		$measureName = '';
		if ($catalogProd["MEASURE"] == "6") {
			$measureName = 'м³';
		}
		if ($catalogProd["MEASURE"] == "8") {
			$measureName = 'см.';
		}
		?>
          <? $orderPrice += $product["PRICE"] * $product["QUANTITY"]; ?>
          <div class="basket__item" data-id="<?=$productId?>">
            <span class="basket__item_name"><?=$product["NAME"]?></span>
            <span class="basket__item_count"><span class="basket__item_count__count"><?=$quantity?></span> <span class="basket__item_count__mesc"><?=$measureName?></span></span>
            <button type="button" class="basket__item_close" data-id="<?=$productId?>">×</button>
            <input type="hidden" name="<?=$productId?>" value="<?=$quantity?>">
          <input type="hidden" name="price" value="<?=$product["PRICE"]?>">
            <input type="hidden" name="measureOrder" value="<?=$isCurMeasureOrder?>">
          </div>
        <? } ?>
      <? $orderPriceFormat = number_format($orderPrice, 0, ',', ' ')?>
      </div>
      <div class="form__price">
        <div class="form__price_row">
        <span>Общий объём:</span>
        <span class="form__totalValue"><?=str_replace(' ','&nbsp;',$totalQuantity)?>&nbsp;м³</span>
        </div>
        <div class="form__price_row discont_hide">
        <span>Сумма скидки:</span>
        <span class="form__totalSale">0 руб.</span>
        </div>
        <div class="form__price_row">
        <span>Стоимость:</span>
        <span class="final_price"><?=str_replace(' ','&nbsp;',$orderPriceFormat)?>&nbsp;руб.</span>
        </div>
		<p>Скидка за объем будет рассчитана после добавления в корзину.</p>
      </div>
      <div class="form__footer">
        <button class="form__footer_basket btn btn-default btn-lg has-ripple"><span>В корзину</span>
        <div class="form__footer_basket_icon"><img src="<?=$templateFolder?>/img/trash.svg" alt=""></div>
        </button>
        <span class="form__button_divider">или</span>
        <button class="form__footer_btn form__footer_btn_1click">Оформить в один клик</button>
      </div>
      </div>
    </div>
  </div>
  <div class="float__form">
    <div class="float__form_counterList">
      <div class="float__form_counterItem float__form_value">
        <span class="float__form_counterTitle">Общий объём:</span>
        <span class="float__form_counterValue"><?=str_replace(' ','&nbsp;',$totalQuantity)?>&nbsp;м3</span>
      </div>
      <div class="float__form_divider"></div>
      <div class="float__form_counterItem float__form_sale">
        <span class="float__form_counterTitle">Сумма скидки:</span>
        <span class="float__form_discount">0 руб.</span>
      </div>
      <div class="float__form_divider"></div>
      <div class="float__form_counterItem">
        <span class="float__form_counterTitle">Стоимость:</span>
        <span class="float__form_counterPrice"><?=str_replace(' ','&nbsp;',$orderPriceFormat)?>&nbsp;руб.</span>
      </div>
    </div>
    <div class="float__form_btnWrap">
      <button class="float__form_basket"><span>В корзину</span>
        <div class="float__form_basket_icon"><img src="<?=$templateFolder?>/img/trash-red.svg"></div>
      </button>
    </div>
  </div>
</section>
<?
// printValue($arResult["ITEMS"]);
?>
<script src="<?=$this->GetFolder()?>/app.js"></script>
