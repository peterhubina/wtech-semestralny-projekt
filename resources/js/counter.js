import $ from "jquery";

$(document).ready(function(){

    var quantity=0;
    $('.quantity-plus').click(function(e){
        console.log("Clicked plus");
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        $('#quantity').val(quantity + 1);


        // Increment

    });

    $('.quantity-minus').click(function(e){
        console.log("Clicked minus");
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if(quantity>1){
            $('#quantity').val(quantity - 1);
        }
    });

    $('#quantity').blur(function() {
        var $this = $(this);
        if ($this.val() === '' || isNaN($this.val()) || parseInt($this.val()) <= 0) {
            $this.val(1);
        }
    });


});
