<div class="swb-container wrapper" data-number-window="step3" <?=(!$arParams['PROCESS']) ? "style='pointer-events: none;'" : ""; ?>>
    <form action="/test4.php" method="POST" onsubmit="return false;">
        <div class="breadcrumb">
            <div class="breadcrumb__wrapper">
                <span class="<?=($arParams['STEP'] == 1) ? "active" : "" ;?>"><?=GetMessage("SKWB24_BIDDING_BREADCRUMBS_STEP_1");?></span>
                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                <span class="<?=($arParams['STEP'] == 3) ? "active" : "" ;?>"><?=GetMessage("SKWB24_BIDDING_BREADCRUMBS_STEP_3");?></span>
                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                <span class="<?=($arParams['STEP'] == 4) ? "active" : "" ;?>"><?=GetMessage("SKWB24_BIDDING_BREADCRUMBS_STEP_4");?></span>
            </div>
        </div>
        <div data-tab="0" class="tab" >
            <div class="swb-row">
                <div class="title" data-theme="title" style="color: <?=$arParams['VIEW']["step3"]['title']['color'];?>">
                    <?=$arParams['VIEW']["step3"]['title']['text'];?>
                </div>
            </div>
            <div class="swb-row">
                <div class="description" data-theme="description" style="color: <?=$arParams['VIEW']["step3"]['description']['color'];?>">
                    <?=$arParams['VIEW']["step3"]['description']['text'];?>
                </div>
            </div>
        </div>
        <div data-tab="1" class="tab" style="display:none;">
            <div class="swb-row">
                <div class="title" data-theme="title2" style="color: <?=$arParams['VIEW']["step3"]['title2']['color'];?>">
                    <?=$arParams['VIEW']["step3"]['title2']['text'];?>
                </div>
            </div>
            <div class="swb-row">
                <div class="description" data-theme="description2" style="color: <?=$arParams['VIEW']["step3"]['description2']['color'];?>">
                    <?=$arParams['VIEW']["step3"]['description2']['text'];?>
                </div>
            </div>
        </div>

        <div class="swb-row">
            <div class="product-name">
                <a href="#" target="_blank" data-theme="link" style="color: <?=$arParams['VIEW']["step3"]['link']['color'];?>">
                    <?=$arResult['NAME']?>
                </a>
            </div>
        </div>
        <div class="swb-row">
            <div class="swb-col-12 swb-col-md-6 swb-offset-md-3">
                <div class="approved-price">
                    <div class="title"><?=GetMessage("SKWB24_BIDDING_HINT_NEW_PRICE");?></div>
                    <div class="price" data-theme="price" style="color: <?=$arParams['VIEW']["step3"]['price']['color'];?>">
                        <span>
                            <?=number_format($arResult['DATA']['PRICE'], 0, '.', ' ');?><i class="fa fa-rub" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="description color-w3-i2"><?=GetMessage("SKWB24_BIDDING_HINT_YOUR_SALE");?> - <?=$arResult['DATA']['SALE']['AMOUNT'];?> <?=CCurrency::GetBaseCurrency();?> (<?=$arResult['DATA']['SALE']['PERCENT'];?>%)</div>
                </div>
            </div>
        </div>
        <div class="swb-row">
            <? if($arResult['DATA']['TIMER'] > 0): ?>
                <div class="col swb-col-12 swb-col-md-3 swb-offset-md-1">
            <? else: ?>
                <div class="col swb-col-12 swb-col-md-5 swb-offset-md-1">
            <? endif; ?>

                <div class="input-group">
                    <label for="name"><?=GetMessage("SKWB24_BIDDING_HINT_YOUR_NAME");?></label>
                    <div class="input">
                        <input type="text"
                               <?=($arParams['PROCESS'] == 1) ? "required" : "";?>
                               name="name"
                               id="name"
                               value="<?=$arResult['DATA']['USER_NAME'];?>"
                               placeholder="<?=GetMessage("SKWB24_BIDDING_PLACEHOLDER_EMAIL_AND_NAME");?>">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <? if($arResult['DATA']['TIMER'] > 0): ?>
               <div class="col col-md-padding-0 swb-col-12 swb-col-md-4">
            <? else: ?>
               <div class="col col-md-padding-0 swb-col-12 swb-col-md-5">
            <? endif; ?>
                <div class="input-group">
                    <label for="email"><?=GetMessage("SKWB24_BIDDING_HINT_EMAIL");?></label>
                    <div class="input">
                        <input type="text"
                               <?=($arParams['PROCESS'] == 1) ? "required" : "";?>
                               name="email"
                               id="email",
                               value="<?=$arResult['DATA']['USER_EMAIL'];?>"
                               placeholder="<?=GetMessage("SKWB24_BIDDING_PLACEHOLDER_EMAIL_AND_NAME");?>">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <? if($arResult['DATA']['TIMER'] > 0): ?>
                <div class="col swb-col-12 swb-col-sm-4 swb-col-md-3 ">
                    <div class="swb-timer">
                        <div class="input-group">
                            <label><?=GetMessage("SKWB24_BIDDING_HINT_COUPON_ISSET_TIME");?></label>
                            <div class="countdown countdown-0"
                                 data-theme="timer"
                                 data-timer-index="0"
                                 style="color: <?=$arParams['VIEW']["step3"]['timer']['color'];?>; background: <?=$arParams['VIEW']["step3"]['timer']['bg'];?>">
                                <div class="countdown-number" >
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
        <div class="swb-row">
            <div class="swb-col-12">
                <div class="btn-group">
                    <button
                            class="send"
                            data-theme="button"
                            style="color: <?=$arParams['VIEW']["step3"]['button']['color'];?>; background: <?=$arParams['VIEW']["step3"]['button']['bg'];?>">
                        <?=$arParams['VIEW']["step3"]['button']['text'];?>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>

    <? if($arResult['DATA']['TIMER'] > 0): ?>
        Bidding<?=$arParams['ID_PRODUCT'];?>.timerInit(<?=$arResult['DATA']['TIMER'];?>);
    <? endif; ?>

    <? if($arParams['PROCESS']) : ?>
    BX("bidding<?=$arParams['ID_PRODUCT'];?>").querySelector("form").addEventListener("submit", function (e) {
        Bidding<?=$arParams['ID_PRODUCT'];?>.buttonSendDisabled();
        BiddingManager<?=$arParams['ID_PRODUCT'];?>.windowNext(4, this, {
            price: <?=$arResult['DATA']['PRICE'];?>,
            urlProduct: '',
            sale: {
                percent: "<?=$arResult['DATA']['SALE']['PERCENT'];?>",
                amount: "<?=$arResult['DATA']['SALE']['AMOUNT'];?>"
            },
        });
    })
    <? endif; ?>
</script>