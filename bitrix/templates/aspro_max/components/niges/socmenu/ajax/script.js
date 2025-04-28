/* NIGES.SOCMENU / SOCIAL NETWORKS and MESSENGERS */

function shakeAnimation(obj, event) {
    if (event.type == "mouseover") {obj.setAttribute("style", "left: 8px;"); setTimeout(function(){obj.setAttribute("style", "left: -6px;"); setTimeout(function(){obj.setAttribute("style", "left: 4px;"); setTimeout(function(){obj.setAttribute("style", "left: 2px;"); setTimeout(function(){obj.setAttribute("style", "left: 0px;");  }, 70); }, 80); }, 90); }, 100);
    } else { obj.setAttribute("style", "left: 0px;");;
    }
}

function transferNSM () {
    var objDonor = document.getElementById("nsm-position-indiv");
    if (objDonor) { 
        var objRecipient = document.getElementById("niges-socmenu");
        if (objRecipient) {
            while (objDonor.lastChild) {
                objRecipient.insertBefore(objDonor.lastChild, objRecipient.firstChild);
            }
        }
		
		//+++++++++++
        let element = document.querySelectorAll("#mobilemenu .contacts");
		if(element && element.length == 1) {
			let div = document.createElement('div');
			div.classList.add('niges-socmenu', 'leftMobilemeny');
			element[0].parentElement.insertBefore(div, element[0]);
			let span = document.createElement('span');
			span.classList.add('niges-socmenu-left-caption');
			span.textContent = 'Мессенджеры';
			element[0].parentElement.insertBefore(span, element[0]);
		}
		//+++++++++++

        var elements = document.querySelectorAll(".niges-socmenu");
        if (elements) {
            for (var i = 0; i < elements.length; i++) {
                if (i+1 == elements.length) {
                    elements[i].appendChild(objDonor);
                } else {
                    var objDonorCopy = objDonor.cloneNode(true);
                    elements[i].appendChild(objDonorCopy);
                }
            }
        }
    } else {
        var objDonor = document.getElementById("nsm-position-right");
        if (!objDonor) {
            var objDonor = document.getElementById("nsm-position-left");
        }
        if (objDonor) {
            while (objDonor.lastChild) {
                document.body.insertBefore(objDonor.lastChild, document.body.firstChild);
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", transferNSM);