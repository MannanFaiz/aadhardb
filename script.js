// script.js
$(document).ready(function () {
    $('#aadharForm').on('submit', function (e) {
        let isValid = true;

        // Example Validation: Phone Number
        const phone = $('#phone').val();
        if (!/^\d{10}$/.test(phone)) {
            alert("Please enter a valid 10-digit phone number.");
            isValid = false;
        }

        if (!isValid) e.preventDefault(); // Stop form submission if invalid
    });
});
