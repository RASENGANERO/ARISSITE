<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
if (method_exists($this, 'setFrameMode')) {
	$this->setFrameMode(true);
	$nsmSettings=false;
}

if ($APPLICATION->GetShowIncludeAreas()) {
	//Settings
	CJSCore::Init("jquery3");
	echo "<script src=\"/bitrix/components/niges/socmenu/templates/.default/settings.js\"></script>";
	$nsmSettings=true;
}



?>


<?
if ($arResult["ITEMS"][0] || !empty($arResult["TELNO"]) ) {
	ob_start();
?>
	<style> #nsm-bar { -webkit-animation-name: nsmBtnsFadeIn; -webkit-animation-duration: 2s; animation-name: nsmBtnsFadeIn; animation-duration: 2s; }  @-webkit-keyframes nsmBtnsFadeIn { 0% {opacity: 0;} 25% {opacity: 0;} 50% {opacity:0;} 75% {opacity:0.9;} 100% {opacity:1;} }  @keyframes nsmBtnsFadeIn { 0% {opacity: 0;} 25% {opacity: 0;} 50% {opacity:0;} 75% {opacity:0.9;} 100% {opacity:1;}  } 	</style>
	<div id="nsm-position-<?=$arResult["POSITION"]?>"> 
	
		<div id="nsm-bar" class="nsm-bar nsm-bar-ajax nsm-style-<?=$arResult["SETSTYLE"]?> 
		nsm-animation-<?=$arResult["ANIMATION"]?> 
		nsm-position-<?=$arResult["POSITION"]?>  
		<?if ($arResult["HIDE_MOBILE"] == "Y") :?>nsm-hidden-mobile<? endif; ?> 
		<?if ($arResult["HIDE_PC"] == "Y") :?>nsm-hidden-pc<? endif; ?> 
			">
			<?if ($arResult["NOINDEX"] == "Y") :?><noindex><? endif; ?>
			<? foreach ($arResult["ITEMS"] as $i => $arItem) :?>
				<? if ($arItem["CSS_ICON"]) :?>
					<a	<? if ($arResult["IDYAM"] != "") :?>
						<?=(substr($arItem["CSS_ICON"], 0, 2)=='br') ? 'data-off-': '';?>onClick="ym(<?=trim($arResult["IDYAM"])?>,\'reachGoal\',\'nsm_btn_<?=$arItem["CSS_ICON"]?>\')" 
						<? endif; ?>
						<?=(substr($arItem["CSS_ICON"], 0, 2)=='br') ? 'data-off-': '';?>href="<?=$arItem["LINK"]?>"
						class="nsm-bar-btn nsm-fab nsm-fa-<?=$arItem["CSS_ICON"]?> <?=$arItem["DISPLAY"]?>" 
						<? if ($arResult["NOINDEX"] == "Y") :?>
							rel="nofollow"
						<? endif; ?>
						<? if ($arResult["TARGET"] == "Y") :?>
							target="_blank" 
						<? endif; ?>
						<? if ($arResult["ANIMATION"] == "shake") :?>
							onmouseover="shakeAnimation(this, event);" onmouseout="shakeAnimation(this, event);"
						<? endif; ?>
					></a>
				<?endif;?>
			<?endforeach;?>

			<?if ($arResult["TELNO"] != "") :?>
				<a href="<?=$arResult["TELNO"]?>" class="nsm-bar-btn nsm-fab nsm-fa-tel-<?=$arResult["TELNOICON"]?> <?if ($arResult["TELNOMOBONLY"] == "Y") :?>nsm-hidden-pc<? endif; ?> "
					<? if ($arResult["IDYAM"] != "") :?>
						onClick="ym(<?=trim($arResult["IDYAM"])?>,\'reachGoal\',\'nsm_btn_call\')" 
					<? endif; ?>					
					<? if ($arResult["NOINDEX"] == "Y") :?>
						rel="nofollow"
					<? endif; ?>
					<? if ($arResult["TARGET"] == "Y") :?>
					 	target="_blank" 
					<? endif; ?>
					<? if ($arResult["ANIMATION"] == "shake") :?>
						onmouseover="shakeAnimation(this, event);" onmouseout="shakeAnimation(this, event);"
					<? endif; ?>
					></a>
			<?endif;?>

			<?if ($arResult["NOINDEX"] == "Y") :?></noindex><?endif;?>

			<? if ($nsmSettings==true) :?>
				<? require $_SERVER['DOCUMENT_ROOT'].'/bitrix/components/niges/socmenu/templates/.default/.settingsbar.php'; ?>
			<? endif; ?>

		</div>
	</div>
	<?
	$html = preg_replace("/\s+/", " ", ob_get_contents());
	ob_end_clean();

	$APPLICATION->AddHeadString('<script type="text/javascript">
		if (window == window.top) {
			document.addEventListener("DOMContentLoaded", function() {
			    var div = document.createElement("div");
			    div.innerHTML = \''.$html.'\';
				document.body.appendChild(div);
			});
		}
	</script>');

	ob_start();

	if($arResult["TOPTYPE"] == "") $arResult["TOPTYPE"] = "top";
	if($arResult["TOPMEASURE"] == "") $arResult["TOPMEASURE"] = "%";

	?>
	<style>
	.nsm-bar{
		<?=$arResult["TOPTYPE"]?>: <?=$arResult["TOP"]?><?=$arResult["TOPMEASURE"]?>;
		z-index: <?=$arResult["ZINDEX"]?>;
		margin: 0 <?=$arResult["MARGIN"]?>px;
		<?if ($arResult["FIXED"] == "Y") :?>
		position: fixed;
		<?else :?>
		position: absolute;
		<?endif;?>
	}
	.nsm-bar a,
	.nsm-bar a:visited,
	.nsm-bar a:active {
		display: block;
		box-sizing: content-box;
		text-align: center;
		text-decoration: none !important;
		font-weight: normal !important;
		background: <?=$arResult["BTNBG"]?> !important;
		color: <?=$arResult["BTNCOLOR"]?> !important;
		width: <?=$arResult["SIZE"]?>px;
		height: <?=$arResult["SIZE"]?>px;
		line-height: <?=$arResult["SIZE"]?>px;
		font-size: <?=$arResult["FONT"]?>px;
		border-radius: <?=$arResult["RADIUS"]?>px;
		border:<?=$arResult["BTNBORDER"]?>px solid <?=$arResult["BTNBORDERCOLOR"]?>;
		margin-left: <?=$arResult["HMARGIN"]?>px;
		margin-right: <?=$arResult["HMARGIN"]?>px;
		margin-top: <?=$arResult["VMARGIN"]?>px;
		margin-bottom: <?=$arResult["VMARGIN"]?>px;
		opacity: <?=$arResult["BTNOPACITY"]/100?>;
		<?if ($arResult["BTNSHADOW"] == "Y") :?>
		box-shadow: <?=$arResult["BTNSHADOWHOFFSET"]?>px <?=$arResult["BTNSHADOWVOFFSET"]?>px <?=$arResult["BTNSHADOWSIZE"]?>px <?=$arResult["BTNSHADOWCOLOR"]?>;
		<?endif;?>
		<?if ($arResult["BTNTRANSITION"] != "none") :?>
		transition: all <?=$arResult["BTNTRANSITION_TIME"]?>ms <?=$arResult["BTNTRANSITION"]?>;
		<?endif;?>
	}
	.nsm-bar a:hover,
	.nsm-bar a:focus{
		text-decoration: none !important;
		background: <?=$arResult["BTNBG_HOVER"]?> !important;
		color: <?=$arResult["BTNCOLOR_HOVER"]?> !important;
		border-color: <?=$arResult["BTNBORDERCOLOR_HOVER"]?> !important;
		opacity: <?=$arResult["BTNOPACITY_HOVER"]/100?>;
		<?if ($arResult["BTNSHADOW"] == "Y") :?>
		box-shadow: <?=$arResult["BTNSHADOWHOFFSET_HOVER"]?>px <?=$arResult["BTNSHADOWVOFFSET_HOVER"]?>px <?=$arResult["BTNSHADOWSIZE_HOVER"]?>px <?=$arResult["BTNSHADOWCOLOR_HOVER"]?>;
		<?endif;?>
	}
	@media screen and (min-width:767.01px) {
		.nsm-bar-btn.mob {display:none !important}
	}	
	@media screen and (max-width:767px) {
		.nsm-bar{
			<?if ($arResult["TOPTYPE_MOBILE"] != "" && $arResult["TOP_MOBILE"] != "") :?>
				top:unset; bottom:unset;
			<?=$arResult["TOPTYPE_MOBILE"]?>: <?=$arResult["TOP_MOBILE"]?><?=$arResult["TOPMEASURE_MOBILE"]?>;
			<?endif;?>
		}
		.nsm-bar a,
		.nsm-bar a:visited,
		.nsm-bar a:active {	
			width: <?=$arResult["SIZE_MOBILE"]?>px ;
			height: <?=$arResult["SIZE_MOBILE"]?>px ;
			line-height: <?=$arResult["SIZE_MOBILE"]?>px ;
			font-size: <?=$arResult["FONT_MOBILE"]?>px ;
			border-radius: <?=$arResult["RADIUS_MOBILE"]?>px ;

			<?if ($arResult["HMARGIN_MOBILE"] != "") :?>
			margin-left: <?=$arResult["HMARGIN_MOBILE"]?>px;
			margin-right: <?=$arResult["HMARGIN_MOBILE"]?>px;
			<?endif;?>
			<?if ($arResult["VMARGIN_MOBILE"] != "") :?>
			margin-top: <?=$arResult["VMARGIN_MOBILE"]?>px;
			margin-bottom: <?=$arResult["VMARGIN_MOBILE"]?>px;
			<?endif;?>
		}
		.nsm-bar-btn.pc {display:none !important}
	}
	</style>
	<span id="nsm-new-styles"></span>
	<span id="fit_new_css"></span>

	<?
	$css = preg_replace("/\s+/", " ", ob_get_contents());
	ob_end_clean();

	$APPLICATION->AddHeadString($css);
}
?>