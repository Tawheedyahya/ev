$.validator.setDefaults({
    normalizer:function(value){
        return $.trim(value)
    }
})
$.validator.addMethod("filesize",function(value,element,param){
    if(element.files.length===0){
        return true
    }
    return element.files[0].size<=param
},'file must be less than 2mb compress and upload')
