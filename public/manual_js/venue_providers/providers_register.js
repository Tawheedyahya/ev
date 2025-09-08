$(document).ready(function () {
    $("#register_form").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                digits: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            },
            doc:{
                required:true,
                filesize:2097152,
                // extension:"pdf",
            }
        },
        messages: {
            name: {
                required: "Please enter your full name",
                minlength: "Name must be at least 3 characters",
            },
            email: {
                required: "Please enter your email",
                email: "Enter a valid email address",
            },
            phone: {
                required: "Please enter your phone number",
                digits: "Only numbers allowed",
            },
            password: {
                required: "Please provide a password",
                minlength: "Password must be at least 6 characters",
            },
            password_confirmation: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match",
            },
            doc:{
                required:'document is required',
                // extension:'the file must be a pdf',
                filesize:'the must be less than 2 mb',
                // extension:"pdf allowed only",
            },
        },
        errorElement: "div",
        errorClass: "invalid-feedback",
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
    });
});
