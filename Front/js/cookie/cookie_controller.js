(function($) {

  function initActions(){
    $('#cookie .accept-cookie span').click(function(){
      notusCookies.saveChanges();
    });

    $('#cookie .decline-cookie span').click(function(){
      notusCookies.setAll(false);
      notusCookies.saveChanges();      
    });
  }

  function initCookieToggle(){
    const $cookies = $('#cookie .cookies:not(".Necessary") .cookie');
    $cookies.each(function(){
      const name = $(this).find('.cookie-name').attr('data-name');
      let $textHld = $(this).find('.cookie-state');
      $(this).click(function(){
        notusCookies.toggleCookiesState(name);
        let state = notusCookies.cookieIsAccepted(name);
        console.log(state);
        console.log(name);        
        $textHld.text((state == true) ? '<enabled>': '<disabled>');
      });
    })
  }

  function initCookieController() {
    console.log('hi');
    initActions();
    initCookieToggle();
  }

  $(document).ready(initCookieController);
}(jQuery));
