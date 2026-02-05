$(document).ready(function() {
    
    // main.notify();
    var element = '#laravel_datatable';
    var url = getRunURL('list');
    var columns = [
        { data: 'num', title: '#' },
        { data: 'event_id', title: 'Appointment ID' },
        { data: 'date', title: 'Date/When' },
        { data: 'time', title: 'Time' },
        { data: 'type', title: 'Type' },
        { data: 'status', title: 'Status' },
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
$(document).on('click', '.modal-close-2', function() {
    main.modal('#modal-dynamic-2');
});
let lastClickedEvent = null;
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
        main.unblock_ui();
        $('#calendar').fullCalendar({
            //locale: 'zh-cn',
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,basicWeek,basicDay'
            },
            defaultDate: '2024-10-30',
            navLinks: true, // can click day/week names to navigate views
            //editable: true,
            //eventLimit: true, // allow "more" link when too many events
            timeFormat: 'h(:mm)a',
            eventClick: function(event, jsEvent, view) {
                    var data = $.param({
                        id:event.id,
                        //add new field
                    });
                    var url = getRunURL('openDynamicModalOther');
                    var request = main.form_ajax(url, data, 'POST', function(xhr) {
                       main.block_ui();
                    });
                    request.done(function(response) {
                        $('#action-text').html(response.action);
                        $(response.element+' .modal-body').html(response.body);
                        $(response.element+' #footer-custom').html(response.footer);
                        main.modal(response.element,response.action_modal);
                        main.unblock_ui();
                    });
            },
            eventRender: function(event, element) {
                // This will allow you to set the HTML title
 
                var title = `<span class="text-light">${event.title}</span>`;
                element.find('.fc-title').html(title);
            },
            textColor: 'white',
            events: response.data_events
        });
    });
});
var oldSchedule = '';
$(document).on('click', '#selectSchedule', function() {
    $(oldSchedule).css('background-color', ''); 
    $(oldSchedule).css('border-color', '');
    var id = $(this).data('id');
    $('.schedule-'+id).css('background-color', 'green'); 
    $('.schedule-'+id).css('border-color', 'darkgreen');
    oldSchedule = '.schedule-'+id;
    $('#event_id').val($(this).data('id'));
    main.modal('#modal-dynamic-2');
});
$(document).on('click', '.actionExecuteDelete', function() {
    var id = $(this).data('eventid');
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
$(document).on('click', '.actionExecute', function() {
    var data = $.param({
        action:'Edit',
        action_fn:$(this).data('action'),
        primary_id:$(this).data('id'),
        event_id:$(this).data('eventid'),
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
    });
});

$(document).on('submit', '#submit-form', function(event) {
    event.preventDefault();
    event.stopPropagation();
    var event_id = $('#event_id').val();
    if (event_id != '') {
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
    }else{
        main.msg('Please Select Schedule','error','');
    }


});


//custom
$(document).on('click', '.actionExecuteApproved', function() {
    var action = $(this).data('action');
    var title = 'Are you sure you want to '+action+'?';
    var id = $(this).data('id');
    var eventid = $(this).data('eventid');
    main.confirmation(title,function () {
        var data = $.param({
            primary_id:id,
            event_id:eventid,
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

