var MessageBox = {

    alert:function(msg,callback,title)
    {
        if(typeof callback!=='function') callback=function(){};
        if(typeof title==='undefined' || title==null) title='<span style="color:green"><i style="font-size:19px;" class="fa fa-check"></i> สำเร็จ</span>';
        setTimeout(function(){
            swal({title:title,text:msg,allowOutsideClick:true,html:true,},callback);
        },300);
    },

    error:function(msg,callback)
    {
        if(typeof callback!=='function') callback=function(){};
        setTimeout(function(){
            swal({title:'<span style="color:red"><i style="font-size:19px;" class="fa fa-warning"></i> ผิดพลาด</span>',text:msg,allowOutsideClick:true,html:true,},callback);
        },300);
    },

    confirm:function(msg,callback)
    {
        if(typeof callback!=='function') callback=function(){};
        setTimeout(function() {
            swal({
                title: 'กรุณายืนยัน',
                text: msg,
                showCancelButton: true,
                closeOnConfirm: true,
                allowEscapeKey: false,
                html: true,
            }, callback);
        },300);
    },

    dialog:function(msg,callback)
    {
        if(typeof callback!=='function') callback=function(){};
        setTimeout(function(){
            swal({title:title,text:msg,allowOutsideClick:true,html:true},callback);
        },300);
    },

    loading:function(type)
    {
        if(type=='open'){
            swal({title: "กรุณารอสักครู่...",text: "<i style='color:#555;font-size:30px;' class='fa fa-spinner fa-pulse'></i><br/><br/>ระบบกำลังประมวลผล อาจใช้เวลานาน<br/><br/><strong>ขอบคุณค่ะ</strong>",html:true,allowEscapeKey:false,showCancelButton: false,showConfirmButton: false,closeOnConfirm:false});
        }else{swal.close();}
    }
}
