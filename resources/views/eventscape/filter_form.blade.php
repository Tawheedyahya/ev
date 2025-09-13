<!-- Offcanvas (visible on mobile; you can add d-md-none if you want to hide it on md+) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel">Filter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="filter-form">
            <div class="filter-form-header ">
                <div class="">
                    <a href=""><span>Reset all</span></a>
                </div>
            </div>
            <div class="filter-form-category">
                @include('eventscape.category')
            </div>
        </div>
    </div>
</div>

{{-- desktop view --}}
<div class="desktop-view d-none d-lg-block d-md-block">
    <div class="filter-form">
        <div class="filter-form-header row">
            <div class="start col">
                <h2 class="" style="font-size: 20px">filter</h2>
            </div>
            <div class="end col col-md-3">
                <a href=""><span>Reset all</span></a>
            </div>
        </div>
        <div class="filter-form-category">
            @include('eventscape.category')
        </div>
        <div class="form">
            <form action="">

            </form>
        </div>
    </div>
</div>
<style>

</style>
