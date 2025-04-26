
var formData = [];
window.addEventListener("load", () => {d67faLoad()});
	
function d67faLoad() {
  // ref on html nodes

  const tabButtons = document.querySelectorAll('.d67fa_tab_item');
  const tabItems = document.querySelectorAll('.tab__item');
  const itemsList = document.querySelector('.basket__list');

  // handler for click on table item

  const rows = document.querySelectorAll('.a1a01__row');
  const values = document.querySelectorAll('.counter__value');

  // helpers

  const addActive = (elem) => {
    elem.classList.add('-active');
  }

  const removeActive = (elem) => {
    elem.classList.remove('-active');
  }

  const removeAllActives = (arr) => {
    arr.forEach((el) => removeActive(el));
  }

  const setToInput = (node, result) => {
    node.value = result;
    node.setAttribute('value', result);
  }

  // initialize row styles

  const renderRowsStyles = () => {
    rows.forEach((item) => {
      const rowValue = item.querySelector('.counter__value').value;
      if(+rowValue > 0) addActive(item);
      if(+rowValue === 0) removeActive(item);
    })
  };

  renderRowsStyles();

  // functions for sum

  const renderTotalValue = () => {
    let sum = 0;
    let totalValue = 0;
    let discount = 0;
    const nodePrice = document.querySelector('.final_price');
    const nodeFloatPrice = document.querySelector('.float__form_counterPrice');
    const nodeTotalValue = document.querySelector('.form__totalValue');
    const nodeFloatTotalValue = document.querySelector('.float__form_counterValue');
    const nodeTotalDiscount = document.querySelector('.form__totalSale');
    const nodeFloatTotalDiscount = document.querySelector('.float__form_discount');
    const getSum = () => {
      if (formData.length === 0) return 0;
      const reducer = (accumulator, currentValue) => {
		  //console.log(currentValue);
		  //console.log(accumulator+' - '+currentValue.value);
		  //if(!isNaN(currentValue.value))
			return accumulator + currentValue.price*currentValue.value;
		//else
			//return accumulator + currentValue.price;
	  }
      return formData.reduce(reducer, 0);
    };

    const getValue = () => {
      if (formData.length === 0) return 0;
      const reducer = (accumulator, currentValue) => {
		  if(currentValue.mesc != 'м³')
			  return accumulator;
		  return accumulator = accumulator + currentValue.value;
	  }
      return formData.reduce(reducer, 0);
    };

    const getDiscount = () => {
      if (formData.length === 0) return 0;
      const reducer = (accumulator, currentValue) => accumulator + currentValue.discount;
      return !isNaN(formData.reduce(reducer, 0)) ? formData.reduce(reducer, 0) : 0;
    };

    const renderToTotalValue = () => {
      totalValue = getValue();
      totalValueOut = totalValue.toLocaleString('ru');
      const result = `${totalValueOut}&nbsp;м³`
      nodeTotalValue.innerHTML = result;
      nodeFloatTotalValue.innerHTML = result;
    };
 
    const renderToSum = () => {
      sum = getSum();
      sumOut = sum.toLocaleString('ru');
	  //console.log(sum);
      const result = `${sumOut}&nbsp;руб.`
      nodePrice.innerHTML = result;
      nodeFloatPrice.innerHTML = result;
    };

    const renderToDiscount = () => {
      discount = getDiscount();
      discountOut = discount.toLocaleString('ru');
      const result = `${discountOut}&nbsp;руб.`;
      nodeTotalDiscount.innerHTML = result;
      nodeFloatTotalDiscount.innerHTML = result;
    };

    renderToSum();
    renderToTotalValue();
    renderToDiscount();
  };

  // function for create, update, remove, and checking state

  const addToState = (item, data) => {
    const itemName = item.querySelector('.product__link').innerHTML;
    const itemId = item.getAttribute('data-id');
    const mesc = item.getAttribute('data-measure');
    formData.push({
      name: itemName,
      id: +itemId,
      mesc: mesc,
      ...data,
    });
  }

  const updateState = (item, data) => {
    const itemId = item.getAttribute('data-id');
    const itemName = item.querySelector('.product__link').innerHTML;
    const mesc = item.getAttribute('data-measure');
    const indexOfData = formData.findIndex((item) =>  +item.id === +itemId);
    formData[indexOfData] = {
      name: itemName,
      id: +itemId,
	  mesc: mesc,
      ...data,
    };
  }

  const removeFromState = (item) => {
    const itemId = item.getAttribute('data-id');
    const indexOfData = formData.findIndex((item) =>  +item.id === +itemId) || 0;
    formData.splice(indexOfData, 1);
  }

  const containsInState = (item) => {
    const itemId = +item.getAttribute('data-id');
    return formData.some((item) =>  +item.id === itemId);
  }

  // data for right block
  const getInitialState = () => {
    const list = document.querySelectorAll('.basket__item');

    list.forEach((item) => {
      const id = +item.getAttribute('data-id');
      const price = item.querySelector('input[name=price]').value;
      const value = item.querySelector('.basket__item_count__count').innerHTML;
      const mesc = item.querySelector('.basket__item_count__mesc').innerHTML;
      const name = item.querySelector('.basket__item_name').innerHTML;
      formData.push({
        name: name,
        price: +price,
        id: +id,
        value: +value,
		mesc: mesc
      });
    })
  }
  getInitialState();

  // send data

  const sendButton = document.querySelector('.form__footer_basket span');
  const sendButtonFloatForm = document.querySelector('.float__form_basket span');
  const sendButtonOneClick = document.querySelector('.form__footer_btn_1click');
  const resetButton = document.querySelector('.form__footer_basket_icon');
  const resetButtonFloatForm = document.querySelector('.float__form_basket_icon');

  sendButton.onclick = () => {
    const bodyRequest = formData.map(({id, value}) => {
      return `{"id":${id},"quantity":${value}}`
    });
    sendAjaxRequest('/ajax/custom_add_to_basket.php', 'prods=['+ bodyRequest.join(',') +']').then(() => {
      //window.location.reload();
      window.location.href = "/basket/";
    });
  };
  sendButtonOneClick.onclick = () => {
    const bodyRequest = formData.map(({id, value}) => {
      return `{"id":${id},"quantity":${value}}`
    });
    sendAjaxRequest('/ajax/custom_add_to_basket.php', 'prods=['+ bodyRequest.join(',') +']').then(() => {
      oneClickBuyBasket();
    });
  };

  sendButtonFloatForm.onclick = () => {
    const bodyRequest = formData.map(({id, value}) => {
      return `{"id":${id},"quantity":${value}}`
    });
    sendAjaxRequest('/ajax/custom_add_to_basket.php', 'prods=['+ bodyRequest.join(',') +']').then(() => {
      //window.location.reload();
      window.location.href = "/basket/";
    });
  };

  resetButton.onclick = () => {
    sendAjaxRequest('/ajax/custom_add_to_basket.php', 'prods=[]').then(() => {
      window.location.reload();
    });
  };

  resetButtonFloatForm.onclick = () => {
    sendAjaxRequest('/ajax/custom_add_to_basket.php', 'prods=[]').then(() => {
      window.location.reload();
    });
  };

  const sendAjaxRequest = (url, payload) => {
    const str = `${url}?${payload}`;
    return fetch(str)
      .then(response => response.json())
      .then(data => data)
      .catch((error) => {
        console.warn(error);
      });
  };

  // handler for click on basket item

  const basket = document.querySelector('.quick__basket_form');
  basket.onclick = (event) => {
    const el = event.target;
    const currentId = +el.getAttribute('data-id');
    const currentItemId = +el.getAttribute('data-itemid');
    if (el.classList.contains('basket__item_close')) {
      const indexOfData = formData.findIndex((item) =>  +item.id === currentId) || 0;
      formData.splice(indexOfData, 1);
      renderToBasket();
      const currentValue = document.querySelector('[data-id="' + currentId + '"] .counter__value');
      setToInput(currentValue, 0);
      renderRowsStyles();
      renderTotalValue();
    }
  }

  rows.forEach((item, index) => {
    const input = item.querySelector('.counter__value');
	const compareButton = item.querySelector('.a1a01_compare');
    const currentId = +item.getAttribute('data-id');
    const currentItemId = +item.getAttribute('data-itemid');

    input.oninput = (event) => {
      const result = event.target.value.replace(/\D+/g,"");
      if(result === 0 || result === '') removeFromState(item);
      setToInput(item, result);
      sendAjaxRequest('/ajax/custom_get_prod_price.php', `id=${currentId}&quantity=${result}`)
        .then((response) => {
          const data = { price: response.total, discount: response.discount, value: +result };
          if(containsInState(item)) {
            updateState(item, data)
          } else {
            addToState(item, data)
          }
        })
        .then(() => {
          if(values[index].innerHTML > 0) addActive(item);
          if(+values[index].innerHTML === 0) removeActive(item);
          renderToBasket();
          renderTotalValue();
          renderRowsStyles();
        });

    }

    item.onclick = (event) => {
      const el = event.target;
      const previousValue = +values[index].value;

      if (el.classList.contains('counter__left')) {
        if (previousValue === 0) return;
        const result = previousValue - 1;
        setToInput(values[index], result);
        sendAjaxRequest('/ajax/custom_get_prod_price.php', `id=${currentId}&quantity=${result}`)
          .then((response) => {
            const data = { price: response.total, discount: response.discount, value: +result };
            if (result === 0 || result === '') {
              removeFromState(item)
            } else {
              updateState(item, data);
            }
          })
          .then(() => {
            if(values[index].innerHTML > 0) addActive(item);
            if(+values[index].innerHTML === 0) removeActive(item);
            renderToBasket();
            renderTotalValue();
            renderRowsStyles();
        });
      }

      if (el.classList.contains('counter__right')) {
        const result = previousValue + 1;
        setToInput(values[index], result);
        sendAjaxRequest('/ajax/custom_get_prod_price.php', `id=${currentId}&quantity=${result}`)
          .then((response) => {
            const data = { price: response.total, discount: response.discount, value: +result };
            if (containsInState(item)) {
              updateState(item, data);
            } else {
              addToState(item, data);
            }
          })
          .then(() => {
            if(values[index].innerHTML > 0) addActive(item);
            if(+values[index].innerHTML === 0) removeActive(item);
            renderToBasket();
            renderTotalValue();
            renderRowsStyles();
        });
      }
	}
	
    compareButton.onclick = (event) => {
		const el = event.target;
		if(el == item.querySelector('.goCompare'))
			return true;
		var elm = $(el);
		if(!elm.is('.a1a01_compare'))
			elm = $(elm).parents('.a1a01_compare');
		if (elm.is('.active')) {
			sendAjaxRequest('/catalog/compare.php','ajax_action=Y&action=DELETE_FROM_COMPARE_LIST&id='+currentItemId).then(() => {
				elm.removeClass('active');
				$("#compare_fly").length && jsAjaxUtil.InsertDataToNode(arMaxOptions.SITE_DIR + "ajax/show_compare_preview_fly.php", "compare_fly", !1);
			});
		  } else {
			sendAjaxRequest('/catalog/compare.php','ajax_action=Y&action=ADD_TO_COMPARE_LIST&id='+currentItemId).then(() => {
				elm.addClass('active');
				$("#compare_fly").length && jsAjaxUtil.InsertDataToNode(arMaxOptions.SITE_DIR + "ajax/show_compare_preview_fly.php", "compare_fly", !1);
			});
		  }
    }
  })

  // insert in right block item

  const getItem = (text, count, id, mesc) => {
    const result = document.createElement('div');
    result.classList.add('basket__item');
    result.innerHTML = `
        <span class="basket__item_name">${text}</span>
        <span class="basket__item_count"><span class="basket__item_count__count">${count}</span> <span class="basket__item_count__mesc">${mesc}</span></span>
        <button type="button" class="basket__item_close" data-id="${id}">&times;</button>
        <input type="hidden" name="${id}" value="${count}">
    `
    result.setAttribute('data-id', id)
    return result;
  };

  const addElement = (item) => {
    itemsList.append(item);
  }

  const renderToBasket = () => {
	  //console.log(formData);
    const result = formData.map(({name, price, id, value, mesc}) => {
      return getItem(name, value, id, mesc)
    });
    itemsList.innerHTML = '';
    result.forEach((item) => addElement(item));
  }

  // function for tabs

  let tabIndex = 0;

  addActive(tabButtons[tabIndex]);
  addActive(tabItems[tabIndex]);

  tabButtons.forEach((btn) => {
    btn.onclick = (e) => {
      const elem = e.target;
      if (elem.classList.contains('-active')) return;
      removeAllActives(tabButtons);
      removeAllActives(tabItems);
      tabIndex = elem.tabIndex;
      addActive(tabItems[tabIndex]);
      addActive(elem);
    }
  })
}

$('.table_container').scroll(function(e){
	//console.log($(this).scrollLeft());
	if($(this).scrollLeft() == 0) {
		$(this).removeClass('scrollx');
	} else {
		$(this).addClass('scrollx');
	}
});

$(document).on('scroll',function(){
	if($(window).width() >= 1349) {
		//console.log('больше 1349');
		$('.float__form').css('display','none');
		return true;
	} else {
		//console.log('меньше 1349');
		if($(window).scrollTop() > $('.quick_basket').offset().top && $(window).scrollTop() + document.documentElement.clientHeight + $(".video-stream").height() < $('.quick_basket').offset().top+$('.quick_basket').height()) {
		//if($(window).scrollTop()+$(window).height() < $('#footer').offset().top)
			$('.float__form').css('display','flex');
			console.log('flex');
		} else {
			$('.float__form').css('display','none');
			console.log('none');
		}
	}
});

