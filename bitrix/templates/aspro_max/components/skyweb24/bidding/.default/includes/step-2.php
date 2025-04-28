<div class="swb-container wrapper" data-number-window="step2" <?=(!$arParams['PROCESS']) ? "style='pointer-events: none;'" : ""; ?>>
    <div class="swb-row"
    ><div class="title" data-theme="title" style="color: <?=$arParams['VIEW']["step2"]['title']['color'];?>">
            <?=GetMessage("SKWB24_BIDDING_DOWNLOAD_TITLE");?>
        </div>
    </div>
    <div class="swb-row">
        <div class="description" data-theme="description" style="color: <?=$arParams['VIEW']["step2"]['description']['color'];?>">
            <?=GetMessage("SKWB24_BIDDING_DOWNLOAD_DESCRIPTION");?>
        </div>
    </div>
    <div class="swb-row">
        <div class="product-name">
            <a href="#" target="_blank" data-theme="link" style="color: <?=$arParams['VIEW']["step2"]['link']['color'];?>">
                <?=$arResult['NAME']?>
            </a>
        </div>
    </div>
    <div class="swb-row">
        <div class="swb-col-6 swb-offset-3 swb-col-md-4 swb-offset-md-4">
            <div class="loading">
                <object data="<?=$arParams['TEMPLATE_FOLDER']?>/img/loading.svg"></object>
            </div>
        </div>
    </div>
    <div class="swb-row">
        <div class="description textLoader">
            <?=GetMessage("SKWB24_BIDDING_DOWNLOAD_TEXT_1");?>
        </div>
    </div>
</div>

<script>
    Bidding<?=$arParams['ID_PRODUCT'];?>.txtLoaderInit();
    <? if($arParams['PROCESS']) : ?>
        BiddingManager<?=$arParams['ID_PRODUCT'];?>.loader({
            price: <?=$arParams['DATA']['price'];?>,
        });
    <? endif; ?>

</script>