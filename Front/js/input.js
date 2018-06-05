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

  function MultiFileAdd() {
    const fields = $(".multi-field-content");
    fields.each(function(){
      const $this = $(this);
      let counter = 0;
      const nameing = $this.attr("data-nameing");
      const max = $this.attr("data-max");
      let f = $this.find(".field");
      f.find(".remove").click(function(){
        $(this).parent().remove();
      });
      const field = f.clone(true);
      $this.find(".add-field").click(function(){
        $fields = $this.find(".field");
        if(max <= $fields.length) return;

        counter++;
        let newDOM = field.clone(true);
        newDOM.find("input").attr("name", nameing + "-" + counter);
        newDOM
        newDOM.insertBefore($(this));
      });
    });
  }

  function initInput() {
    const $limiters = $('.form-field .limit');
    const inputData = [];
    MultiFileAdd();
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
