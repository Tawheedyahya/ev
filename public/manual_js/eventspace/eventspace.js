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

        // 1) read location input; 2) fallback to button attribute(s)
        // let locVal = ($("#location").val() || "").trim();
        // if (!locVal || locVal=="" || locVal=='' || locVal==null) {
        //     locVal =
        //         $("#locationplace").text().trim().toLowerCase() ||
        //         "";
        // }
        const dataArr = $form.serializeArray();
        console.log(dataArr)
        // for (let i = dataArr.length - 1; i >= 0; i--) {
        //     if (dataArr[i].name === "location") dataArr.splice(i, 1);
        // }
        // dataArr.push({ name: "location", value: locVal });

        $.ajax({
            url: $form.attr("action"),
            type: $form.attr("method") || "POST", // 'type' works across jQuery versions
            data: $.param(dataArr),
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },

            // If your controller returns { html: '...'} JSON:
            dataType: "json",
            success: function (res) {
                $(".venues-wrap").html(res.html); // controller should return: return response()->json(['html' => $viewHtml]);
            },

            // If your controller returns raw HTML instead, use:
            // success: function (html) { $('.venues-wrap').html(html); },

            error: function (xhr) {
                console.log(xhr.status, xhr.responseText);
                alert("Something went wrong.");
            },
        });
    });



     const $mobile_form = $(".filter_form"); // ensure your form has id="filterform"

    $mobile_form.on("submit", function (e) {
        e.preventDefault();

        // 1) read location input; 2) fallback to button attribute(s)
        let locVal = ($("#location").val() || "").trim();
        if (!locVal || locVal=="" || locVal=='' || locVal==null) {
            locVal =
                $("#locationplace").text().trim().toLowerCase() ||
                "";
        }
        const dataArr = $mobile_form.serializeArray();
        console.log(dataArr)
        for (let i = dataArr.length - 1; i >= 0; i--) {
            if (dataArr[i].name === "location") dataArr.splice(i, 1);
        }
        dataArr.push({ name: "location", value: locVal });

        $.ajax({
            url: $mobile_form.attr("action"),
            type: $mobile_form.attr("method") || "POST", // 'type' works across jQuery versions
            data: $.param(dataArr),
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },

            // If your controller returns { html: '...'} JSON:
            dataType: "json",
            success: function (res) {
                $(".venues-wrap").html(res.html);
                 // controller should return: return response()->json(['html' => $viewHtml]);

            },

            // If your controller returns raw HTML instead, use:
            // success: function (html) { $('.venues-wrap').html(html); },

            error: function (xhr) {
                console.log(xhr.status, xhr.responseText);
                alert("Something went wrong.");
            },
        });
    });
});
