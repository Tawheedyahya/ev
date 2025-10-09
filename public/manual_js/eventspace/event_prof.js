$(function () {
    const filterform = $(".filter_form");
    const $range = $(".price");
    const $min = $(".min_price");

    // slider -> input
    $range.on("input change", function () {
        $min.val(this.value);
    });

    // input -> slider (with clamping & step snapping)
    $min.on("input change", function () {
        const min = parseInt($range.attr("min"), 10) || 0;
        const max = parseInt($range.attr("max"), 10) || 100;
        const step = parseInt($range.attr("step"), 10) || 1;

        let v = parseInt($(this).val().replace(/[^\d]/g, ""), 10) || min;
        v = Math.round(v / step) * step; // snap to step
        v = Math.min(Math.max(v, min), max); // clamp to [min, max]

        $(this).val(v);
        $range.val(v).trigger("input"); // keep everything in sync
    });

    // initialize the input with the slider's starting value
    $min.val($range.val());
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
