<style>
.toast {
    position: fixed !important;
    top: 20px !important;
    right: 20px !important;
    z-index: 99999 !important;
}
</style>

@if (session('success'))
<div class="toast align-items-center text-white border-0" role="alert" style="background-color: green" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{session('success')}}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif
@if (session('error'))
<div class="toast align-items-center text-white border-0" role="alert" style="background-color:red" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{session('error')}}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif
<script>
document.addEventListener("DOMContentLoaded", function () {
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    // console.log(toastElList)
    toastElList.forEach(function (toastEl) {
        var toast = new bootstrap.Toast(toastEl, {
            delay: 3000,    // 3 seconds
            autohide: true // auto-hide after delay
        });
        toast.show();
    })
});
</script>

