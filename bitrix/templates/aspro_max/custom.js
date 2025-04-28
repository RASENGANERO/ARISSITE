$(document).on("click", '.fast_view_block-mobile', function (e) {
    e.preventDefault();
    e.stopPropagation();

    var _this = $(this);
    var name = _this.data("name");
    
    if (!$(this).hasClass("clicked")) {
      $(this).addClass("clicked");
      $(this).jqmEx();
      $(this).trigger("click");
    }
    return false;
  });