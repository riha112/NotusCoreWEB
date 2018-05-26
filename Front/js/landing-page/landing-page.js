(function _landingPage($) {
  function slideFrame() {
    const $firstFrame = $('.block-1');
    const targetID = this.getAttribute('data-frame-toggle');
    $firstFrame.attr('data-target', targetID);
  }

  function initFrameSliding() {
    const $sliders = $('*[data-frame-toggle]');
    $sliders.click(slideFrame);
  }

  function toggleDownloadScreen() {
    $('body').toggleClass('download-screen-active');
  }

  function initDownloadScreen() {
    const $downloadBtn = $('.download');
    $downloadBtn.click(toggleDownloadScreen);

    const $closeBtn = $('.download-list .close');
    $closeBtn.click(toggleDownloadScreen);
  }

  function initLandingPage() {
    initFrameSliding();
    initDownloadScreen();
  }

  $(document).ready(initLandingPage);
}(jQuery));
