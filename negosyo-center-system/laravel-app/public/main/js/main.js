var main = {
    form_ajax: function (url , data, type , beforeSend = function () {}, form = false) {
        if (form) {
            return $.ajax(
                {
                    url: url,
                    type: type,
                    data: data,
                    dataType: "json",
                    processData: false,
                    cache: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: beforeSend,
                    error: function(xhr, status, error) {
                        main.msg('System Error','error');
                        $.unblockUI();
                    }
                }
            );
        }else{
            return $.ajax(
                    {
                        url: url,
                        type: type,
                        data: data,
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: beforeSend,
                        error: function(xhr, status, error) {
                            main.msg('System Error','error');
                            $.unblockUI();
                        }
                    }
                );
        }
    },
    msg: function (msg,icon='',msg2='') {
        swal(msg,msg2, {
            icon: icon,
            buttons: {
              confirm: {
                className: "btn btn-primary",
              },
            },
          });
    },
    confirmation: function (title,afterProcess = function () {}) {
        swal({
            title: title,
            type: "warning",
            buttons: {
              confirm: {
                text: "Yes",
                className: "btn btn-success",
              },
              cancel: {
                visible: true,
                className: "btn btn-danger",
              },
            },
          }).then((Delete) => {
            if (Delete) {
                afterProcess();
            } else {
              swal.close();
            }
          });
    },
    block_ui:function (element=''){
        if (element == '') {
            $.blockUI({
                message: `<div class="spinner-border text-secondary" role="status"></div><div>Loading...</div>`,
                css: {
                    border: 'none',
                    padding: '10px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .7,
                    color: '#fff'
                }
            });
            // $.unblockUI();
        }else{
            $(element).block({
                message: `
                            <div class="spinner-border text-secondary" role="status"></div>
                            <div>Loading...</div>
                            `,
                css: {
                    border: 'none',
                    padding: '10px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .7,
                    color: '#fff'
                }
            });
            //$('#blockArea').unblock();
        }
    },
    unblock_ui: function (element = false) {
        if (element) {
            $(element).unblock();
        }else{
            $.unblockUI();
        }
    },
    modal: function (element,action='close') {
        if (action == 'open') {
            $(element).modal({
                backdrop: 'static',  
                keyboard: false     
            }).modal('show');
        }else{
            $(element).modal('hide');
        }
    },
    generateDatatable: function (element,url,columns,data={}) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(element).DataTable({
            serverSide: true,
            responsive: true,

            ajax: {
                url: url,
                type:'POST',
                beforeSend: function() {
                    main.block_ui(element+'_wrapper');
                },
                complete: function() {
                    $(element+'_wrapper').unblock();
                    if (typeof dataTableComplete == 'function') {
                        dataTableComplete(cls,row,data);
                    }
                },
                data:data
            },
            columns: columns
        });

        // $('body').block({
        //     message: '<div class="spinner-border text-primary"></div><h1 class="blockui blockui-title">Please Wait...</h1>'
        // });
  
    },
    reloadDatatableAjax: function (element){
        var table = $(element).DataTable();
        table.ajax.reload();
    },
    remarksMsg: function (msg,data,fn){
        swal({
            text: msg,
            content: "input",
            buttons: true, 
            closeOnClickOutside: false,
        })
        .then((value) => {
            if (value !== null) {
                if (typeof window[fn] == 'function') {
                    var data_value = {
                        value: value
                    };
                    var merged_data = $.extend({}, data, data_value);
                    window[fn](merged_data);
                }
            }
        });
    },
    notify: function (msg='Success',icon='check'){
        //http://localhost/clients/2024/templates/kaiadmin-lite-1.0.0/components/simple-line-icons.html
        switch (icon) {
            case 'check':
                var type = 'success';
                break;
            case 'close':
                var type = 'danger';
                break;
            default:
                var type = 'secondary';
                break;
        }
        $.notify({
            icon: 'icon-' + icon,
            // title: 'Kaiadmin',
            message: '<h6 style="color:black !important;">'+msg+'</h6>',
        },{
            type: type,
            placement: {
                from: "bottom",
                align: "right"
            },
            time: 1000,
        });
    },
    printPreview: function (content,css='', print_style = 0) { 
        if (print_style == 1) {
            var printWindow = window.open('', '_blank');
        }else{
            var printWindow = window.open("", "Print", `width=${screen.width},height=${screen.height}`);
        }
        var printContent = $('#' + content + '').html();
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print Preview</title>');
        printWindow.document.write(`
        <link rel="stylesheet" media="print" href="${baseUrl}public/plugins/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" media="print" href="${baseUrl}public/plugins/assets/css/fonts.min.css" />
        `);
        printWindow.document.write(`</head><style>` + css + `</style><body class="">` + printContent + `</body></html>`);
        //printWindow.document.close();
        printWindow.focus();
        setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 1000);
    },
    printDirect: function (content,css='', print_style = 0) { 
        if (print_style == 1) {
            var printWindow = window.open('', '_blank');
        }else{
            var printWindow = window.open("", "Print", `width=${screen.width},height=${screen.height}`);
        }
        var printContent = content;
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print Preview</title>');
        printWindow.document.write(`
        <link rel="stylesheet" media="print" href="${baseUrl}public/plugins/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" media="print" href="${baseUrl}public/plugins/assets/css/fonts.min.css" />
        `);
        printWindow.document.write(`</head><style>` + css + `</style><body class="">` + printContent + `</body></html>`);
        //printWindow.document.close();
        printWindow.focus();
        setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 1000);
    },
    printPageDirect: function (element,width=100,height=50) {
    // Temporarily hide elements with the "noPrint" class
        const $noPrintElements = $(".noPrint");
        $noPrintElements.hide();

        html2canvas($(element)[0]).then(canvas => {
            // Restore the hidden "noPrint" elements after canvas generation
            $noPrintElements.show();

            const imgData = canvas.toDataURL("image/png");
            const printWindow = window.open("", "Print", `width=${screen.width},height=${screen.height}`);
            printWindow.document.open();
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print</title>
                    </head>
                    <body style="margin:0;">
                        <img src="${imgData}" id="screenshot-img" style="width:${width}%;height:${height}%;" />
                    </body>
                </html>
            `);
            printWindow.document.close();

            // Wait for the image to load in the new window, then print and close
            $(printWindow.document).find("#screenshot-img").on("load", function () {
                printWindow.print();
                printWindow.close();
            });
        });
    },
    fileUpload: function (element,files=[]) {
        const initialPreview = files.length > 0 ? files.map(file => file.file_link) : [];
        const initialPreviewConfig = files.length > 0 ? files.map(file => file.file_info) : [];
        var file = $('#' + element);
        var allow = file.data('allow');
        var allowexe = [];
        if (typeof allow !== 'undefined') {
            allowexe = allow.split(",");
        }
        if (file.data('isrequired') == '1' && files.length > 0) {
            var required = false;
        }else{
            if (file.data('isrequired') == '0') {
                var required = false;   
            }else{
                var required = true;
            }
        }
        file.fileinput({
            allowedFileExtensions: allowexe,
            showUpload: false,
            overwriteInitial: false,
            required:required,
            initialPreviewAsData: true,
            dropZoneEnabled: true, 
            maxFileSize: 1024,
            // maxFilesNum: 5,
            browseClass: "btn btn-primary", // Button styling for "Browse" button
            initialPreview: initialPreview,
            initialPreviewConfig: initialPreviewConfig,
        }).on("filebeforedelete", function (event, key) {
            return !confirm("Are you sure you want to delete this file?");
        });
        
        // data-required="0"
    }
}
