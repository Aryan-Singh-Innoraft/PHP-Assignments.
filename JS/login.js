$(document).ready(function() {
    $('#login-form').on('submit',function(e) {
            e.preventDefault();

        $('#errorMessageUsername').text("");
        $('#errorMessagePassword').text("");

        $.ajax({
            url: 'http://formaryan.com/login.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                if(response.success) {
                    window.location.href = 'http://formaryan.com/assignments/assignment-4/';
                }
                else {
                    console.log(response.errors.username)
                    $('#errorMessagePassword').text(response.errors.password);
                    $('#errorMessageUsername').text(response.errors.username);
                }
            }
        });

    })
})
