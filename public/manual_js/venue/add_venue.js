// Initialize Select2 on the 'venue_type' select element
$(document).ready(function() {
    $('#venue_type').select2({
        placeholder: "Select venue types",
        allowClear: true,
        width: '100%'
    });
});



$(document).ready(function () {
    $("#register_form").validate({
        rules: {
            venue_name: {
                required: true,
            },
            // "venue_type[]": {
            //     required: true,
            // },
            venue_address: {
                required: true,
            },
            venue_city: {
                required: true,
            },
            venue_seat_capacity: {
                required: true,
            },
            // "venue_facilities[]":{
            //     required:true,
            // },
            food_provide:{
                required:true,
            },
            latitude:{
                required:true,
            },
            longitude:{
                required:true,
            },
            //  doc:{
            //     required:true,
            //     filesize:2097152,
            // },
            amount:{
                required:true
            },
            description:{
                required:true
            }
        },
        messages: {
            venue_name: {
                required: "Enter you venue name",
            },
            // "venue_type[]": {
            //     required: "Enter your venue type",
            // },
            venue_address: {
                required: "Enter your venue address",
            },
            venue_city: {
                required: "Enter you place located at your venue",
            },
            venue_seat_capacity: {
                required: "Enter venue capacity",
            },
            // "venue_facilities[]":{
            //     required:"Venue facility is required"
            // },
            food_provide:{
                required:"Select any one yes or no"
            },
            latitude:{
                required:"choose map for latitude"
            },
            longitude:{
                required:"choose map for longitude"
            },
                // doc:{
                //     required:'image is required',
                //     // extension:'the file must be a pdf',
                //     filesize:'the must be less than 2 mb',
                //     // extension:"pdf allowed only",
                // },
            amount:{
                required:"Enter your amount"
            },
            description:{
                required:'Description about your venue is required'
            }
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
