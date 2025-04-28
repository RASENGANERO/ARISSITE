<div class="swb-container wrapper" data-number-window="step4" <?=(!$arParams['PROCESS']) ? "style='pointer-events: none;'" : ""; ?>>
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
        <div class="title" data-theme="title" style="color: <?=$arParams['VIEW']["step4"]['title']['color'];?>">
            <?=$arParams['VIEW']["step4"]['title']['text'];?>
        </div>
    </div>
    <div class="swb-row">
        <div class="description" data-theme="description" style="color: <?=$arParams['VIEW']["step4"]['description']['color'];?>">
            <?=$arParams['VIEW']["step4"]['description']['text'];?>
        </div>
    </div>
    <div class="swb-row">
        <div class="product-name">
            <a href="#" target="_blank" data-theme="link" style="color: <?=$arParams['VIEW']["step4"]['link']['color'];?>" >
                <?=$arResult['NAME']?>
            </a>
        </div>
    </div>
    <div class="swb-row">
        <div class="swb-col-12 swb-col-md-6 swb-offset-md-3">
            <div class="approved-price">
                <div class="title"><?=GetMessage("SKWB24_BIDDING_HINT_NEW_PRICE");?></div>
                <div class="price" data-theme="price"  style="color: <?=$arParams['VIEW']["step4"]['price']['color'];?>">
                    <span>
                        <?=number_format($arResult['DATA']['PRICE'], 0, '.', ' ');?><i class="fa fa-rub" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="description color-w4-i2"><?=GetMessage("SKWB24_BIDDING_HINT_YOUR_SALE");?> - <?=$arResult['DATA']['SALE']['AMOUNT'];?> <?=CCurrency::GetBaseCurrency();?> (<?=$arResult['DATA']['SALE']['PERCENT'];?>%)</div>
            </div>
        </div>
    </div>
    <div class="swb-row">
        <? if($arResult['DATA']['TIMER'] > 0): ?>
            <div class="col swb-col-12 swb-col-md-5 swb-offset-md-2">
        <? else:?>
            <div class="col swb-col-12 swb-col-md-6 swb-offset-md-3">
        <? endif; ?>
            <div class="input-group">
                <label for="coupon"><?=GetMessage("SKWB24_BIDDING_HINT_COUPON");?></label>
                <div class="input">
                    <span type="text" class="coupon"><?=$arResult['DATA']['CODE_COUPON'];?></span>
                    <span class="btn copy"><i class="fa fa-clipboard" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <? if($arResult['DATA']['TIMER'] > 0): ?>
            <div class="col swb-col-12 col-md-padding-0 swb-col-sm-4  swb-col-md-3 ">
                <div class="swb-timer">
                    <div class="input-group">
                        <label><?=GetMessage("SKWB24_BIDDING_HINT_COUPON_ISSET_TIME");?></label>
                        <div class="countdown countdown-1"
                             data-theme="timer"
                             data-timer-index="1"
                             style="color: <?=$arParams['VIEW']["step4"]['timer']['color'];?>; background: <?=$arParams['VIEW']["step4"]['timer']['bg'];?>"
                        >
                            <div class="countdown-number">
                                <span class="hours countdown-time">23</span>
                            </div>
                            <div class="countdown-seporator">:</div>
                            <div class="countdown-number">
                                <span class="minutes countdown-time">59</span>
                            </div>
                            <div class="countdown-seporator">:</div>
                            <div class="countdown-number">
                                <span class="seconds countdown-time">59</span>
                            </div>
                            <div class="countdown-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        <? endif; ?>
    </div>
    <? if($arParams['MAIL_ACTIVE'] == "Y") : ?>
    <div class="swb-row">
        <div class="description">
            <?=GetMessage("SKWB24_BIDDING_4_STEP_DESCRIPTION_BOTTOM") . $arResult['DATA']['MAIL'];?>
        </div>
    </div>
    <? endif; ?>
</div>
<script>
    <? if($arResult['DATA']['TIMER'] > 0): ?>
        Bidding<?=$arParams['ID_PRODUCT'];?>.timerInit();
    <? endif; ?>
</script>
