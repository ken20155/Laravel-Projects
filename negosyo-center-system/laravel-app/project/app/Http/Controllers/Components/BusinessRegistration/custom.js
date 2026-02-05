
function businessNameChoose(id,unique_connection,action='Approved') {
    swal({
        title: "Choose an Business Name:",
        content: {
          element: "select",
          attributes: {
            id: "custom-select",
            class: "form-control", // Add the Bootstrap class here
          },
        },
        buttons: {
            confirm: {
              text: "Submit",
              value: true,
            },
            cancel: {
              text: "Cancel",
              visible: true,
            },
          },
          closeOnClickOutside: false,
    }).then((value) => {
    // Manually retrieve the selected value
    if (value === true) {
        var data = $.param({
            primary_id:id,
            action:action,
            unique_connection:unique_connection,
            isupload:0,  
            choose_business_name:$("#custom-select").val()
        });
        var url = getRunURL('approvedDocument');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
        main.block_ui('#div_laravel_datatable');
        });
        request.done(function(response) {
            if (response.success) {
                main.notify(response.msg,'check','');
            }else{
                main.notify('Error','close');
            }
            $('#div_laravel_datatable').unblock();
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
        });
    }
    });
    var data_param = $.param({id:id});
    var url = getRunURL('businessNameChoose');
    var request = main.form_ajax(url, data_param, 'POST', function(xhr) {
    });
    request.done(function(response) {

        const $select = $("#custom-select");
        const options = response.data;
    
        options.forEach((option) => {
            $select.append(`<option value="${option}">${option}</option>`);
        });
        $('#custom-select').addClass('form-select');

    });



}
$(document).ready(function() {
    // main.notify();
    var element = '#laravel_datatable';
    var url = getRunURL('list');
    var columns = [
        { data: 'num', title: '#' },
        { data: 'id_no', title: 'ID NO' },
        { data: 'bsuiness_name', title: 'Bsuiness Name' },
        { data: 'owner_fullname', title: 'Owner Full Name' },
        { data: 'certificate_no', title: 'Certificate No' },
        { data: 'added_date', title: 'Added Date' },
        { data: 'status', title: 'Status' },
        { data: 'action', title: 'Action' },
        // { data: 'is_upload', title: 'Actions' },
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

$(document).on('click', '#test-test', function() {
    //$('#exampleModal').modal('show');
    var data = $.param({data:'sample'});
    var url = getRunURL('open-modal-add');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        // $('#btn-login').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`).prop('disabled',true);
    });
    request.done(function(response) {
       $('#awdawdawd').html(response.data);
       $('#exampleModal').modal('show');
    });
});
$(document).on('click', '.actionExecuteDelete', function() {
    var title = 'Are you sure you want to Delete?';
    var id = $(this).data('id');
    main.confirmation(title,function () {
        var data = $.param({
            primary_id:id
        });
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
    })
});
$(document).on('click', '#downloadNow', function() {

    const imageUrl = $('#imageBnr').attr('src');
    const link = document.createElement('a');
    link.href = imageUrl;
    link.download = 'BNR - Certificate.png'; // Specify the download file name
    
    // Trigger the download
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});
$(document).on('click', '.actionExecute', function() {
    var data = $.param({
        action:'Edit',
        action_fn:$(this).data('action'),
        primary_id:$(this).data('id'),
        is_upload:$(this).data('isupload'),
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
        if (response.action_fn == 'view') {
            $('input:not([type="search"])').each(function() {
                // If the input is a checkbox, disable it; otherwise, set it to readonly
                if ($(this).attr('type') === 'checkbox') {
                   // $(this).prop('disabled', true);
                } else {
                    $(this).attr('readonly', true);
                }
            });
        
            // Make textarea readonly and disable select elements
            $('textarea').attr('readonly', true);
            $('select').attr('disabled', true);
        }
        if (response.action_fn == 'edit') {
            toggleCheckboxRequired('dti_register');
            toggleCheckboxRequired('tin_class');
            toggleCheckboxRequired('are_you_refugee_no');
            toggleCheckboxRequired('are_you_state_person');
            toggleCheckboxRequired('business_scope');
        }
        main.unblock_ui();
    });
});
$(document).on('click', '#addNewAccount', function() {
    var data = $.param({
        action:'Add New',
        action_fn:$(this).data('action'),
        primary_id:$(this).data('id'),
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
        main.unblock_ui();
        toggleCheckboxRequired('dti_register');
        toggleCheckboxRequired('tin_class');
        toggleCheckboxRequired('are_you_refugee_no');
        toggleCheckboxRequired('are_you_state_person');
        toggleCheckboxRequired('business_scope');
    });
});

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
$(document).on('click', '.actionExecuteApproved', function() {
    var action = $(this).data('action');
    var isupload = $(this).data('isupload');
    var title = 'Are you sure you want to '+action+'?';
    var id = $(this).data('id');
    var unique_connection = $(this).data('uniqueconnection');
    main.confirmation(title,function () {

        if (action == 'Approved' && isupload == '0') {
            businessNameChoose(id,unique_connection);
        }else{
            var data = $.param({
                primary_id:id,
                action:action,            
                isupload:isupload,            
            });
            var url = getRunURL('approvedDocument');
            var request = main.form_ajax(url, data, 'POST', function(xhr) {
               main.block_ui('#div_laravel_datatable');
            });
            request.done(function(response) {
                if (response.success) {
                    main.notify(response.msg,'check','');
                }else{
                    main.notify('Error','close');
                }
                $('#div_laravel_datatable').unblock();
                var element = '#laravel_datatable';
                main.reloadDatatableAjax(element);
            });
        }


    })
});
$(document).on('click', '#printNow', function() {
    var style = `
        .table-custom thead th, 
        .table-custom tbody th,
        .table-custom tbody td
        {
            border: 1px solid black;
            border-collapse: collapse;
            font-size:17px;
        }
    `;
    main.printPreview('modal-content-1',style);
});




$(document).on('change', '.dti_register', function() {
    var val = $('.dti_register').not(this).prop('checked', false);
    if (val.attr('id') == 'dti_register') {
        $('#renew_dti_register_input').prop('readonly',true);
        $('#renew_dti_register_date').prop('readonly',true);
        $('#renew_dti_register_input').val('');
        $('#renew_dti_register_date').val('');
        $('#renew_dti_register_input').prop('required',false);
        $('#renew_dti_register_date').prop('required',false);
    }else{
        $('#renew_dti_register_input').prop('readonly',false);
        $('#renew_dti_register_date').prop('readonly',false);
        $('#renew_dti_register_input').prop('required',true);
        $('#renew_dti_register_date').prop('required',true);
    }
    toggleCheckboxRequired('dti_register');
});

$(document).on('change', '.tin_class', function() {
    var val = $('.tin_class').not(this).prop('checked', false);
    if (val.attr('id') == 'tax_with') {
        $('#tax_with_input').prop('readonly',true);
        $('#tax_with_input').val('');
        $('#tax_with_input').prop('required',false);
    }else{
        $('#tax_with_input').prop('readonly',false);
        $('#tax_with_input').prop('required',true);
    }
    toggleCheckboxRequired('tin_class');
});
$(document).on('change', '.are_you_refugee_no', function() {
    $('.are_you_refugee_no').not(this).prop('checked', false);
    toggleCheckboxRequired('are_you_refugee_no');

});
$(document).on('change', '.are_you_state_person', function() {
    $('.are_you_state_person').not(this).prop('checked', false);
    toggleCheckboxRequired('are_you_state_person');

});
$(document).on('change', '.business_scope', function() {
    $('.business_scope').not(this).prop('checked', false);
    toggleCheckboxRequired('business_scope');
});
$(document).on('change', '#autofillFields', function() {
    if ($(this).is(':checked')) {
        var owner_details_house_no = $('#business_details_house_no').val();
        var owner_details_Street = $('#business_details_Street').val();
        var owner_details_Barangay = $('#business_details_Barangay').val();
        var owner_details_Region = $('#business_details_Phone_no').val();
        var owner_details_Mobile_no = $('#business_details_Mobile_no').val();
        //auto fill
        $('#owner_details_house_no').val(owner_details_house_no);
        $('#owner_details_Street').val(owner_details_Street);
        $('#owner_details_Barangay').val(owner_details_Barangay);
        $('#owner_details_Region').val(owner_details_Region);
        $('#owner_details_Mobile_no').val(owner_details_Mobile_no);
    }else{
        $('#owner_details_house_no').val('');
        $('#owner_details_Street').val('');
        $('#owner_details_Barangay').val('');
        $('#owner_details_Region').val('');
        $('#owner_details_Mobile_no').val('');
    }
    
});

function toggleCheckboxRequired(groupClass) {
    const checkboxes = $('.' + groupClass);
    const isAnyChecked = checkboxes.is(':checked');
    
    // Set required based on whether any checkbox is checked
    checkboxes.each(function() {
        $(this).prop('required', !isAnyChecked);
    });
}
