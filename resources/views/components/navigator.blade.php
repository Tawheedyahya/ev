<div class="container search-bar">
  <div class="custom-search-bar d-flex align-items-center shadow-lg overflow-hidden">
    {{-- Location Button --}}
    <button type="button" class="btn btn-warning d-flex align-items-center px-4 py-3 border-0 custom-left-btn"
      id="locationplace" aria-label="Use my location">
      <i class="bi bi-geo-alt-fill me-2"></i>
    </button>

    {{-- Search Input --}}
    <input type="text" class="form-control border-0 px-3 py-3 flex-fill custom-input" placeholder="Search..."
      name="location" id="location" aria-label="Search">

    {{-- Search Button (type="button" to avoid form submit) --}}
    <button type="button" class="btn btn-warning d-flex align-items-center px-4 py-3 border-0 custom-right-btn"
      id="search">
      <i class="bi bi-search me-2"></i>
      Search
    </button>
  </div>
</div>
<div class="show">

</div>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<script>
  $(function () {
    // Autocomplete
    var availableLocations = @json($location);
    $("#location").autocomplete({
      source: availableLocations,
      minLength: 0
    }).on('focus', function () {
      // show all options on focus
      $(this).autocomplete('search', '');
    });

    // Click handler (jQuery way)
    $('#search').on('click', function () {
      const location = $('#location').val().trim();
      if (location !== '') {
        $.ajax({
          url: "{{ route('eventspace.location') }}", // <-- Blade string
          method: 'GET',                              // or 'POST' (then add CSRF)
          data: { location: location },
          success: function (res) {
            $('.venues-wrap').html(res.html)
            // TODO: render your results here
          },
          error: function (err) {
            console.error('Error:', err);
          }
        });
      }
    });
  });

</script>
