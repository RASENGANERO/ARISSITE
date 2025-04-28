						<?CMax::checkRestartBuffer();?>
						<?IncludeTemplateLangFile(__FILE__);?>
							<?if(!$isIndex):?>
								<?if($isHideLeftBlock && !$isWidePage):?>
									</div> <?// .maxwidth-theme?>
								<?endif;?>
								</div> <?// .container?>
							<?else:?>
								<?CMax::ShowPageType('indexblocks');?>
							<?endif;?>
							<?CMax::get_banners_position('CONTENT_BOTTOM');?>
						</div> <?// .middle?>
					<?//if(($isIndex && $isShowIndexLeftBlock) || (!$isIndex && !$isHideLeftBlock) && !$isBlog):?>
					<?if(($isIndex && ($isShowIndexLeftBlock || $bActiveTheme)) || (!$isIndex && !$isHideLeftBlock)):?>
						</div> <?// .right_block?>
						<?if($APPLICATION->GetProperty("HIDE_LEFT_BLOCK") != "Y" && !defined("ERROR_404")):?>
							<?CMax::ShowPageType('left_block');?>
						<?endif;?>
					<?endif;?>
					</div> <?// .container_inner?>
				<?if($isIndex):?>
					</div>
				<?elseif(!$isWidePage):?>
					</div> <?// .wrapper_inner?>
				<?endif;?>
			</div> <?// #content?>
			<?CMax::get_banners_position('FOOTER');?>
		</div><?// .wrapper?>

		<?php if (!$APPLICATION->GetPageProperty("CATALOG_ELEMENT_PAGE")): ?>
		<script>
			try {
				fetch('/ajax/getMegaMenu.php')
				.then((response) => {
				   return response.text();
				})
				.then((data) => {
					if (Object.keys(data).length) {
						$('#menu_in_burger_container').html(data);
					}
				});
			} catch (e) {
				console.log(e.message);
			}

			try {
				fetch('/ajax/getFixedMenu.php')
				.then((response) => {
				   return response.text();
				})
				.then((data) => {
					if (Object.keys(data).length) {
						$('#header_fixed_menu_container').html(data);
					}
				});
			} catch (e) {
				console.log(e.message);
			}
		</script>
		<?php endif;?>

		<footer itemscope itemtype="http://schema.org/WPFooter" id="footer">
			<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/footer_include/under_footer.php'));?>
			<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/footer_include/top_footer.php'));?>
			<meta itemprop="copyrightYear" content="2016">
			<meta itemprop="copyrightHolder" content="Бетонный завод «#SELECT_3#» – производство бетона в #REGION_NAME_DECLINE_PP#">
		</footer>
			<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/footer_include/bottom_footer.php'));?>


<script type="text/javascript">
window.addEventListener('onBitrixLiveChat', function(event)
{
	var widget = event.detail.widget;

	// Обработка событий 
	widget.subscribe({
		type: BX.LiveChatWidget.SubscriptionType.userMessage,
		callback: function(data) {
      
		// любая команда
      
		if (typeof(dataLayer) == 'undefined')
			{
			  dataLayer = [];
			}
			dataLayer.push({'event': 'startchatIDEA'});
		}
	});
});
 </script>
<!--
<script type="text/javascript">
var ZCallbackWidgetLinkId  = 'daf2cf50cbbcfd283ae8f2bf9871747d';
var ZCallbackWidgetDomain  = 'my.zadarma.com';
(function(){
    var lt = document.createElement('script');
    lt.type ='text/javascript';
    lt.charset = 'utf-8';
    lt.async = true;
    lt.src = 'https://' + ZCallbackWidgetDomain + '/callbackWidget/js/main.min.js';
    var sc = document.getElementsByTagName('script')[0];
    if (sc) sc.parentNode.insertBefore(lt, sc);
    else document.documentElement.firstChild.appendChild(lt);
})();
</script>
-->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LDHV8SEL5L"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LDHV8SEL5L');
</script>

<?
if($_REQUEST['DEV']=='Y')
{
	echo "<pre>";
	print_r($arRegion);
	echo "</pre>";
	$postCode=isset($arRegion["PROPERTY_ADDRESS_VALUE"]["TEXT"]) && strlen($arRegion["PROPERTY_ADDRESS_VALUE"]["TEXT"])>0?intval(explode(",", $arRegion["PROPERTY_ADDRESS_VALUE"]["TEXT"])[0]):false;
$postCode=$postCode??"143041";
	echo "<pre>";
	var_dump($postCode);
	echo "</pre>";
}
$phones=["+7 (495) 777-40-36"];
if(isset($arRegion["PHONES"]))
{
	$temp=[];
	foreach ($arRegion["PHONES"] as $phone) {
		$temp[]=$phone["PHONE"];
	}
	if(count($temp)>0)
	{
		$phones=$temp;
	}
}
$postCode=isset($arRegion["PROPERTY_ADDRESS_VALUE"]["TEXT"]) && strlen($arRegion["PROPERTY_ADDRESS_VALUE"]["TEXT"])>0?intval(explode(",", $arRegion["PROPERTY_ADDRESS_VALUE"]["TEXT"])[0]):false;
$postCode=$postCode??"143041";


$APPLICATION->IncludeComponent(
	"beton-gost:schema.org.OrganizationAndPlace", 
	".default", 
	array(
		"ADDRESS" => $arRegion["PROPERTY_ADDRESS_VALUE"]["TEXT"],
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COUNTRY" => "",
		"DESCRIPTION" => "",
		"EMAIL" => array(
			0 => $arRegion["PROPERTY_EMAIL_VALUE"][0],
			1 => "",
		),
		"FAX" => "",
		"URL" => "https://".$arRegion["PROPERTY_MAIN_DOMAIN_VALUE"],
		"ITEMPROP" => "",
		"LATITUDE" => "",
		"LOCALITY" => $arRegion["PROPERTY_REGION_NAME_DECLINE_RP_VALUE"],
		"LOGO" => "https://".$arRegion["PROPERTY_MAIN_DOMAIN_VALUE"]."/images/logo_new.svg",
		"LOGO_URL" => "https://".$arRegion["PROPERTY_MAIN_DOMAIN_VALUE"]."/images/logo_new.svg",
		"LOGO_CAPTION" => (strlen($arRegion["PROPERTY_REGION_TAG_ITEMPROP_NAME_VALUE"])>0?$arRegion["PROPERTY_REGION_TAG_ITEMPROP_NAME_VALUE"]:"АРИС"),
		"LOGO_DESCRIPTION" => "Бетонный завод \"АРИС\" в ".$arRegion["PROPERTY_REGION_NAME_DECLINE_PP_VALUE"],
		"LOGO_HEIGHT" => "200",
		"LOGO_NAME" => "",
		"LOGO_TRUMBNAIL_CONTENTURL" => "https://".$arRegion["PROPERTY_MAIN_DOMAIN_VALUE"]."/images/logo_new.svg",
		"LOGO_WIDTH" => "",
		"LONGITUDE" => "",
		"NAME" => (strlen($arRegion["PROPERTY_REGION_TAG_ITEMPROP_NAME_VALUE"])>0?$arRegion["PROPERTY_REGION_TAG_ITEMPROP_NAME_VALUE"]:"АРИС"),
		"OPENING_HOURS_HUMAN" => array(
			0 => "Время работы: круглосуточно, без выходных",
		),
		"OPENING_HOURS_ROBOT" => array(
			0 => "Mo-Su",
		),
		"PARAM_RATING_SHOW" => "N",
		"PHONE" => $phones,
		"PHOTO_CAPTION" => "",
		"PHOTO_DESCRIPTION" => "",
		"PHOTO_HEIGHT" => "",
		"PHOTO_NAME" => "",
		"PHOTO_SRC" => array(
		),
		"PHOTO_TRUMBNAIL_CONTENTURL" => "",
		"PHOTO_WIDTH" => "",
		"POST_CODE" => $postCode,
		"REGION" => "#REGION_NAME#",
		"SHOW" => "Y",
		"SITE" => $arRegion["PROPERTY_MAIN_DOMAIN_VALUE"],
		"TAXID" => "9731131044",
		"TYPE" => "Organization",
		"TYPE_2" => "LocalBusiness",
		"TYPE_3" => "",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>

<!-- Novofon -->
    <script type="text/javascript" async src="https://widget.novofon.ru/novofon.js?k=XFNl_WrAGPgResUGdbYOl5k1PfhmCaGi"></script>
<!-- Novofon -->

<?/*
 	Задарма виджет 
	<div id="zadarmaScripts"></div>
	<script src="/path_to_zadarma_callmewidget/detectWebRTC.min.js"></script>
	<script src="/path_to_zadarma_callmewidget/jssip.min.js"></script>
	<script src="/path_to_zadarma_callmewidget/widget.min.js"></script>
	<link rel="stylesheet" href="/path_to_zadarma_callmewidget/style.min.css" />
-->
<!-- 
	Задарма виджет */?>
<script src="<?php echo SITE_TEMPLATE_PATH;?>/custom.js"></script> 

<?if(strpos($APPLICATION->GetCurPageParam(),"PAGEN"))
{?>
   <?
   $APPLICATION->AddHeadString('<link rel="canonical" href="' . str_replace('index.php', '', $APPLICATION->GetCurPage(true)) . '" />');
   ?>
<?}

global $arTheme;
use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.fancybox.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/vendor/js/carousel/owl/owl.carousel.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.inputmask.bundle.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/scrollTabs.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.mCustomScrollbar.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.dotdotdot.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.ikSelect.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/equalize.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jqModal.js");

Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/banners.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/menu.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/catalog.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/jquery.fancybox.min.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/vendor/css/carousel/owl/owl.carousel.min.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/vendor/css/carousel/owl/owl.theme.default.min.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/jquery.mCustomScrollbar.min.css" );
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/left_block_main_page.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/buy_services.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/vendor/css/footable.standalone.min.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/styles.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/template_styles.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/header.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/media.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/themes/custom_".SITE_ID."/theme.css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/widths/width-".intval($arTheme['PAGE_WIDTH']['VALUE']).".css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/fonts/font-".intval($arTheme['FONT_STYLE']['VALUE']).".css");
Asset::getInstance()->addCSS(SITE_TEMPLATE_PATH."/css/custom.css");
?>

</body>
</html>