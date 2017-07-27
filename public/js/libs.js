var Helper = {

    editContent:function($uri,callback)
    {
        Helper.ajax($uri,'GET','',callback);
    },

    deleteContent:function($uri,callback)
    {
        Helper.ajax($uri,'DELETE','',callback);
    },

    cancelContent:function($uri,callback)
    {
        Helper.ajax($uri,'PUT','',callback);
    },

    ajax:function(url,method,params,callback)
    {
        setTimeout(function(){MessageBox.loading('open');},10);
        if(typeof params==='object')
        {
            if(method!='GET') params['_method']=method;
        }
        else
        {
            if(method!='GET')
            {
                if(typeof params=='string' && params!='')
                {
                    params = params+'&_method='+method;
                }
                else
                {
                    params = {};
                    params['_method']=method;
                }
            }
        }

        $.ajax({
            url:url,
            type:method,
            dataType:'json',
            data:params,
            statusCode: {
                503: function (data)
                {
                    MessageBox.loading('hide');
                    MessageBox.error('<p style="color:red">ขออภัยค่ะ ท่านไม่มีสิทธิในการเข้าใช้งาน กรุณาติดต่อเจ้าหน้าที่</p>',function(){
                        window.location.reload(true);
                    });
                },
                500: function (data)
                {
                    MessageBox.loading('hide');
                    MessageBox.error('<p style="color:red">ขออภัยค่ะ เกิดความผิดพลาด กรุณาติดต่อเจ้าหน้าที่</p>');
                },
                401: function (data)
                {
                    MessageBox.loading('hide');
                    MessageBox.error('<p style="color:red">ขออภัยค่ะ กรุณาล็อกอินเข้าสู่ระบบก่อนค่ะ</p>',function(){
                        window.location.reload(true);
                    });
                },
                422: function (data)
                {
                    MessageBox.loading('hide');
                    if(typeof data.responseJSON.body!=='undefined')
                    {
                        MessageBox.error(data.responseJSON.body);
                    }
                    else
                    {
                        if(data.responseJSON.length>1)
                        {
                            var message = '<div style="text-align:left;"><ul style="list-style:none;margin:0;padding:0;">';
                            $.each(data.responseJSON, function (i, item) {
                                message += '<li style="font-size:13px;"><i style="color:red;" class="fa fa-caret-right"></i> ' + item + '</li>';
                            });
                            message += '</ul></div>';
                        }
                        else
                        {
                            var message = '';
                            $.each(data.responseJSON, function (i, item) {
                                message +=item + '<br/>';
                            });
                        }
                        MessageBox.error(message);
                    }
                }
            },
            success:function(response)
            {
                MessageBox.loading('hide');
                if(typeof response.export!=='undefined')
                {
                    var fm='<form action="/download" method="get" id="download_export_file"><input value="'+response.file_name+'" type="hidden" name="n"/><input value="'+response.path+'" type="hidden" name="f"/><input type="submit" id="downloadfilesubmit"/></form>';
                    $('body').append(fm);
                    $('#downloadfilesubmit').get(0).click();
                    $('#download_export_file').remove();
                    if(typeof response.refresh!=='undefined')
                    {
                        setTimeout(function(){window.location.reload(true);},500);
                    }
                    return false;
                }
                callback(response);
            },
            error:function(response)
            {
                MessageBox.loading('hide');
                if (typeof(response.responseJSON)==='object')
                {
                    var msg = response.responseJSON;
                    var html_msg = '';
                    $.each(msg,function(i,item){
                        html_msg += '<p class="text-danger">'+item+'</p>';
                    });
                    MessageBox.alert(html_msg);
                }
                else
                {
                    MessageBox.error('เกิดความผิดพลาด กรุณาติดต่อเจ้าหน้าที่');
                }
            }
        });
    }
};

(function( $ ) {
    $.fn.myForm = function()
    {
        var $el  = $(this);
        if(!$el.hasClass('no-ajax'))
        {
            $el.submit(function (event) 
            {
                if(typeof CKEDITOR!=='undefined')
                {
                    for(var editor in CKEDITOR.instances)
                    {
                        if(typeof CKEDITOR.instances[editor] !=='undefined')
                        {
                            CKEDITOR.instances[editor].updateElement();
                        }
                    }
                }

                $.ajax({
                    type: $el.attr('method'),
                    url: $el.attr('action'),
                    data: $el.serialize() + '&_method=' + $el.attr('method'),
                    dataType: 'json',
                    encode: true,
                    beforeSend: function (xhr)
                    {
                        if(typeof beforesend_form==='function')
                        {
                            return beforesend_form();
                        }
                        MessageBox.loading('open');
                    },
                    statusCode: {
                        503: function (data)
                        {
                            MessageBox.loading('hide');
                            MessageBox.error('<p style="color:red">ขออภัยค่ะ ท่านไม่มีสิทธิในการเข้าใช้งาน กรุณาติดต่อเจ้าหน้าที่</p>',function(){
                                window.location.reload(true);
                            });
                        },
                        500: function (data)
                        {
                            MessageBox.loading('hide');
                            MessageBox.error('<p style="color:red">ขออภัยค่ะ เกิดความผิดพลาด กรุณาติดต่อเจ้าหน้าที่</p>');
                        },
                        401: function (data)
                        {
                            MessageBox.loading('hide');
                            MessageBox.error('<p style="color:red">ขออภัยค่ะ กรุณาล็อกอินเข้าสู่ระบบก่อนค่ะ</p>',function(){
                                window.location.reload(true);
                            });
                        },
                        422: function (data)
                        {
                            MessageBox.loading('hide');
                            if(data.responseJSON.length >1)
                            {
                                var message = '<div style="text-align:left;"><ul style="list-style:none;margin:0;padding:0;">';
                                $.each(data.responseJSON, function (i, item) {
                                    message += '<li style="font-size:13px;"><i style="color:red;" class="fa fa-caret-right"></i> ' + item + '</li>';
                                });
                                message += '</ul></div>';
                            }
                            else
                            {
                                var message = '';
                                $.each(data.responseJSON, function (i, item) {
                                    message +=item + '<br/>';
                                });
                            }
                            MessageBox.error(message);
                        }
                    }
                }).done(function (data) {
                    MessageBox.loading('hide');
                    if(typeof data.export!=='undefined')
                    {
                        var fm='<form action="/download" method="get" id="download_export_file"><input value="'+data.file_name+'" type="hidden" name="n"/><input value="'+data.path+'" type="hidden" name="f"/><input type="submit" id="downloadfilesubmit"/></form>';
                        $('body').append(fm);
                        $('#downloadfilesubmit').get(0).click();
                        $('#download_export_file').remove();
                        return false;
                    }
                    else if(typeof data.show_html!=='undefined')
                    {
                        var fm='<form action="/download" method="get" id="download_export_file"><input value="'+data.file_name+'" type="hidden" name="n"/><input value="'+data.path+'" type="hidden" name="f"/><input type="submit" id="downloadfilesubmit"/></form>';
                        $('body').append(fm);
                        $('#downloadfilesubmit').get(0).click();
                        $('#download_export_file').remove();
                        return false;
                    }
                    else if(typeof data.callback!=='undefined')
                    {
                        if(typeof window[data.callback]=='function')
                        {
                            window[data.callback](data);
                            return false;
                        }
                    }
                    else if(typeof data.modal !=='undefined')
                    {
                        var contener_edit = $('#modal-edit-content');
                        $('.modal-backdrop').remove();
                        contener_edit.find('.modal').modal('hide');
                        contener_edit.empty().append(data.body);
                        contener_edit.find('form').each(function(i,e)
                        {
                            $(e).myForm();
                        });
                        contener_edit.find('input.datepicker').each(function(i,e)
                        {
                            $(e).myDatePicker();
                        });

                        contener_edit.find('select').each(function(i,e)
                        {
                            var t = $(e).attr('data-tags');
                            if(t=='1')
                            {
                                $(e).select2Tags();
                            }
                            else
                            {
                                $(e).select2Build();
                            }
                            //$(e).select2Build();
                        });
                        contener_edit.find('.modal').modal('show');

                        return;

                    }
                    var callback = function () {};
                    if (typeof callback_ajax === 'function')
                    {
                        callback_ajax(data);
                    }
                    else
                    {
                        if(typeof data.message!=='undefined')
                        {
                            MessageBox.alert(data.message, callback);
                        }
                        else
                        {
                            MessageBox.alert(data[0],function(){
                                window.location.reload(true);
                            });
                        }
                    }
                });
                event.preventDefault();
            });
        }
    };

    $.fn.popupEditForm = function(url)
    {
        Helper.editContent(url,function(obj){
            if(typeof obj !='undefined')
            {
                if(typeof obj.export!=='undefined')
                {
                    var fm='<form action="/download" method="get" id="download_export_file"><input value="'+obj.file_name+'" type="hidden" name="n"/><input value="'+obj.path+'" type="hidden" name="f"/><input type="submit" id="downloadfilesubmit"/></form>';
                    $('body').append(fm);
                    $('#downloadfilesubmit').get(0).click();
                    $('#download_export_file').remove();
                    return false;
                }
                else if(typeof obj.message !=='undefined')
                {
                    MessageBox.alert(obj.message,function(){
                        window.location.reload(true);
                    });
                }
                var contener_edit = $('#modal-edit-content');
                $('.modal-backdrop').remove();
                contener_edit.find('.modal').modal('hide');
                contener_edit.empty().append(obj.body);
                contener_edit.find('form').each(function(i,e)
                {
                    $(e).myForm();
                });
                contener_edit.find('input.datepicker').each(function(i,e)
                {
                    $(e).myDatePicker();
                });

                contener_edit.find('select').each(function(i,e)
                {
                    var t = $(e).attr('data-tags');
                    if(t=='1')
                    {
                        $(e).select2Tags();
                    }
                    else
                    {
                        $(e).select2Build();
                    }
                    //$(e).select2Build();
                });
                contener_edit.find('.modal').modal('show');

                contener_edit.find('.uploadfile-btn').each(function(i,e){
                    $(e).uploadFile();
                });
            }
        });
    }
}( jQuery ));

(function( $ ) {
    $.fn.select2Build = function()
    {
        var $el  = $(this);
        var obj = {placeholder: 'กรุณาเลือก', allowClear: true};
        var url = $el.attr('data-ajax--url');
        var clear = $el.attr('data-clear');
        if(typeof clear !=='undefined')
        {
            obj['allowClear'] = false;
        }
        if (typeof url != 'undefined')
        {
            obj['ajax'] = {
                url: url,
                dataType: 'json',
                delay: 250,
                data: function (params)
                {
                    return {
                        q: params.term,
                        page: params.page,
                    };
                },
                processResults: function (data, params)
                {
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 25) < data.total_count
                        }
                    };
                },
                cache: true
            }
        }
        else
        {
            if($el.children().length<10)
            {
                obj['minimumResultsForSearch']='Infinity';
            }
        }
        $el.select2(obj);
        if (typeof url != 'undefined')
        {
            $el.on("select2:select", function (e)
            {
                var data = e.params.data;
                var name = $(e.currentTarget).attr('name');
                $('#' + name + "_text").remove();
                $("<input type='hidden' id='" + name + "_text' name='" + name + "_text'>").val(data.text).insertAfter($(e.currentTarget));
            });
        }
    };
}( jQuery ));

(function( $ ) {
    $.fn.select2Tags = function()
    {
        var $el  = $(this);
        $el.select2({tags: true,tokenSeparators: [' ',',']});
    };
}( jQuery ));


(function( $ ) {
    $.fn.uploadFile = function () {
        var $el = $(this);
        var url = $el.attr('data-url');
        var name  = $el.attr('data-name');
        var callback = $el.attr('data-callback');
        var callbackerror = $el.attr('data-callbackerror');
        new ss.SimpleUpload({
            button: $el.get(0),
            url: '/upload',
            allowedExtensions: ['xls','xlsx','pdf','jpg','jpeg','png','doc','docx'],
            name: 'userfile',
            multipart: true,
            responseType: 'json',
            onSubmit: function(){
                MessageBox.loading('open');
            },
            onComplete: function( filename, response )
            {
                MessageBox.loading('hide');
                if(response.status!=200)
                {
                    MessageBox.error(response.message);
                    return false;
                }
                else
                {
                    $($el).text(response.file_name);
                    $('#'+name).remove();
                    $('#'+name+'_source').remove();
                    $("<input type='hidden' id='"+name+"_source' name='"+name+"_source' value='"+response.file_name+"'/>").insertBefore($el);
                    $("<input type='hidden' id='"+name+"' name='"+name+"' value='"+response.full_path+"'/>").insertBefore($el);
                }
            },
            onError: function() {
                MessageBox.loading('hide');
            }
        });
    }
}( jQuery ));

(function( $ ) {
    $.fn.myDatePicker = function()
    {

        var $el = $(this);
        $('<div class="div-for-picker"></div>').insertBefore($el);
        var $myparent = $el.prev();
        $myparent.append($el);
        $myparent.append('<i class="fa icon-picker fa-calendar"></i>');
        $el.attr('data-date-language','th-th');
        var is_top = $el.attr('data-top');
        var obj={autoclose:true};
        if(typeof is_top!=='undefined') obj['show_top'] = true;
        $el.datepicker(obj);
        $el.on('keypress',function(event){
            var key = event.keyCode || event.charCode;
            if( key == 8 || key == 46 ) return true;
            else return false;
        });
    };
}( jQuery ));
$('.datepicker').each(function(i,e){$(e).myDatePicker()});


$(function(){
    $('form').each(function(i,e){$(e).myForm();});
    $.fn.select2.defaults.set("width", "100%");
    $('select').each(function(i,e){
        var t = $(e).attr('data-tags');
        if(t=='1')
        {
            $(e).select2Tags();
        }
        else
        {
            $(e).select2Build();
        }
    });
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
    $(document).on('click','.edit-content',function(event){
        event.preventDefault();
        var url = $(this).attr('href');
        $.fn.popupEditForm(url);
    });

    $(document).on('click','.cancel-content',function(event){
        event.preventDefault();
        var _that = this;
        var title = $(this).attr('title');
        var message = 'ท่านต้องการที่จะยกเลิกรายการนี้ใช่หรือไม่';
        if(typeof title!='undefined' && title!=='')
        {
            message='ท่านต้องการที่จะยกเลิก <strong>'+title+'</strong> ใช่หรือไม่';
        }
        MessageBox.confirm(message,function()
        {
            var uri = $(_that).attr('href');
            Helper.cancelContent(uri, function (obj) {
                if (typeof obj != 'undefined') {
                    MessageBox.alert(obj[0],function () {
                        window.location.reload(true);
                    });
                }
            });
        });
    });

    $(document).on('click','.delete-content',function(event){
        event.preventDefault();
        var _that = this;
        var title = $(this).attr('title');
        var message = 'ท่านต้องการที่จะลบรายการนี้ใช่หรือไม่';
        if(typeof title!='undefined' && title!=='')
        {
            message='ท่านต้องการที่จะลบ <strong>'+title+'</strong> ใช่หรือไม่';
        }
        MessageBox.confirm(message,function()
        {
            var uri = $(_that).attr('href');
            Helper.deleteContent(uri, function (obj) {
                if (typeof obj != 'undefined') {
                    MessageBox.alert(obj[0],function () {
                        window.location.reload(true);
                    });
                }
            });
        });
    });

    $(document).on('keypress',".numberonly",function (evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=37 && charCode!=39 && charCode!=8)
            return false;
        return true;
    });
    $(document).on('keypress',".numberonlydot",function (evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46 && charCode!=37 && charCode!=39 && charCode!=8)
            return false;
        return true;
    });
    $(document).on('keypress',".numberonlydotlob",function (evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46 && charCode!=45 && charCode!=37 && charCode!=39 && charCode!=8)
            return false;
        return true;
    });
});
