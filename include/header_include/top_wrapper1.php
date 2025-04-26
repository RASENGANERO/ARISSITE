<?global $APPLICATION, $arRegion, $arSite, $arTheme, $bIndexBot;?>

<?CMax::ShowPageType('mega_menu');?>

<?CMax::get_banners_position('TOP_HEADER');?>

<div class="header_wrap visible-lg visible-md title-v<?=$arTheme["PAGE_TITLE"]["VALUE"];?><?=($isIndex ? ' index' : '')?> <?$APPLICATION->AddBufferContent(array('CMax', 'getBannerClass'))?>">
	<header id="header">
		<?CMax::ShowPageType('header');?>
	</header>
</div>
<?CMax::get_banners_position('TOP_UNDERHEADER');?>

<?if($arTheme["TOP_MENU_FIXED"]["VALUE"] == 'Y'):?>
	<div id="headerfixed">
		<?CMax::ShowPageType('header_fixed');?>
	</div>
<?endif;?>

<div id="mobileheader" class="visible-xs visible-sm">
	<?CMax::ShowPageType('header_mobile');?>
	<div id="mobilemenu" class="<?=($arTheme["HEADER_MOBILE_MENU_OPEN"]["VALUE"] == '1' ? 'leftside':'dropdown')?>">
		<?CMax::ShowPageType('header_mobile_menu');?>
	</div>
	<script>
		try {
			fetch('/ajax/getMobileMenu.php')
			.then((response) => {
			   return response.text();
			})
			.then((data) => {
				if (Object.keys(data).length) {
					$('#header_mobile_menu_container').html(data);
				}
			});
		} catch (e) {
			console.log(e.message);
		}
	</script>
</div>

<div id="mobilefilter" class="scrollbar-filter"></div>

<?$APPLICATION->ShowViewContent('section_bnr_top_content');?>

<?include_once('top_wrapper1_custom.php');?>