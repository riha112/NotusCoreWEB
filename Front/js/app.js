(function _init($) {

  function initCookieManager() {
    const $cookieBtn = $('.cookie button');
    if ($cookieBtn.length > 0) {
      $cookieBtn.click(() => {
        $.cookie('accept_cookies', '1', { expires: 364, path: '/' });
        $cookieBtn.parent().slideUp();
      });
    }
  }

  function initMenu() {
    const burger = $('.hamburger');
    const menu = $('header');
    burger.click(() => {
      [burger, menu].forEach((element) => {
        element.toggleClass('is-active');
      });
    });
  }

  function initNiceSelect() {
    $('select').niceSelect();
  }

  function initFontSize(){
    const body = $('body');    
    const fontSizeSelector = $('main .font-size');
    fontSizeSelector.find("span").click(function() {
      fontSizeSelector.find(".is-active").removeClass("is-active");  
      $(this).addClass("is-active");
    });
    fontSizeSelector.find('.medium').click(() => {
      body.css('font-size', '14px');
    });
    fontSizeSelector.find('.large').click(() => {
      body.css('font-size','16px');
    });
    fontSizeSelector.find('.small').click(() => {
      body.css('font-size','12px');
    });
  }

  function initApp() {
    initNiceSelect();
    initMenu();
    initCookieManager();
    initFontSize();
  }

  

  $(document).ready(initApp);
}(jQuery));
