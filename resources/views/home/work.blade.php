<div class="ped">
<div class="work-show container-fluid mt-5">
    <img src="{{ asset('ev_photos/work.png') }}" alt="" id="work-png" class="img-fluid" loading="lazy">

</div>
</div>
<div class="girl">
    <img src="{{ asset('ev_photos/girl.png') }}" alt="" class="img-fluid" loading="lazy">
</div>
<div class="halal mt-3 ">
    <img src="{{ asset('ev_photos/halal.png') }}" alt="" class="img-fluid" loading="lazy">
</div>
<style>
    .work-show {
        /* margin-top: 20px; */
       background: #2C3E50;

        border-radius: 20px;
        /* align-content: center;
         */
         padding: 10px 10px;
        text-align: center;
        margin-bottom: 20px;
    }
    @media(min-width:748px){
        .work-show{
             padding: 40px 40px;
        }
        .ped{
            padding: 40px;
        }
    }
    .girl {
        text-align: center;
    }

    .halal {
        width: 100%;
        text-align: center;
    }

    .halal img {
        width: 100%;
        /* height: 100px; */
        height: auto;
        display: block;
    }
</style>
