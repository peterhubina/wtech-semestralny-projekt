import "bootstrap";
import "jquery";

document.addEventListener('DOMContentLoaded', function() {
    var successPopup = document.getElementById('success-popup');
    var errorPopup = document.getElementById('error-popup');

    var cartPopup = document.getElementById('cart-popup');

    if (successPopup && successPopup.textContent.trim() !== '') {
        // Show the success popup
        showPopup(successPopup);
    }

    if (errorPopup && errorPopup.textContent.trim() !== '') {
        // Show the error popup
        showPopup(errorPopup);
    }

    if (cartPopup && cartPopup.textContent.trim() !== '') {
        // Show the error popup
        showPopup(cartPopup);
    }
});

function showPopup(popup) {
    // Show the popup
    popup.style.display = 'block';

    // Hide the popup after 5 seconds
    setTimeout(function() {
        popup.style.display = 'none';
    }, 5000);
}
