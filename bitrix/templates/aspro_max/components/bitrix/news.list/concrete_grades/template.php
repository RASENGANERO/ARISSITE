<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?use \Bitrix\Main\Localization\Loc;?>
<?if($arResult['ITEMS']):?>
<div class="drag-block grey grey_block landings_list-on-front">
                <div class="content_wrapper_block">
                    <div class="maxwidth-theme only-on-front">
<?
foreach ($arResult['ITEMS'] as $key => $arItem) {
	$subname = $arItem['PROPERTIES']['SUBNAME']['VALUE'];
	break;
}

if (!empty($arParams['CUSTOM_TITLE'])) {
	$subname = $arParams['CUSTOM_TITLE'];
}

if (strlen($subname)>0){
?>
	<h2 class="ordered-block__title option-font-bold font_lg ordered-block__title-custom"><?=$subname;?></h2>
<?
}
?>
	
	<?if (!function_exists('showAsproLandingItems2')):?>
		<?function showAsproLandingItems2($arParams = [
			'ITEMS' => [],
			'COUNT' => 10,
			'PARAMS' => []
		]){
			ob_start();?>
				<?$i = 0;?>
				<?$bFilled = ($arParams['PARAMS']['BG_FILLED'] == 'Y');?>
				<?$bModile = ($arParams['PARAMS']['MOBILED'] == 'Y');?>
				<?if ($bModile):?>
					<!-- noindex -->
				<?endif;?>
				<div class="item-views items-list1 only-img table table-type-block image_left">
					<?$compare_field = (isset($arParams['PARAMS']["COMPARE_FIELD"]) && $arParams['PARAMS']["COMPARE_FIELD"] ? $arParams['PARAMS']["COMPARE_FIELD"] : "DETAIL_PAGE_URL");
					$bProp = (isset($arParams['PARAMS']["COMPARE_PROP"]) && $arParams['PARAMS']["COMPARE_PROP"] == "Y");

					$textExpand = Loc::getMessage("SHOW_STEP_ALL");
					$textHide = Loc::getMessage("HIDE");
					$opened = "N";
					$classOpened = "";
					$arParams["COUNT"] = (int)$arParams["COUNT"];
					$count = count($arParams['ITEMS']);

					$bWithHidden = $bCheckItemActive = $bHiddenOK = false;?>

					<?foreach ($arParams['ITEMS'] as $key => $arItem) {
						++$i;
						$bHidden = ($i > $arParams["COUNT"] && $arParams["COUNT"]);
						
						if ($bHidden) {
							$bWithHidden = true;
						}

						$url = $arItem[$compare_field];
						if ($bProp) {
							$url = $arItem["PROPERTIES"][$compare_field]["VALUE"];
						}

						if ($url) {
							$arFilterQuery = \Aspro\Functions\CAsproMax::checkActiveFilterPage($arParams['PARAMS']["SEF_CATALOG_URL"], $url);
							$bActiveFilter = ($arFilterQuery && !in_array('clear', $arFilterQuery));
							$curDir = $GLOBALS['APPLICATION']->GetCurDir();
							$curDirDec = urldecode(str_replace(' ', '+', $curDir));
							$urlDec= urldecode($url); 
							$urlDecCP = iconv("utf-8","windows-1251", $urlDec);
							$bCurrentUrl = ($curDirDec == $urlDec) || ($curDir == $urlDec) || ($curDir == $urlDecCP);

							if ($bCurrentUrl) {
								if($bActiveFilter){

									$arParams['ITEMS'][$key]['ACTIVE'] = 'Y';
									$arParams['ITEMS'][$key]['ACTIVE_URL'] = $bCurrentUrl ? 'Y' : 'N';
								}
							}
						}
					}?>
					<?$i = 0;?>
					<div class="row sid items flexbox">
						<?foreach($arParams['ITEMS'] as $arItem):?>
							<?

							++$i;
							$bHidden = ($i > $arParams["COUNT"] && $arParams["COUNT"]);

							$url = $arItem[$compare_field];
							if ($bProp) {
								$url = $arItem["PROPERTIES"][$compare_field]["VALUE"];
							}
							$class = '';
							if ($bHidden) {
								if ($arItem['ACTIVE_URL'] != 'Y') {
									$class .= 'hidden js-hidden';
								} else {
									if ($i > $arParams['COUNT'] && $count == $i) {
										$bHidden = false;
									}
								}
							}
							if ($arItem['ACTIVE_URL'] == 'Y') {
								$class = 'active';
							}
							if($pic = CMskBeton_Tools::GetWebPPictureFull($arItem["DETAIL_PICTURE"], true)) {
								$arItem["DETAIL_PICTURE"] = $pic;
								$arItem["DETAIL_PICTURE"]['srcset'] = " data-amwebp-skip ".\Helper\CHelperCommon::getSrcSet($pic['tmp_arr_SRC'], 115, 115, 75, 75, 'w');
							} else {
								$arItem["DETAIL_PICTURE"]['srcset'] = \Helper\CHelperCommon::getSrcSet($arItem["DETAIL_PICTURE"], 115, 115, 75, 75, 'w');
							}
							$arItem["DETAIL_PICTURE"]['srcset'] .= ' sizes="(max-width: 420px) 75px, 115px" ';
							?>
							<div class="box-shadow bordered colored_theme_hover_bg-block item-wrap col-md-3 col-sm-4 col-xs-12">
								<div class="item ">
									<div class="row">
										<div class="col-md-12">
												<div class="image w-picture">
													<?if($url):?>
														<a href="<?=$url?>">
													<?endif;?>
														<img data-replace="<?=$arItem['DETAIL_PICTURE']['SRC'];?>" src="<?=$arItem['DETAIL_PICTURE']['SRC'];?>" <?=$arItem["DETAIL_PICTURE"]['srcset']?> alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>" title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>" class="img-responsive" />
													<?if($url):?>
														</a>
													<?endif;?>
												</div>
												<?if(strlen($arItem['NAME'])):?>
													<div class="title font_upper muted">
														<?if($url):?><a href="<?=$url?>"><?endif;?>
															<?=$arItem['NAME']?>
														<?if($url):?></a><?endif;?>
													</div>
												<?endif;?>
										</div>
									</div>
								</div>
							</div>
						<?endforeach?>
						
					</div>
				</div>

			<?$html = ob_get_clean();
			return $html;
		}?>
	<?endif;?>
	
	<?=showAsproLandingItems2([
		'ITEMS' => $arResult['ITEMS'],
		'COUNT' => $arParams['SHOW_COUNT'],
		'PARAMS' => $arParams
	])?>
		</div>
    </div>
</div>
<?endif?>