$(document).ready(function() {
    /* Pace Loader */
    $(document).ajaxStart(function() {
        Pace.restart();
    });

    /* Submit Form */
    let formLogin = $("#form_login");
    formLogin.submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let formData = form.serialize();
        if (formData) {
            submitForm(formData);
        }
    });
});

/* Functions */
function submitForm(formData) {
    $.ajax({
        type: "POST",
        url: base_url + "/login",
        data: formData,
        cache: false,
        success: function(res) {
            res = JSON.parse(res);
            if (!res.validation) {
                $('#login_error').html(res.message);
            } else {
                window.location.href = base_url + "/dashboard";
            }
        }
    });
}