import $ from "jquery";

$(document).ready(function(){

    $('.quantity-plus, .quantity-minus').click(function(e){
        e.preventDefault();

        const direction = $(this).hasClass('quantity-plus') ? 'up' : 'down';
        const input = $(this).closest('form').find('.quantity-input');
        let currentValue = parseInt(input.val());

        if (direction === 'up') {
            currentValue += 1;
        } else if (direction === 'down' && currentValue > 1) {
            currentValue -= 1;
        }

        input.val(currentValue);

        // Submit the form
        $(this).closest('form').submit();
    });

    $('.quantity-input').change(function() {
        var $this = $(this);
        if ($this.val() === '' || isNaN($this.val()) || parseInt($this.val()) <= 0) {
            $this.val(1);
        }

        // Submit the form
        $this.closest('form').submit();
    });
});
