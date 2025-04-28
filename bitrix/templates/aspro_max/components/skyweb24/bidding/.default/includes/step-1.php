<div class="swb-container wrapper"
     style="<?=(!$arParams['PROCESS']) ? "pointer-events: none;" : ""; ?>"
     data-number-window="step1">
    <form action="/" method="POST" onsubmit="return false;">
        <div class="breadcrumb">
            <div class="breadcrumb__wrapper">
                <span class="<?=($arParams['STEP'] == 1) ? "active" : "" ;?>"><?=GetMessage("SKWB24_BIDDING_BREADCRUMBS_STEP_1");?></span>
                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                <span class="<?=($arParams['STEP'] == 3) ? "active" : "" ;?>"><?=GetMessage("SKWB24_BIDDING_BREADCRUMBS_STEP_3");?></span>
                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                <span class="<?=($arParams['STEP'] == 4) ? "active" : "" ;?>"><?=GetMessage("SKWB24_BIDDING_BREADCRUMBS_STEP_4");?></span>
            </div>
        </div>

        <div class="swb-row">
            <div class="title" data-theme="title" style="color: <?=$arParams['VIEW']["step1"]['title']['color'];?>">
                <?=$arParams['VIEW']["step1"]['title']['text'];?>
            </div>
        </div>
        <div class="swb-row">
            <div class="description" data-theme="description" style="color: <?=$arParams['VIEW']["step1"]['description']['color'];?>">
                <?=$arParams['VIEW']["step1"]['description']['text'];?>
            </div>
        </div>
        <div class="swb-row">
            <div class="product-name">
                <a href="#" target="_blank" data-theme="link"  style="color: <?=$arParams['VIEW']["step1"]['link']['color'];?>">
                    <?=$arResult['NAME']?>
                </a>
            </div>
        </div>
        <div class="swb-row price-wrapper">
            <div class="col swb-col-6 swb-col-sm-4 swb-offset-sm-1">
                <div class="price old">
                    <div class="value price"><span>
					<?=number_format($arResult['DATA']['MAX'], 0, '.', ' ');?>
					</span> &#8381;</div>
                    <div class="val-desc"><?=GetMessage("SKWB24_BIDDING_HINT_PRICE");?></div>
                </div>
            </div>
            <div class="col swb-col-6 swb-col-sm-4 swb-offset-sm-2">
                <div class="price new">
                    <div class="value">
                        <input type="number" autocomplete="off" id="price" name="price" value="<?=($arResult['DATA']['MAX']-1)?>" data-theme="price" style="color: <?=$arParams['VIEW']["step1"]['price']['color'];?>;">
                        <div class="alert error"><?=GetMessage("SKWB24_BIDDING_HINT_ERROR_VALUE_MIN");?></div>
                        <div class="alert hint">
                            <?=GetMessage("SKWB24_BIDDING_HINT_ENTER_YOUR_PRICE");?>
                        </div>
                    </div>
                    <div class="val-desc"><?=GetMessage("SKWB24_BIDDING_HINT_YOUR_PRICE");?></div>
                </div>
            </div>
        </div>
        <div class="swb-row">
            <div class="swb-col-12">
                <div class="indicator">
                    <div class="svg-indicator" id="arc_multi"></div>
                    <div class="text"><?=GetMessage("SKWB24_BIDDING_HINT_PROBABILITY_SUCCESS");?></div>
                </div>
            </div>
        </div>
        <div class="swb-row">
            <div class="swb-col-12">
                <div class="btn-group">
                    <button
                        class="send request"
                        data-theme="button"
                        style="background: <?=$arParams['VIEW']["step1"]['button']['bg'];?>; color: <?=$arParams['VIEW']["step1"]['button']['color'];?>;">
                        <?=$arParams['VIEW']["step1"]['button']['text'];?>
                    </button>
                </div>
            </div>
        </div>
		<?if($arResult['DATA']['COUNT_USE']>0){?>
        <div class="swb-row">
            <div class="swb-col-12">
                <div class="description"><?=GetMessage("SKWB24_BIDDING_DESCRIPTION_BOTTOM_USE_COUNT");?> <?=$arResult['DATA']['COUNT_USE'];?> <?=GetMessage("SKWB24_BIDDING_HUMAN");?></div>
            </div>
        </div>
		<?}?>
    </form>
</div>


<script>
    BX.ready(function() {

        Bidding<?=$arParams['ID_PRODUCT'];?>.indicatorInit("#arc_multi", 78);
        Bidding<?=$arParams['ID_PRODUCT'];?>.alertPriceAdd("hint", 1500);

        <? if($arParams['PROCESS']) : ?>
            BX.bindDelegate(BX("bidding<?=$arParams['ID_PRODUCT'];?>"), "submit", "form", function(){
                if(BX("bidding<?=$arParams['ID_PRODUCT'];?>").querySelector("[data-number-window='step1']"))
                {
                    BiddingManager<?=$arParams['ID_PRODUCT'];?>.windowNext(2, this, {
                        price: BX("price").value
                    });
                }

            })
        <? endif; ?>

    })



</script>