<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>
<?if($arResult["ITEMS"]){?>
    <div class="swipeignore" style="max-width: 100%; position: relative;">
        <div class="owl-carousel owl-theme owl-bg-nav sertificate-slider" data-plugin-options='{"dots": true, "nav": true, "loop": false, "rewind":true, "index": true, "margin": 10, "responsive": {"0":{"items": 1, "autoWidth": false, "nav": false, "margin": 0},"601":{"items": 1, "autoWidth": false},"768":{"items": 2},"992":{"items": 3}, "1200":{"items":3}}}'>
            <?foreach ($arResult["ITEMS"] as $arItem){?>
                <?
                if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])){?>
                    <div class="item">
                        <a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" data-fancybox="gallery" class="fancy">
                            <?
							$ar2Resize = array('width' => 350, 'height' => 350);
                            $imgResize = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], $ar2Resize);
							if($picture = CMskBeton_Tools::GetWebPPictureFull($arItem["PREVIEW_PICTURE"], true)) {
								$imgResize = CFile::ResizeImageGet($picture["tmp_arr_SRC"], $ar2Resize);
							} else {
								$picture = $arItem["PREVIEW_PICTURE"];
							}
                            ?>
                            <img class="lazy sertificate-slide" data-replace="<?=$picture["SRC"];?>" src="<?=$imgResize["src"];?>" srcset="<?=$imgResize["src"];?>"  />
                        </a>
                        <p><?=$arItem["NAME"]?></p>
                    </div>
                <?}
                ?>
            <?}?>
        </div>
    </div>
<?}?>