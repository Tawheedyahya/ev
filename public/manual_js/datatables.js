$(document).ready(function () {
  $('#my_table').DataTable({
    paging: true,        // pagination
    searching: true,     // search box
    info: true,          // "Showing 1 to 10 of X entries"
    lengthChange: true,  // "Show 10/25/50 entries"
    pageLength: 10       // default rows per page
  });
});
