<?
use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager;
$apiKey = \COption::GetOptionString("sebekon.deliveryprice", "DP_YMAP_KEY", "");
if ($apiKey) {
    $apiKey = 'apikey='.urlencode($apiKey).'&';
}
?>
<script type="text/javascript" src="//api-maps.yandex.ru/2.1/?<?=$apiKey?>load=package.full&lang=ru-RU&wizard=sebekon.deliverycalc"></script>
<div class="main-catalog-wrapper details">
	<div class="section-content-wrapper <?CMax::ShowPageProps("WITH_LEFT_BLOCK")?>">
		<?

        $metaData = array(
            'og:description' => $arElement['PREVIEW_TEXT'],
            'og:image' => (($arElement['PREVIEW_PICTURE'] || $arElement['DETAIL_PICTURE']) ? CFile::GetPath(($arElement['PREVIEW_PICTURE'] ? $arElement['PREVIEW_PICTURE'] : $arElement['DETAIL_PICTURE'])) : false),
        );

        $arSelect = Array("ID", "CODE", "PROPERTY_LINK_REGION", "PROPERTY_OGTITLE", "PROPERTY_OGDESCRIPTION", "PREVIEW_TEXT", "NAME", "catalog_PRICE_1");
        $arFilter = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"], "PROPERTY_LINK_REGION" => $arParams["REGION"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIblockElement::GetList([], $arFilter, false, false, $arSelect);
        if($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            if(!empty($arFields["ID"])){
                $arResult["VARIABLES"]["ELEMENT_ID"] = $arFields["ID"];
            }

            foreach (["PROPERTY_OGDESCRIPTION_VALUE", "PREVIEW_TEXT", "PROPERTY_OGTITLE_VALUE"] as $prop){
                $arFields[$prop] = str_replace(array("#NAME#", "#SNAME#", "#PRICE#", "#REGION_NAME_DECLINE_TP#", "#REGION_NAME_DECLINE_PP#", "#REGION_NAME_DECLINE_RP#", "#REGION_NAME#"), array($arFields["NAME"], mb_strtolower($arFields["NAME"]), str_replace("&nbsp;", " ", CCurrencyLang::CurrencyFormat($arFields["CATALOG_PRICE_1"], $arFields["CATALOG_CURRENCY_1"])), $arRegion["PROPERTY_REGION_NAME_DECLINE_TP_VALUE"], $arRegion["PROPERTY_REGION_NAME_DECLINE_PP_VALUE"], $arRegion["PROPERTY_REGION_NAME_DECLINE_RP_VALUE"], $arRegion["NAME"]), $arFields[$prop]);
            }

            if(!empty($arFields["PROPERTY_OGTITLE_VALUE"])){
                $metaData["og:title"] = $arFields["PROPERTY_OGTITLE_VALUE"];
                 $metaData['twitter:title'] = $metaData["og:title"];
                 $APPLICATION->SetPageProperty("twitter:title", $metaData['twitter:title']);
            }
            if(!empty($arFields["PROPERTY_OGDESCRIPTION_VALUE"])){
                $metaData["og:description"] = $arFields["PROPERTY_OGDESCRIPTION_VALUE"];
                $metaData['twitter:description'] = $metaData["og:description"];
                $APPLICATION->SetPageProperty("twitter:description", $metaData['twitter:description']);
            }
        }

        $metaData['twitter:card'] = 'summary';

        CMax::AddMeta(
            $metaData
        );

		?>
		<?$sViewElementTemplate = ($arParams["ELEMENT_TYPE_VIEW"] == "FROM_MODULE" ? $arTheme["CATALOG_PAGE_DETAIL"]["VALUE"] : $arParams["ELEMENT_TYPE_VIEW"]);?>
		<?$hide_left_block = ($arTheme["LEFT_BLOCK_CATALOG_DETAIL"]["VALUE"] == "Y" ? "N" : "Y");

		//set offer view type
		$typeTmpDetail = $typeTmpPictureDetail = 0;
		if($arSection['UF_ELEMENT_DETAIL'])
			$typeTmpDetail = $arSection['UF_ELEMENT_DETAIL'];
		if($arSection['UF_PICTURE_RATIO'])
			$typeTmpPictureDetail = $arSection['UF_PICTURE_RATIO'];

		if(!$typeTmpDetail || !$typeTmpPictureDetail){
			if($arSection["DEPTH_LEVEL"] > 2){
				$sectionParent = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), array('GLOBAL_ACTIVE' => 'Y', "ID" => $arSection["IBLOCK_SECTION_ID"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false, array("ID", "IBLOCK_ID", "NAME", "UF_ELEMENT_DETAIL", "UF_PICTURE_RATIO"));
				if($sectionParent['UF_ELEMENT_DETAIL'] && !$typeTmpDetail){
					$typeTmpDetail = $sectionParent['UF_ELEMENT_DETAIL'];
				}
				if($sectionParent['UF_PICTURE_RATIO'] && !$typeTmpPictureDetail){
					$typeTmpPictureDetail = $sectionParent['UF_PICTURE_RATIO'];
				}

				if(!$typeTmpDetail || !$typeTmpPictureDetail){
					$sectionRoot = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), array('GLOBAL_ACTIVE' => 'Y', "<=LEFT_BORDER" => $arSection["LEFT_MARGIN"], ">=RIGHT_BORDER" => $arSection["RIGHT_MARGIN"], "DEPTH_LEVEL" => 1, "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false, array("ID", "IBLOCK_ID", "NAME", "UF_ELEMENT_DETAIL", "UF_PICTURE_RATIO"));
					if($sectionRoot['UF_ELEMENT_DETAIL'] && !$typeTmpDetail){
						$typeTmpDetail = $sectionRoot['UF_ELEMENT_DETAIL'];
					}
					if($sectionRoot['UF_PICTURE_RATIO'] && !$typeTmpPictureDetail){
						$typeTmpPictureDetail = $sectionRoot['UF_PICTURE_RATIO'];
					}
				}
			}
			else{
				$sectionRoot = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), array('GLOBAL_ACTIVE' => 'Y', "<=LEFT_BORDER" => $arSection["LEFT_MARGIN"], ">=RIGHT_BORDER" => $arSection["RIGHT_MARGIN"], "DEPTH_LEVEL" => 1, "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false, array("ID", "IBLOCK_ID", "NAME", "UF_ELEMENT_DETAIL", "UF_PICTURE_RATIO"));
				if($sectionRoot['UF_ELEMENT_DETAIL'] && !$typeTmpDetail){
					$typeTmpDetail = $sectionRoot['UF_ELEMENT_DETAIL'];
				}
				if($sectionRoot['UF_PICTURE_RATIO'] && !$typeTmpPictureDetail){
					$typeTmpPictureDetail = $sectionRoot['UF_PICTURE_RATIO'];
				}
			}
		}

		if($typeTmpDetail){
			$rsTypes = CUserFieldEnum::GetList(array(), array("ID" => $typeTmpDetail));
			if($arType = $rsTypes->GetNext()){
				$typeDetail = $arType['XML_ID'];
			}
			if($typeDetail){
				$sViewElementTemplate = $typeDetail;
			}
		}
		if($typeTmpPictureDetail){
			$rsTypes = CUserFieldEnum::GetList(array(), array("ID" => $typeTmpPictureDetail));
			if($arType = $rsTypes->GetNext()){
				$typePictureDetail = $arType['XML_ID'];
			}
			if($typePictureDetail){
				$sViewPictureDetail = $typePictureDetail;
			}
		}
		?>

		<?if($arParams["USE_SHARE"] == "Y" && $arElement):?>
			<?$this->SetViewTarget('product_share');?>
				<?\Aspro\Functions\CAsproMax::showShareBlock('top')?>
			<?$this->EndViewTarget();?>
		<?endif;?>

		<?$isWideBlock = (isset($arParams["DIR_PARAMS"]["HIDE_LEFT_BLOCK"]) ? $arParams["DIR_PARAMS"]["HIDE_LEFT_BLOCK"] : "");?>
		<?if($arParams['AJAX_MODE'] == 'Y' && strpos($_SERVER['REQUEST_URI'], 'bxajaxid') !== false):?>
			<script type="text/javascript">
				setStatusButton();
			</script>
		<?endif;?>
		<?$sViewBigDataTemplate = ($arParams["BIGDATA_NORMAL"] ? $arParams["BIGDATA_NORMAL"] : "bigdata_1" );?>
		<?$sViewBigDataExtTemplate = ($arParams["BIGDATA_EXT"] ? $arParams["BIGDATA_EXT"] : "bigdata_2" );?>

		<?
		$arParams["DETAIL_EXPANDABLES_TITLE"] = ($arParams["DETAIL_EXPANDABLES_TITLE"] ? $arParams["DETAIL_EXPANDABLES_TITLE"] : GetMessage("EXPANDABLES_TITLE"));
		$arParams["DETAIL_ASSOCIATED_TITLE"] = ($arParams["DETAIL_ASSOCIATED_TITLE"] ? $arParams["DETAIL_ASSOCIATED_TITLE"] : GetMessage("ASSOCIATED_TITLE"));

		$arTab = $arAllValues = $arSimilar = $arAssociated = $arNeedSelect = array();
		$bSimilar = $bAccessories = $bBigData = false;

		// cross sales for product
		$oCrossSales = new \Aspro\Max\CrossSales($arElement['ID'], $arParams);
		$arRules = $oCrossSales->getRules();

		// accessories goods from cross sales
		if($arRules['EXPANDABLES'])
		{
			$arExpValues = $oCrossSales->getItems('EXPANDABLES');
		}
		else
		{
			$arNeedSelect[] = 'PROPERTY_EXPANDABLES_FILTER';
			$arNeedSelect[] = 'PROPERTY_EXPANDABLES';
		}

		// similar goods from cross sales
		if($arRules['ASSOCIATED'])
		{
			$arAssociated = $oCrossSales->getItems('ASSOCIATED');
		}
		else
		{
			$arNeedSelect[] = 'PROPERTY_ASSOCIATED_FILTER';
			$arNeedSelect[] = 'PROPERTY_ASSOCIATED';
		}

		if(!$arRules['EXPANDABLES'])
		{
			// accessories goods from property with type filter
			if($arElement['PROPERTY_EXPANDABLES_FILTER_VALUE'])
			{
				$cond = new CMaxCondition();
				try{
					$arTmpExp = \Bitrix\Main\Web\Json::decode($arElement['PROPERTY_EXPANDABLES_FILTER_VALUE']);
					$arExpandablesFilter = $cond->parseCondition($arTmpExp, $arParams);
				}
				catch(\Exception $e){
					$arExpandablesFilter = array();
				}
				unset($cond);
			}

			// accessories goods from property with type link
			if(!$arElement['PROPERTY_EXPANDABLES_FILTER_VALUE'] || !$arTmpExp || !$arTmpExp['CHILDREN'])
			{
				if($arExpValues = $arElement['PROPERTY_EXPANDABLES_VALUE'])
				{
					$arAllValues['EXPANDABLES'] = $arExpValues;
				}
			}
		}
		if($bAccessories = $arExpValues || ($arElement['PROPERTY_EXPANDABLES_FILTER_VALUE'] && $arTmpExp['CHILDREN']))
		{
			if($arExpValues)
			{
				$arAllValues['EXPANDABLES'] = $arExpValues;
			}
			else
			{
				$arTab['EXPANDABLES']['FILTER'] = $arExpandablesFilter;
			}
		}

		if(!$arRules['ASSOCIATED'])
		{
			// similar goods from property with type filter
			if($arElement['PROPERTY_ASSOCIATED_FILTER_VALUE'])
			{
				$cond = new CMaxCondition();
				try{
					$arTmpAssoc = \Bitrix\Main\Web\Json::decode($arElement['PROPERTY_ASSOCIATED_FILTER_VALUE']);
					$arAssociatedFilter = $cond->parseCondition($arTmpAssoc, $arParams);
				}
				catch(\Exception $e){
					$arAssociatedFilter = array();
				}
				unset($cond);
			}

			// similar goods from property with type link
			if(!$arElement['PROPERTY_ASSOCIATED_FILTER_VALUE'] || !$arTmpAssoc || !$arTmpAssoc['CHILDREN'])
			{
				if($arAssociated = $arElement['PROPERTY_ASSOCIATED_VALUE'])
				{
					$arAllValues['ASSOCIATED'] = $arAssociated;
				}
			}
		}


		if($bSimilar = $arAssociated || ($arElement['PROPERTY_ASSOCIATED_FILTER_VALUE'] && $arTmpAssoc['CHILDREN']))
		{
			if($arAssociated)
			{
				$arAllValues['ASSOCIATED'] = $arAssociated;
			}
			else
			{
				$arTab['ASSOCIATED']['FILTER'] = $arAssociatedFilter;
			}
		}



		global $arBigData;
		$arBigData = array(
			'SECTION_ID' => $arElement['IBLOCK_SECTION_ID'],
			'BIGDATA_SHOW_FROM_SECTION' => $arParams['BIGDATA_SHOW_FROM_SECTION'],
		);

		if(($arParams["LINKED_ELEMENT_TAB_SORT_FIELD"] == "REGION_PRICE" || $arParams["LINKED_ELEMENT_TAB_SORT_FIELD2"] == "REGION_PRICE")
			&& $arParams["SORT_REGION_PRICE"]) {
			$arPriceSort = [];
			global $arRegion;
			if ($arRegion) {
				if (!$arRegion["PROPERTY_SORT_REGION_PRICE_VALUE"] || $arRegion["PROPERTY_SORT_REGION_PRICE_VALUE"] == "component") {
					$price = CCatalogGroup::GetList(array(), array("NAME" => $arParams["SORT_REGION_PRICE"]), false, false, array("ID", "NAME"))->GetNext();
					$arPriceSort = array("CATALOG_PRICE_".$price["ID"]);
				} else {
					$arPriceSort = array("CATALOG_PRICE_".$arRegion["PROPERTY_SORT_REGION_PRICE_VALUE"]);
				}
			}
			if ($arPriceSort) {
				if ($arParams["LINKED_ELEMENT_TAB_SORT_FIELD"] == "REGION_PRICE") {
					$arParams["LINKED_ELEMENT_TAB_SORT_FIELD"] = $arPriceSort[0];
				}
				if ($arParams["LINKED_ELEMENT_TAB_SORT_FIELD2"] == "REGION_PRICE") {
					$arParams["LINKED_ELEMENT_TAB_SORT_FIELD2"] = $arPriceSort[0];
				}
			}
		}
		?>

		<div class="product-container catalog_detail detail<?=($isWideBlock == "Y" ? " fixed_wrapper" : "");?> <?=$sViewElementTemplate;?> clearfix" itemscope itemtype="http://schema.org/Product">
			<?@include_once('page_blocks/'.$sViewElementTemplate.'.php');?>
		</div>

		<?CMax::checkBreadcrumbsChain($arParams, $arSection, $arElement);?>

		<?
		/*fix title after ajax form start*/
		$arAdditionalData = $arNavParams = array();

		$postfix = '';
		global $arSite;
		if(\Bitrix\Main\Config\Option::get("aspro.max", "HIDE_SITE_NAME_TITLE", "N")=="N")
			$postfix = ' - '.$arSite['SITE_NAME'];

		$arAdditionalData['TITLE'] = htmlspecialcharsback($APPLICATION->GetTitle());
		$arAdditionalData['WINDOW_TITLE'] = htmlspecialcharsback($APPLICATION->GetTitle('title').$postfix);

		// dirty hack: try to get breadcrumb call params
		for ($i = 0, $cnt = count($APPLICATION->buffer_content_type); $i < $cnt; $i++){
			if ($APPLICATION->buffer_content_type[$i]['F'][1] == 'GetNavChain'){
				$arNavParams = $APPLICATION->buffer_content_type[$i]['P'];
			}
		}
		if ($arNavParams){
			$arAdditionalData['NAV_CHAIN'] = $APPLICATION->GetNavChain($arNavParams[0], $arNavParams[1], $arNavParams[2], $arNavParams[3], $arNavParams[4]);
		}
		?>
		<script type="text/javascript">
			if(!$('.js_seo_title').length)
				$('<span class="js_seo_title" style="display:none;"></span>').appendTo($('body'));
			BX.addCustomEvent(window, "onAjaxSuccess", function(e){
				var arAjaxPageData = <?=CUtil::PhpToJSObject($arAdditionalData, true, true, true);?>;

				//set title from offers
				if(typeof ItemObj == 'object' && Object.keys(ItemObj).length)
				{
					if('TITLE' in ItemObj && ItemObj.TITLE)
					{
						arAjaxPageData.TITLE = ItemObj.TITLE;
						arAjaxPageData.WINDOW_TITLE = ItemObj.WINDOW_TITLE;
					}
				}

				if (arAjaxPageData.TITLE)
					$('h1').html(arAjaxPageData.TITLE);
				if (arAjaxPageData.WINDOW_TITLE || arAjaxPageData.TITLE)
				{
					$('.js_seo_title').html(arAjaxPageData.WINDOW_TITLE || arAjaxPageData.TITLE); //seo fix for spec symbol
					BX.ajax.UpdateWindowTitle($('.js_seo_title').html());
				}

				if (arAjaxPageData.NAV_CHAIN)
					BX.ajax.UpdatePageNavChain(arAjaxPageData.NAV_CHAIN);
				$('.catalog_detail input[data-sid="PRODUCT_NAME"]').attr('value', $('h1').html());
			});
		</script>
		<?/*fix title after ajax form end*/?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.history.js');?>
	</div>
	<?$bShowLeftBlock = ($APPLICATION->GetProperty("HIDE_LEFT_BLOCK") != "Y" && !defined("ERROR_404") && !($arTheme['HEADER_TYPE']['VALUE'] == 28 || $arTheme['HEADER_TYPE']['VALUE'] == 29));?>
	<?if($bShowLeftBlock):?>
		<?CMax::ShowPageType('left_block');?>
	<?endif;?>
</div>

<?
$currentElement = CIBlockElement::GetList([], $arElementFilter, false, false, ['ID', 'IBLOCK_ID', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'TIMESTAMP_X']);
if ($arCurrentElement = $currentElement->Fetch()) {
	
	if ($arCurrentElement['TIMESTAMP_X']) {
		CMax::AddMeta(
            [
            	'og:updated_time' => date(\DateTime::ATOM, MakeTimeStamp($arCurrentElement['TIMESTAMP_X']))
            ]
        );
	}
	
	if (!empty($arCurrentElement['PREVIEW_PICTURE']) && !empty($arCurrentElement['DETAIL_PICTURE'])) {
		$picture = CFile::GetFileArray($arCurrentElement['PREVIEW_PICTURE']);
		$detailPicture = CFile::GetFileArray($arCurrentElement['DETAIL_PICTURE']);
		$addr = (CMain::IsHTTPS() ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'];
		CMax::AddMeta(
            [
            	'og:image' => $picture['SRC'],
            	'og:image:secure_url' => $addr. $picture['SRC'],
            	'twitter:image' => $addr. $picture['SRC'],
            	'og:image:width' => $picture['WIDTH'],
            	'og:image:height' => $picture['HEIGHT'],
            	'og:image:alt' => $detailPicture['DESCRIPTION'],
            	'og:image:type' => $detailPicture['CONTENT_TYPE'],
            ]
        );
	}
    
}
?>