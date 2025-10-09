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
    var availableLocations = @json($location);

    // Instagram-like autocomplete
    $("#location").autocomplete({
      source: function (request, response) {
        const term = request.term.toLowerCase();
        // Only show results while typing
        if (term.length < 1) {
          response([]); // don’t show anything if less than 2 chars
          return;
        }
        const results = availableLocations
          .filter(item => item.toLowerCase().includes(term))
          .slice(0, 8); // show max 8 results
        response(results);
      },
      minLength: 2, // only show after typing 2 chars
      delay: 100,   // smooth typing delay
      position: { my: "left top+6", at: "left bottom" }
    });

    // Enter key triggers search
    $('#location').on('keydown', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        $('#search').click();
      }
    });

    // Click handler
    $('#search').on('click', function () {
      const location = $('#location').val().trim();
      if (!location) return;

      $.ajax({
        url: "{{ route($action) }}",
        method: 'GET',
        data: { location },
        success: function (res) {
            console.log(res);
          $('.venues-wrap').html(res.html);
        },
        error: function (err) {
          console.error('Error:', err);
        }
      });
    });
  });
</script>
