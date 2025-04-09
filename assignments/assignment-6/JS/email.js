$(document).ready(function () {
    $('#email-form').on('submit', function (e) {
        $('#emailError').text("Helloooooo aryan sucesssssss");
        e.preventDefault();

        const email = $('#email').val();

        $.ajax({
            url: 'welcome.php',
            type: 'POST',
            data: { email: email },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // window.location.href = '../welcome.php';
                    $('#emailError').text("Helloooooo aryan sucesssssss");return true;

                } else {
                    $('#emailError').text("Helloooooo aryan wronggggg ");
                    return false;
                }
            }
            
        });
    });
});