$(document).ready(function(){
    $('#password_reset').validate({
        rules:{
            password:{
                required:true,
                minlength:6
            },
            password_confirmation:{
                required:true,
                equalTo:'#password'
            }
        },
        messages:{
            password:{
                required:'New password is required',
                minlength:'Minimum 6 characters'
            },
            password_confirmation:{
                required:'Re-type password is required',
                equalTo: "Passwords do not match",
            }
        },
        errorElement:"div",
        errorClass:'invalid-feedback',
        highlight:function(element){
            $(element).addClass('is-invalid').removeClass('is-valid')
        },
        unhighlight:function(element){
            $(element).removeClass('is-invalid').addClass('is-valid')
        }
    })
})
