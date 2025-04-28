<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>

<div id="nsm-settings" class="hide-pick-color hide-saving-wrp">
<span class="nsm-btn nsm-btn-open" onClick="settingsOpen()"></span>
<span class="nsm-btn nsm-btn-close" onClick="settingsClose()"></span>

<form class="nsm-form nsm_settings_form" method="post" >

    <div class="nsm-tab-saving-wrp">
        <span id="nsm-anim-saving"><?=GetMessage("sohranenie")?> </span>
        <span id="nsm-anim-error"><?=GetMessage("oshibka")?> </span>
    </div>

    <div class="nsm-tab-pickcolor-wrp">
        <div class="pick_color_pickcolor-wrp_bg">
            <h3><?=GetMessage("ukazhite_cvet")?>  <span id="nsm-set-pickcolor-text"></span></h3>
            <div class="pick_color" id="nsm_color_block" >
                <div class="nsm_pick_color_wrp claerfix">
                    <div id="line">
                        <div id="arrows">
                            <div class="left_arrow"></div><!-- <div class="right_arrow"></div> -->
                        </div>
                    </div>
                    <div id="nsm_pick_color">
                        <img src="data:image/png;base64,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" class="bk_img">
                        <div class="circle" id="circle"></div>
                    </div>
                </div>
                <div class="nsm_pick_color_sti claerfix">
                    <div class="pick_color_labels">
                        <span><?=GetMessage("novy_cvet")?> </span>
                        <span><?=GetMessage("stary_cvet")?> </span>
                    </div>
                    <div id="out_color" class="out_color">
                        <input value="#ffffff" name="new_color" type="text" id="pick_new_color" />
                    </div>
                    <div id="old_color" class="old_color" style="background-color:#567290">
                        <input value="#567290" name="old_color" type="text" id="pick_old_color" />
                    </div>

                    <input value="element" name="color_prop" type="hidden" id="pick_color_prop" style="color: #555888 !important;  height: 15px;"/>
                    <div class="select_color" onClick="pickColorSave()"><?=GetMessage("Primenit_cvet")?> </div>
                    <div class="cancel_color" onClick="pickColorClose()"><?=GetMessage("Otmenit")?> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nsm-tab-nav-wrp">
        <span class="nsm-tab-nav nsm-tab-nav-1" onClick="nigesSocMenuTabs(\'1\')"><?=GetMessage("tab_nastroiki")?> </span>
        <span class="nsm-tab-nav nsm-tab-nav-2 active" onClick="nigesSocMenuTabs(\'2\')"><?=GetMessage("tab_razmery")?> </span>
        <span class="nsm-tab-nav nsm-tab-nav-3" onClick="nigesSocMenuTabs(\'3\')"><?=GetMessage("tab_cveta")?> </span>
        <span class="nsm-tab-nav nsm-tab-nav-4" onClick="nigesSocMenuTabs(\'4\')"><?=GetMessage("tab_ramka")?> </span>
        <span class="nsm-tab-nav nsm-tab-nav-5" onClick="nigesSocMenuTabs(\'5\')"><?=GetMessage("tab_ten")?> </span>
        <span class="nsm-tab-nav nsm-tab-nav-6" onClick="nigesSocMenuTabs(\'6\')"><?=GetMessage("tab_animaciya")?> </span>
    </div>

    <div class="nsm-tab">
        <div class="nsm-tab-wrp nsm-tab-wrp-1 claerfix"> 
            <div>
                <label><?=GetMessage("Poziciya")?> </label>
                    <label style="display: inline !important; padding-right:25px;">
                        <input type="radio" value="left" name="NSM_PROP[POSITIONO]" id="nsm-default-position" <?=($arResult["POSITION"] == 'left') ? 'checked': ''; ?> style="margin:0;position:relative;width:16px;height:16px;top:4px;" onClick="OptionPosition(\'left\',\' \')" /> <?=GetMessage('Sleva')?>
                    </label>
                    <label style="display: inline !important;">
                        <input type="radio" value="right" name="NSM_PROP[POSITIONO]" <?=($arResult["POSITION"] == 'right') ? 'checked': ''; ?> style="margin:0;position:relative;width:16px;height:16px;top:4px;" onClick="OptionPosition(\'right\',\' \')" /> <?=GetMessage('Sprava')?>
                    </label>
                    <label>
                        <input type="radio" value="indiv" name="NSM_PROP[POSITIONO]" <?=($arResult["POSITION"] == 'indiv') ? 'checked': ''; ?> style="margin:0;position:relative;width:16px;height:16px;top:4px;" onClick="OptionPosition(\'indiv\',\'<?=GetMessage('NotFoundClass')?> &lt;div class=&quot;niges-socmenu&quot;&gt;&lt;/div&gt;\')" /> <?=GetMessage('Div_tekst')?> <b> <?=htmlspecialcharsbx(GetMessage('Div'))?></b>
                    </label>
                    <input id="nsm-input-position" class="inputopt" type="hidden" name="NSM_PROP[POSITION]" value="<?=$arResult["POSITION"]?>" />
            </div>
            <div style="margin:9px 0 10px;">
                <label>
                    <input type="checkbox" name="NSM_PROP[FIXED]" id="nsm-input-fixed" <?if ($arResult["FIXED"] == 'Y'):?>checked<?endif;?> style="width:16px;height:16px;margin:0px;top:5px;position:relative;display:inline-block;"  onchange="nigesSocMenuChangeCSS(\'fixed\')"/>
                        <?=GetMessage("Zakrep")?>
                </label>
            </div>
            <div>
                <label><?=GetMessage("Otstup")?> 
                    <span id="nsm-label-btn-toptype" style="display:none"></span> 
                    <span id="nsm-label-btn-top" style="display:none"></span> 
                    <span id="nsm-label-btn-topmeasure" style="display:none"></span>
                </label>
                <select id="nsm-set-btn-toptype" name="toptype" onchange="nigesSocMenuChangeCSS(\'toptype\')">
                    <option value="top" <?=($arResult["TOPTYPE"] == 'top' || $arResult["TOPTYPE"] == '') ? 'selected': ''; ?>><?=GetMessage("Sverxu")?></option>
                    <option value="bottom" <?=($arResult["TOPTYPE"] == 'bottom') ? 'selected': ''; ?>><?=GetMessage("Snizu")?></option>
                </select> 
                <input id="nsm-set-btn-top" class="inputrange" type="number" step="1" name="top" value="<?=$arResult["TOP"]?>" oninput="nigesSocMenuChangeCSS(\'top\')" onchange="nigesSocMenuChangeCSS(\'top\')">
                <select id="nsm-set-btn-topmeasure" name="topmeasure" onchange="nigesSocMenuChangeCSS(\'topmeasure\')">
                    <option value="%" <?=($arResult["TOPMEASURE"] == '%' || $arResult["TOPMEASURE"] == '') ? 'selected': ''; ?>>%</option>
                    <option value="px" <?=($arResult["TOPMEASURE"] == 'px') ? 'selected': ''; ?>>px</option>
                    <option value="vh" <?=($arResult["TOPMEASURE"] == 'vh') ? 'selected': ''; ?>>vh</option>
                </select> 
                <span class="input-for-range" style="display:none;">
                    <input id="nsm-input-btn-toptype" class="inputnum" type="text" name="NSM_PROP[TOPTYPE]" value="<?=$arResult["TOPTYPE"]?>" /> 
                    <input id="nsm-input-btn-top" class="inputnum" type="text" name="NSM_PROP[TOP]" value="<?=$arResult["TOP"]?>" /> 
                    <input id="nsm-input-btn-topmeasure" class="inputnum" type="text" name="NSM_PROP[TOPMEASURE]" value="<?=$arResult["TOPMEASURE"]?>" />
                </span>
            </div>
            <div>
                <label><?=GetMessage("Poryadok")?> <span id="nsm-label-btn-zindex" style="display:none"></span></label>
                <input id="nsm-set-btn-zindex" class="inputrange" type="range" name="zindex" min="0" max="9999" value="<?=$arResult["ZINDEX"]?>" oninput="nigesSocMenuChangeCSS(\'zindex\')" onchange="nigesSocMenuChangeCSS(\'zindex\')">
                <span class="input-for-range"><input id="nsm-input-btn-zindex" class="inputnum" type="text" name="NSM_PROP[ZINDEX]" value="<?=$arResult["ZINDEX"]?>" /></span>
            </div>

        </div>
        <div class="nsm-tab-wrp nsm-tab-wrp-2 claerfix active">

            <div>
                <label><?=GetMessage("Radius_knopok")?>  <span id="nsm-label-btn-radius" style="display:none"></span></label>
                <input id="nsm-set-btn-radius" class="inputrange" type="range" name="radius" min="0" max="80" value="<?=$arResult["RADIUS"]?>" oninput="nigesSocMenuChangeCSS(\'radius\')" onchange="nigesSocMenuChangeCSS(\'radius\')">
                <span class="input-for-range"><input id="nsm-input-btn-radius" class="inputnum" type="text" name="NSM_PROP[RADIUS]" value="<?=$arResult["RADIUS"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Razmer_knopok")?>  <span id="nsm-label-btn-size" style="display:none"></span></label>
                <input id="nsm-set-btn-size" class="inputrange" type="range" name="size" min="10" max="80" value="<?=$arResult["SIZE"]?>" oninput="nigesSocMenuChangeCSS(\'size\')" onchange="nigesSocMenuChangeCSS(\'size\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-size" name="NSM_PROP[SIZE]" value="<?=$arResult["SIZE"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Razmer_ikonok")?>  <span id="nsm-label-btn-font" style="display:none"></span></label>
                <input id="nsm-set-btn-font" class="inputrange" type="range" name="font" min="10" max="80" value="<?=$arResult["FONT"]?>" oninput="nigesSocMenuChangeCSS(\'font\')" onchange="nigesSocMenuChangeCSS(\'font\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-font" name="NSM_PROP[FONT]" value="<?=$arResult["FONT"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Radius_knopok_na_mob")?>  <span id="nsm-label-btn-radius-mobile" style="display:none">5</span></label>
                <input id="nsm-set-btn-radius-mobile" class="inputrange" type="range" name="radius-mobile" min="0" max="80" value="<?=$arResult["RADIUS_MOBILE"]?>" oninput="nigesSocMenuChangeCSS(\'radius-mobile\')" onchange="nigesSocMenuChangeCSS(\'radius-mobile\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-radius-mobile" name="NSM_PROP[RADIUS_MOBILE]" value="<?=$arResult["RADIUS_MOBILE"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Razmer_knopok_na_mob")?>  <span id="nsm-label-btn-size-mobile" style="display:none"></span></label>
                <input id="nsm-set-btn-size-mobile" class="inputrange" type="range" name="size-mobile" min="10" max="80" value="<?=$arResult["SIZE_MOBILE"]?>" oninput="nigesSocMenuChangeCSS(\'size-mobile\')" onchange="nigesSocMenuChangeCSS(\'size-mobile\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-size-mobile" name="NSM_PROP[SIZE_MOBILE]" value="<?=$arResult["SIZE_MOBILE"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Razmer_ikonok_na_mob")?>  <span id="nsm-label-btn-font-mobile" style="display:none"></span></label>
                <input id="nsm-set-btn-font-mobile" class="inputrange" type="range" name="font-mobile" min="10" max="80" value="38" oninput="nigesSocMenuChangeCSS(\'font-mobile\')" onchange="nigesSocMenuChangeCSS(\'font-mobile\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-font-mobile" name="NSM_PROP[FONT_MOBILE]" value="<?=$arResult["FONT_MOBILE"]?>" /> px</span>
            </div>
        </div>
        <div class="nsm-tab-wrp nsm-tab-wrp-3 claerfix">
            <div>
                <label><?=GetMessage("Stil_knopok")?> </label>
                <label style="display: inline !important; padding-right:25px;">
                    <input type="radio" value="native" name="NSM_PROP[SETSTYLE0]" <?=($arResult["SETSTYLE"] == 'native') ? 'checked': ''; ?> style="margin:0;position:relative;width:16px;height:16px;top:4px;" onClick="OptionStyle(\'native\')" /> <?=GetMessage('Stil_nativnyy')?>
                </label>
                <label style="display: inline !important">
                    <input type="radio" value="custom" name="NSM_PROP[SETSTYLE0]" <?=($arResult["SETSTYLE"] == 'custom') ? 'checked': ''; ?> style="margin:0;position:relative;width:16px;height:16px;top:4px;" onClick="OptionStyle(\'custom\')" /> <?=GetMessage('Stil_proizvolny')?>
                </label>
                <input id="nsm-input-setstyle" class="inputopt" type="hidden" name="NSM_PROP[SETSTYLE]" value="<?=$arResult["SETSTYLE"]?>" />
            </div>
            <div>
                <label><?=GetMessage("Cvet_ikinok")?> </label>
                <span onClick="pickColor(\'btncolor\',\'<?=GetMessage("Cvet_ikinok_pc")?>\')" id="nsm-label-color-btncolor" class="inputcolor" style="background-color:<?=$arResult["BTNCOLOR"]?>"><?=$arResult["BTNCOLOR"]?></span>
                    <input type="hidden" id="nsm-input-color-btncolor" name="NSM_PROP[BTNCOLOR]" value="<?=$arResult["BTNCOLOR"]?>" />
                <span onClick="pickColor(\'btncolor_hover\',\'<?=GetMessage("Cvet_ikinok_pch")?>\')" id="nsm-label-color-btncolor_hover" class="inputcolor inputsecondcolor" style="background-color:<?=$arResult["BTNCOLOR_HOVER"]?>"><?=$arResult["BTNCOLOR_HOVER"]?></span>
                    <input type="hidden" id="nsm-input-color-btncolor_hover" name="NSM_PROP[BTNCOLOR_HOVER]" value="<?=$arResult["BTNCOLOR_HOVER"]?>" />
            </div>
            <div>
                <label><?=GetMessage("Cvet_knopok")?> </label>
                <span onClick="pickColor(\'btnbg\',\'<?=GetMessage("fon_knopok")?>\')" id="nsm-label-color-btnbg" class="inputcolor" style="background-color:<?=$arResult["BTNBG"]?>"><?=$arResult["BTNBG"]?></span>
                <input type="hidden" id="nsm-input-color-btnbg" name="NSM_PROP[BTNBG]" value="<?=$arResult["BTNBG"]?>" />
                <span onClick="pickColor(\'btnbg_hover\',\'<?=GetMessage("fon_knopok_h")?>\')" id="nsm-label-color-btnbg_hover" class="inputcolor inputsecondcolor" style="background-color:<?=$arResult["BTNBG_HOVER"]?>"><?=$arResult["BTNBG_HOVER"]?></span>
                <input type="hidden" id="nsm-input-color-btnbg_hover" name="NSM_PROP[BTNBG_HOVER]" value="<?=$arResult["BTNBG_HOVER"]?>" />
            </div>
            <div>
                <label><?=GetMessage("Neprozrachnost")?> <span id="nsm-label-btn-opacity" style="display:none"></span><span id="nsm-label-btn-opacity-hover" style="display:none"></span></label>
                <input id="nsm-set-btn-opacity" class="inputrange" type="range" name="opacity" min="0" max="100" value="<?=$arResult["BTNOPACITY"]?>" oninput="nigesSocMenuChangeCSS(\'opacity\')" onchange="nigesSocMenuChangeCSS(\'opacity\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-opacity" name="NSM_PROP[BTNOPACITY]" value="<?=$arResult["BTNOPACITY"]?>" /> %</span>

                <input id="nsm-set-btn-opacity-hover" class="inputrange" type="range" name="opacity-hover" min="0" max="100" value="<?=$arResult["BTNOPACITY_HOVER"]?>" oninput="nigesSocMenuChangeCSS(\'opacity-hover\')" onchange="nigesSocMenuChangeCSS(\'opacity-hover\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-opacity-hover" name="NSM_PROP[BTNOPACITY_HOVER]" value="<?=$arResult["BTNOPACITY_HOVER"]?>" /> %</span>
            </div>
        </div>
        <div class="nsm-tab-wrp nsm-tab-wrp-4 claerfix">
            <div>
                <label><?=GetMessage("Otstupy_lp")?> <span id="nsm-label-btn-hmargin" style="display:none"></span> </label>
                <input id="nsm-set-btn-hmargin" class="inputrange" type="range" name="hmargin" min="0" max="100" value="<?=$arResult["HMARGIN"]?>" oninput="nigesSocMenuChangeCSS(\'hmargin\')" onchange="nigesSocMenuChangeCSS(\'hmargin\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-hmargin" name="NSM_PROP[HMARGIN]" value="<?=$arResult["HMARGIN"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Otstupy_vn")?>  <span id="nsm-label-btn-vmargin" style="display:none"></span> </label>
                <input id="nsm-set-btn-vmargin" class="inputrange" type="range" name="vmargin" min="0" max="100" value="<?=$arResult["VMARGIN"]?>" oninput="nigesSocMenuChangeCSS(\'vmargin\')" onchange="nigesSocMenuChangeCSS(\'vmargin\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-vmargin" name="NSM_PROP[VMARGIN]" value="<?=$arResult["VMARGIN"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Razmer_ramki")?>  <span id="nsm-label-btn-border-size" style="display:none"></span><span id="nsm-label-btn-border-size-hover" style="display:none"></span> </label>
                <input id="nsm-set-btn-border-size" class="inputrange" type="range" name="border-size" min="0" max="15" value="<?=$arResult["BTNBORDER"]?>" oninput="nigesSocMenuChangeCSS(\'border-size\')" onchange="nigesSocMenuChangeCSS(\'border-size\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-border-size" name="NSM_PROP[BTNBORDER]" value="<?=$arResult["BTNBORDER"]?>" /> px</span>
                <!--<input id="nsm-set-btn-border-size-hover" class="inputrange" type="range" name="border-size-hover" min="0" max="15" value="<?=$arResult["BTNBORDER_HOVER"]?>" oninput="nigesSocMenuChangeCSS(\'border-size-hover\')" onchange="nigesSocMenuChangeCSS(\'border-size-hover\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-border-size-hover" name="NSM_PROP[BTNBORDER_HOVER]" value="<?=$arResult["BTNBORDER_HOVER"]?>" /> px</span>-->
            </div>
            <div>
                <label><?=GetMessage("Cvet_ramki")?> </label>
                <span onClick="pickColor(\'btnbordercolor\',\'<?=GetMessage("Cvet_ramki_pc")?>\')" id="nsm-label-color-btnbordercolor" class="inputcolor" style="background-color:<?=$arResult["BTNBORDERCOLOR"]?>"><?=$arResult["BTNBORDERCOLOR"]?></span>
                    <input type="hidden" id="nsm-input-color-btnbordercolor" name="NSM_PROP[BTNBORDERCOLOR]" value="<?=$arResult["BTNBORDERCOLOR"]?>" />
                <span onClick="pickColor(\'btnbordercolor_hover\',\'<?=GetMessage("Cvet_ramki_pch")?>\')" id="nsm-label-color-btnbordercolor_hover" class="inputcolor inputsecondcolor" style="background-color:<?=$arResult["BTNBORDERCOLOR_HOVER"]?>"><?=$arResult["BTNBORDERCOLOR_HOVER"]?></span>
                    <input type="hidden" id="nsm-input-color-btnbordercolor_hover" name="NSM_PROP[BTNBORDERCOLOR_HOVER]" value="<?=$arResult["BTNBORDERCOLOR_HOVER"]?>" />
            </div>
        </div>
        <div class="nsm-tab-wrp nsm-tab-wrp-5 claerfix">
            <div>
                <label><input type="checkbox" name="NSM_PROP[BTNSHADOW]" id="nsm-input-shadow" <?if ($arResult["BTNSHADOW"] == 'Y'):?>checked<?endif;?> style="width:16px;height:16px;margin:0px;top:5px;position:relative;display:inline-block;"   onchange="nigesSocMenuChangeCSS(\'shadow\')" />
                    <?=GetMessage("Ten_ot_knopok")?></label>
            </div>
            <div>
                <label><?=GetMessage("Cvet_teni")?> </label>
                <span onClick="pickColor(\'btnshadowcolor\',\'<?=GetMessage("Cvet_ramki_pc")?>\')" id="nsm-label-color-btnshadowcolor" class="inputcolor" style="background-color:<?=$arResult["BTNSHADOWCOLOR"]?>"><?=$arResult["BTNSHADOWCOLOR"]?></span>
                    <input type="hidden" id="nsm-input-color-btnshadowcolor" name="NSM_PROP[BTNSHADOWCOLOR]" value="<?=$arResult["BTNSHADOWCOLOR"]?>" />
                <span onClick="pickColor(\'btnshadowcolor_hover\',\'<?=GetMessage("Cvet_ramki_pch")?>\')" id="nsm-label-color-btnshadowcolor_hover" class="inputcolor inputsecondcolor" style="background-color:<?=$arResult["BTNSHADOWCOLOR_HOVER"]?>"><?=$arResult["BTNSHADOWCOLOR_HOVER"]?></span>
                    <input type="hidden" id="nsm-input-color-btnshadowcolor_hover" name="NSM_PROP[BTNSHADOWCOLOR_HOVER]" value="<?=$arResult["BTNSHADOWCOLOR_HOVER"]?>" />
            </div>
            <div>
                <label><?=GetMessage("Razmer_teni")?> <span id="nsm-label-btn-shadow-size" style="display:none"></span> <span id="nsm-label-btn-shadow-size-hover" style="display:none"></span> </label>
                <input id="nsm-set-btn-shadow-size" class="inputrange" type="range" name="shadow-size" min="0" max="80" value="<?=$arResult["BTNSHADOWSIZE"]?>" oninput="nigesSocMenuChangeCSS(\'shadow-size\')" onchange="nigesSocMenuChangeCSS(\'shadow-size\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-shadow-size" name="NSM_PROP[BTNSHADOWSIZE]" value="<?=$arResult["BTNSHADOWSIZE"]?>" /> px</span>
                <input id="nsm-set-btn-shadow-size-hover" class="inputrange" type="range" name="shadow-size-hover" min="0" max="80" value="<?=$arResult["BTNSHADOWSIZE_HOVER"]?>" oninput="nigesSocMenuChangeCSS(\'shadow-size-hover\')" onchange="nigesSocMenuChangeCSS(\'shadow-size-hover\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-shadow-size-hover" name="NSM_PROP[BTNSHADOWSIZE_HOVER]" value="<?=$arResult["BTNSHADOWSIZE_HOVER"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Sdvig_v")?> <span id="nsm-label-btn-shadow-v-offset" style="display:none"></span> <span id="nsm-label-btn-shadow-v-offset-hover" style="display:none"></span> </label>
                <input id="nsm-set-btn-shadow-v-offset" class="inputrange" type="range" name="shadow-v-offset" min="-40" max="40" value="<?=$arResult["BTNSHADOWVOFFSET"]?>" oninput="nigesSocMenuChangeCSS(\'shadow-v-offset\')" onchange="nigesSocMenuChangeCSS(\'shadow-v-offset\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-shadow-v-offset" name="NSM_PROP[BTNSHADOWVOFFSET]" value="<?=$arResult["BTNSHADOWVOFFSET"]?>" /> px</span>
                <input id="nsm-set-btn-shadow-v-offset-hover" class="inputrange" type="range" name="shadow-v-offset-hover" min="-40" max="40" value="<?=$arResult["BTNSHADOWVOFFSET_HOVER"]?>" oninput="nigesSocMenuChangeCSS(\'shadow-v-offset-hover\')" onchange="nigesSocMenuChangeCSS(\'shadow-v-offset-hover\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-shadow-v-offset-hover" name="NSM_PROP[BTNSHADOWVOFFSET_HOVER]" value="<?=$arResult["BTNSHADOWVOFFSET_HOVER"]?>" /> px</span>
            </div>
            <div>
                <label><?=GetMessage("Sdvig_h")?> <span id="nsm-label-btn-shadow-h-offset" style="display:none"></span> <span id="nsm-label-btn-shadow-h-offset-hover" style="display:none"></span> </label>
                <input id="nsm-set-btn-shadow-h-offset" class="inputrange" type="range" name="shadow-h-offset" min="-40" max="40" value="<?=$arResult["BTNSHADOWHOFFSET"]?>" oninput="nigesSocMenuChangeCSS(\'shadow-h-offset\')" onchange="nigesSocMenuChangeCSS(\'shadow-h-offset\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-shadow-h-offset" name="NSM_PROP[BTNSHADOWHOFFSET]" value="<?=$arResult["BTNSHADOWHOFFSET"]?>" /> px</span>
                <input id="nsm-set-btn-shadow-h-offset-hover" class="inputrange" type="range" name="shadow-h-offset-hover" min="-40" max="40" value="<?=$arResult["BTNSHADOWHOFFSET_HOVER"]?>" oninput="nigesSocMenuChangeCSS(\'shadow-h-offset-hover\')" onchange="nigesSocMenuChangeCSS(\'shadow-h-offset-hover\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-shadow-h-offset-hover" name="NSM_PROP[BTNSHADOWHOFFSET_HOVER]" value="<?=$arResult["BTNSHADOWHOFFSET_HOVER"]?>" /> px</span>
            </div>
        </div>
        <div class="nsm-tab-wrp nsm-tab-wrp-6 claerfix">
            <div>
                <label><?=GetMessage("Perehody")?> </label>
                <select name="NSM_PROP[BTNTRANSITION]" onchange="nigesSocMenuChangeCSS(\'transition\')" id="nsm-input-btn-transition-select" >
                    <option value="none" <?=($arResult["BTNTRANSITION"] == 'none') ? 'selected': ''; ?> ><?=GetMessage('Bez_plavnyh_perehodov')?></option>
                    <option value="ease" <?=($arResult["BTNTRANSITION"] == 'ease') ? 'selected': ''; ?> ><?=GetMessage('Plavno')?></option>
                    <option value="linear" <?=($arResult["BTNTRANSITION"] == 'linear') ? 'selected': ''; ?> ><?=GetMessage('Lineino')?></option>
                </select>
                <input type="hidden" id="nsm-input-btn-transition-input" name="NSM_PROP[BTNTRANSITION_SELECT]" value="<?=$arResult["BTNTRANSITION"]?>" />
            </div>
            <div>
                <label><?=GetMessage("Skorost_perehodov")?> <span id="nsm-label-btn-transition-time" style="display:none"></span> </label>
                <input id="nsm-set-btn-transition-time" class="inputrange" type="range" name="transition-time" min="0" max="5000" value="<?=$arResult["BTNTRANSITION_TIME"]?>" oninput="nigesSocMenuChangeCSS(\'transition-time\')" onchange="nigesSocMenuChangeCSS(\'transition-time\')">
                <span class="input-for-range"><input type="text" id="nsm-input-btn-transition-time" name="NSM_PROP[BTNTRANSITION_TIME]" value="<?=$arResult["BTNTRANSITION_TIME"]?>" /> <?=GetMessage("ms")?></span>
            </div>
            <div>
                <label><?=GetMessage("Animaciy_pri_navedenii")?></label>
                <select name="NSM_PROP[ANIMATION]" onchange="nigesSocMenuChangeCSS(\'animation\')" id="nsm-input-btn-animation-select" >
                    <option value="none" <?=($arResult["ANIMATION"] == 'none') ? 'selected': ''; ?> ><?=GetMessage('Bez_animacii')?></option>
                    <option value="shake" <?=($arResult["ANIMATION"] == 'shake') ? 'selected': ''; ?> ><?=GetMessage('Podergivanie')?></option>
                    <option value="shift" <?=($arResult["ANIMATION"] == 'shift') ? 'selected': ''; ?> ><?=GetMessage('Sdvig')?></option>
                </select>
                <input type="hidden" id="nsm-input-btn-animation-input" name="NSM_PROP[ANIMATION_SELECT]" value="<?=$arResult["ANIMATION"]?>" />
            </div>
        </div>
    </div>

    <input type="hidden" name="SITE_ID" value="<?=SITE_ID?>" />
    <input type="hidden" name="ACTIVE" value="Y" />

    <input type="submit" name="set_socmenu_props" value="<?=GetMessage("Sohranit")?>" class="nsm-submit" />
    <a href="/bitrix/admin/settings.php?lang=ru&mid=niges.socmenu" class="nsm-modlink"><?=GetMessage("Nastroiki_modulya")?></a>
</form>
<style>
    #nsm-settings * {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
		padding:0;
		margin:0;
        text-align:left;
		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
        font-size:13px;
    }
    #nsm-settings {
        margin: 20px 55px 0;
        position: absolute;
        float: left;
        left: 5px;
        z-index: 995!important;
    }
    <?if($arResult["TOPTYPE"]=="bottom"):?>#nsm-settings { margin-top:15px; transform: translateY(-100%); } <?endif;?>
    .nsm-position-right #nsm-settings {
        float: right;
        right: 5px;
        left: unset;
        margin-top: 28px;
    }
    .nsm-position-indiv #nsm-settings {
        float: left;
        left: 0px;
        margin-left:0px;    
        margin-top: 20px;
    }
    #nsm-settings .nsm-form {
        display: none;
        position: relative;
        width: 280px;
        overflow: hidden;
        border-radius: 4px;
        background:#4a545b;
        border: 1px solid #434b58;
        border-top: 1px solid #a0aab9;
        border-left: 1px solid #616c7d;
        box-shadow: 0 2px 7px rgba(0,0,0,1.2)!important;
    }
    #nsm-settings .claerfix:after{
        clear:both;
        content:"";
        width:220px;
        height:1px;
        display:block;
        position:relative;
    }
    #nsm-settings .nsm-btn{
        display: none;
        background: #252f3f;
        width: 26px;
        height: 26px;
        position: absolute;
        border-radius: 13px;
        margin: -18px 0 0 -18px;
        cursor: pointer;
        z-index: 3px;
    }
    #nsm-settings .nsm-btn-open {
        background: #252f3f url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAuCAMAAAAWXWmOAAABsFBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADIz9IAAAAAAAAAAADV3d/GztHq7O3s8PHd4uRcYGFkaGk9QEFLTU1gYmPx8/Pu7/Dl6enGztHa3+Hc4uPN1NfEy87b4eP5+vre4+XEy83e5OX9/f3Fy83d4OHJzc+VmpuJjpCDiIl8fX5qbm+8v8Ckqqyoq6ydoaPQ1dddYWJFR0j29vaKjpCSlZaYmprj5OTLz9Gmp6eSlpf19/fd4uS9wcMAAABaW1tTVFXKzc6zt7nDxsj3+Pjb4OLFx8je5ObP1tnn7O3u8fLI0NLV293Cyszv8/PY3d/P19nv8fHS2Nr4+frf5ObS2Nr4+fns8PHM0NGzubzFysuvtrne4uLEys3X29zk5ebO09Xb3d6anJ2Jj5BoamtydHV9gIFvc3V7fH1pbG7Z3t9oa2zp6urZ3uBXWls+QEHb4OKBhoiIjI09P0AxMTEqKyzLzc5vcHDY2Njg4eHO09TGxsewtLXP19rS2dz6+/zb4eP9/v7t8vPn7e/g6Orf5efd4+X3+fnz9vfx9fbv8/Tq8PHj6uza4OLW3eDrKyviAAAAfnRSTlMABgMfCyc/FgjsSSsV5eXj4sV1bmBUO+zs6+ro4uHh4N7Z1MrGraeljIx5dnZzc2VlYl9eW1pZWFNTTExKSjw7MTEuLSwoKB3s7Ovj393d19TU0NDNzc3Fxby8uLi0tK+pqaV7eHVwa2tmZmRiYV1dW1lZV1JLSz09PC8sFxdYa8l5AAABnUlEQVQoz+WRVVcjQRCFW2YmRpzg7u5ui+2y7ru4u7tDdc8kzEThL9MJIbzyzn2qc889davOh4Q+lHZj0u8ewSipQyO/d6BYbUgjSeP2HpiqshOKE/m9MbcOORaAgozmYZH5Z9wbn+qsypYFmPHHhFF3PkDdWeXi0DEDR40sIXMvy7GW6w9z1A4ehZoRGVAtSuUDTNkKmVeWCOovVmFjqHzm4EhnBU3CcKsMLO3U1p6rApSI5pEG33dguXm6+jW9ukUsxWk0gwEwBunvZCpqEcHNhsPjdUC1LOGn40f/1yhyU8k+ff6OmGQqSVQ2EZQUlsyEYAmjN6n3ZV2Y9JUNp95v04p6Lou0+hT9G41zTeM+ihP5trFxzrMyOXde7F6JzF8e5Jm1VmUzKxjkvwWGLlcoVHu6tDDYGQo5l+P0e8LZ1opgeJZ+iawm6J+Hs5WKiH/S5vKvxen3/YhE1wfnp1s7wtG8RmFM+AOBj53U1uESw0/RPFrv+xaLfXb6o4WtVTtJ+rG7uF7obwfsHq9dr0rRvy5dUeTGXy2vpP8I1FZgoAZEZbEAAAAASUVORK5CYII=") no-repeat;
        background-position: 6px 6px;
    }
    #nsm-settings .nsm-btn-close {
        margin: -23px 0 0 282px;
        background: #252f3f url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAqCAMAAACwXkr+AAAA/FBMVEUAAAAAAAAAAAAAAAAAAADN1dgAAAAAAAAAAAAAAADx9PVeYmNsbm/Z3d7O1djg5efh6One5ObM1Ndqbm9kaGiRlZbDx8nO1tnn7O32+Pnu8/Tj6uv19/fa4OLs8PH////g5efd5OXM09Z7fX2doKGvsLCZnZ6jpaaSlpfa2trr7/Dc4eMAAAAAAAD7+/v+/v76+/vP1dj4+PjV3uDJ0NPq7/D9/f3f5ObX4OPL0tWLkZKDiIrp6enN0dP8/Pzd4uTR19jKz9CRlZamqquZnZ+/w8X7+/v6+vrQ2Nvc4uT5+/vs8fL9/f3x9fbo7vD1+Pnu8/Pj6+zg6OrZ4OJMxt18AAAASHRSTlMACwgBIfRALyAC9XFwQvf29PTzc29TRvn49vb29fXy8fHr63NaVlZNTUc+PSgn+Pb08+np6ejl5eTkhYVpaWFhXV1bWVFDQD3S6Z8xAAAA7UlEQVQoz+WRV27DQAxEyV2t1R01y73F3em997aSbKfd/y4h4XznAuEPOSDeAOTAXS8VEsDv3Qgbzr6rY5RbG9mmIeDlQJfHaZip2EQQU6XL7Uy5JUuAxGmkdeSWDCRUpm2tVbzNMxCrIl19ZOHT7CbEDUn1md2pKM3WDxcJsVg5vmJrw7RQSrRM2tgCBXtSs+H/1G13xme/dq/p7NPF7gjl297ikB7it/L6aLaftwb8qonz7tRzx1unMOkslx3vNwW/URS1wTqFufPRDFa1IYt5owgSL/hsPpE6WYUxpRB+9cn6/pxZfD66/CuFH134Gcuo51dMAAAAAElFTkSuQmCC") no-repeat;
        background-position: 8px 8px;
    }
    .nsm-btn-close {display: none !important;}
    .nsm-btn-open {display: block !important;}
    .active-win-settings .nsm-btn-close {
        display: block !important;
    }
    .active-win-settings .nsm-btn-open {
        display: none !important;
    }

    .active-win-settings .nsm-form {
        display: block !important;
    }


    #nsm-settings .nsm-tab-nav-wrp {
        overflow: hidden;
        display: block;
        height: 39px;
        padding: 0 5px;
        background: #4a505a;
        background: #4a505a url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAAAjBAMAAACQkbKzAAAAHlBMVEVKUFpKU1tIT1hMVF1GTVZES1ROVWBQV2JTWmRBR09jjqW5AAAFN0lEQVQ4yyVUu5LTMBS9ejgOnWyZLKWsyBvoJNskKeVHAnSJUWDonPBq82CAcjNhgBKYpeBv0UInzdx7dM49VwdCjCwSCkpMsKhllMn7OMdNrq8xHCcNvGmPHY6pvyHNUE+iK6gUQWmKwpvLZ05EzRcokYld3Y+vsd6HTXyEM4q2r+eaEa1xz6GCJSYgLIi8nyEE8h2FHGm0PO5D8/ryoNEHcraMyUmiiWFyP44QvOTvPTqI+1nqfrs/7avNq9tXm9ts8SuggV0FgStvO6CDTFS6+01vnYUn+Ap5DV1CQwKwNkpkLlCrLFsv6ML9VvfrvhNUEgpWp9UNiAaWNK07AXZ7mA8QWb2mhBFmUPm60YWehacjurG8iOZak1OBdg1MIGRXBUHIlknlNu53uhELu5A2KF9ilk9BM3autIYQDLpE492keAgv2PW43rhbmqUWxKZ4VW9srdpnm9vNZuFctlnc/0GBEiVqbasP1hP7sVm1vtbl/YgLcIYyKgSMtQ4BQ2GTGHKXtcFq8+w3de7erVv5lk742q78N+zaW6lUq1qcvGxpTdokYaxOVLZUNY5s+3jV/oKhCbdIWFGaTwhsawKhkPB1Zhidizm/bNNtWtxZCfzbbHYznD+A4Wn2FUEq9nqKkNhgBRCpBCfqRUcxdxgsq5hSjcIQ4erLhIdggxWNEJI7U9jaLmiGohG/GMDX/i3kMLVxxRge05RiWj9erddA2HgvLBL94TQrRvgj8wxaDDioHKUgjUgZGIqvscNJ25brdQPv+7ScTT+S7X5GSCgjAYB8CwQP4UZHrNCEG8Nfz4urb9++TS8PvBZgadyKgpsPgFW7QTjVADplybUomT+1TSQhSyrVsixI9dNxBQWLjGKcaV3wuMK8roTEgBhtZG746Zt5bwSGfj41H00xvwznAwDkteMUM81ZLFqC01RCnOqc1Lku9CkiW7RlUQH69UmTfjh8DmMJjOIpEM0R1C0sVnUd5UjDBDREZYEhRzlIVGeqzSxdPl+DqHGho9esYJwUBF3dvcoZPxUPzBkx/dmwI2LIMwfwGOXzyU9AqectETaPIQXrCCOcMVYU/RN244dwoo5a5tUAZbEhejlZgpCemeRAAlSJtgNb1eBBP17m5jL9uv9eFOfplrMC6hi0oM/JGqaxFLiTGQTC2Y0TbV1LEG0ePLf7MbALgEYU4YjQXMWCLifXMIo9NTE6XM5zwiGdb6/ebUfbYsuGqCeQnCR+vPZdhFvNNIqb4Rp4ArWt+eH7+XOkQVzhMdIDxnszJDfzaPeVs9MsOhSco8P25LWESzDbGYkAFASek+tE1tXKKpHDBHJSlN8MHBvoc08+kcxrGazh/ekOHRSmqWxVjTIRA2FI9yEYb+4F5JtOJRjajioNdBlOYJqARxfY+P8iZE0WKUuR3+5tGGkC9KzgKLz9IyQOzCDcDBuvxaNLAbocoRT7tBSYtovboF3jfBntvnNzFnEBIwbanGb9MhyA3++76LPxG+Hc5i4tWyHpKlNrRyscXHBduk5KoiT2Q07Wd1r0AFLQo0M+Q9FdWhKKekPKYpxHRx58xD4tIYEBZQOmATcPQm+lda51wLY+LdFdWiZoR9ZBPmbQE3XKfVpGLJrHOdeRFzkcwwCmKEKCv4nT/2nZPIZd3T1q14A+pG1P5b4CDCFOQMe8v74awxjNBoQgvouRRWJRLOpFG9tGx2Oq7tuOZm3yyztAMmVzjJNqUEEjK+fq1pa5n5h0UQYLp+omTxoF5ZOGvVW7TqlgtchqjOWbVDR/AXZbIG4JCbVmAAAAAElFTkSuQmCC") repeat 0 0px !important;
    }
    #nsm-settings .nsm-tab-nav {
        display: block;
        height: 30px;
        float: left;
        width: 35px;
        overflow: hidden;
        margin: 8px 0px 0 7px;
        border-radius: 3px 3px 0px 0px;
        position: relative;
        cursor:pointer; 
        border: 1px solid #1a1c1f;
        border-bottom: none;
        background: #283343;
        background: linear-gradient(0deg, #1d2531, #293546);
        text-indent: -999px;
        box-shadow: 0px 0px 3px #1a1c1f;
    }
    #nsm-settings .nsm-tab-nav.active {
        cursor:default;
        border: 1px solid #767f8c;
        background: #767f8c;
        background: #767f8c url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAEAQMAAACTPww9AAAABlBMVEV2f4xpcXyMgKyBAAAAEElEQVQI12NoYGBgUGBgAAAD6AChEorjnwAAAABJRU5ErkJggg==") repeat 0 0px!important;
    }
    #nsm-settings .nsm-tab {
        background: #767f8c url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAEAQMAAACTPww9AAAABlBMVEV2f4xpcXyMgKyBAAAAEElEQVQI12NoYGBgUGBgAAAD6AChEorjnwAAAABJRU5ErkJggg==") repeat 0 0px!important;
        padding: 12px;
        margin-bottom: 12px;
        width: 255px;
        border-left: 1px solid #7c8890;
    }
    .nsm-tab-nav-1:before {
        content: "";
        position: absolute;
        display: block;
        margin: 9px 9px 0;
        width: 18px;
        height: 18px;
        background:  url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAA2CAMAAAD9LTlFAAAAulBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACioqKEiYutsLCeoqPq7+/b4OLp7u77+/va3+Hg5ufCxMUAAAAAAAAAAAAAAAAAAAAAAADw8/Tf5Obv8/TP19rM1Nfe4+Xx8/Pc4eLEzM64v8LY29zEysyvs7SZnJ2LkJG2urzP19rg5ef7/Pzq7/H////c5ef9/v709/j4+vrg6Orx9PXu8/Ps8fLb4ePl7O3T292+5hzBAAAALnRSTlMAFUMNQB07LCAKBCsIdXVSUubf2sDAvmRQSC0qDwXx8e/v6ePh1s7Ok5NoZmZgOykLLgAAAOdJREFUOMvtkslywjAQBW0twYYkNnsgkH1hlTBgGbP8/2/xBDJInLhDz2m6SlWaqvZa0qFJy57cPQs9BSXqSSE2hzEwH+qFPQBGNEIQrTq1mPsGeVRk9BmH3pFCBcMv/uiq6fvklbqqFnf5t5S/vf75IedhGFQqeG2UkBZaNYXDP75KS4xYMBxUpr4Dzr5zSzTmDg0EsFw+HaYAmcwuQEwzZXevFJJTaecnOnWvUqh0RdofUdE9Nqg1CQZV0z02qFVC2m9j0z02qHxL6lGXV/O83utjg1pnVvfYoJIsSyy0ai0c/q7tfg/4ki+jaR7mCAAAAABJRU5ErkJggg==") no-repeat;
    }
    .nsm-tab-nav-1:hover:before {
        background-position: 0 -40px;
    }
    .nsm-tab-nav-2:before {
        content: "";
        position: absolute;
        display: block;
        margin: 7px 9px 0;
        width: 18px;
        height: 18px;
        background:  url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAA6CAMAAACK7/k+AAABrVBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADFztHO1djj6OrL09YAAAAAAAAAAAB5fX6EiYrh5ufHz9Gora6coaOrsbQvMTHn7e/X3d7ByMvY4OLk6enM1NfL0tXT2duWnJ7N1de9xMdVWFmQlZcAAAB/hIa6wcTT2NmMkZJtcHEAAADP1ti9xMdqbm9hZWZnampcX2HAxce8wcSutLWepac7PD2prq/R2Nm8w8Xc5OXIz9LGztHCyszK0tXT29zEy87o7e/p7u7g6Onc5ee5wMPV3N7Dys3U293Dys20uruiqavu8PHJ0dTEzM+4v8KKj5GBhoji5+jI0NPi6OnZ4OK6wcTP1de6wcSNlJSEiYvn6urFzdDAxMS3u7yor7Giqavl6+za3t/FyMmnrrC8wcKytbXY29y6wcSTlpfHz9B0eXq8w8WdoKHJzc2ttLZ9goTBxcZJSks/QUJVVlZIS0woKSqmqKiMkpTP19re6Onc5efd5uji6uzg6erq8PHp7/Ds8vPj6+3l7O709/jw9fXn7u/mvlG7AAAAgXRSTlMAFBBbHzILNikwLGMlBBsXCND8xcNSRjooIc6ignBKPvzg4NTRvr6xgoCAfG9uaGVjXFpXVFRPT05OSTwzMy4p2dnY2NTKyMXFwb+/vby7u7q6tbW0tLKwqqqmpqWln56emZmWlo+Pj49/f398enJtbWxkZGBeXFxbTElJPz8+ODiYEM0NAAAB00lEQVQ4y+2SVXPcMBhFZdkyLXopy2FOQw03KTMzMzMzyzHuJv3NvVrvQzp96WMfckfjGZ3R/UYeHcJzRV6p85GX/MNd/vMcl9Ik9/C7NbRojX+0pmvWl+o+TSLFTiPOzDjTdaabbPs3JhFuxSlV1fYa4DollSFGCRnmIqn02wso1hdNlZArmQxQIbVjykBxbxxINXYByUpOFEfeiGJiP+/JANUfoDjBW9nTIwu07akothMrHDuTT+a4SYG2xGQZSE8xRlfGUMRGUxQxOkHVxOxNnBIbEn2Rfo5Zf6LSvCi2M3pwZba/NHEC9zofkUu3+dh1Pn+K47eljq0yku8wNNPQdIZiQkoqSJJSiUpipclm/vcE2WJ4+VP4+MX6+ztrP86u4dGy9zvL1YXyq6m+6ed9n5+U//b+KwRo9m70/vA6NLlWFfo+Cnw/DFPpyUEUlxaE91e7unzfh/fvoJzbG3m/Mwh8WTkUojg83vI+2+x2A1lZuofia89z3UZjd7fc+AXvn6Fo214LxgoDp/PJbGBSIOG950beL9dQdBzhvedF3s/cMCkQ9MbZSPIjTcxaXd2ISnMaEOI4jj16YHnmaGnyOO41GLGLt+xaxZ476f6r978BD/97kDP/D7gAAAAASUVORK5CYII=") no-repeat;
    }
    .nsm-tab-nav-2:hover:before {
        background-position: 0 -40px;
    }
    .nsm-tab-nav-3:before {
        content: "";
        position: absolute;
        display: block;
        margin: 7px 9px 0;
        width: 18px;
        height: 18px;
        background:  url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAA4CAMAAAAsEOM2AAABvFBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAEBAQAAAAAAAAAAADGztHc4OEsLS4AAAC7vL2/xsnLz9H4+Pjb3+GqrrDP1tnK0tXS2Nvr7u/W3uD4+Pnf5OXn6enK0NLIz9K5wMPg4uPP1dfX3N7a3+H39/ewtLaip6jEycrO0dOMkpTW291vc3RMTk+BhYY+QEEAAAAAAAAAAAAAAADt7e3Q1ddeYGEAAADO1tn3+fnN1dj5+frs8PLW4OLo7O7m6uvv8vLM1NbS3N7u8PHS2Nq8w8W8w8Xi5efByszq6+vj5+fZ3N3Bx8q3v8Hy8/Ovtbjy8/PW1tewt7ra3+G/wsOorrHk5ebKz9GYnqCSmJrGzM69vr7c3NywsLGQlpihoqKGi428wMLFycvT1dW/w8Wvs7Soqamdo6WCh4mBhYZ1eXv09PTBxMW0uLr09PSNkJB+goRmampdYGG3ubqorK3V1ta/w8VTVFRHSUrQ0dG6vsA+QEA5PDyzuLissLLCwsPP19r+/v7o7u/y9fbv8/Tr8PH3+fn09/jR2dzj6uzh6ev5+/vm7e7d5ujY3+HV3N7U3N7d4+Xb4ePT2t3X3uDR5GdzAAAAf3RSTlMABA8KEgc+NSMdFeTaSRgX2sKvnBb38unm5dvZ2NjSzMvGv66dnJqYjIN1clxTSTg0MjArKyQg/fz79/by8ero6OLf39fS0cvDw8LCwsHBvbW1sKurqamdmpmZlo+Pjo6Ni4eHg4ODg3p6dnZ2dHR0aWloaFFRTk5HRz8/Kysa3yROAQAAAZJJREFUKM/t0kVb41AAheF7k7apUsPddWaYGRh3dxfc3d3ltEmTQEJa5A9zbwk83bJjwbs7Z/2RtNbGaFW0sZWcy646tJLJpHX4O9s+/EkAOT2/kPIH+UErdV9fCGXSGqBXUvZspFArNUCvqwBwvEKIswPIG3oDnKTw/S3+O4kYBnRLBxNyBVAiEKEUobZccDlL/XjpIMIXzDX/RdqRhRL21KBiOg+2B6MCEW/i+EgHHrVPNC3cCLhFQj1fwfnuuO97PF6REiJs+cDoAyKllHA069Y7MNYOOefMksbKcuG7Ry8u6nDfdrnuOghnX07B6xUouXYltcxUR6onWy52MBI7EwnaRyFfj7t/xmKFu/ygP4z83mKjXFo1DOMbZc+6qnZKI+rDro8qs8zKiGrai8HXmqZqWtiv/WP1fpJlWZO5IldALmb1vlf8Nc8U7slivZLPWv2cmG3+k0hTlEQRe+ri5VPP4zZzmNdrxhOmae7XjjfN2/WG97iCjHo3C/a5+sx6Sw+Yve3Mehs+PD14dYl6TwGozoZXOLomygAAAABJRU5ErkJggg==") no-repeat;
    }
    .nsm-tab-nav-3:hover:before {
        background-position: 0 -39px;
    }
    .nsm-tab-nav-4:before {
        content: "";
        position: absolute;
        display: block;
        margin: 8px 7px 0 10px;
        width: 18px;
        height: 18px;
        background:  url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAA3CAMAAAA2cergAAABR1BMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADP19rK0tXh6evO1tkAAADAyMvN1NfN1djO19kAAAAAAAAAAAAAAADp7u/h6erk6uva5OYAAAAAAAAAAAAAAAA6PDzO1tnN1djI0NLK0tTm7O3m7e/i6uzl7O7s8fLj6uvL09bn7O3T3d/e5ui8w8XQ19lxdXZKTE0oKSkAAABna2wAAAAjJSUAAAAUFBS4vr8AAAAsLi4AAAAAAAAEBARXW1sAAAAODg5wdHZJTEzO1dje5+jX4eLd5OXV3+HO1tnX4eLL09bm7O7Q2drO1tna4OLEy87W3d/EzM/o7O3Iz9K7w8OttLaqsLGaoKLR1NW0u76vtLWboaMREhIQERF+goJxdXeVm52MkpRnaWpNUFHg5ufJ0dTP19rc5ujp7/Hv8/Ts8fLl7O0xNtTbAAAAZ3RSTlMAHllRGRUGVxwI/vP+/Q7g9+7gPzEQAff38+5MMywnGvj47d3c/v79+vf28+3r29qIcmxqZ2VjX1hOSklDOzQrJR8XEvr49vXv5+Li4ODd2NjS0svLyMjAwLu7m5tnZ1FROzssKyQkD/vIgAAAAVVJREFUOMvtksdOw0AQQGMbG3dMmh3SC+mdAAktCaH33ntbl/z/GXu8FmeuiHdZ6Wm1OyM935efRwB/kWR8wBFSBGAD3RGu4zPzi5MOC5IQCIFCU2SQZdmPIZFWqH7YVdSEfTR6o5TSyoa4H8VLL4MHgY/RWO3y9q/pEwkhKUVzoOT4qiTddANlfi4al0ExNHHWbCtKp07G4Ba8lVwLppXochDeyoBi5HVJIBOyM+w+Kk8DKXRFsTDXWwbvKNWf8PRcYol0mVzBO4Y5mnBhacb3z9/m82DWMCzLNM1zr/vcuBSxqVSK5i1uIl/zurdUXI7oh+77Q0JVqfcwqEOoMNcbqWorF+LgFqhC4XlwH7Gge91WNTE/HpeO7a+NIs3ZCroXxetuQDOc7m0F3Z8225rWaUD3etbrXtNw93rV617cxt3v6Vs7Mw6b4iXu/rWqY7KPv+n+G9eJPib8CapmAAAAAElFTkSuQmCC") no-repeat;
    }
    .nsm-tab-nav-4:hover:before {
        background-position: 0 -40px;
    }
    .nsm-tab-nav-5:before {
        content: "";
        position: absolute;
        display: block;
        margin: 7px 7px 0 10px;
        width: 18px;
        height: 18px;
        background:  url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAA2CAMAAAAWGoJGAAABaFBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEBATN1dgAAAAAAAAAAAAAAADS2t3O1tnJ0NPEzM+zurzM1Nd+g4WTmJoXGBgAAADL09YdHh4AAAAAAAA3OTprb3Dh6eq8xMbp7e7k6uuLkJGwt7qAhYfk6erY4ePc5efo7vDe5OXFzM/W3d/k6+zBycrAxsiutLfBycva3uDP1tjHz9LM1NfK0tWTlpeBhoikqas+QUGttLa3v8HS2Nq9xcfo7e5LTk/T2tvAx8o3OToyMzTW3d/p7/HN1Nft8fLs8fLZ4OHj6OnN1djN1djJztDO09PV2Nm3v8HFzc+3v8HR2dq1uruiqKq9xMfW3+HM1Nbg5+nb4+XBxcapr7K2vb6nrrDc5OWJjo/i6evN1NenqqqcoqTDyMm9w8TW2drFzc7h5+nZ4ePDycmVmJjv9PTP19ru8/Ts8fPg6erm7e/p8PHk7O3h6evi6uySgIiQAAAAb3RSTlMAGgMVB1M/MiEL7Eg9EEUK/vPo07mkjGhnZlM3KhsV7L+7saQ+OfPz7ezr6efd0s/Pw8G/vbGxpaWKe3lxbm5mZF9fKiolC+3s7Onm3dzT0sTEw8PCwMC+vb25uLi4traxo5WVj4x6eHJwZmQ+Ogv0KFtzAAABkElEQVQoz+2SVVPDQBSFd5NGmtSVAoUK7rSlQo0K7u7ueiOVv0+S7TDtG088cR6/u2fm3tkPIWQPeAQhkeujUCuLc2AkNGgiwK6B8XTaBbBbJSgAcNTFsOwlgA8bRQ+4umy81cqPg5sz60QAL8NrMyoLTpG2E8Ja9VEBnAwOmCiUABchG+BmsIc2oxw4rvXWvQO8YlDopVHfMThc2cKmA2b83IDQgxE1uA9GZuZtODlrwQiZqj630+n2+m18GXwWGmkIcyLDiBwuC6FushJlpjEODiQhtMCStcn5y7O+bpYnp+lNurfHYuEwAT9F2kyh//xhlorh1ZXwS5uZEVmWJUmKfZpaLyK12lgqNSZJOxWC3lT1UDfzQpYeyBef1deImevyNtGgvx4lZj7JQyL9pZNmlHiYrw0xuKiZedKYIGSytsXgsGbmq6Jc6a07VY2KwVHdzFNFmXjOT9br037uY9Qwc09RGo1mc1ozMxIzzKw8Tg0PT91qZpbUTKeZpf54p5k3jXibme/nIyMHmV+b+Q08L0h6dkqIsgAAAABJRU5ErkJggg==") no-repeat;
    }
    .nsm-tab-nav-5:hover:before {
        background-position: 0 -37px;
    }
    .nsm-tab-nav-6:before {
        content: "";
        position: absolute;
        display: block;
        margin: 9px 7px 0 10px;
        width: 18px;
        height: 18px;
        background:  url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAyCAMAAABmvHtTAAABGlBMVEUAAAAAAAAMDAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAATFBQAAAAAAAAAAAAAAAAAAAAAAADO1tne4uTb5ObJ0NPIz9GFiYp2e324v8FJS0zHztEAAAAAAACor7Ho6uq+xshrb3EAAAAAAABNUFE6PD3CyczY4ePm6uvy9vbq7/DN1NfX4OK2vb/V19i1vL/g5+jJ0NPX3+DFzdDT2dq/xsmus7SaoKLm6erGztHM1da/xsnLz9CzubzQ1tfb3d3m7O3N1Ne5v8Cor7FaW1tLTlCboaKQlZebn5+IjpDe4uK+xch2enrEzM9mamzj5OTe5ufP19rc5ujp7/Df6Orv8/Tm7e7j6+3r8fLh6ev2+fny9vfx9fa83qU7AAAAUnRSTlMAPQcCIBcKNh0bRDFrX1k6LSoQ+D/59+Onp6OHc1tWVVBPT01MRkM99/b06enl4d/f3d3NzczMxMS4uLa2ra2jopeXhYVzc2lpW1tXV1BPT01E6xpigQAAARtJREFUKM/tktdywkAMRV1214UECDaBkAYkQHrvvfdq7xoX+P/fiGScGfuRV4b7IGuupLvjmSOl1PlqNDqKiu2dg6IfFtSaoaDFiCbLcvEMB085Jkm2E+vqbQPqzuQUbKk0J4O0Gg5mlqkE1hz2R809qNMTGsMoRYeowgMOThYIPGg5qErrAD+zZgl2SkVMKrygswXheLYIvdW+iMOXDHCSF7+dJHxgMYPoBjHz83lTV1P/xyghOlWksUZSdr3+Yw/wveVB4Hn0fS2KopsMvqf9Xi96RHx/fb/b5fzydd3z+tsZfK/xuprgK8LQP/zc5TxYzeB7j9fHMb5l13WF2GztY2QG32e8rvzjC2vl9rkQIqym8W26oJVh8P0DeUQ6b1KWu3EAAAAASUVORK5CYII=") no-repeat;
    }
    .nsm-tab-nav-6:hover:before {
        background-position: 0 -37px;
    }
    #nsm-settings .inputrange input[type="radio"]{
        appearance: radio;
        -moz-appearance: radio;
        -webkit-appearance: radio;
    }
    #nsm-settings .inputrange input[type="checkbox"]{
        appearance: checkbox;
        -moz-appearance: checkbox;
        -webkit-appearance: checkbox;
    }
    #nsm-settings .inputrange input[type="text"]{
        appearance: auto;
        -moz-appearance: auto;
        -webkit-appearance: auto;
    }
    #nsm-settings .inputrange {
        display: block;
        width: 200px;
        margin: 0 auto;
        float: left;
        appearance: progress-bar;
        -moz-appearance: progress-bar;
        -webkit-appearance: progress-bar;
    }
    #nsm-settings .input-for-range {
        width: 50px;
        height: 25px;
        padding: 0 0 0 10px;
        color: #dde7e9!important;
        font: normal normal normal 11px/18px "Helvetica Neue",Helvetica,Arial,sans-serif!important;
        -webkit-font-smoothing: auto;
        margin-right: -10px;
        display: inline-block;
    }
    #nsm-settings select {
        min-width: 200px;
        color: #222;
    }
    #nsm-settings select option {
        color: #222;
    }
    #nsm-settings .input-for-range input {
        width: 30px;
        color:#dde7e9!important;
        font: normal normal normal 11px/18px "Helvetica Neue",Helvetica,Arial,sans-serif!important;    -webkit-font-smoothing: auto;
        background:none;
        text-align:right;
        border:none;
        outline: none;
        padding: 0;
    }
    #nsm-settings label{
        clear:both;
        display: block!important;
        height: 18px!important;
        vertical-align: top!important;
        margin: 0 0 0 0px!important;
        color: #dde7e9!important;
        font: normal normal normal 11px/18px "Helvetica Neue",Helvetica,Arial,sans-serif!important;
        -webkit-font-smoothing: auto;
        padding:9px 0 1px;
    }
    #nsm-settings label b{
        font: normal normal normal 11px/18px "Helvetica Neue",Helvetica,Arial,sans-serif!important;
        font-weight: bold;
        color: #dde7e9!important;
    }
    #nsm-settings .inputcolor {
        cursor: pointer;
        border: 1px solid #dedede;
        border-radius: 3px;
        height: 20px;
        width: 80px;
        text-align: center;
        text-transform: uppercase;
        line-height: 19px;
        display: inline-block;
        color: #dedede;
        font-weight: bold;
        font-size: 11px;
        text-shadow: 1px 1px 1px #111111;
    }
    #nsm-settings .inputcolor:hover {
        border: 1px solid #1a1c1f;
    }
    #nsm-settings .inputsecondcolor {
        margin-left:-8px;
        border-left: 0px;
    }
    #nsm-settings .inputsecondcolor:hover {
        border-left: 0px solid #1a1c1f !important;
    }
    #nsm-settings .select_color,
    #nsm-settings .cancel_color,
    #nsm-settings .nsm-submit {
        display: block;
        height: 31px;
        width: 113px;
        float: left;
        cursor: pointer;
        outline: none;
        margin: 0 12px 12px;
        border: 1px solid #1a1c1f;
        border-radius: 3px;
        background: linear-gradient(0deg, #1d2531, #293546);
        color: #dde7e9!important;
        font: normal normal bold 12px/29px "Helvetica Neue",Helvetica,Arial,sans-serif!important;
        box-shadow: 0 2px 7px rgba(0,0,0,0.5)!important;
        transition: all .3s ease;
        text-align: center;
    }
    #nsm-settings .nsm-submit:hover {
        background: linear-gradient(0deg, #00560b, #078e1e);
        color: #ffffff !important;
    }
    #nsm-settings .select_color {
        background: linear-gradient(0deg, #003a08, #007d16);
        width: 129px;
        margin: 0 12px 12px 0;
        line-height:32px !important;
    }
    #nsm-settings .cancel_color {
        width: 75px;
        margin: 0 -8px 12px 0;
        line-height:32px !important;
        font-weight: normal !important;
    }
    #nsm-settings .select_color:hover {
        background: linear-gradient(0deg, #00560b, #00b71f);
        color: #ffffff !important;
    }
    #nsm-settings .cancel_color:hover {
        background: linear-gradient(0deg, #323f52, #576b88);
    }
    #nsm-settings .nsm-modlink {
        line-height: 31px !important;
        display: inline-block !important;
        width: auto !important;
        height: 30px !important;
        border: none !important;
        font-size: 12px !important;
        background: none !important;
        color: #a9b4c3 !important;
        padding: 0 0 0 13px !important;
        margin: 0 !important;
        box-shadow: none !important;
        transition: all .3s ease !important;
        opacity: 1 !important;
    }
    #nsm-settings .nsm-modlink:hover {
        color: #ffffff !important;
        opacity: 1 !important;
    }
    .nsm-tab-wrp {
        display:none;
        padding: 0 0 10px;
    }
    .nsm-tab-wrp.active {
        display:block;
    }
    .nsm-tab-saving-wrp {
        display: block;
        width: 280px;
        height: 100%;
        min-height:150px;
        border-radius: 3px;
        position: absolute;
        background: rgba(118, 127, 140, 0.69);
        z-index: 9;
        clear: both;
    }
    .hide-saving-wrp .nsm-tab-saving-wrp {
        min-height: 0px;
        height: 0px;
        overflow: hidden;
        position: absolute;
    }
    #nsm-anim-saving,
    #nsm-anim-error {
        display: block !important;
        font-size: 15px;
        color: #fff;
        text-align: center;
        line-height: 1;
        top: 50%;
        position: relative;
        text-shadow: 1px 1px 7px #555;
    }
    #nsm-anim-error {
        display:none !important
    }
    .nsm-tab-pickcolor-wrp {
        display: block;
        width: 280px;
        height: 450px;

        border-radius: 3px;
        position: absolute;
        background: rgba(118, 127, 140, 0.69);
        z-index: 9;
        clear: both;
    }
    .hide-pick-color .nsm-tab-pickcolor-wrp {
        height: 0px;
        overflow: hidden;
        position: absolute;
    }
    .nsm-form {
        min-height: 380px;
    }
    .hide-pick-color .nsm-form {
        min-height: auto;
    }
    .nsm-tab-pickcolor-wrp * {color: #dde7e9!important; font: normal normal bold 12px/29px "Helvetica Neue",Helvetica,Arial,sans-serif!important;}
    .nsm-tab-pickcolor-wrp h3 {font-size: 16px!important;
        padding: 5px 12px 10px !important;
        margin: 0 !important;
        position: relative;
        display: block;
    }
    .nsm-tab-pickcolor-wrp #nsm-set-pickcolor-text {
        width: 221px;
        position: absolute;
        float: left;
        left: 12px;
        text-align: left;
        margin: 23px 0;
        line-height: 11px !important;
        padding: 0;
        font-size: 10px !important; }
    /* #nsm-settings .pick_color *{margin:0; padding:0;} */
    #nsm-settings .old_color,
    #nsm-settings .out_color{
        width: 110px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        text-indent: -5px;
        background-color: #FFF;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        border-radius: 3px;
        position: relative;
        top: 0px;
        left: 0%;
        float: left;
        margin: 1px 0 10px;
        text-shadow: 1px 1px 3px #000, 1px 1px 3px #000, 1px 1px 3px #000;
        text-transform: uppercase;
    }
    #nsm-settings .old_color input,
    #nsm-settings .out_color input{
        width: 95px;
        height: 30px;
        border: none;
        text-transform: uppercase;
        background: none;
        text-shadow: 1px 1px 3px #000, 0px 0px 2px #000;
        outline: none;
        letter-spacing: .5px;
    }
    #nsm-settings .pick_color_pickcolor-wrp_bg{
        position: relative;
        background: #252f3f;
        margin: 19px auto 0;
        border-radius: 4px;
        box-shadow: 0px 2px 4px #252f3f;
        width: 245px;
    }
    #nsm-settings .pick_color{
        position: relative;
        margin: 0px auto;
        -moz-user-select: none;
        -webkit-user-select: none;
        width: 220px;
        padding: 0px;
        /* padding-bottom:12px; */
    }
    #nsm-settings .pick_color_labels {
        padding:2px 0 0;
        height: 25px;
    }
    #nsm-settings .pick_color_labels span {
        display: inline-block;
        width: 105px;
        padding: 10px 0 0;
        margin: 0;
        border: 0;
        font-size: 11px !important;
           line-height: 15px !important;
    }
    #nsm_pick_color{
        background-color:red;
        height:180px;
        width:180px;
        -moz-user-select: none;
        -khtml-user-select: none;
        user-select: none;
        -webkit-user-select: none;
    }
    #nsm_pick_color img {
        width:180px;
        }
    #nsm-settings #line {
        position: absolute;
        left:200px;
        cursor: pointer;
        -moz-user-select: none;
        -khtml-user-select: none;
        user-select: none;
        -webkit-user-select: none;

    }
    #nsm-settings .right_arrow {
        width:0;
        height:0;
        left:23px;
        position:absolute;
        border-bottom:6px solid transparent;
        border-left:10px solid transparent;
        border-top:6px solid transparent;
        border-right:10px solid black;
    }
    #nsm-settings .left_arrow {
        width:0;
        height:0;
        position:absolute;
        border-bottom:6px solid transparent;
        border-left:10px solid #ffffff;
        border-top:6px solid transparent;
        border-right:8px solid transparent;
    }
    #nsm-settings #arrows {
        position:absolute;
        top:0;
        margin-top:-4px;
        left:-11px;
        width:40px;
        cursor: pointer;
        -moz-user-select: none;
        -khtml-user-select: none;
        user-select: none;
        -webkit-user-select: none;
    }
    #nsm-settings #circle {
        width:8px;
        height:8px;
        border:1px solid black;
        border-radius:50%;
        position:absolute;
        left:0;
        top:0;
        cursor: default;
        -moz-user-select: none;
        -khtml-user-select: none;
        user-select: none;
        -webkit-user-select: none;
        }
    #nsm-settings .square {
        position:absolute;
        top:30%;
        left:70%;
        height:30px;

        }
    #nsm-settings .square input {
        width:80px;
        height:25px;
        }
    #nsm-settings .cO {
        width:20px;
        height:19px;
        background-color:white;
        float:right;
        border-radius:0 10px 10px 0;
    }
    #nsm-settings #nsm-set-btn-toptype {
        width: 75px;
        min-width: 70px;
        text-align: right;
        height: 23px;
        border: none;
        box-sizing: border-box;
        border-radius: 3px;
        float: left;
        margin-right:3px;
    }
    #nsm-settings #nsm-set-btn-top {
        width: 65px;
        text-align: right;
        height: 23px;
        border: none;
        margin-right: 3px;
        box-sizing: border-box;
        border-radius: 3px;
    }
    #nsm-settings #nsm-set-btn-topmeasure {
        width: 50px;
        min-width: 30px;
        text-align: right;
        height: 23px;
        border: none;
        box-sizing: border-box;
        border-radius: 3px;
    }
</style>

</div>