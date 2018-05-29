(function _home($) {
  let $downloadTable = $(".download-table");
  let $triggerBtn = $(".sub-menu div.menu-link");  
  $downloadTable.hide();

  function init() {
    $triggerBtn.click(() => {
      $triggerBtn.toggleClass('is-open');
      $downloadTable.slideToggle();
    });
  }  

  $(document).ready(init);
}(jQuery));
