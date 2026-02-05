$(document).ready(function() {
    // main.notify();
    var element = '#laravel_datatable';
    var url = getRunURL('list');
    var columns = [
        { data: 'num', title: '#' },
        { data: 'annoucement_id', title: 'Annoucement ID' },
        { data: 'title', title: 'Title' },
        { data: 'remarks', title: 'Remarks' },
        { data: 'added_date', title: 'Added Date' },
        { data: 'action', title: 'Action' },
    ];
    main.generateDatatable(element,url,columns);
});
$(document).on('click', '#refreshBtn', function() {
    var element = '#laravel_datatable';
    main.reloadDatatableAjax(element);
});
$(document).on('click', '.modal-close', function() {
    main.modal('#modal-dynamic');
});

$(document).on('click', '#addNewAccount', function() {
    var data = $.param({
        action:'Add New',
        action_fn:'add',
        primary_id:'',
        //add new field
    });
    var url = getRunURL('openDynamicModal');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
       main.block_ui();
    });
    request.done(function(response) {
        $('#action-text').html(response.action);
        $('#modal-dynamic .modal-body').html(response.body);
        $('#modal-dynamic #footer-custom').html(response.footer);
        main.modal(response.element,response.action_modal);
        main.fileUpload('file-upload',response.file);
        main.unblock_ui();
    });
});
$(document).on('click', '.actionExecute', function() {
    var data = $.param({
        action:'Edit',
        action_fn:$(this).data('action'),
        primary_id:$(this).data('id'),
        //add new field
    });
    var url = getRunURL('openDynamicModal');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
       main.block_ui();
    });
    request.done(function(response) {
        console.log(response.file);
        $('#action-text').html(response.action);
        $('#modal-dynamic .modal-body').html(response.body);
        $('#modal-dynamic #footer-custom').html(response.footer);
        main.modal(response.element,response.action_modal);
        main.fileUpload('file-upload',response.file);
        main.unblock_ui();
    });
});
$(document).on('click', '.actionExecuteDelete', function() {
    var id = $(this).data('id');
    var msg = $(this).data('msg');
    var action = $(this).data('action');
    var title = 'Are you sure you want to '+msg+'?';
    main.confirmation(title,function () {
        var all_data = {
            primary_id:id,
            action:action,
        };
        var data = $.param(all_data);
        if (action == 'delete') {
            var url = getRunURL('deleteDocument');
            var request = main.form_ajax(url, data, 'POST', function(xhr) {
               main.block_ui('#div_laravel_datatable');
            });
            request.done(function(response) {
                if (response.success) {
                    main.notify(response.msg,'close');
                }else{
                    main.notify('Error','close');
                }
                $('#div_laravel_datatable').unblock();
                var element = '#laravel_datatable';
                main.reloadDatatableAjax(element);
            });
        }else{
            remarksReasons(all_data);
        }
    });
});
function remarksReasons(data) {
    var title = 'Please write a reason for cancellation';
    main.remarksMsg(title,data,'afterProcessCancel');
}
function afterProcessCancel(data) {
    if (data.value == '') {
        remarksReasons(data);
    }else{
        var fndata = $.param(data);
        var url = getRunURL('deleteDocument');
        var request = main.form_ajax(url, fndata, 'POST', function(xhr) {
           main.block_ui('#div_laravel_datatable');
        });
        request.done(function(response) {
            if (response.success) {
                main.notify(response.msg,'close');
            }else{
                main.notify('Error','close');
            }
            $('#div_laravel_datatable').unblock();
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
        });
    }
}

$(document).on('submit', '#submit-form', function(event) {
    event.preventDefault();
    event.stopPropagation();
    var form = $(this)[0];
    var data = new FormData(form);;
    var url = getRunURL('crud-action');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        main.block_ui();
    },true);
    request.done(function(response) {
        if (response.success) {
            main.msg(response.msg,'success','');
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
            main.modal('#modal-dynamic');
        }else{
            if (response.exist) {
                main.msg(response.msg,'error');
            }else{
                main.msg(response.msg,'error');
            }
        }
        main.unblock_ui();
    });
});


//custom
$(document).on('click', '#bank-info-view', function() {
    main.modal('#bank-info-open','open');
});
$(document).on('click', '#attachment-view', function(event) {
    var num = $(this).data('num');
    main.modal('#open-attachment-'+num,'open');
});
$(document).on('click', '#upload-attachment', function() {
    var num = $(this).data('num');
    $('#attachment-' + num).click();
    $('#attachment-' + num).on('change', function(event) {
        var file = event.target.files[0];
        var fileName = file ? file.name : 'No file chosen';
        $('#file-name-' + num).val(fileName);
    });
});
$(document).on('click', '#download-attachment', function() {
    var link = $(this).data('link');
    window.open(link, '_blank');
});
$(document).on('click', '.acceptAppointment', function() {
    var status = $(this).data('status');
    var title = 'Are you sure you want to '+status+'?';
    var id = $(this).data('id');
    var event_id = $(this).data('eventid');
    main.confirmation(title,function () {
        var data = $.param({
            primary_id:id,
            action:status,
            event_id:event_id,
        });
        var url = getRunURL('acceptAppointment');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
           main.block_ui('#div_laravel_datatable');
        });
        request.done(function(response) {
            if (response.success) {
                main.notify(response.msg,'check');
            }else{
                main.notify('Error','close');
            }
            main.modal('#modal-dynamic');
            $('#div_laravel_datatable').unblock();
        });
    })
});


function testpluginsUpload() {
    $("#file-upload").fileinput({
        allowedFileExtensions: ["jpg","png","gif","jpeg"],//["jpg", "png", "gif", "pdf", "docx","mp4"], // Allowed file extensions
        showUpload: false, // Hide upload button
        overwriteInitial: false,
        initialPreviewAsData: true,
        dropZoneEnabled: true, // Enable drag and drop
        maxFileSize: 200048, // Maximum file size in KB
        maxFilesNum: 5, // Maximum number of files
        browseClass: "btn btn-primary", // Button styling for "Browse" button
        deleteUrl: baseUrl,
        initialPreview: [
            // TEXT DATA
            'http://localhost/clients/2024/client-01/negosyo-center-system/laravel-app/public/main/uploaded/annoucement/lyMYlNqSFk/gjZlGc6ZyC-8dCu3YOIWJ.png',
            // PDF DATA
            'https://kartik-v.github.io/bootstrap-fileinput-samples/samples/pdf-sample.pdf',
            // VIDEO DATA
            "https://kartik-v.github.io/bootstrap-fileinput-samples/samples/small.mp4"
        ],
        initialPreviewConfig: [
            {
                caption: "Lorem Ipsum.txt", 
                type: "text", 
                description: "<h5>Content # 1</h5> Enjoy this Lorem Ipsum text.", 
                downloadUrl: "/site/file-delete", 
            }, 
            {
                caption: "Lorem Ipsum.txt", 
                type: "pdf", 
                description: "<h5>Content # 1</h5> Enjoy this Lorem Ipsum text.", 
                downloadUrl: "/site/file-delete", 
            }, 
            {
                caption: "Lorem Ipsum.txt", 
                type: "video", 
                filetype: "video/mp4", 
                description: "<h5>Content # 1</h5> Enjoy this Lorem Ipsum text.", 
                downloadUrl: "/site/file-delete", 
            }
        ],
    }).on("filebeforedelete", function (event, key) {
        return !confirm("Are you sure you want to delete this file?");
    });
}
