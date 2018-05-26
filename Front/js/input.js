(function _input($) {
  function inputUpdate(input, me) {
    const inputText = me.value;
    const counter = input.limit - inputText.length;
    input.limiter.html(counter);
    if (counter < 0) {
      if (!input.$hld.hasClass('error-limit')) {
        input.$hld.addClass('error-limit');
      }
    } else if (input.$hld.hasClass('error-limit')) {
      input.$hld.removeClass('error-limit');
    }
  }

  function initInput() {
    const $limiters = $('.form-field .limit');
    const inputData = [];

    [...$limiters].forEach((limiter) => {
      const $this = $(limiter);
      inputData.push({
        limiter: $this,
        $input: $this.siblings('input'),
        $hld: $this.parent(),
        limit: Number($this.text()),
      });
    });

    inputData.forEach((input) => {
      const { $input } = input;
      inputUpdate(input, $input[0]);
      $input.on('change paste keyup', (() => {
        inputUpdate(input, $input[0]);
      }));
    });
  }

  $(document).ready(initInput());
}(jQuery));
