import $ from "jquery";

$(document).ready(function () {
    // Function to change quantity with context awareness
    function changeQuantity(button, direction) {
        // Locate the closest quantity input field in the relevant form or context
        const form = $(button).closest("form");
        const input = form.find(".quantity-input");
        let currentValue = parseInt(input.val());

        // Adjust quantity based on the direction
        if (direction === "up") {
            input.val(currentValue + 1);
        } else if (direction === "down") {
            if (currentValue > 1) {
                input.val(currentValue - 1);
            }
        }
    }

    // Event handlers for the plus and minus buttons
    $(".quantity-plus").click(function (e) {
        console.log("Clicked plus");
        e.preventDefault();
        changeQuantity(this, "up"); // Pass the button and 'up' direction to the function
    });

    $(".quantity-minus").click(function (e) {
        console.log("Clicked minus");
        e.preventDefault();
        changeQuantity(this, "down"); // Pass the button and 'down' direction to the function
    });

    // Validation for manual quantity input
    $(".quantity-input").blur(function () {
        var $this = $(this);
        if (
            $this.val() === "" ||
            isNaN($this.val()) ||
            parseInt($this.val()) <= 0
        ) {
            $this.val(1); // Default to 1 if invalid
        }
    });
});
