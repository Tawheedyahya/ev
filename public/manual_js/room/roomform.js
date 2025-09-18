$(function () {
    $("#room_doc").on("change", function () {
        console.log("hiii");
        const file = this.files && this.files[0];
        if (!file) return;

        if (!file.type.startsWith("image/")) {
            alert("please choose an image file");
            this.value = "";
            return;
        }
        const url = URL.createObjectURL(file);
        console.log(url);
        $("#r_img").attr("src", url);
    });
    $('#register_form').validate({
        rules:{
            room_name:{
                required:true
            },
            room_capacity:{
                required:true
            },
            room_doc:{
                // required:true,
                filesize:2097152,
            }
        },
        messages:{
            room_name:{
                required:'room_name is required'
            },
            room_capacity:{
                required:'room capacity is required'
            },
            room_doc:{
                // required:'room photo is required',
                filesize:'must be less than 2 mb'
            }
        },
        errorElement:"div",
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
    })
});
