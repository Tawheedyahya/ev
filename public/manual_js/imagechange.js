$(".room_doc").on("change", function () {
    // console.log('hi')
    $(".show_doc").removeClass("d-none");
    // $(this).value==''
    const file = this.files[0];
    if (file) {
        const url = URL.createObjectURL(file);
        $(".show_doc").attr("src", url);
    }
});
