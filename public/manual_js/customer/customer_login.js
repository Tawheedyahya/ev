
// console.log('hii')
$(document).ready(function(){
    $('#login_form').validate({
        rules:{
            email:{
                required:true,
                email:true
            },
            password:{
                required:true,
                minlength:6
            }

        },
        messages:{
            email:{
                required:'Email is required',
                email:'Enter a valid email'
            },
            password:{
                required:'password is required',
                password:'Password must be at least 6 characters'
            }
        },errorElement:"div",
        errorClass:'invalid-feedback',
        highlight:function(element){
            $(element).addClass('is-invalid').removeClass('is-valid')
        },
        unhighlight:function(element){
            $(element).removeClass('is-invalid').addClass('is-valid')
        },
        errorPlacement:function(error,element){
            error.insertAfter(element)
        }
    })
})
