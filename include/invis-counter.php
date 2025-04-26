<!-- Yandex.Metrika counter -->
<script>
    var yaParams = {ip: "<? echo $_SERVER['REMOTE_ADDR']; ?>"};
</script>
<!-- Yandex.Metrika counter -->
<script >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    ym(#REGION_TAG_METRICA#, "init", {
        params:window.yaParams,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        trackHash:true,
        ecommerce:"dataLayer",
        webvisor:true,
        accurateTrackBounce:true,
    });

    <?
    global $arRegion;
    if(!empty($arRegion) && $arRegion["PROPERTY_MAIN_DOMAIN_VALUE"] != "beton-gost.ru"){
    ?>
    ym(57527053, "init", {/*основной счетчик */
        params:window.yaParams,
        clickmap:true,
        trackLinks:true,
    });
    <?}?>
</script>
<noscript><div>
        <img data-lazyload class="lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://mc.yandex.ru/watch/#REGION_TAG_METRICA#" style="position:absolute; left:-9999px;" alt="" />
        <?
        if(!empty($arRegion) && $arRegion["PROPERTY_MAIN_DOMAIN_VALUE"] != "beton-gost.ru"){
        ?> <img data-lazyload class="lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://mc.yandex.ru/watch/57527053" style="position:absolute; left:-9999px;" alt="" /> <?}?></div></noscript>
<!-- /Yandex.Metrika counter -->