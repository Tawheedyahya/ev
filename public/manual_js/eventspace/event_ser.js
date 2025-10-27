$(function () {
    const $form = $("#filter_form"); // ensure your form has id="filterform"

    $form.on("submit", function (e) {
        e.preventDefault();
        const dataArr = $form.serializeArray();
        console.log(dataArr)
        // return
        $.ajax({
            url: $form.attr("action"),
            type: $form.attr("method") || "POST", // 'type' works across jQuery versions
            data: $.param(dataArr),
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },

            // If your controller returns { html: '...'} JSON:
            // dataType: "json",
            success: function (res) {
                // console.log(res)
                $(".venues-wrap").html(res.h); // controller should return: return response()->json(['html' => $viewHtml]);
            },


            error: function (xhr) {
                console.log(xhr.status, xhr.responseText);
                alert("Something went wrong.");
            },
        });
    });
});
