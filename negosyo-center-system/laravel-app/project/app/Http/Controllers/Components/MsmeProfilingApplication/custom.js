$(document).ready(function() {
    // main.notify();
    var element = '#laravel_datatable';
    var url = getRunURL('list');
    var columns = [
        { data: 'id_no', title: 'ID NO.' },
        { data: 'business_approved', title: 'Business Name' },
        { data: 'category_of_entrepreneur', title: 'Category' },
        { data: 'owner_name', title: 'Owner Name' },
        { data: 'added_date', title: 'Created At' },
        { data: 'status', title: 'Status' },
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
            allCheckInput()
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
        allCheckInput()
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
    var title = 'Are you sure you want to '+action+'?';
    var id = $(this).data('id');
    main.confirmation(title,function () {
        var data = $.param({
            primary_id:id,
            action:action,
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
    })
});
$(document).on('change', '.statusMsme', function() {
    $('.statusMsme').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.form_of_ownership', function() {
    $('.form_of_ownership').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.major_business_activity', function() {
    $('.major_business_activity').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.initial_capitalization', function() {
    $('.initial_capitalization').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.asses_classification', function() {
    $('.asses_classification').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.category_of_entrepreneur', function() {
    $('.category_of_entrepreneur').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.sex_status', function() {
    $('.sex_status').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.civil_status', function() {
    $('.civil_status').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.social_classification', function() {
    $('.social_classification').not(this).prop('checked', false);
    allCheckInput();
});
$(document).on('change', '.learning_session', function() {
    $('.learning_session').not(this).prop('checked', false);
    allCheckInput();
});
function toggleCheckboxRequired(groupClass) {
    const checkboxes = $('.' + groupClass);
    const isAnyChecked = checkboxes.is(':checked');
    
    // Set required based on whether any checkbox is checked
    checkboxes.each(function() {
        $(this).prop('required', !isAnyChecked);
    });
}

function allCheckInput() {
    toggleCheckboxRequired('statusMsme');
    toggleCheckboxRequired('form_of_ownership');
    toggleCheckboxRequired('major_business_activity');
    toggleCheckboxRequired('initial_capitalization');
    toggleCheckboxRequired('asses_classification');
    toggleCheckboxRequired('category_of_entrepreneur');
    toggleCheckboxRequired('sex_status');
    toggleCheckboxRequired('civil_status');
    toggleCheckboxRequired('social_classification');
    toggleCheckboxRequired('learning_session');
}

$(document).on('click', '#printNow', function() {
    var style = `
        .table-custom thead th, 
        .table-custom tbody th,
        .table-custom tbody td
        {
            border: 1px solid black;
            border-collapse: collapse;
            font-size:10px;
        }
    `;
    main.printPreview('modal-content-1',style);
});