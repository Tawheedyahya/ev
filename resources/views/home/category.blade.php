<div class="catagorize mb-5">
    <a href="" class="a-color a-active">Verified Venues</a>
    <a href="javascript:void(0)" class="a-color" onclick="change(this)">Professionals</a>
    <a href="javascript:voit(0)" class="a-color" onclick="changee(this)">Service Providers</a>
    {{-- <a href="" class="a-color">Registeration-status</a> --}}
</div>
<style>
.catagorize{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    /* gap: 20px; */
   background: rgba(248, 248, 248, 1);

    padding: 5px;
    border-radius: 30px;
    /* width: 100vw;     */
    margin-bottom: 10px;
}
.a-color{
    flex: 1;
    color: black;
    padding: 10px;
    text-align: center;
}
.a-active{
    background: #C7E9F0;
    border-radius: 30px;
    /* width: 100px; */
}
</style>
<script>
    function change(e){
        $('.fetch').load('/yahi .categoryy > *',function(response,status,xhr){
            if(status=='success'){
                console.log(xhr.statusText)
                $('.a-active').removeClass('a-active')
                $(e).addClass('a-active')
            }else{
                console.log('bye', xhr.statusText);
            }
        })
    }
    function changee(e){
        $('.fetch').load('/ya .categoryy > *',function(response,status,xhr){
            if(status=='success'){
                console.log(xhr.statusText)
                $('.a-active').removeClass('a-active')
                $(e).addClass('a-active')
            }
            else{
                console.log('bye',xhr.statusText)
            }
        })
    }
</script>
