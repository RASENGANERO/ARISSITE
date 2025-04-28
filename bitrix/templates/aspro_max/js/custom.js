/*
You can use this file with your scripts.
It will not be overwritten when you upgrade solution.
*/

//window.onerror = function (msg, url, line, col, exception) { BX.ajax.get('/ajax/error_log_logic.php', { data: { msg: msg, exception: exception, url: url, line: line, col: col } }); }

$(document).ready(function(){
	$(document).on('click', '.mobile_regions .city_item', function(e){
		e.preventDefault();
		var _this = $(this);
		$.removeCookie('current_region');
		$.cookie('current_region', _this.data('id'), {path: '/',domain: 'next.aspro-partner.ru'});
	});

	$(document).on('click', '.region_wrapper .more_item:not(.current) span', function(e){
		$.removeCookie('current_region');
		$.cookie('current_region', $(this).data('region_id'), {path: '/',domain: 'next.aspro-partner.ru'});
	});

	$(document).on('click', '.confirm_region .aprove', function(e){
		var _this = $(this);
		$.removeCookie('current_region');
		$.cookie('current_region', _this.data('id'), {path: '/',domain: 'next.aspro-partner.ru'});
	});

	$(document).on('click', '.cities .item a', function(e){
    	e.preventDefault();
    	var _this = $(this);
    	$.removeCookie('current_region');
		$.cookie('current_region', _this.data('id'), {path: '/',domain: 'next.aspro-partner.ru'});
    });

    $(document).on('click', '.popup_regions .ui-menu a', function(e){
    	e.preventDefault();
    	var _this = $(this);
    	var href = _this.attr('href')
    	if(typeof arRegions !== 'undefined' && arRegions.length){
	    	$.removeCookie('current_region');
	    	for(i in arRegions){
	    		var region = arRegions[i];
	    		if(region.HREF == href){
					$.cookie('current_region', region.ID, {path: '/',domain: 'next.aspro-partner.ru'});
	    		}
	    	}
    	}
		location.href = href;
    });

    var phoneSaveTmp;
    $(".custom-banner .banner-form__button").on("click", function(){
        phoneSaveTmp = $(".custom-banner #phone").val();
	});

    $("body").on("click", ".btnSuccess", function(){
    	$(".countdown").css("display","none");
    	$(".callErrorText").css("display", "none");
    	$(".btn-result-call").css("display", "none");
    	$(".br_form_default").css("display", "block")
		// console.log("btnSuccess");
	});
    $("body").on("click", "#showTextErrorCall", function(){
        $(".callErrorText").show();
    });
    $("body").on("click", "#re-call", function(){
        if(phoneSaveTmp){
            $(".custom-banner #phone").val(phoneSaveTmp);
            $(".custom-banner .banner-form__button").trigger("click");
		}
    });



    $(".show_price_list").on("click", function(){
        $(".price_index").toggle();
    });

    if($("body .iv-i").length > 0){
        videoWidth = $("body .iv-i").width();
        videoHeight = videoWidth / 1.78;
        $("body .iv-i").css("height", videoHeight);
    }

    if ($(window).width() < 1278) {
        $('.page-menu-list-header').click(function() {
            var pageMenuList = $('.page-menu-list');
            var pageMenuListHeaderIcon = $('.page-menu-list-header-icon');
            if (pageMenuList.css('display') == 'none') {
                pageMenuList.slideDown(200);
                pageMenuListHeaderIcon.removeClass('down').addClass('top');
            } else {
                pageMenuList.slideUp(200);
                pageMenuListHeaderIcon.removeClass('up').addClass('down');
            }
        });
    }

   if($(".call-content > .phone-block").length == 1){
        let _mail = $(".call-content > .phone-block").attr("data-mail");
		if(_mail) {
			$("<br /><a class='a-mail' href='mailto:" + _mail + "'>" + _mail + "</a>").insertBefore($('.call-content .dropdown'));
		}
    }

    $('.page-seo-menu-link').click(function(event) {
        event.preventDefault();
        var link = $(this);
        var dataB = link.attr('data-box-id');
        var target = $(`[data-tid='${dataB}']`).last();

        var offsetTop = $('#headerfixed').outerHeight() + $('.product-item-detail-tabs-container-fixed.fixed').outerHeight() + 50;

        if ($(window).width() < 1278) {
            offsetTop += $('.page-menu-list-wrapper').outerHeight();
        }

        if ($(window).width() < 991) {
            offsetTop += - 50;
        }

        if (target.length) {
            var tabLink = target.find('[data-toggle="tab"]').first();
            if (link.closest('.page-sub-menu-list').length) {
                $('[data-box-id="b1"]').click();
            }
            if (tabLink.length) {
                tabLink.click();
            }
            if ($(window).width() < 1278) {
                $('.page-menu-list-header').click();
            }
            $('html, body').animate({
                scrollTop: target.offset().top - offsetTop
            }, 500);
        }
    });
});




$("body").on("click", ".city_item", function (e) {
    e.preventDefault();
    var _this = $(this);
    $.removeCookie("current_region");
    $.cookie("current_region", _this.data("id"), { path: "/", domain: arAsproOptions["SITE_ADDRESS"] });
    location.href = _this.attr("href");
});