$(document).ready(function () {
    $('#my_table').DataTable({
        paging: true,
        searching: true,
        info: true,
        lengthChange: true,
        pageLength: 10,
        autoWidth: false,

        dom:
            "<'row mb-3 align-items-center'<'col-md-6'l><'col-md-6 text-end'f>>" +
            "<'row'<'col-12'tr>>" +
            "<'row mt-3 align-items-center'<'col-md-5'i><'col-md-7 text-end'p>>",

        language: {
            search: "",
            searchPlaceholder: "Search",
            lengthMenu: "Show _MENU_ entries"
        }
    });
});
