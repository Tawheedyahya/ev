$(document).ready(function () {
    let reg = $("#regiister_form");
    if (reg) {
        $("#register_form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                company_name:{
                    required:true
                },
                email: {
                    required: true,
                    email: true,
                },
                city: {
                    required: true,
                    // minlength: 3,
                },
                profession: {
                    required: true,
                    // minlength: 3,
                },
                experience: {
                    required: true,
                },
                phone: {
                    required: true,
                    digits: true,
                },
                // instagram:{
                //     required:true
                // },
                // facebook:{
                //     required:true
                // },
                // category:{
                //     required:true
                // },
                password: {
                    required: true,
                    minlength: 6,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                },
                doc: {
                    required: true,
                    filesize: 2097152,
                    // extension:"pdf",
                },
            },
            messages: {
                name: {
                    required: "Please enter your full name",
                    minlength: "Name must be at least 3 characters",
                },
                company_name:{
                    required:"please enter your company name"
                },
                email: {
                    required: "Please enter your email",
                    email: "Enter a valid email address",
                },
                city: {
                    required: "Please enter your city",
                },
                profession: {
                    required: "Please enter your profession",
                },
                experience: {
                    required: "Please enter your experience",
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
                doc: {
                    required: "document is required",
                    // extension:'the file must be a pdf',
                    filesize: "the must be less than 2 mb",
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
    }
});
