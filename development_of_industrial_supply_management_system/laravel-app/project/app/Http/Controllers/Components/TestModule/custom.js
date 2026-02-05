$(document).ready(function() {
    var element = '#laravel_datatable';
    var url = getRunURL('list-clients');
    var columns = [
        { data: '#', title: '#' },
        { data: 'supplier_id', title: 'Supplier' },
        { data: 'item_desc', title: 'Item Description' },
        { data: 'item_unit', title: 'Item Unit' },
        { data: 'unit_cost', title: 'Unit Cost' },
        { data: 'stock_no', title: 'Stock No' },
        { data: 'action', title: 'Action' },
    ];
    main.generateDatatable(element,url,columns);
});