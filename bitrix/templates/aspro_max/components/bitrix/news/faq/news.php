<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>

<?// intro text?>
<div class="text_before_items faq"><?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "page",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => ""
		)
	);?></div>

<?
$arItemFilter = CMax::GetIBlockAllElementsFilter($arParams);
$itemsCnt = CMaxCache::CIblockElement_GetList(array("CACHE" => array("TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), $arItemFilter, array());
$arElement = CMaxCache::CIblockElement_GetList(array("CACHE" => array("TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]), "MULTI" => "Y")), $arItemFilter, false, false, array('ID', 'NAME','PREVIEW_TEXT'));?>

	<?$arSchema = array(
		"@context" => "https://schema.org",
		"@type" => "FAQPage",
		"mainEntity" => []
	)?>
	<?foreach ($arElement as $element):
		$arSchema['mainEntity'][] = array(
			"@type" => "Question",
			"name" => strip_tags($element['NAME']),
			"acceptedAnswer" => array(
				"@type" => "Answer",
				"text" => strip_tags($element['PREVIEW_TEXT'])
			)
		);
	endforeach;?>
	
	<script type="application/ld+json"><?=str_replace("'", "\"", CUtil::PhpToJSObject($arSchema, false, true));?></script>
	
<?$this->SetViewTarget('product_share');?>
	<?if($arParams['USE_RSS'] !== 'N'):?>
		<div class="colored_theme_hover_bg-block">
			<?=CMax::ShowRSSIcon($arResult['FOLDER'].$arResult['URL_TEMPLATES']['rss']);?>
		</div>
	<?endif;?>
<?$this->EndViewTarget();?>

<?if(!$itemsCnt):?>
	<div class="alert alert-warning"><?=GetMessage("SECTION_EMPTY")?></div>
<?else:?>
	<?@include_once('page_blocks/'.$arParams["SECTION_ELEMENTS_TYPE_VIEW"].'.php');?>	
<?endif;?>