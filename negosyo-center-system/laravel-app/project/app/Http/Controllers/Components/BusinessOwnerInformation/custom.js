$(document).ready(function() {
    listOfBusiness()
    function listOfBusiness() {
        var data = $.param({
        });
        var url = getRunURL('listOfBusiness');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
            main.block_ui();
        });
        request.done(function(response) {
            $('#listOfBusiness').html(response.html);
            main.unblock_ui();
        });
   }
   $(document).on('click', '#addNewAccount', function() {
        var data = $.param({
            action:$(this).data('action'),
            status:$(this).data('status'),
            form:$(this).data('form'),
            //add new field
        });
        var url = getRunURL('openDynamicModal');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
            main.block_ui();
        });
        request.done(function(response) {
            $('#modal-dynamic .modal-dialog').removeClass('modal-xl').addClass('modal-md');
            $('#modal-dynamic .modal-title').html(response.title);
            $('#modal-dynamic .modal-body').html(response.body);
            $('#modal-dynamic #footer-custom').html(response.footer);
            main.modal(response.element,response.action_modal);
            main.unblock_ui();
        });
    });
   $(document).on('click', '.openFormBnrMsme', function() {
        var data = $.param({
            action:$(this).data('action'),
            status:$(this).data('status'),
            form:$(this).data('form'),
            id:$(this).data('id'),
            isupload:$(this).data('isupload'),
            //add new field
        });
        var url = getRunURL('openDynamicModal');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
            main.block_ui();
        });
        request.done(function(response) {
            $('#modal-dynamic .modal-dialog').removeClass('modal-md').addClass('modal-xl');
            $('#modal-dynamic .modal-title').html(response.title);
            $('#modal-dynamic .modal-body').html(response.body);
            $('#modal-dynamic #footer-custom').html(response.footer);
            main.modal(response.element,response.action_modal);
            main.unblock_ui();
        });
    });
    //
    $(document).on('click', '.openValidation', function() {
        main.msg('BNR is not Approve');
    });

    //old
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
            $('#modal-dynamic .modal-dialog').addClass('modal-xl');
            $('#action-text').html(response.action);
            $('#modal-dynamic .modal-body').html(response.body);
            $('#modal-dynamic #footer-custom').html(response.footer);
            main.modal(response.element,response.action_modal);
            main.unblock_ui();
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
            listOfBusiness();
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
    $(document).on('change', '.typeForm', function() {
        var val = $(this).val();
        if (val == 'New') {
            $('.certificateNo').prop('readonly',true);
            $('.certificateNo').prop('required',false);
            $('.certificateNo').val('');
        }else{
            $('.certificateNo').prop('readonly',false);
            $('.certificateNo').prop('required',true);
        }
    });
    $(document).on('change', '.selectTIN', function() {
        var val = $(this).val();
        if (val == 'Without TIN') {
            $('.inputTIN').prop('readonly',true);
            $('.inputTIN').prop('required',false);
            $('.inputTIN').val('');
        }else{
            $('.inputTIN').prop('readonly',false);
            $('.inputTIN').prop('required',true);
        }
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
});
    // When any radio button with name 'physical_store_area_owner' is checked
$(document).on('change', 'input[name="physical_store_area_owner"]', function() {
    if ($(this).is(':checked') && $(this).val() == 'Yes') {
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',false);
        $('.' + $(this).attr('name') + '_indicate').prop('required',true);
    }else{
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',true);
        $('.' + $(this).attr('name') + '_indicate').prop('required',false);
        $('.' + $(this).attr('name') + '_indicate').val('');
    }
});
$(document).on('change', 'input[name="physical_store_area_rented"]', function() {
    if ($(this).is(':checked') && $(this).val() == 'Yes') {
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',false);
        $('.' + $(this).attr('name') + '_indicate').prop('required',true);
    }else{
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',true);
        $('.' + $(this).attr('name') + '_indicate').prop('required',false);
        $('.' + $(this).attr('name') + '_indicate').val('');
    }
});
$(document).on('change', 'input[name="ambulant_vending_area_owner"]', function() {
    if ($(this).is(':checked') && $(this).val() == 'Yes') {
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',false);
        $('.' + $(this).attr('name') + '_indicate').prop('required',true);
    }else{
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',true);
        $('.' + $(this).attr('name') + '_indicate').prop('required',false);
        $('.' + $(this).attr('name') + '_indicate').val('');
    }
});
$(document).on('change', 'input[name="ambulant_vending_area_rented"]', function() {
    if ($(this).is(':checked') && $(this).val() == 'Yes') {
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',false);
        $('.' + $(this).attr('name') + '_indicate').prop('required',true);
    }else{
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',true);
        $('.' + $(this).attr('name') + '_indicate').prop('required',false);
        $('.' + $(this).attr('name') + '_indicate').val('');
    }
});
$(document).on('change', 'input[name="online_store_area_owner"]', function() {
    if ($(this).is(':checked') && $(this).val() == 'Yes') {
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',false);
        $('.' + $(this).attr('name') + '_indicate').prop('required',true);
    }else{
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',true);
        $('.' + $(this).attr('name') + '_indicate').prop('required',false);
        $('.' + $(this).attr('name') + '_indicate').val('');
    }
});
$(document).on('change', 'input[name="online_store_area_rented"]', function() {
    if ($(this).is(':checked') && $(this).val() == 'Yes') {
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',false);
        $('.' + $(this).attr('name') + '_indicate').prop('required',true);
    }else{
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',true);
        $('.' + $(this).attr('name') + '_indicate').prop('required',false);
        $('.' + $(this).attr('name') + '_indicate').val('');
    }
});
$(document).on('change', 'input[name="online_store_govn_supervised"]', function() {
    if ($(this).is(':checked') && $(this).val() == 'Yes') {
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',false);
        $('.' + $(this).attr('name') + '_indicate').prop('required',true);
    }else{
        $('.' + $(this).attr('name') + '_indicate').prop('readonly',true);
        $('.' + $(this).attr('name') + '_indicate').prop('required',false);
        $('.' + $(this).attr('name') + '_indicate').val('');
    }
});
$(document).on('change', '#same_business_details_provided', function() {
    if ($(this).is(':checked')) {

        // var fromClass = $(this).data('fromclass'); // Get the class name from the data attribute
        // var businessDetailsHouseNo = $().val();
        // var businessDetailsBrgy = $().val();
        // var businessDetailsStreet = $().val();
        // var businessDetailsPhoneNo = $().val();
        // var businessMobileNo = $().val();

        var fromClass = $(this).data('fromclass'); // Get the class name from the data attribute

        if (fromClass) { // Ensure the class name is valid
            var values = [];
            
            // Select all elements with the specified class and get their values
            $('.' + fromClass).each(function() {
                var toclass = $(this).data('toclass'); // Get the value of the element
                var value = $(this).val(); // Get the value of the element
                $('.' + toclass).val(value);
            });

        } else {
            alert('No class found in the data attribute!');
        }
    }else{
        var fromClass = $(this).data('fromclass'); // Get the class name from the data attribute

        $('.' + fromClass).each(function() {
            var toclass = $(this).data('toclass'); // Get the value of the element
            $('.' + toclass).val('');
        });
    }
});
// physical_store_area_owner_indicate
// physical_store_area_rented_indicate
// ambulant_vending_area_owner_indicate
// ambulant_vending_area_rented_indicate
// online_store_area_owner_indicate
// online_store_area_rented_indicate
// online_store_govn_supervised_indicate
