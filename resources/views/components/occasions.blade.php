@php
   use App\Models\Occasion;
   $lists = Occasion::all();
@endphp

<div class="my-3 occasions d-flex align-items-center justify-content-start">
    <!-- Left chevron -->
    <i class="bi bi-chevron-left fs-3 mx-3 occasion-left"></i>

    <!-- Occasion items wrapper -->
    <div class="occasions-sub-body-wrapper">
        <div class="occasions-sub-body">
            @foreach ($lists as $list)
                <div class="text-center occasion-item">
                    <img src="{{ asset('occasion_icon/birthday.png') }}"
                         alt="Occasion"
                         class="img-fluid mb-2 img-bg"
                         style="max-width:80px;">
                    <p>{{ $list->name }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Right chevron -->
    <i class="bi bi-chevron-right fs-3 mx-3 occasion-right"></i>
</div>

<style>
.occasions-sub-body-wrapper {
    overflow: hidden;    /*   hides overflow items */
    max-width: 100%;        /* responsive */
}

.occasions-sub-body {
    display: flex;
    gap: 40px;
    transition: transform 0.3s ease-in-out;
}

.occasions {
    gap: 20px;
}

.img-bg {
    background-color: #FFD580;
    padding: 10px;
    border-radius: 80px;
}

/* each item fixed width (for sliding effect) */
.occasion-item {
    flex: 0 0 120px; /* width of each card */
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.querySelector(".occasions-sub-body");
    const leftBtn = document.querySelector(".occasion-left");
    const rightBtn = document.querySelector(".occasion-right");
    const itemWidth = document.querySelector(".occasion-item").offsetWidth +40;
    let scrollPosition = 0;
    rightBtn.addEventListener("click",()=>{
        scrollPosition-=itemWidth;
        wrapper.style.transform=`translateX(${scrollPosition}px)`
        checkBtn()
    })
    leftBtn.addEventListener("click",()=>{
        scrollPosition+=itemWidth
        wrapper.style.transform = `translateX(${scrollPosition}px)`;
        checkBtn()
    })
    function checkBtn(){
    const totalWidth=wrapper.scrollWidth
    console.log(totalWidth)
    const visibleWidth=document.querySelector('.occasions-sub-body-wrapper').offsetWidth
    console.log(visibleWidth)
    if(scrollPosition>=0){
        leftBtn.style.visibility="hidden"
    }
    else{
        leftBtn.style.visibility="visible"
    }
    if(Math.abs(scrollPosition)+visibleWidth>=totalWidth){
        rightBtn.style.visibility="hidden"
    }
    else{
        rightBtn.style.visibility="visible"
    }

}
checkBtn()
})

</script>
