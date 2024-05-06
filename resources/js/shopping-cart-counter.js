import $ from 'jquery';

$(document).ready(function () {
    let productPrices = {};

    // Fetch prices on page load
    $('.quantity-input').each(function () {
        const productId = $(this).data('product-id');
        productPrices[productId] = parseFloat($('#price-per-item-' + productId).text().replace(/[^\d.-]/g, ''));
    });

    // Prevent form submission for quantity input form
    $('form:has(.quantity-input)').submit(function (e) {
        e.preventDefault();
    });

    // Function to update prices
    function updatePrices(input) {
        const productId = input.data('product-id');
        const pricePerItem = productPrices[productId];
        $('#total-item-price-' + productId).text((input.val() * pricePerItem).toFixed(2) + " €");
        $('#summary-quantity-' + productId).text(input.val() + "ks");
        $('#summary-price-' + productId).text((input.val() * pricePerItem).toFixed(2) + "€");

        let total_price = 0;
        $('.quantity-input').each(function () {
            const productId = $(this).data('product-id');
            const quantity = parseInt($(this).val());
            const pricePerItem = productPrices[productId];
            total_price += quantity * pricePerItem;
        });
        $('#total-price-without-tax').text((total_price * 0.8).toFixed(2) + " €");
        $('#total-tax').text((total_price * 0.2).toFixed(2) + " €");
        $('#total-price-with-tax').text(total_price.toFixed(2) + " €");
    }

    // Handle quantity changes
    $('.quantity-plus, .quantity-minus').click(function (e) {
        e.preventDefault();

        const direction = $(this).hasClass('quantity-plus') ? 'up' : 'down';
        const input = $(this).closest('form').find('.quantity-input');
        let currentValue = parseInt(input.val());

        if (direction === 'up') {
            input.val(currentValue + 1);
        } else if (direction === 'down' && currentValue > 1) {
            input.val(currentValue - 1);
        }

        updatePrices(input);
    });

    // Handle manual changes
    $('.quantity-input').change(function () {
        let input = $(this);
        let quantity = parseInt(input.val());
        if (isNaN(quantity) || quantity < 1) {
            input.val(1);
        }
        updatePrices(input);
    });

    // Handle unfocus event
    $('.quantity-input').blur(function () {
        if ($(this).val() === '' || isNaN($(this).val()) || parseInt($(this).val()) <= 0) {
            $(this).val(1);
        }
    });
});
