(function _authhentication($) {
  let $loginForm = $("#notus-form-login-hld");
  let $registerForm = $("#notus-form-register-hld");  
  $registerForm.hide();

  function init() {
    if($loginForm.length == 0 || $registerForm.length == 0)
      return;
    var $btnToRegister = $("<button>");
    $btnToRegister.text(">> Register");
    $btnToRegister.click( () => {
      $loginForm.hide();
      $registerForm.show();
    });
    $loginForm.append($btnToRegister);

    var $btnToLogin = $("<button>");
    $btnToLogin.text(">> Login");
    $btnToLogin.click( () => {
      $registerForm.hide();
      $loginForm.show();
    });
    $registerForm.append($btnToLogin);
  }  

  $(document).ready(init);
}(jQuery));
