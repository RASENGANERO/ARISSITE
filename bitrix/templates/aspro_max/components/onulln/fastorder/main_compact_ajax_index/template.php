<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
use \Bitrix\Main\Localization\Loc;
if($arResult["ITEMS"]){?>	<?global $filter_exists;?>
	<?$filter_exists = "filter_exists";?>
	<?$bActiveFilter = \Aspro\Functions\CAsproMax::checkActiveFilterPage($arParams["SEF_RULE_FILTER"]);?>
	<script>
			if(!window['$sebekon_jq_delivery'] && window['jQuery']) { var $sebekon_jq_delivery = jQuery;}
			if(!window.ymaps){
				document.write(unescape('<script src="//api-maps.yandex.ru/2.1/?apikey=0098246a-6e61-460a-9da6-b14af17391e0&load=package.full&lang=ru-RU&wizard=sebekon.deliverycalc">%3C/script%3E'));
			}
			$(document).ready(function(){
				$sebekon_jq_delivery('body').append('<div class="sebekon"><div id="SEBEKON_DELIVERYPRICE_ORDER" class="sebekon-modal" role="dialog" aria-labelledby="SEBEKON_DELIVERYPRICE_ORDER_LABEL" style="display: none;"><div class="sebekon-modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="SEBEKON_DELIVERYPRICE_ORDER_LABEL">Выберите место доставки</h3></div><div class="sebekon-modal-body"></div><div class="sebekon-modal-footer"><button class="btn btn-primary" onclick="submitParentForm();">Выбрать</button></div></div></div>');
			});
	</script>
	
	<div class="filter-compact-block bx_filter compact swipeignore fastOrderFilter">
		<div class="fo_box_title">
			<?=$arParams["H1"];?>
		</div>
        <div class="fastorderCalcIndex" id="fastorderCalcIndex">
            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR.$arParams["PATH_DESCRIPTION_AREA"],
                    "AREA_FILE_RECURSIVE" => "Y",
                    "EDIT_TEMPLATE" => "standard.php"
                )
            );?>
        </div>
		<div class="bx_filter_section clearfix">
			<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
				<div class="bx_filter_parameters">
				<div class="fo_field_title">Основные параметры бетона</div>
					<input type="hidden" name="del_url" id="del_url" value="<?echo str_replace('/filter/clear/apply/','/',$arResult["SEF_DEL_FILTER_URL"]);?>" />
					<?foreach($arResult["HIDDEN"] as $arItem):?>
						<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
					<?endforeach;
					$isFilter=false;
					$numVisiblePropValues = 5;

					//ASPRO_FILTER_SORT
					foreach($arResult["ITEMS"] as $key => $arItem){
					    if(isset($arItem["ASPRO_FILTER_SORT"]) && $arItem["VALUES"]){
							$class = $arItem["DISPLAY_EXPANDED"] === "Y" ? "active" : '';
							$style = $arItem["DISPLAY_EXPANDED"] !== "Y" ? "style='display:none;'" : '';
							$isFilter = true;
							$checkedItemExist = false;
							?>
							<div class="bx_filter_parameters_box bx_sort_filter <?=$class;?>" data-expanded="<?=($arItem["DISPLAY_EXPANDED"] ? $arItem["DISPLAY_EXPANDED"] : "N");?>" data-prop_code="<?=strtolower($arItem["CODE"]);?>" data-property_id="<?=$arItem["ID"]?>">
								<span data-f="<?=Loc::getMessage('CT_BCSF_SET_FILTER')?>" data-fi="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TI')?>" data-fr="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TR')?>" data-frm="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TRM')?>" class="bx_filter_container_modef"></span>
								<div class="bx_filter_parameters_box_title"><div><?=$arItem["NAME"]?></div></div>
								<div class="bx_filter_block <?=($arItem["PROPERTY_TYPE"]!="N" && ($arItem["DISPLAY_TYPE"] != "P" && $arItem["DISPLAY_TYPE"] != "R") ? "limited_block" : "");?>" <?=$style;?>>
									<div class="bx_filter_parameters_box_container <?=($arItem["DISPLAY_TYPE"]=="G" ? "pict_block" : "");?>">
									<div class="bx_filter_select_container">
										<div class="bx_filter_select_block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
											<div class="bx_filter_select_text" data-role="currentOption">
												<?
												foreach ($arItem["VALUES"] as $val => $ar)
												{
													if ($ar["CHECKED"] && $ar["CHECKED"]=="Y")
													{
														echo $ar["VALUE"];
														$checkedItemExist = true;
													}
												}
												?>
											</div>
											<div class="bx_filter_select_arrow"></div>
											<div class="bx_filter_select_popup" data-role="dropdownContent" style="display: none;">
												<ul>
												<?foreach($arItem["VALUES"] as $val => $ar):?>
													<?$ar["CONTROL_ID"] .= $arParams['AJAX_FILTER_FLAG'];?>
													<li><?=$ar["CONTROL_HTML"]?></li>
												<?endforeach;?>
												</ul>
											</div>
										</div>
									</div>
									    </div>
									<div class="clb"></div>
								</div>
							</div><?
							unset($arResult["ITEMS"][$key]);
					    }
					}

					//prices?>

					<?//not prices
					$hideItem = '';
					foreach($arResult["ITEMS"] as $key=>$arItem)
					{
						$flagMore = false;
						$errorClass = '';
						$errorText = '';
						if($arItem["CODE"] == 'BRAND') {
							$errorClass = ' nobrand';
							$errorText = 'Укажите марку или класс бетона';
						}
						if($arItem["CODE"] == 'FILLER') {
							$errorClass = ' nofiller';
							$errorText = 'Укажите наполнитель';
						}
						
						if($arItem["CODE"] == 'STIFFNESS')
							continue;
						
						if($arItem["NAME"] == 'Плотность (кг/см²)')
							continue;
						
						if(
							empty($arItem["VALUES"])
							|| isset($arItem["PRICE"])
						)
							continue;

						if (
							$arItem["DISPLAY_TYPE"] == "A"
							&& (
								$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
							)
						)
							continue;
						$class="";
						/*if($arItem["OPENED"]){
							if($arItem["OPENED"]=="Y"){
								$class="active";
							}
						}else*//*if($arItem["DISPLAY_EXPANDED"]=="Y"){
							$class="active";
						}*/
						$namedefault = 'Не указана';
						if($arItem["CODE"] == 'STRENGTH' ) {
							$arItem["NAME"] = 'Прочность (кгс/см²)';
						}
						if($arItem["NAME"] == 'Объём (м2)') {
							$arItem["NAME"] = 'Объём (м³)';
						}
						if($arItem["NAME"] == 'Класс бетона') {
							$arItem["NAME"] = 'Класс';
							$namedefault = 'Не указан';
						}
						if($arItem["NAME"] == 'Наполнитель') {
							$namedefault = 'Не указан';
						}
						
						if($arItem["NAME"] == 'Средняя прочность, кгс/см²') {
							$arItem["NAME"] = 'Плотность (кг/см2)';
						}
						
						if($arItem["NAME"] == 'Морозостойкость, (F)') {
							$arItem["NAME"] = 'Морозостойкость';
						}
						
						if($arItem["NAME"] == 'Противоморозные добавки (ПМД)') {
							$arItem["NAME"] = 'Противоморозные доб.';
							$namedefault = 'Не указаны';
						}
						$isFilter=true;
						if($arItem["NAME"] == 'Морозостойкость') {
							$hideItem = 'fo_prop__hide';
							$flagMore = true;
						}
						?>
						<?
						if($flagMore) {
						?>

<div class="fastOrder fo_form_x fo_form_quantity">
	<div class="fo_lable">Объём (м³)</div>
	<span class="minus" onclick="setQuantityFO('1', 'down')">−</span>
	<input class="text" id="INPUT_FO" name="INPUT_FO" onchange="calcFO()" onkeyup="this.value = this.value.replace (/[^0-9]/, '')" size="2" type="text" value="1" placeholder="Объем">
	<span class="plus" onclick="setQuantityFO('1', 'up')">+</span>
</div>
			<div style="clear: both;"></div>
		<div class="btn-fo-all fast-order-all">
			Добавки (выберите по необходимости)
		</div>
			<div style="clear: both;"></div>
						<?
						}
						?>
						<div class="bx_filter_parameters_box prop_type_<?=$arItem["PROPERTY_TYPE"];?><?=(isset($arItem['PROPERTY_SET']) && $arItem['PROPERTY_SET'] == 'Y' ? ' set' : '');?> <?=$hideItem?>" data-prop_code="<?=strtolower($arItem["CODE"]);?>" data-property_id="<?=$arItem["ID"]?>">
						<div class="fo_lable"><?=$arItem["NAME"]?></div>
						<?if($errorText!='') {?>
						<div class="props_list"><div class="hint <?=$errorClass?>"><div class="tooltip" style="display: none;"><?=$errorText?></div></div></div>
						<?}?>
							<span data-f="<?=Loc::getMessage('CT_BCSF_SET_FILTER')?>" data-fi="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TI')?>" data-fr="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TR')?>" data-frm="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TRM')?>" class="bx_filter_container_modef"></span>
							<?if($arItem["CODE"]!="IN_STOCK"){?>
								<div class="bx_filter_parameters_box_title title rounded3 box-shadow-sm" >
									<div class="text">
										<span class="fo_param_name"><?=$namedefault;?></span>
										<span class="count_selected"><?=(isset($arItem['COUNT_SELECTED']) && $arItem['COUNT_SELECTED'] ? ': '.$arItem['COUNT_SELECTED'] : '');?></span>
									</div>
									<span class="delete_filter" title="<?=Loc::getMessage("CLEAR_VALUE")?>">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 0.750001L0.75 4.91753e-07L12 11.25L11.25 12L0 0.750001Z" fill="#D83D38"/>
<path d="M0.75 12L0 11.25L11.25 0L12 0.75L0.75 12Z" fill="#D83D38"/>
</svg>

									</span>
								</div>
							<?}?>
							<?$style="";
							/*
							if($arItem["CODE"]=="BRAND"){
								var_dump($arItem);die();
							}
							*/
							if($arItem["CODE"]=="IN_STOCK"){
								$style="style='display:block;'";
							}/*elseif($arItem["DISPLAY_EXPANDED"]!= "Y"){
								$style="style='display:none;'";
							}*/?>
							<div class="bx_filter_block <?=($arItem["CODE"]=="IN_STOCK" ? "limited_block" : "");?>" <?=$style;?>>
								<div class="bx_filter_parameters_box_container <?=($arItem["DISPLAY_TYPE"]=="G" ? "pict_block" : "");?> <?=($arItem["CODE"] != "IN_STOCK" && $arItem["DISPLAY_TYPE"] != 'A' ? 'scrollbar' : '');?>">
								<?
								$arCur = current($arItem["VALUES"]);
								switch ($arItem["DISPLAY_TYPE"]){
									case "A"://NUMBERS_WITH_SLIDER
										?>
										<div class="wrapp_all_inputs wrap_md">
											<?$isConvert=false;
											if($arItem["CODE"] == "MINIMUM_PRICE" && $arParams["CONVERT_CURRENCY"]=="Y"){
												$isConvert=true;
											}
											$value1 = $arItem["VALUES"]["MIN"]["VALUE"];
											$value2 = $arItem["VALUES"]["MIN"]["VALUE"] + round(($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])/4);
											$value3 = $arItem["VALUES"]["MIN"]["VALUE"] + round(($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])/2);
											$value4 = $arItem["VALUES"]["MIN"]["VALUE"] + round((($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])*3)/4);
											$value5 = $arItem["VALUES"]["MAX"]["VALUE"];
											if($isConvert){
												$value1 =SaleFormatCurrency($value1, $arParams["CURRENCY_ID"], true);
												$value2 =SaleFormatCurrency($value2, $arParams["CURRENCY_ID"], true);
												$value3 =SaleFormatCurrency($value3, $arParams["CURRENCY_ID"], true);
												$value4 =SaleFormatCurrency($value4, $arParams["CURRENCY_ID"], true);
												$value5 =SaleFormatCurrency($value5, $arParams["CURRENCY_ID"], true);
											}?>
											<div class="wrapp_change_inputs iblock">
												<div class="bx_filter_parameters_box_container_block">
													<div class="bx_filter_input_container form-control bg">
														<input
															class="min-price"
															type="text"
															name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
															id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
															value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
															size="5"
															placeholder="<?echo $value1;?>"
															onkeyup="smartFilter.keyup(this)"
														/>
													</div>
												</div>
												<div class="bx_filter_parameters_box_container_block">
													<div class="bx_filter_input_container form-control bg">
														<input
															class="max-price"
															type="text"
															name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
															id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
															value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
															size="5"
															placeholder="<?echo $value5;?>"
															onkeyup="smartFilter.keyup(this)"
														/>
													</div>
												</div>
												<span class="divider"></span>
												<div style="clear: both;"></div>
											</div>
											<div class="wrapp_slider iblock">
												<div class="bx_ui_slider_track" id="drag_track_<?=$key?>">

													<div class="bx_ui_slider_part first p1"><span><?=$value1?></span></div>
													<div class="bx_ui_slider_part p2"><span><?=$value2?></span></div>
													<div class="bx_ui_slider_part p3"><span><?=$value3?></span></div>
													<div class="bx_ui_slider_part p4"><span><?=$value4?></span></div>
													<div class="bx_ui_slider_part last p5"><span><?=$value5?></span></div>

													<div class="bx_ui_slider_pricebar_VD" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
													<div class="bx_ui_slider_pricebar_VN" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
													<div class="bx_ui_slider_pricebar_V"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
													<div class="bx_ui_slider_range" 	id="drag_tracker_<?=$key?>"  style="left: 0;right: 0;">
														<a class="bx_ui_slider_handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
														<a class="bx_ui_slider_handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
													</div>
												</div>
												<?
												$arJsParams = array(
													"leftSlider" => 'left_slider_'.$key,
													"rightSlider" => 'right_slider_'.$key,
													"tracker" => "drag_tracker_".$key,
													"trackerWrap" => "drag_track_".$key,
													"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
													"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
													"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
													"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
													"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
													"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
													"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
													"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
													"precision" => $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0,
													"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
													"colorAvailableActive" => 'colorAvailableActive_'.$key,
													"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
												);
												?>
												<script type="text/javascript">
													BX.ready(function(){
														if(typeof window['trackBarOptions'] === 'undefined'){
															window['trackBarOptions'] = {}
														}
														window['trackBarOptions']['<?=$key?>'] = <?=CUtil::PhpToJSObject($arJsParams)?>;
														window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(window['trackBarOptions']['<?=$key?>']);
													});
												</script>
											</div>
										</div>
										<?
										break;
									case "B"://NUMBERS
										?>
										<div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container form-control bg">
											<input
												class="min-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
												placeholder="<?echo $arItem["VALUES"]["MIN"]["VALUE"];?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
												/>
										</div></div>
										<div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container form-control bg">
											<input
												class="max-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
												placeholder="<?echo $arItem["VALUES"]["MAX"]["VALUE"];?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
												/>
										</div></div>
										<?
										break;
									case "G"://CHECKBOXES_WITH_PICTURES
										?>
										<?$j=1;
										$isHidden = false;?>
										<?foreach ($arItem["VALUES"] as $val => $ar):?>
											<?if($ar["VALUE"]){?>
												<?if($j > $numVisiblePropValues && !$isHidden):
													$isHidden = true;?>
													<div class="hidden_values filter label_block">
												<?endif;?>
												<div class="pict">
													<input
														style="display: none"
														type="checkbox"
														name="<?=$ar["CONTROL_NAME"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<?=$ar["HTML_VALUE"]?>"
														<? echo $ar["DISABLED"] ? 'disabled class="disabled"': '' ?>
														<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
													/>
													<?
													$class = "";
													if ($ar["CHECKED"])
														$class.= " active";
													if ($ar["DISABLED"])
														$class.= " disabled";
													?>
													<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label nab dib<?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'active');">
														<?/*<span class="bx_filter_param_btn bx_color_sl" title="<?=$ar["VALUE"]?>">*/?>
															<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
															<span class="bx_filter_btn_color_icon" title="<?=$ar["VALUE"]?>" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
															<?endif?>
														<?/*</span>*/?>
													</label>
												</div>
												<?$j++;?>
											<?}?>
										<?endforeach?>
										<?if($isHidden):?>
											</div>
											<div class="inner_expand_text"><span class="expand_block colored_theme_text_with_hover"><?=Loc::getMessage("FILTER_EXPAND_VALUES");?></span></div>
										<?endif;?>
										<?
										break;
									case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
										?>
										<?$j=1;
										$isHidden = false;?>
										<?foreach ($arItem["VALUES"] as $val => $ar):?>
											<?if($ar["VALUE"]){?>
												<?if($j > $numVisiblePropValues && !$isHidden):
													$isHidden = true;?>
													<div class="hidden_values filter label_block">
												<?endif;?>
												<input
													style="display: none"
													type="checkbox"
													name="<?=$ar["CONTROL_NAME"]?>"
													id="<?=$ar["CONTROL_ID"]?>"
													value="<?=$ar["HTML_VALUE"]?>"
													<? echo $ar["DISABLED"] ? 'disabled class="disabled"': '' ?>
													<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
												/>
												<?
												$class = "";
												/*if ($ar["CHECKED"])
													$class.= " active";*/
												if ($ar["DISABLED"])
													$class.= " disabled";
												?>
												<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?> pal nab" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'active');">
													<?/*<span class="bx_filter_param_btn bx_color_sl" title="<?=$ar["VALUE"]?>">*/?>
														<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
															<span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
														<?endif?>
													<?/*</span>*/?>
													<span class="bx_filter_param_text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
													if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
														?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
													endif;?></span>
												</label>
												<?$j++;?>
											<?}?>
										<?endforeach?>
										<?if($isHidden):?>
											</div>
											<div class="inner_expand_text"><span class="expand_block colored_theme_text_with_hover"><?=Loc::getMessage("FILTER_EXPAND_VALUES");?></span></div>
										<?endif;?>
										<?
										break;
									//case "F"://DROPDOWN
									case "P"://DROPDOWN
										$checkedItemExist = false;
										?>
										<div class="bx_filter_select_container">
											<div class="bx_filter_select_block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
												<div class="bx_filter_select_text" data-role="currentOption">
													<?
													foreach ($arItem["VALUES"] as $val => $ar)
													{
														if ($ar["CHECKED"])
														{
															echo $ar["VALUE"];
															$checkedItemExist = true;
														}
													}
													if (!$checkedItemExist)
													{
														//echo Loc::getMessage("CT_BCSF_FILTER_ALL");
														echo "Укажите значение";
													}
													?>
												</div>
												<div class="bx_filter_select_arrow"></div>
												<input
													style="display: none"
													type="radio"
													name="<?=$arCur["CONTROL_NAME_ALT"]?>"
													id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
													value=""
												/>
												<?foreach ($arItem["VALUES"] as $val => $ar):?>
													<input
														style="display: none"
														type="radio"
														name="<?=$ar["CONTROL_NAME_ALT"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<? echo $ar["HTML_VALUE_ALT"] ?>"
														<? echo $ar["DISABLED"] ? 'disabled class="disabled"': '' ?>
														<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
													/>
												<?endforeach?>
												<div class="bx_filter_select_popup" data-role="dropdownContent" style="display: none;">
													<ul>
														<!--<li>
															<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx_filter_param_label" data-role="all_label_<?=$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
																<? echo Loc::getMessage("CT_BCSF_FILTER_ALL"); ?>
															</label>
														</li>-->
													<?
													foreach ($arItem["VALUES"] as $val => $ar):
														$class = "";
														if ($ar["CHECKED"])
															$class.= " selected";
														if ($ar["DISABLED"])
															$class.= " disabled";
													?>
														<li>
															<label for="<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')"><?=$ar["VALUE"]?></label>
														</li>
													<?endforeach?>
													</ul>
												</div>
											</div>
										</div>
										<?
										break;
									case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
										?>
										<div class="bx_filter_select_container">
											<div class="bx_filter_select_block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
												<div class="bx_filter_select_text" data-role="currentOption">
													<?
													$checkedItemExist = false;
													foreach ($arItem["VALUES"] as $val => $ar):
														if ($ar["CHECKED"])
														{
														?>
															<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
																<span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
															<?endif?>
															<span class="bx_filter_param_text">
																<?=$ar["VALUE"]?>
															</span>
														<?
															$checkedItemExist = true;
														}
													endforeach;
													if (!$checkedItemExist){?>
														<?echo Loc::getMessage("CT_BCSF_FILTER_ALL");
													}
													?>
												</div>
												<div class="bx_filter_select_arrow"></div>
												<input
													style="display: none"
													type="radio"
													name="<?=$arCur["CONTROL_NAME_ALT"]?>"
													id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
													value=""
												/>
												<?foreach ($arItem["VALUES"] as $val => $ar):?>
													<input
														style="display: none"
														type="radio"
														name="<?=$ar["CONTROL_NAME_ALT"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<?=$ar["HTML_VALUE_ALT"]?>"
														<? echo $ar["DISABLED"] ? 'disabled class="disabled"': '' ?>
														<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
													/>
												<?endforeach?>
												<div class="bx_filter_select_popup" data-role="dropdownContent" style="display: none">
													<ul>
														<li style="border-bottom: 1px solid #e5e5e5;padding-bottom: 5px;margin-bottom: 5px;">
															<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx_filter_param_label" data-role="all_label_<?=$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
																<? echo Loc::getMessage("CT_BCSF_FILTER_ALL"); ?>
															</label>
														</li>
													<?
													foreach ($arItem["VALUES"] as $val => $ar):
														$class = "";
														if ($ar["CHECKED"])
															$class.= " selected";
														if ($ar["DISABLED"])
															$class.= " disabled";
													?>
														<li>
															<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
																<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
																	<span class="bx_filter_btn_color_icon" title="<?=$ar["VALUE"]?>" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
																<?endif?>
																<span class="bx_filter_param_text">
																	<?=$ar["VALUE"]?>
																</span>
															</label>
														</li>
													<?endforeach?>
													</ul>
												</div>
											</div>
										</div>
										<?
										break;
									case "F"://Переопределяем чекбоксы на РадиоБатоны =)
									case "K"://RADIO_BUTTONS
										?>
										<div class="filter label_block radio hidden">
											<input
												type="radio"
												value=""
												name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
												id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
												onclick="smartFilter.click(this)"
												data-name=""
											/>
										<label data-role="all_label_<?=$arCur["CONTROL_ID"]?>" class="bx_filter_param_label" for="<? echo "all_".$arCur["CONTROL_ID"] ?>">
											<span class="bx_filter_input_checkbox"><span><? echo Loc::getMessage("CT_BCSF_FILTER_ALL"); ?></span></span>
										</label>
										</div>
										<?$j=1;
										$isHidden = false;?>
										<?foreach($arItem["VALUES"] as $val => $ar):?>
											<?if($j > $numVisiblePropValues && !$isHidden):
												$isHidden = true;?>
												<div class="hidden_values filter label_block">
											<?endif;?>
											<div class="filter label_block radio">
												<input
															type="radio"
															value="<? echo $ar["HTML_VALUE_ALT"] ?>"
															name="<? echo $ar["CONTROL_NAME_ALT"] ?>"
															id="<? echo $ar["CONTROL_ID"] ?>"
															<? echo $ar["DISABLED"] ? 'disabled class="disabled"': '' ?>
															<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
															onclick="smartFilter.click(this)"
															data-name="<?=$ar["VALUE"];?>"
														/>
												<?$class = "";
												if ($ar["CHECKED"])
													$class.= " selected";
												if ($ar["DISABLED"])
													$class.= " disabled";?>
												<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label <?=$class;?>" for="<? echo $ar["CONTROL_ID"] ?>">
													<span class="bx_filter_input_checkbox">

														<span class="bx_filter_param_text1" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
														if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
															?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
														endif;?></span>
													</span>
												</label>
											</div>
											<?$j++;?>
										<?endforeach;?>
										<?if($isHidden):?>
											</div>
											<div class="inner_expand_text"><span class="expand_block colored_theme_text_with_hover"><?=Loc::getMessage("FILTER_EXPAND_VALUES");?></span></div>
										<?endif;?>
										<?
										break;
									case "U"://CALENDAR
										?>
										<div class="bx_filter_parameters_box_container_block">
											<div class="bx_filter_input_container bx_filter_calendar_container">
												<?$APPLICATION->IncludeComponent(
													'bitrix:main.calendar',
													'',
													array(
														'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
														'SHOW_INPUT' => 'Y',
														'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MIN"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
														'INPUT_NAME' => $arItem["VALUES"]["MIN"]["CONTROL_NAME"],
														'INPUT_VALUE' => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
														'SHOW_TIME' => 'N',
														'HIDE_TIMEBAR' => 'Y',
													),
													null,
													array('HIDE_ICONS' => 'Y')
												);?>
											</div>
										</div>
										<div class="bx_filter_parameters_box_container_block">
											<div class="bx_filter_input_container bx_filter_calendar_container">
												<?$APPLICATION->IncludeComponent(
													'bitrix:main.calendar',
													'',
													array(
														'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
														'SHOW_INPUT' => 'Y',
														'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MAX"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
														'INPUT_NAME' => $arItem["VALUES"]["MAX"]["CONTROL_NAME"],
														'INPUT_VALUE' => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
														'SHOW_TIME' => 'N',
														'HIDE_TIMEBAR' => 'Y',
													),
													null,
													array('HIDE_ICONS' => 'Y')
												);?>
											</div>
										</div>
										<?
										break;
									default://CHECKBOXES
										$count=count($arItem["VALUES"]);
										$i=1;
										if(!$arItem["FILTER_HINT"]){
											$prop = CIBlockProperty::GetByID($arItem["ID"], $arItem["IBLOCK_ID"])->GetNext();
											$arItem["FILTER_HINT"]=$prop["HINT"];
										}
										if($arItem["IBLOCK_ID"]!=$arParams["IBLOCK_ID"] && strpos($arItem["FILTER_HINT"],'line')!==false){
											$isSize=true;
										}else{
											$isSize=false;
										}?>
										<?$j=1;
										$isHidden = false;?>

										<?if($arItem['CODE'] == 'IN_STOCK'):?>
											<div class="bx_filter_parameters_box_title title prices rounded3 box-shadow-sm">
										<?endif;?>

										<?foreach($arItem["VALUES"] as $val => $ar):?>
											
											<?if($j > $numVisiblePropValues && !$isHidden):
												$isHidden = true;?>
												<div class="hidden_values filter label_block">
											<?endif;?>
											<div class="filter label_block">
											<input
												type="checkbox"
												value="<? echo $ar["HTML_VALUE"] ?>"
												name="<? echo $ar["CONTROL_NAME"] ?>"
												id="<? echo $ar["CONTROL_ID"] ?>"
												<? echo $ar["DISABLED"] ? 'disabled class="disabled"': '' ?>
												<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
												onclick="smartFilter.click(this)"
											/>
											<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label <?=($isSize ? "nab sku" : "");?> <?=($i==$count ? "last" : "");?> <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"] ?>">
												<span class="bx_filter_input_checkbox">

													<span class="bx_filter_param_text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
													if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"]) && !$isSize):
														?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
													endif;?></span>
												</span>
											</label>
											<?$i++;?>
											<?$j++;?>
											</div>
										<?endforeach;?>
										<?if($isHidden):?>
											</div>
											<div class="inner_expand_text"><span class="expand_block colored_theme_text_with_hover"><?=Loc::getMessage("FILTER_EXPAND_VALUES");?></span></div>
										<?endif;?>

										<?if($arItem['CODE'] == 'IN_STOCK'):?>
											<span class="delete_filter" title="<?=Loc::getMessage("CLEAR_VALUE")?>">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 0.750001L0.75 4.91753e-07L12 11.25L11.25 12L0 0.750001Z" fill="#D83D38"/>
<path d="M0.75 12L0 11.25L11.25 0L12 0.75L0.75 12Z" fill="#D83D38"/>
</svg>

											</span>
											</div>
										<?endif;?>
								<?}?>
								</div>
								<div class="clb"></div>
								<div class="char_name">
									<div class="props_list">
										<?if($arParams["SHOW_HINTS"]){
											if(!$arItem["FILTER_HINT"]){
												$prop = CIBlockProperty::GetByID($arItem["ID"], $arParams["IBLOCK_ID"])->GetNext();
												$arItem["FILTER_HINT"]=$prop["HINT"];
											}?>
											<?if( $arItem["FILTER_HINT"] && strpos( $arItem["FILTER_HINT"],'line')===false){?>
												<div class="hint"><span class="icon"><i>?</i></span><span class="text"><?=Loc::getMessage('HINT');?></span><div class="tooltip" style="display: none;"><?=$arItem["FILTER_HINT"]?></div></div>
											<?}?>
										<?}?>
									</div>
								</div>
								<?if($arItem['CODE'] != 'IN_STOCK'):?>
									<div class="bx_filter_button_box active clearfix">
										<?/*<span class="btn btn-default"><?=Loc::getMessage("CT_BCSF_SET_FILTER")?></span>*/?>
										<span data-f="<?=Loc::getMessage('CT_BCSF_SET_FILTER')?>" data-fi="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TI')?>" data-fr="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TR')?>" data-frm="<?=Loc::getMessage('CT_BCSF_SET_FILTER_TRM')?>" class="bx_filter_container_modef"></span>
									</div>
								<?endif;?>
							</div>
						</div>
					<?}?>
				</div>

				<?if($isFilter):?>
					<div class="clb"></div>
					<button class="bx_filter_search_reset btn-link-text font_sxs colored_theme_text_with_hover<?=($bActiveFilter && $bActiveFilter[1] != 'clear' ? '' : ' hidden');?>" type="reset" id="del_filter" name="del_filter" data-href="">
						<?=CMax::showIconSvg("down", SITE_TEMPLATE_PATH.'/images/svg/catalog/cleanfilters.svg', '', '', true, false);?>
						<span><?=Loc::getMessage("CT_BCSF_DEL_FILTER")?></span>
					</button>
					<div class="bx_filter_button_box active hidden colored_theme_bg">
						<div class="bx_filter_block">
							<div class="bx_filter_parameters_box_container">
								<div class="bx_filter_popup_result right" id="modef_mobile" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?>>
									<?echo Loc::getMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span  data-f="'.Loc::getMessage('CT_BCSF_SET_FILTER').'" data-fi="'.Loc::getMessage('CT_BCSF_SET_FILTER_TI').'" data-fr="'.Loc::getMessage('CT_BCSF_SET_FILTER_TR').'" data-frm="'.Loc::getMessage('CT_BCSF_SET_FILTER_TRM').'" id="modef_num_mobile">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
									<a rel="nofollow" href="<?echo str_replace('/filter/clear/apply/', '/', $arResult["FILTER_URL"]);?>" class="btn btn-default white white-bg"><?echo Loc::getMessage("CT_BCSF_FILTER_SHOW")?></a>
								</div>
								<div class="bx_filter_popup_result right" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?>>
									<?echo Loc::getMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
									<a rel="nofollow" href="<?echo str_replace('/filter/clear/apply/', '/', $arResult["FILTER_URL"]);?>" class="btn btn-default white white-bg"><?echo Loc::getMessage("CT_BCSF_FILTER_SHOW")?></a>
								</div>
								<button class="bx_filter_search_reset btn btn-default btn-transparent round-ignore<?=($bActiveFilter && $bActiveFilter[1] != 'clear' ? '' : ' hidden');?> pull-left" type="reset" id="del_filter1" name="del_filter1" data-href="" title="<?=Loc::getMessage("CT_BCSF_DEL_FILTER")?>">
									<?=CMax::showIconSvg("reset", SITE_TEMPLATE_PATH.'/images/svg/catalog/cleanfilters_big.svg', '', '', true, false);?>
								</button>
							</div>
						</div>
					</div>
				<?endif;?>
				<div style="clear: both;"></div>
				<div style="clear: both;"></div>
				<div class="row">
					<div class="col-md-7">
						<div class="fo_field_title">
							Место и время доставки
						</div>
						<?$APPLICATION->IncludeComponent(
							"sebekon:delivery.calc",
							"fastOrder",
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
					<div class="col-md-5 fo_confirm">
						<div class="fo_field_title">
							Подтверждение заказа
						</div>
						<div class="row">
							<div class="col-md-5 fo_confirm__left">
								<div class="fastOrder__cost">
									Стоимость бетона: <span class="fastOrder__cost_items">укажите параметры</span>
								</div>
								<div class="fastOrder__cost">
									Стоимость доставки: <span class="fastOrder__cost_delivery">не выбран адрес</span>
								</div>
							</div>
							<div class="col-md-7 fo_confirm__right">
								<div class="fastOrder__cost fastOrder__cost_full-box">
									Итого: <span class="fastOrder__cost_full">0 руб.</span>
								</div>
								<div class="btn btn-default btn-xs fast-order">
									Заказать
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="clear: both;"></div>
			</form>
			<div style="clear: both;"></div>
		</div>
	</div>
	<script>
		var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=$arParams["VIEW_MODE"];?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
//console.log(smartFilter);
		<?if(!$isFilter){?>
			$('.bx_filter_vertical').remove();
		<?}?>
/*
		BX.message({
			SELECTED: 'Подобрано: ',
		});
*/
		/*$(document).ready(function(){
			$('.bx_filter_search_reset').on('click', function(){
				<?if($arParams["SEF_MODE"]=="Y"){?>
					location.href=$('form.smartfilter').find('#del_url').val();
				<?}else{?>
					location.href=$('form.smartfilter').attr('action');
				<?}?>
			})
		})*/
	</script>
<?}?>