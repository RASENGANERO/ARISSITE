<div class="skyweb24biddingButton biddingOptions <?=($arParams["ONLY_BUTTON"] == 1) ? "preview" : ""; ?>"
     style="<?=(!$arParams['PROCESS']) ? "pointer-events: none; " : "display: none"; ?>;">
    <div data-number-window="button">
        <a href="javascript:void(0);" data-theme="title" style="color: <?=$arParams['VIEW']['button']['title']['color'];?>; background: <?=$arParams['VIEW']['button']['title']['bg'];?>">
            <?=$arParams['VIEW']['button']['title']['text'];?>
        </a>
        <script>
            BX.ready(function() {
                let sw24BiddingButtons = document.querySelectorAll(".skyweb24biddingButton");
                for (let i = 0; i < sw24BiddingButtons.length; i++) {
                    BX.bindDelegate(document.querySelector("body"), "click", {
                        "className": "skyweb24biddingButton"
                    }, function(){
                        BiddingManager<?=$arParams["ID_PRODUCT"];?>.popup.show();
                        return false;
                    })
                }
            })
        </script>
    </div>
</div>
