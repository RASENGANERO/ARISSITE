/* NIGES.SOCMENU / SOCIAL NETWORKS and MESSENGERS */

$(document).ready(function() {
				   
    $(".nsm_settings_form").on("submit", function(){
        $("#nsm-settings").removeClass("hide-saving-wrp");
           
           var propPosition = $(".nsm_settings_form input[name=\'NSM_PROP[POSITION]\']").val(); 
           var propTopType = $(".nsm_settings_form input[name=\'NSM_PROP[TOPTYPE]\']").val();  if(propTopType == undefined) propTopType = "";
           var propTop = $(".nsm_settings_form input[name=\'NSM_PROP[TOP]\']").val(); 
           var propTopMeasure = $(".nsm_settings_form input[name=\'NSM_PROP[TOPMEASURE]\']").val(); if(propTopMeasure == undefined) propTopMeasure = "";
           var propZ = $(".nsm_settings_form input[name=\'NSM_PROP[ZINDEX]\']").val(); 
           var propFixed = $(".nsm_settings_form input[name=\'NSM_PROP[FIXED]\']").prop("checked"); if(propFixed){propFixed="Y";}else{propFixed="N";}
           
           var propR = $(".nsm_settings_form input[name=\'NSM_PROP[RADIUS]\']").val();
           var propSize = $(".nsm_settings_form input[name=\'NSM_PROP[SIZE]\']").val();
           var propFont = $(".nsm_settings_form input[name=\'NSM_PROP[FONT]\']").val();
           var propRmob = $(".nsm_settings_form input[name=\'NSM_PROP[RADIUS_MOBILE]\']").val();
           var propSizemob = $(".nsm_settings_form input[name=\'NSM_PROP[SIZE_MOBILE]\']").val();
           var propFontmob = $(".nsm_settings_form input[name=\'NSM_PROP[FONT_MOBILE]\']").val();

           var propStyle = $(".nsm_settings_form input[name=\'NSM_PROP[SETSTYLE]\']").val();
           var propBtnColor = $(".nsm_settings_form input[name=\'NSM_PROP[BTNCOLOR]\']").val();
           var propBtnColorH = $(".nsm_settings_form input[name=\'NSM_PROP[BTNCOLOR_HOVER]\']").val();
           var propBtnBGColor = $(".nsm_settings_form input[name=\'NSM_PROP[BTNBG]\']").val();
           var propBtnBGColorH = $(".nsm_settings_form input[name=\'NSM_PROP[BTNBG_HOVER]\']").val();
           var propOpacity = $(".nsm_settings_form input[name=\'NSM_PROP[BTNOPACITY]\']").val();
           var propOpacityHover = $(".nsm_settings_form input[name=\'NSM_PROP[BTNOPACITY_HOVER]\']").val();

           var propHMargin = $(".nsm_settings_form input[name=\'NSM_PROP[HMARGIN]\']").val();
           var propVMargin = $(".nsm_settings_form input[name=\'NSM_PROP[VMARGIN]\']").val();
           var propBorder = $(".nsm_settings_form input[name=\'NSM_PROP[BTNBORDER]\']").val();
           var propBorderColor = $(".nsm_settings_form input[name=\'NSM_PROP[BTNBORDERCOLOR]\']").val();
           var propBorderColorHover = $(".nsm_settings_form input[name=\'NSM_PROP[BTNBORDERCOLOR_HOVER]\']").val();

           var propShadow = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOW]\']").prop("checked"); if(propShadow){propShadow="Y";}else{propShadow="N";}
           var propShadowColor = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOWCOLOR]\']").val();
           var propShadowColorHover = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOWCOLOR_HOVER]\']").val();
           var propShadowS = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOWSIZE]\']").val();
           var propShadowSH = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOWSIZE_HOVER]\']").val();
           var propShadowVO = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOWVOFFSET]\']").val();
           var propShadowVOH = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOWVOFFSET_HOVER]\']").val();
           var propShadowHO = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOWHOFFSET]\']").val();
           var propShadowHOH = $(".nsm_settings_form input[name=\'NSM_PROP[BTNSHADOWHOFFSET_HOVER]\']").val();

           var propTransition = $(".nsm_settings_form input[name=\'NSM_PROP[BTNTRANSITION_SELECT]\']").val();
           var propTransitionTime = $(".nsm_settings_form input[name=\'NSM_PROP[BTNTRANSITION_TIME]\']").val();
           var propAnim = $(".nsm_settings_form input[name=\'NSM_PROP[ANIMATION_SELECT]\']").val();

           var siteId = $(".nsm_settings_form input[name=\'SITE_ID\']").val(); 
           var page = "";
        $.ajax({
        url: "/bitrix/admin/settings.php?lang=ru&mid=niges.socmenu&mid_menu=1",
        type: "post",
        data: "SITE_ID="+siteId+"&ACTIVE=Y&set_socmenu_props=Y&NSM_PROP[POSITION]="+propPosition
                +"&NSM_PROP[FIXED]="+propFixed
                +"&NSM_PROP[TOPTYPE]="+propTopType
                +"&NSM_PROP[TOP]="+propTop
                +"&NSM_PROP[TOPMEASURE]="+propTopMeasure
                +"&NSM_PROP[ZINDEX]="+propZ

                +"&NSM_PROP[RADIUS]="+propR
                +"&NSM_PROP[SIZE]="+propSize
                +"&NSM_PROP[FONT]="+propFont
                +"&NSM_PROP[RADIUS_MOBILE]="+propRmob
                +"&NSM_PROP[SIZE_MOBILE]="+propSizemob
                +"&NSM_PROP[FONT_MOBILE]="+propFontmob

                +"&NSM_PROP[SETSTYLE]="+propStyle
                +"&NSM_PROP[BTNCOLOR]="+propBtnColor
                +"&NSM_PROP[BTNCOLOR_HOVER]="+propBtnColorH
                +"&NSM_PROP[BTNBG]="+propBtnBGColor
                +"&NSM_PROP[BTNBG_HOVER]="+propBtnBGColorH
                +"&NSM_PROP[BTNOPACITY]="+propOpacity
                +"&NSM_PROP[BTNOPACITY_HOVER]="+propOpacityHover

                +"&NSM_PROP[HMARGIN]="+propHMargin
                +"&NSM_PROP[VMARGIN]="+propVMargin
                +"&NSM_PROP[BTNBORDER]="+propBorder
                +"&NSM_PROP[BTNBORDERCOLOR]="+propBorderColor
                +"&NSM_PROP[BTNBORDERCOLOR_HOVER]="+propBorderColorHover

                +"&NSM_PROP[BTNSHADOW]="+propShadow
                +"&NSM_PROP[BTNSHADOWCOLOR]="+propShadowColor
                +"&NSM_PROP[BTNSHADOWCOLOR_HOVER]="+propShadowColorHover
                +"&NSM_PROP[BTNSHADOWSIZE]="+propShadowS
                +"&NSM_PROP[BTNSHADOWSIZE_HOVER]="+propShadowSH
                +"&NSM_PROP[BTNSHADOWVOFFSET]="+propShadowVO
                +"&NSM_PROP[BTNSHADOWVOFFSET_HOVER]="+propShadowVOH
                +"&NSM_PROP[BTNSHADOWHOFFSET]="+propShadowHO
                +"&NSM_PROP[BTNSHADOWHOFFSET_HOVER]="+propShadowHOH

                +"&NSM_PROP[BTNTRANSITION]="+propTransition
                +"&NSM_PROP[BTNTRANSITION_TIME]="+propTransitionTime
                +"&NSM_PROP[ANIMATION]="+propAnim

                +"&page="+page,
        success: function(data){ 
                //$(".nsm_settings_form_result").html(data);
                $("#nsm-settings").addClass("hide-saving-wrp");
        },        
        error: function(data){ 
                $("#nsm-anim-saving").text("Error!"); 
                setTimeout( function() { 
                    $("#nsm-settings").addClass("hide-saving-wrp"); 
                }, 5000);
        }

        });
            return false;
    });

});




function nigesSocMenuChangeCSS(style){
    var changeStyle = document.getElementById("nsm-set-btn-" + style);
    if(changeStyle){
        document.getElementById("nsm-input-btn-" + style).value = changeStyle.value;
        document.getElementById("nsm-label-btn-" + style).innerHTML = changeStyle.value;
    }

    //UPDATE CSS
    var nsmFixed = document.getElementById("nsm-input-fixed").checked; if(nsmFixed){nsmFixed = ".nsm-bar {position:fixed}";}else{nsmFixed = ".nsm-bar {position:absolute}";}
    var nsmBtnTopType = document.getElementById("nsm-input-btn-toptype").value; 
		if(nsmBtnTopType == undefined) nsmBtnTopType = "top";
		if(nsmBtnTopType == "") nsmBtnTopType = "top";
			if(nsmBtnTopType == "top") 
			{
					var nsmBtnTopUnset = "bottom:unset;";
					var nsmFormWRPBT = "#nsm-settings { margin-top:20px !important; transform: translateY(0%) !important; }";
			}
			else 
			{
					var nsmBtnTopUnset = "top:unset;";
					var nsmFormWRPBT = "#nsm-settings { margin-top:15px !important; transform: translateY(-100%) !important; }";			
			}
    var nsmBtnTop = document.getElementById("nsm-input-btn-top").value; 
    var nsmBtnTopMeasure = document.getElementById("nsm-input-btn-topmeasure").value; 
		if(nsmBtnTopMeasure == undefined) nsmBtnTopMeasure = "%";
		if(nsmBtnTopMeasure == "") nsmBtnTopMeasure = "%";
    var nsmBtnZ = document.getElementById("nsm-input-btn-zindex").value; 

    var nsmBtnRadius = document.getElementById("nsm-input-btn-radius").value; 
    var nsmBtnSize = document.getElementById("nsm-input-btn-size").value;
    var nsmBtnFont = document.getElementById("nsm-input-btn-font").value;
    var nsmBtnRadiusMob = document.getElementById("nsm-input-btn-radius-mobile").value; 
    var nsmBtnSizeMob = document.getElementById("nsm-input-btn-size-mobile").value;
    var nsmBtnFontMob = document.getElementById("nsm-input-btn-font-mobile").value;

    var nsmBtnbtncolor = document.getElementById("nsm-input-color-btncolor").value;
    var nsmBtnbtncolorHover = document.getElementById("nsm-input-color-btncolor_hover").value;
    var nsmBtnbtnBGcolor = document.getElementById("nsm-input-color-btnbg").value;
    var nsmBtnbtnBGcolorHover = document.getElementById("nsm-input-color-btnbg_hover").value;

    var nsmBtnOpacity = document.getElementById("nsm-input-btn-opacity").value; nsmBtnOpacity = nsmBtnOpacity/100;
    var nsmBtnOpacityHover = document.getElementById("nsm-input-btn-opacity-hover").value; nsmBtnOpacityHover = nsmBtnOpacityHover/100;

    var nsmBtnHMargin = document.getElementById("nsm-input-btn-hmargin").value;
    var nsmBtnVMargin = document.getElementById("nsm-input-btn-vmargin").value;
    var nsmBtnBorderSize = document.getElementById("nsm-input-btn-border-size").value;
    var nsmBtnBorderColor = document.getElementById("nsm-input-color-btnbordercolor").value;
    var nsmBtnBorderColorHover = document.getElementById("nsm-input-color-btnbordercolor_hover").value;


    var nsmBtnShadow = document.getElementById("nsm-input-shadow").checked; 
    var nsmBtnShadowColor = document.getElementById("nsm-input-color-btnshadowcolor").value;
    var nsmBtnShadowColorHover = document.getElementById("nsm-input-color-btnshadowcolor_hover").value;    
        if(nsmBtnShadow){
            var nsmBtnShadowSize = document.getElementById("nsm-input-btn-shadow-size").value;
            var nsmBtnShadowVO = document.getElementById("nsm-input-btn-shadow-v-offset").value;
            var nsmBtnShadowHO = document.getElementById("nsm-input-btn-shadow-h-offset").value;
            nsmBtnShadow = "box-shadow: " + nsmBtnShadowHO + "px " + nsmBtnShadowVO + "px " + nsmBtnShadowSize + "px " + nsmBtnShadowColor + " !important; ";
        } else{ nsmBtnShadow = "box-shadow: none !important;"; }

    var nsmBtnShadowHover = document.getElementById("nsm-input-shadow").checked; 
        if(nsmBtnShadowHover){
            var nsmBtnShadowSizeHover = document.getElementById("nsm-input-btn-shadow-size-hover").value;
            var nsmBtnShadowVOHover = document.getElementById("nsm-input-btn-shadow-v-offset-hover").value;
            var nsmBtnShadowHOHover = document.getElementById("nsm-input-btn-shadow-h-offset-hover").value;
            nsmBtnShadowHover = "box-shadow: " + nsmBtnShadowHOHover + "px " + nsmBtnShadowVOHover + "px " + nsmBtnShadowSizeHover + "px " + nsmBtnShadowColorHover + " !important; ";
        } else{ nsmBtnShadowHover = "box-shadow: none !important;";  }

    var nsmBtnTransitionTime = document.getElementById("nsm-input-btn-transition-time").value;   

    var nsmBtnTransition = " "; 
    if(style == "transition"){ 
        var nsmBtnTransition = document.getElementById("nsm-input-btn-transition-select").value; 
        document.getElementById("nsm-input-btn-transition-input").value = nsmBtnTransition;
        if(nsmBtnTransition == "none"){ 
            var nsmBtnTransition = "transition: none !important;"; 
        }else{
            var nsmBtnTransition = "transition: all "+nsmBtnTransitionTime+"ms "+nsmBtnTransition+" !important;";   
        }       
    }

    if(style == "animation"){ 
        var nsmBtnAnimation = document.getElementById("nsm-input-btn-animation-select").value; 
        document.getElementById("nsm-input-btn-animation-input").value = nsmBtnAnimation;

        var nsm = document.getElementById("nsm-bar");
        nsm.classList.remove("nsm-animation-none");
        nsm.classList.remove("nsm-animation-shake");
        nsm.classList.remove("nsm-animation-shift");
        nsm.classList.add("nsm-animation-"+nsmBtnAnimation);
        if(nsmBtnAnimation == "shake"){
            $('.nsm-bar-btn').attr('onmouseover','shakeAnimation(this, event);');
            $('.nsm-bar-btn').attr('onmouseout','shakeAnimation(this, event);');
        }else{
            $('.nsm-bar-btn').removeAttr('onmouseover');
            $('.nsm-bar-btn').removeAttr('onmouseout');
            $('.nsm-bar-btn').removeAttr('style');
        }
    }




    var nsmNewCSS = document.getElementById( "nsm-new-styles" ); 
    nsmNewCSS.innerHTML =     
    "<style>" 
	+ nsmFormWRPBT 
    + " .nsm-bar a, .nsm-bar a:visited, .nsm-bar a:active {" 
    + "  width:" + nsmBtnSize + "px !important;" 
    + "  height:" + nsmBtnSize + "px !important; " 
    + "  line-height:" + nsmBtnSize + "px !important; " 
    + "  font-size:" + nsmBtnFont + "px !important; " 
    + "  border-radius:" + nsmBtnRadius + "px !important; " 
    + "  opacity:" + nsmBtnOpacity + " !important; " 
    + "  margin-left: " + nsmBtnHMargin + "px !important; " 
    + "  margin-right:  " + nsmBtnHMargin + "px !important; " 
    + "  margin-top: " + nsmBtnVMargin + "px !important; " 
    + "  margin-bottom: " + nsmBtnVMargin + "px !important; " 
    + "  border: solid " + nsmBtnBorderSize + "px " + nsmBtnBorderColor + " !important; " 
    + "  color:"+nsmBtnbtncolor+" !important; " 
    + "  background-color:"+nsmBtnbtnBGcolor+" !important; " 
    + " " + nsmBtnShadow 
    + " " + nsmBtnTransition 
    + " } " 
    + ".nsm-bar a:hover {" 
    + "  opacity:" + nsmBtnOpacityHover + "!important; " 
    + "  border: solid " + nsmBtnBorderSize + "px " + nsmBtnBorderColorHover + " !important; " 
    + "  color:" + nsmBtnbtncolorHover + " !important; " 
    + "  background-color:" + nsmBtnbtnBGcolorHover + " !important; " 
    + " " + nsmBtnShadowHover 
    + " " 
    + " } " 
    + nsmFixed + " .nsm-bar {" + nsmBtnTopUnset + " " + nsmBtnTopType + ": " + nsmBtnTop + nsmBtnTopMeasure + " !important; z-index: " + nsmBtnZ + " !important; } "
    + "@media screen and (max-width:767px) { " 
    + " .nsm-bar a, .nsm-bar a:visited, .nsm-bar a:active {width:" + nsmBtnSizeMob + "px !important; " 
    + "  height:" + nsmBtnSizeMob + "px !important; " 
    + "  line-height:" + nsmBtnSizeMob + "px !important; " 
    + "  font-size:" + nsmBtnFontMob + "px !important; " 
    + "  border-radius:" + nsmBtnRadiusMob + "px !important; " 
    + " } " 
    + "}"
    + "</style>";
    return false
}




function nigesSocMenuTabs(n){ 
    var nsmSwitchNav = document.getElementsByClassName("nsm-tab-nav"); 
    for( var i = 0; i < 6; i++){
        var nsmSwitchClassNav = nsmSwitchNav[i]; nsmSwitchClassNav.classList.remove("active");
    }
    var nsmSwitch = document.getElementsByClassName("nsm-tab-wrp"); 
    for( var i = 0; i < nsmSwitch.length; i++){ 
        var nsmSwitchClass = nsmSwitch[i]; nsmSwitchClass.classList.remove("active");
    }
    var nsmSwitchOnNavClass = document.getElementsByClassName("nsm-tab-nav-"+n)[0]; 
    nsmSwitchOnNavClass.classList.add("active");    
    var nsmSwitchOnClass = document.getElementsByClassName("nsm-tab-wrp-"+n)[0]; 
    nsmSwitchOnClass.classList.add("active");
    return false
}




var mouse={pageX:function(b){var a,c,d;d=b||event;return null==d.pageX&&null!=d.clientX?(a=document.body,c=document.documentElement,b=c.scrollLeft||a&&a.scrollLeft||0,b=d.clientX+b-(c.clientLeft||a.clientLeft||0)):d.pageX},pageY:function(b){var a,c,d;d=b||event;return null==d.pageX&&null!=d.clientX?(a=document.body,c=document.documentElement,b=c.scrollTop||a&&a.scrollTop||0,b=d.clientY+b-(c.clientTop||a.clientTop||0)):d.pageY}},Obj={positX:function(b){var a,c;a=0;c=b.getBoundingClientRect();b=document.body;
a=document.documentElement;a=c.left+(a.scrollLeft||b&&b.scrollLeft||0)-(a.clientLeft||b.sclientLeft||0);return Math.round(a)},positY:function(b){var a,c;a=0;c=b.getBoundingClientRect();b=document.body;a=document.documentElement;a=c.top+(a.scrollTop||b&&b.scrollTop||0)-(a.clientTop||b.sclientTop||0);return Math.round(a)}},querySelector={All:function(b){var a,c,d=[];if(a=document.querySelectorAll("["+b+"]"))return a;a=document.body.getElementsByTagName("*");for(var e=a.length;e--;)c=a[e],null!==c.getAttribute(b)&&
d.push(c);return d}},cls={has:function(b,a){var c,d;d=b.className.split(" ");for(c=d.length;c--;)if(d[c]===a)return!0;return!1},removeClass:function(b,a){for(var c=b.className.split(" "),d=0;d<c.length;d++)c[d]==a&&c.splice(d--,1);b.className=c.join(" ")},addClass:function(b,a){for(var c=b.className.split(" "),d=0;d<c.length;d++)if(c[d]==a)return;c.push(a);b.className=c.join(" ")}};

var picker = {
	V: 100,
	S:100,
	status:false,

	init: function () {
     var id_elements = {primary: "nsm_color_block", arrows: "arrows", block: "nsm_pick_color", circle: "circle", line: "line"}; 

    var s ={h:180, w:20, th: id_elements.arrows, bk: id_elements.block, line: id_elements.line};

    Line.init(s);

     var b = {block: id_elements.block, circle: id_elements.circle};

     Block.init(b);

	  picker.color_prop = document.getElementById("pick_color_prop");
	  picker.out_color = document.getElementById("out_color");
	  picker.old_color = document.getElementById("old_color");
	  picker.fit_css = document.getElementById("fit_new_css");

	  picker.fit_color = document.getElementById("nsm-input-color-btncolor");
	  picker.fit_colorhover = document.getElementById("nsm-input-color-btncolor_hover");
	  picker.fit_bg = document.getElementById("nsm-input-color-btnbg");
	  picker.fit_bghover = document.getElementById("nsm-input-color-btnbg_hover");
	  picker.fit_border = document.getElementById("nsm-input-color-btnbordercolor");
	  picker.fit_borderhover = document.getElementById("nsm-input-color-btnbordercolor_hover");	  
	  picker.fit_shadowcheck = document.getElementById("nsm-input-shadow");
	  picker.fit_shadowcolor = document.getElementById("nsm-input-color-btnshadowcolor");
	  picker.fit_shadowcolorhover = document.getElementById("nsm-input-color-btnshadowcolor_hover");
	  picker.fit_shadowsize = document.getElementById("nsm-input-btn-shadow-size");
	  picker.fit_shadowsizehover = document.getElementById("nsm-input-btn-shadow-size-hover");
	  picker.fit_shadowho = document.getElementById("nsm-input-btn-shadow-h-offset");
	  picker.fit_shadowhohover = document.getElementById("nsm-input-btn-shadow-h-offset-hover");
	  picker.fit_shadowvo = document.getElementById("nsm-input-btn-shadow-v-offset");
	  picker.fit_shadowvohover = document.getElementById("nsm-input-btn-shadow-v-offset-hover");

	  var pick_color_prop = document.getElementById("pick_color_prop").value;
	  var pick_new_color = document.getElementById("pick_new_color").value;
	  var pick_old_color = document.getElementById("pick_old_color").value; 

	  picker.out_color.style.backgroundColor = pick_new_color;
	  picker.old_color.style.backgroundColor = pick_new_color;
	  
}
};

var Line ={
	  
	   Hue: 0,
	
	init: function (elem){
		
      var canvaLine, cAr, pst, bk, t = 0;;
        
		canvaLine = Line.create(elem.h, elem.w, elem.line, "cLine");

          cAr = document.getElementById(elem.th);
           bk = document.getElementById(elem.bk);

       Line.posit = function (e){
		 var top, rgb;
           
		  top = mouse.pageY(e) - pst;
           top = (top < 0 )? 0 : top;
             top = (top > elem.h )? elem.h  : top;
 
               cAr.style.top = top-2 +"px";
                t =  Math.round(top /(elem.h/ 360));
                 t = Math.abs(t - 360);
                   t = (t == 360)? 0 : t;
  
                     Line.Hue = t;

                       bk.style.backgroundColor = "rgb("+convert.hsv_rgb(t,100,100)+")";
						 picker.out_color.style.backgroundColor = "rgb("+convert.hsv_rgb(t,picker.S,picker.V)+")";

						 var _res = convert.hsv_rgb(t,100,100);
						 _resR = _res[0].toString(16); if(_resR.length < 2) { _resR = "0"+_resR; }
						 _resG = _res[1].toString(16); if(_resG.length < 2) { _resG = "0"+_resG; }
						 _resB = _res[2].toString(16); if(_resB.length < 2) { _resB = "0"+_resB; }
						 _res = _resR+""+_resG+""+_resB;
						 //console.log(_res);
						 
						 //If Change Color
						 changecss.change_colors(_res);

                         
	}
// Change Line Events
      cAr.onmousedown = function (){
	
	      pst = Obj.positY(canvaLine);
	
	         document.onmousemove = function(e){Line.posit(e);}
		}

       cAr.onclick = Line.posit;

         canvaLine.onclick = function (e){Line.posit(e)};
           
		   canvaLine.onmousedown = function (){
	
	         pst = Obj.positY(canvaLine);
	           
			   document.onmousemove = function(e){Line.posit(e);}
	}
                 document.onmouseup = function (){
					 document.onmousemove = null; 
					 cAr.onmousemove = null; 
					 
					 }
},
	
	
	create : function (height, width, line, cN){
	  var canvas = document.createElement("canvas");
	
	    canvas.width = width;
		 canvas.height = height;	
		 
	       var leftArrow = "<div id=\"arrows\" style=\"top: -2px\"> <div class=\"left_arrow\"></div>  </div>";
			document.getElementById(line).innerHTML = leftArrow ;
	
	       canvas.className = cN;	        
			document.getElementById(line).appendChild(canvas);
		 
		      Line.grd(canvas, height, width);
		 
		 return canvas;
	},
	
	grd:function (canva, h, w){
		var gradient,hue,color, canva, gradient1;
		
		 canva = canva.getContext("2d");

	       gradient = canva.createLinearGradient(w/2,h,w/2,0);
	 
	         hue = [[255,0,0],[255,255,0],[0,255,0],[0,255,255],[0,0,255],[255,0,255],[255,0,0]];
	
	for (var i=0; i <= 6;i++){
		
	  color = 'rgb('+hue[i][0]+','+hue[i][1]+','+hue[i][2]+')';
	
	     gradient.addColorStop(i*1/6, color);
	
	};
	  canva.fillStyle = gradient;
         	canva.fillRect(0,0, w ,h);	
	}
};

var Block = {
			
	init: function (elem) {
		
		var circle, block, colorO, bPstX, bPstY, bWi, bHe, cW, cH, pxY, pxX;
		 
		 circle = document.getElementById(elem.circle);
		  block = document.getElementById(elem.block);
		    cW = circle.offsetWidth ;
	         cH = circle.offsetHeight;
		       bWi = block.offsetWidth - cW;
	             bHe = block.offsetHeight - cH;
		           pxY = bHe / 100; 
		            pxX = bWi / 100; 
		
		Block.cPos = function (e){
			
			var top, left, S, V;
			
			 document.ondragstart = function() { return false;}
			
			   document.body.onselectstart = function() { return false; }
			
			left = mouse.pageX(e) - bPstX - cW/2;
			 left = (left < 0)? 0 : left;
			  left = (left > bWi  )? bWi  : left;
			   
			   circle.style.left = left  + "px"; 
			   
			    S = Math.ceil(left /pxX) ;
			    
				 top = mouse.pageY(e)  - bPstY - cH/2;
			      top = (top > bHe  )? bHe : top;
			
			        top = (top < 0)? 0 : top;
			
			          circle.style.top = top   + "px";
			
			            V = Math.ceil(Math.abs(top / pxY - 100));
			             
						 if (V <50) circle.style.borderColor = "#fff";
			
			else circle.style.borderColor = "#000";
			
			picker.S = S;
			
			  picker.V = V;
			
			     picker.out_color.style.backgroundColor = "rgb("+convert.hsv_rgb(Line.Hue,S,V)+")";
				 var _res = convert.hsv_rgb(Line.Hue,S,V);
			     _resR = _res[0].toString(16); if(_resR.length < 2) { _resR = "0"+_resR; }
			     _resG = _res[1].toString(16); if(_resG.length < 2) { _resG = "0"+_resG; }
				 _resB = _res[2].toString(16); if(_resB.length < 2) { _resB = "0"+_resB; }
				 _res = _resR+""+_resG+""+_resB;
				 //console.log(_res);
				 
				 //If Change Color
				 changecss.change_colors(_res);
				 
			}
			
			block.onclick = function(e){Block.cPos(e);}
			block.onmousedown  = function (){
			document.onmousemove = function (e){
				bPstX = Obj.positX(block);
				bPstY = Obj.positY(block);
				Block.cPos(e);
				}
			}

			document.onmouseup=function() {
				document.onmousemove = null;
				}
		}
		
	};


var changecss = {
		change_colors: function (C){
				var _res = C ;

				picker.out_color.innerHTML = "<input value=\"#" + _res + "\" name=\"new_color\" type=\"text\" id=\"pick_new_color\" /> ";	

				 var css_color = picker.fit_color.value;
				 var css_colorhover = picker.fit_colorhover.value;
				 var css_bg = picker.fit_bg.value;
				 var css_bghover = picker.fit_bghover.value;
				 var css_border = picker.fit_border.value;
				 var css_borderhover = picker.fit_borderhover.value;

				 if(picker.color_prop.value == "btncolor") {
					css_color = "#" + _res;
				 }
				 if(picker.color_prop.value == "btncolor_hover") {
					css_colorhover = "#" + _res;
				 }
				 if(picker.color_prop.value == "btnbg") {
					css_bg = "#" + _res;
				 }
				 if(picker.color_prop.value == "btnbg_hover") {
					css_bghover = "#" + _res;
				 }
				 if(picker.color_prop.value == "btnbordercolor") {
					css_border = "#" + _res;
				 }
				 if(picker.color_prop.value == "btnbordercolor_hover") {
					css_borderhover = "#" + _res;
				 }

				 if(picker.fit_shadowcheck.checked) {
					var css_shadowcolor = picker.fit_shadowcolor.value;
					var css_shadowcolorhover = picker.fit_shadowcolorhover.value;
					var css_shadowsize = picker.fit_shadowsize.value;
					var css_shadowsizehover = picker.fit_shadowsizehover.value;					  
					var css_shadowHO = picker.fit_shadowho.value;
					var css_shadowHOhover = picker.fit_shadowhohover.value;					  
					var css_shadowVO = picker.fit_shadowvo.value;
					var css_shadowVOhover = picker.fit_shadowvohover.value;					  
					if(picker.color_prop.value == "btnshadowcolor") {
						css_shadowcolor = "#" + _res;
					}
					if(picker.color_prop.value == "btnshadowcolor_hover") {
						css_shadowcolorhover = "#" + _res;
					}
					var boxShadowCSS = "box-shadow: " + css_shadowHO + "px " + css_shadowVO +"px " + css_shadowsize + "px " + css_shadowcolor + " !important;";
					var boxShadowHoverCSS = "box-shadow: " + css_shadowHOhover + "px " + css_shadowVOhover + "px " + css_shadowsizehover + "px " + css_shadowcolorhover + " !important;";
				 }else{
					var boxShadowCSS = "box-shadow: none !important;";
					var boxShadowHoverCSS = "box-shadow: none !important;";
				 }

				 picker.fit_css.innerHTML = "<style>" 
				 + " .nsm-bar a, .nsm-bar a:visited, .nsm-bar a:active { " 
				 + " color: " + css_color + " !important; " 
				 + " background-color: " + css_bg + " !important; " 
				 + " border-color: " + css_border + " !important; " 
				 + boxShadowCSS + " " 
				 + " } " 
				 + " .nsm-bar a:hover { " 
				 + " color: " + css_colorhover + " !important; " 
				 + " background-color: " + css_bghover + " !important; " 
				 + " border-color: " + css_borderhover + " !important; " 
				 + boxShadowHoverCSS + " " 
				 + " } " 
				 + "</style>";
			}
};

var convert = {
	hsv_rgb: function (H,S,V){	 
	 var f , p, q , t, lH;   
	  S /=100;
      V /=100;
     
	 lH = Math.floor(H / 60);
      
	  f = H/60 - lH;
        p = V * (1 - S); 
         q = V *(1 - S*f);
	       t = V* (1 - (1-f)* S);
      
	switch (lH){      
	  case 0: R = V; G = t; B = p; break;
        case 1: R = q; G = V; B = p; break;
         case 2: R = p; G = V; B = t; break;
           case 3: R = p; G = q; B = V; break;
            case 4: R = t; G = p; B = V; break;
              case 5: R = V; G = p; B = q; break;}
     
	return [parseInt(R*255), parseInt(G*255), parseInt(B*255)];
	}
	
};	
	
	
function pickColor(prop,text){
	var icolor = document.getElementById("nsm-input-color-"+prop).value;
	var changeStyle = document.getElementById("nsm-set-pickcolor-text");
	changeStyle.innerHTML = text;

	document.getElementById("pick_color_prop").value = prop;
	document.getElementById("pick_new_color").value = icolor;
	document.getElementById("pick_old_color").value = icolor; 

	picker.init();
	var pick_color = document.getElementById("nsm-settings");
	pick_color.classList.remove("hide-pick-color");
}
 

function pickColorSave(){

	var color_prop = document.getElementById("pick_color_prop").value;
	var new_color = document.getElementById("pick_new_color").value;

	var changeStyle = document.getElementById("nsm-label-color-" + color_prop);
    if(changeStyle){
        document.getElementById("nsm-label-color-" + color_prop).style.backgroundColor = new_color;
        document.getElementById("nsm-label-color-" + color_prop).innerHTML = new_color;
        document.getElementById("nsm-input-color-" + color_prop).value = new_color;
	}
	nigesSocMenuChangeCSS();
	pickColorClose();
}
 

function pickColorClose(){
	var pick_color = document.getElementById("nsm-settings"), 
	fit_css = document.getElementById("fit_new_css"); 
	pick_color.classList.add("hide-pick-color");
	fit_css.innerHTML = ""; 
	
}


function settingsOpen(){
	var settings = document.getElementById("nsm-settings");
	settings.classList.add("active-win-settings");
}
 

function settingsClose(){
	var settings = document.getElementById("nsm-settings");
	settings.classList.remove("active-win-settings");
}


function OptionPosition(p,m){
	var nsm = document.getElementById("nsm-bar");

	if(p=="indiv"){
		if ( $("div").is(".niges-socmenu") || $("span").is(".niges-socmenu") ) {
			$('.niges-socmenu').append($("#nsm-bar"));
			nsm.classList.remove("nsm-position-left");nsm.classList.remove("nsm-position-right");nsm.classList.remove("nsm-position-indiv");
			nsm.classList.add("nsm-position-"+p);
			document.getElementById("nsm-input-position").value = p;	
		}else{
			alert(m);
		}
	}else{
		$('body').append($("#nsm-bar"));
		nsm.classList.remove("nsm-position-left");nsm.classList.remove("nsm-position-right");nsm.classList.remove("nsm-position-indiv");
		nsm.classList.add("nsm-position-"+p);
		document.getElementById("nsm-input-position").value = p;		
	}

}


function OptionStyle(p){
	var nsm = document.getElementById("nsm-bar");
	nsm.classList.remove("nsm-style-native");nsm.classList.remove("nsm-style-custom");
	nsm.classList.add("nsm-style-"+p);
	document.getElementById("nsm-input-setstyle").value = p;
}