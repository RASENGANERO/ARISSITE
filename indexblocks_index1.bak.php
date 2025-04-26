<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?global $arMainPageOrder; //global array for order blocks?>
<?global $arTheme, $dopBodyClass;?>
<?if($arMainPageOrder && is_array($arMainPageOrder)):?>
	<?foreach($arMainPageOrder as $key => $optionCode):?>
		<?$strTemplateName = $arTheme['TEMPLATE_PARAMS'][$arTheme['INDEX_TYPE']['VALUE']][$arTheme['INDEX_TYPE']['VALUE'].'_'.$optionCode.'_TEMPLATE']['VALUE'];?>
		<?$subtype = strtolower($optionCode);?>
		
		<?$dopBodyClass .= ' '.$optionCode.'_'.$strTemplateName;?>

		<?//BIG_BANNER_INDEX?>
		<?if($optionCode == "BIG_BANNER_INDEX"):?>
			<?global $bShowBigBanners, $bBigBannersIndexClass;?>
			<?if($bShowBigBanners):?>
				<?$bIndexLongBigBanner = ($strTemplateName != "type_1" && $strTemplateName != "type_4")?>
				<?if(!$bIndexLongBigBanner):?>
					<?$dopBodyClass .= ' right_mainpage_banner';?>
				<?endif;?>

				<?if($bIndexLongBigBanner):?>
					<?ob_start();?>
						<div class="middle">
				<?endif;?>

				<div class="drag-block grey container <?=$optionCode?> <?=$bBigBannersIndexClass?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>

				<?if($bIndexLongBigBanner):?>
						</div>
					<?$html = ob_get_contents();
					ob_end_clean();?>
					<?$APPLICATION->AddViewContent('front_top_big_banner',$html);?>
				<?endif;?>
			<?endif;?>


<div class="content_wrapper_block">
<div class="maxwidth-theme fast-order-box">
	<?
	global $fastOrder;
	$fastOrder = array("IN_STOCK" => "Y");
	$APPLICATION->IncludeComponent(
	"onulln:fastorder", 
	"main_compact_ajax_index",
	array(
		"IBLOCK_TYPE" => "aspro_max_catalog",
		"IBLOCK_ID" => "26",
		"AJAX_FILTER_FLAG" => "Y",
		"SECTION_ID" => (isset($arSection["ID"])?$arSection["ID"]:""),
		"FILTER_NAME" => 'fastOrder',
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "N",
		"SAVE_IN_SESSION" => "N",
		"XML_EXPORT" => "Y",
		"SECTION_TITLE" => "NAME",
		"SECTION_DESCRIPTION" => "DESCRIPTION",
		"SHOW_HINTS" => $arParams["SHOW_HINTS"],
		"CONVERT_CURRENCY" => "N",
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"DISPLAY_ELEMENT_COUNT" => "N",
		"INSTANT_RELOAD" => "Y",
		"VIEW_MODE" => strtolower($arTheme["FILTER_VIEW"]["VALUE"]),
		"SEF_MODE" => "N",
		"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
		"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
		"HIDE_NOT_AVAILABLE" => "N",
		"SEF_RULE_FILTER" => $arResult["URL_TEMPLATES"]["smart_filter"],
		"SORT_BUTTONS" => $arParams["SORT_BUTTONS"],
		"SORT_PRICES" => $arParams["SORT_PRICES"],
		"AVAILABLE_SORT" => $arAvailableSort,
		"SORT" => $sort,
		"SORT_ORDER" => $sort_order,
		"COMPONENT_TEMPLATE" => ".default",
		"SECTION_CODE" => "",
		"PREFILTER_NAME" => "smartPreFilter",
		"TEMPLATE_THEME" => "blue",
		"FILTER_VIEW_MODE" => "vertical",
		"POPUP_POSITION" => "left",
		"PAGER_PARAMS_NAME" => "arrPager"
	),
	$component
);
	?>
</div>
</div>
		<?endif;?>

		<?//TIZERS_INDEX?>
		<?if($optionCode == "TIZERS"):?>
			<?global $bShowTizers, $bTizersIndexClass;?>
			<?if($bShowTizers):?>
				<div class="drag-block container <?=$optionCode?> <?=$bTizersIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//CATALOG_SECTIONS?>
		<?if($optionCode == "CATALOG_SECTIONS"):?>
			<?global $bShowCatalogSections, $bCatalogSectionsIndexClass;?>
			<?if($bShowCatalogSections):?>
				<div class="drag-block container <?=$optionCode?> <?=$bCatalogSectionsIndexClass;?> js-load-block loader_circle" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>" data-file="<?=SITE_DIR;?>include/mainpage/components/<?=$subtype;?>/<?=$strTemplateName;?>.php">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//CATALOG_TAB?>
		<?if($optionCode == "CATALOG_TAB"):?>
			<?global $bShowCatalogTab, $bCatalogTabIndexClass;?>
			<?if($bShowCatalogTab):?>
				<div class="drag-block container grey <?=$optionCode?> <?=$bCatalogTabIndexClass;?> js-load-block loader_circle" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>" data-file="<?=SITE_DIR;?>include/mainpage/components/<?=$subtype;?>/<?=$strTemplateName;?>.php">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName, true);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//MIDDLE_ADV?>
		<?if($optionCode == "MIDDLE_ADV"):?>
			<?global $bShowMiddleAdvBottomBanner, $bMiddleAdvIndexClass;?>
			<?if($bShowMiddleAdvBottomBanner):?>
				<div class="drag-block container <?=$optionCode?> <?=$bMiddleAdvIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//FLOAT_BANNERS?>
		<?if($optionCode == "FLOAT_BANNERS"):?>
			<?global $bShowFloatBanners, $bFloatBannersIndexClass;?>
			<?if($bShowFloatBanners):?>
				<div class="drag-block container <?=$optionCode?> <?=$bFloatBannersIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//SALE?>
		<?if($optionCode == "SALE"):?>
			<?global $bShowSale, $bSaleIndexClass;?>
			<?if($bShowSale):?>
				<div class="drag-block container grey <?=$optionCode?> <?=$bSaleIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName, true);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//COLLECTIONS?>
		<?if($optionCode == "COLLECTIONS"):?>
			<?global $bShowCollection, $bCollectionIndexClass;?>
			<?if($bShowCollection):?>
				<div class="drag-block container grey <?=$optionCode?> <?=$bCollectionIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName, true);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//REVIEWS?>
		<?if($optionCode == "REVIEWS"):?>
			<?global $bShowReview, $bReviewIndexClass;?>
			<?if($bShowReview):?>
				<div class="drag-block container grey <?=$optionCode?> <?=$bReviewIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//NEWS?>
		<?if($optionCode == "NEWS"):?>
			<?global $bShowNews, $bNewsIndexClass;?>
			<?if($bShowNews):?>
				<div class="drag-block container grey <?=$optionCode?> <?=$bNewsIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName, true);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//BLOG?>
		<?if($optionCode == "BLOG"):?>
			<?global $bShowBlog, $bBlogIndexClass;?>
			<?if($bShowBlog):?>
				<div class="drag-block container <?=$optionCode?> <?=$bBlogIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName, true);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//BOTTOM_BANNERS?>
		<?if($optionCode == "BOTTOM_BANNERS"):?>
			<?global $bShowBottomBanner, $bBottomBannersIndexClass;?>
			<?if($bShowBottomBanner):?>
				<div class="drag-block container <?=$optionCode?> <?=$bBottomBannersIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//COMPANY_TEXT?>
		<?if($optionCode == "COMPANY_TEXT"):?>
			<?global $bShowCompany, $bCompanyTextIndexClass;?>
			<?if($bShowCompany):?>
				<div class="drag-block container <?=$optionCode?> <?=$bCompanyTextIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//MAPS?>
		<?if($optionCode == "MAPS"):?>
			<?global $bShowMaps, $bMapsIndexClass;?>
			<?if($bShowMaps):?>
				<div class="drag-block container <?=$optionCode?> <?=$bMapsIndexClass;?> js-load-block loader_circle" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>" data-file="<?=SITE_DIR;?>include/mainpage/components/<?=$subtype;?>/<?=$strTemplateName;?>.php">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//FAVORIT_ITEM?>
		<?if($optionCode == "FAVORIT_ITEM"):?>
			<?global $bShowFavoritItem, $bFavoritItemIndexClass;?>
			<?if($bShowFavoritItem):?>
				<div class="drag-block container <?=$optionCode?> <?=$bFavoritItemIndexClass;?> js-load-block loader_circle" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>" data-file="<?=SITE_DIR;?>include/mainpage/components/<?=$subtype;?>/<?=$strTemplateName;?>.php">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//BRANDS?>
		<?if($optionCode == "BRANDS"):?>
			<?global $bShowBrands, $bBrandsIndexClass;?>
			<?if($bShowBrands):?>
				<div class="drag-block container <?=$optionCode?> <?=$bBrandsIndexClass;?>" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName, true);?>
				</div>
			<?endif;?>
		<?endif;?>

		<?//INSTAGRAMM?>
		<?if($optionCode == "INSTAGRAMM"):?>
			<?global $bShowInstagramm, $bInstagrammIndexClass;?>
			<?if($bShowInstagramm):?>
				<div class="drag-block container <?=$optionCode?> <?=$bInstagrammIndexClass;?> js-load-block loader_circle" data-class="<?=$subtype?>_drag" data-order="<?=++$key;?>" data-file="<?=SITE_DIR;?>include/mainpage/components/<?=$subtype;?>/<?=$strTemplateName;?>.php">
					<?=CMax::ShowPageType('mainpage', $subtype, $strTemplateName);?>
				</div>
			<?endif;?>
		<?endif;?>

	<?endforeach;?>
<?endif;?>