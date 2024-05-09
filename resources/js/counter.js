import $ from "jquery";

$(document).ready(function () {
    function changeQuantity(button, direction) {
        const form = $(button).closest("form");
        const input = form.find(".quantity-input");
        let currentValue = parseInt(input.val());

        if (direction === "up") {
            input.val(currentValue + 1);
        } else if (direction === "down") {
            if (currentValue > 1) {
                input.val(currentValue - 1);
            }
        }
    }

    $(".quantity-plus").click(function (e) {
        console.log("Clicked plus");
        e.preventDefault();
        changeQuantity(this, "up");
    });

    $(".quantity-minus").click(function (e) {
        console.log("Clicked minus");
        e.preventDefault();
        changeQuantity(this, "down");
    });

    quantityInput.blur(function () {
        var $this = $(this);
        if (
            $this.val() === "" ||
            isNaN($this.val()) ||
            parseInt($this.val()) <= 0
        ) {
            $this.val(1);
        }
    });
});
