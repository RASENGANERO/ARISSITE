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
		"Марка / Класс",
		"Наименование",
		"Стоимость с НДС",
		"Количество кубов",
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
<? $arBasket = $arResult["USER_BASKET"]; ?>
<? //printValue($arBasket); ?>
<section class="quick_basket maxwidth-theme">
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
		<? foreach ($arChilds as $parentId => $childs) { ?>
			<div class="tab__item" tabindex="<?=$parentId?>">
				<? foreach ($childs as $id => $child) { ?>
					<? if ($arItemsSort[$child["ID"]]) { ?>
						<div class="table_container">
					      	<div class="table_title"><?=$child["NAME"]?></div>
							<div class="table__header">
								<? if ($headerTableItems[$arSectionsId[$parentId]]) { ?>
									<? foreach ($headerTableItems[$arSectionsId[$parentId]] as $key => $itemName) { ?>
										<div class="a1a01__row_item"><?=$itemName?></div>
									<? } ?>
								<? } else { ?>
									<? foreach ($headerTableItems["default"] as $key => $itemName) { ?>
										<div class="a1a01__row_item"><?=$itemName?></div>
									<? } ?>
								<? } ?>
							</div>
							<? foreach ($arItemsSort[$child["ID"]] as $id => $item) { ?>
								<? $minPrice = $item["MIN_PRICE"]["PRINT_VALUE"]; ?>
								<? $markId = $item["PROPERTIES"]["BRAND"]["VALUE"]; ?>
								<? $classId = $item["PROPERTIES"]["CLASSES"]["VALUE"]; ?>
								<div class="a1a01__row" data-id="<?=$item["ID"]?>">
						        	<div class="a1a01__row_item">
										<? if ($markId) { ?>
											<span class="item__mark"><?=$arMarks[$markId]?></span>
										<? } ?>
										<? if ($classId) { ?>
											<span class="item__class"><?=$arClasses[$classId]?></span>
										<? } ?>
						        	</div>
						        	<div class="a1a01__row_item">
										<a href="<?=$item["DETAIL_PAGE_URL"]?>" class="product__link" target="_blank"><?=$item["NAME"]?></a>
									</div>
									<? if ($minPrice) { ?>
						        		<div class="a1a01__row_item item__price"><?=$minPrice?></div>
									<? } ?>
						        	<div class="a1a01__row_item">
							          	<div class="counter__wrap">
							            	<div class="counter__left">-</div>
											<? $count = 0;
											if ($arBasket[$item["ID"]]) {
												$count = $arBasket[$item["ID"]]["QUANTITY"];
											} ?>
							            	<input class="counter__value" type="text" value="<?=$count?>" />
							            	<div class="counter__right">+</div>
							          	</div>
						        	</div>
						        	<div class="a1a01__row_item"><img src="/test/img/stat.svg" alt=""></div>
						      	</div>
							<? } ?>
					    </div>
					<? } ?>
				<? } ?>
			</div>
		<? } ?>
	</div>
  <!--  table end -->
  <div class="quick__basket_form">
    <div class="form">
      <div class="form__header">
        <img class="form__header_img" src="/test/img/box.svg" alt="">
        <span class="form__header_title">Ваш заказ</span>
      </div>
      <div class="basket__list">
		  <? $total = 0; ?>
		  <? $orderPrice = 0; ?>
		  <? foreach($arBasket as $productId => $product) { ?>
			  <? $quantity = ($product["QUANTITY"] ? $product["QUANTITY"] : 0); ?>
			  <? $total += $quantity; ?>
			  <? $orderPrice += $product["PRICE"]; ?>
			  <div class="basket__item" data-id="<?=$productId?>">
			  	<span class="basket__item_name"><?=$product["NAME"]?></span>
			  	<span class="basket__item_count"><?=$quantity?> м3</span>
				<button type="button" class="basket__item_close" data-id="<?=$productId?>">×</button>
				<input type="hidden" name="<?=$productId?>" value="<?=$quantity?>">
				<input type="hidden" name="<?=$productId?>_price" value="<?=$product["PRICE"]?>">
			  </div>
		  <? } ?>
      </div>
      <div class="form__price">
        <div class="form__price_row">
          <span>Общий объём:</span>
          <span class="form__totalValue"><?=$total?> м3</span>
        </div>
        <div class="form__price_row">
          <span>Сумма скидки:</span>
          <span class="form__totalSale">0 руб.</span>
        </div>
        <div class="form__price_row">
          <span>Стоимость:</span>
          <span class="final_price"><?=number_format($orderPrice, 0, ',', ' ')?> руб.</span>
        </div>
      </div>
      <div class="form__footer">
        <a href="" class="form__footer_link">Рассчитать стоимость доставки</a>
        <button class="form__footer_basket btn btn-default btn-lg has-ripple"><span>В корзину</span>
          <div class="form__footer_basket_icon"><img src="/test/img/trash.svg" alt=""></div>
        </button>
        <span class="form__button_divider">или</span>
        <button class="form__footer_btn">Оформить в один клик</button>
      </div>
    </div>
  </div>
  <div class="float__form">
    <div class="float__form_counterList">
      <div class="float__form_counterItem">
        <span class="float__form_counterTitle">Общий объём:</span>
        <span class="float__form_counterValue">0 м3</span>
      </div>
      <div class="float__form_divider"></div>
      <div class="float__form_counterItem">
        <span class="float__form_counterTitle">Сумма скидки:</span>
        <span class="float__form_counterValue">0 руб.</span>
      </div>
      <div class="float__form_divider"></div>
      <div class="float__form_counterItem">
        <span class="float__form_counterTitle">Стоимость:</span>
        <span class="float__form_counterPrice">0 руб.</span>
      </div>
    </div>
    <div class="float__form_btnWrap">
      <button class="float__form_btn">рассчитать стоимость доставки</button>
      <button class="float__form_basket"><span>В корзину</span>
        <div class="float__form_basket_icon"><img src="/test/img/trash-red.svg"></div>
      </button>
    </div>
  </div>
</section>

<?
//printValue($arResult["ITEMS"]);
?>

<style>
    .counter__left, .counter__right {
        cursor: pointer;
        user-select: none;
    }
    .basket__list {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .quick_basket {
        display: flex;
        justify-content: center;
    }

    .wrapper1:not(.front_page):not(.catalog_page) .right_block.wide_, .wrapper1:not(.front_page):not(.catalog_page) .right_block.wide_N {
        width: 100% !important;
    }

    .quick__basket_list {
        width: 983px;
        margin-right: 40px;
    }

    .d67fa_tab {
        display: flex;
        width: 100%;
        height: 69px;
        border: 1px solid #DEDEDE;
    }

    .d67fa_tab_item:focus {
      outline: none;
    }

    .tab__item {
        display: none;
    }

    .tab__item.-active {
        display: flex;
        flex-direction: column;
        outline: none;
    }

    .item__mark {
        margin-right: 8px;
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 18px;
        color: #333333;
    }

    .item__class {
        font-style: normal;
        font-weight: 500;
        font-size: 15px;
        line-height: 18px;
        color: #D83D38;
    }

    .product__link {
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 18px;
        text-decoration: none;
        color: #333333;
    }

    .d67fa_tab_item {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 245px;
        background: #F3F4F6;
        font-family: 'Montserrat';
        border: 1px solid #DEDEDE;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        color: #D83D38;
        cursor: pointer;
    }

    .d67fa_tab_item.-active {
        color: white;
        background: #D83D38;
    }

    .form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 326px;
        background: #FFFFFF;
        border: 1px solid #ECECEC;
    }

    .form__header {
        display: flex;
        align-items: center;
        width: 100%;
        height: 69px;
        background: #F3F4F6;
        padding: 20px;
    }

    .form__header_img {
        width: 32px;
        height: 32px;
        margin-right: 12px;
        margin-left: 0;
    }

    .form__header_title {
        font-style: normal;
        font-weight: 600;
        font-size: 22px;
        line-height: 27px;
        color: #333333;
    }

    .form__price {
        width: 100%;
        height: 130px;
        padding: 24px 20px 25px;
        border-top: 1px solid #ECECEC;
        border-bottom: 1px solid #ECECEC;
    }

    .form__footer {
        width: 100%;
        height: 230px;
        padding: 26px 20px 30px;
    }

    .form__footer_link {
        display: block;
        width: 100%;
        margin-bottom: 27px;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 17px;
        color: #D83D38;
        text-align: center;
        text-decoration: underline;
    }

    .form__footer_btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 50px;
        background: #FFFFFF;
        border: 1px solid #D83D38;
        border-radius: 4px;
        outline: none;
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 15px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #D83D38;
    }

    .form__footer_basket {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 50px;
        background: #D83D38;
        border-radius: 4px;
        outline: none;
        border: none;
        font-style: normal;
        font-weight: bold;
        font-size: 12px;
        line-height: 15px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #FFFFFF;
    }

    .form__footer_basket_icon {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        border-left: 1px solid white;
    }

    .form__footer_basket > span {
        width: 100%;
        flex: 1;
    }

    .form__button_divider {
        display: block;
        width: 100%;
        margin-top: 6px;
        margin-bottom: 9px;
        font-style: normal;
        font-weight: 500;
        font-size: 12px;
        line-height: 15px;
        letter-spacing: 0.04em;
        text-align: center;
        color: #333333;
    }

    .form__price_row:last-of-type {
        align-items: flex-end;
    }

    .form__price_row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-bottom: 10px;
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 20px;
        color: #333333;
    }

    .final_price {
        display: block;
        height: 24px;
        font-weight: 600;
        font-size: 22px;
    }

    .basket__item {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        width: 100%;
        height: 70px;
        padding: 14px 20px 16px;
    }

    .basket__item_close {
        position: absolute;
        top: 0;
        right: 0;
        display: block;
        width: 15px;
        height: 15px;
        padding: 0;
        outline: none;
        border: none;
        line-height: 15px;
        background: #D83D38;
        color: white;
        cursor: pointer;
    }

    .basket__item_count {
        white-space: nowrap;
    }

    .basket__item_name {
        display: block;
        width: 180px;
        max-height: 40px;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
        color: #333333;
        overflow: hidden;
    }

    .a1a01__row {
        display: flex;
        align-items: center;
        border: 1px solid #ECECEC;
        width: 100%;
        height: 60px;
        margin-bottom: -1px;
    }

    .a1a01__row.-active {
        background: #FDF5F5;
    }

    .table_title {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        background: #302E2F;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 20px;
        color: #FFFFFF;
    }

    .table__header {
        display: flex;
        height: 50px;
        align-items: center;
        background: #F3F4F6;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 15px;
        color: #333333;
        border: 1px solid #ECECEC;
    }

    .a1a01__row_item {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        border-right: 1px solid white;
    }

    .a1a01__row_item:first-of-type {
        width: 9%;
        flex: 0.65;
    }

    .a1a01__row_item:nth-of-type(2) {
        width: 30%;
        flex: 2;
    }

    .a1a01__row_item:nth-of-type(3) {
        width: 14%;
        flex: 1;
    }

    .a1a01__row_item:nth-of-type(4) {
        width: 19%;
        flex: 1;
    }

    .a1a01__row_item:nth-of-type(5) {
        width: 10%;
        flex: 1;
    }

    .a1a01__row_item:nth-of-type(6) {
        display: none;
    }

    .a1a01__row_item:last-of-type {
        border-right: none;
    }

    .counter__wrap {
        width: 150px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFFFFF;
        border: 1px solid #ECECEC;
        border-radius: 4px;
    }

    .counter__left, .counter__value, .counter__right {
        width: 50px;
        background: transparent;
        color: #333333;
        text-align: center;
    }

    .counter__value {
        border-left: 1px solid #ECECEC;
        border-right: 1px solid #ECECEC;
        font-style: normal;
        font-weight: normal;
        font-size: 17px;
        line-height: 21px;
        color: #666666;
        border: none;
        outline: none;
    }

    .a1a01__row .a1a01__row_item {
        border-right: 1px solid #ECECEC;
    }

    .float__form {
        position: fixed;
        right: 0;
        left: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 90px;
        background: #D83D38;
        z-index: 999;
    }

    .float__form_counterList {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 600px;
        height: 100%;
    }

    .float__form_counterItem {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 200px;
        padding: 0 30px;
    }

    .float__form_divider {
        width: 1px;
        height: 20px;
        background: rgba(255, 255, 255, 0.25);
    }

    .float__form_counterTitle {
        display: block;
        margin-bottom: 9px;
        font-style: normal;
        font-weight: 600;
        font-size: 15px;
        line-height: 18px;
        color: #FFCCCA;
    }

    .float__form_counterValue {
        font-style: normal;
        font-weight: 600;
        font-size: 17px;
        line-height: 21px;
        color: #FFFFFF;
    }

    .float__form_counterPrice {
        font-style: normal;
        font-weight: 600;
        font-size: 21px;
        line-height: 26px;
        color: #FFFFFF;
    }

    .float__form_btnWrap {
        display: flex;
    }

    .float__form_btn {
        padding: 18px 50px 17px;
        margin-right: 20px;
        background: #D83D38;
        border: 1px solid #FFFFFF;
        box-sizing: border-box;
        border-radius: 4px;
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 15px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #FFFFFF;
    }

    .float__form_basket span {
        flex: 1;
    }

    .float__form_basket {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 279px;
        background: #FFFFFF;
        border-radius: 4px;
        font-style: normal;
        font-weight: bold;
        font-size: 12px;
        line-height: 15px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #D83D38;
        outline: none;
        border: none;
    }

    .float__form_basket_icon {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        border-left: 1px solid #D83D38;
    }

    @media all and (max-width: 576px) {
        .a1a01__row_item:nth-of-type(5), .a1a01__row_item:nth-of-type(5) {
            display: none;
        }
    }

    @media all and (min-width: 1366px) {
        .float__form {
            display: none;
        }
    }

    @media all and (max-width: 1366px) {
        .form {
            display: none;
        }
    }
</style>
<script src="<?=$this->GetFolder()?>/app.js"></script>
