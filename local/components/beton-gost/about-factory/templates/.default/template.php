<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>

<?php if ($arResult['PHOTO_RESIZE'] && !empty($arResult['TIZERS']['VALUE'])):?>
<div class="about-factory maxwidth-theme">
	<h2><?php echo !empty($arResult['TITLE']['VALUE']) ? $arResult['TITLE']['VALUE'] : $arResult['NAME'];?></h2>
	<div class="about-factory-row">
		<div class="about-factory-left">
			<?php if ($arResult['PHOTO_RESIZE']):?>
				<div class="item-shop-detail1">
				    <div class="gallery_wrap swipeignore">
				        <div class="big-gallery-block text-center">
				            <div class="owl-carousel owl-theme owl-bg-nav short-nav" data-slider="content-detail-gallery__slider" data-plugin-options='{"items": "1", "autoplay" : false, "autoplayTimeout" : "3000", "smartSpeed":1000, "dots": true, "nav": true, "loop": false, "rewind":true, "margin": 10}'>
				                <?foreach($arResult['PHOTO_RESIZE'] as $i => $arPhoto):?>
				                    <div class="item">
				                        <a href="<?=$arPhoto['ORIGINAL']?>" class="fancy" data-fancybox="item_slider" target="_blank" title="<?=$arPhoto['DESCRIPTION']?>">
				                            <div class="lazy" data-src="<?=$arPhoto['PREVIEW']['src']?>" style="background-image:url('<?=\Aspro\Functions\CAsproMax::showBlankImg($arPhoto['PREVIEW']['src']);?>')"></div>
				                        </a>
				                    </div>
				                <?endforeach;?>
				            </div>
				        </div>
				    </div>
			    </div>
			<?endif;?>
		</div>
		<div class="about-factory-right">
			<div class="about-factory-right-inner"><?$APPLICATION->ShowViewContent('about-factory-tizers');?></div>
		</div>
	</div>
</div>
<?endif;?>