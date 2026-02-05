<?php 
namespace App\Http\Controllers\Components\SuppliesItems;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
class SuppliesItems 
{
    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        Helpers::getView('SuppliesItems');
    }
    public static function js(){
        return [
            'js/sample'
        ];
    }
    public function defaultPage($params){
        $data = [];
        return [
            'test' => 'ken'
        ];
    }
    public function listClients(){
        $post = Helpers::post();
        $sql = "SELECT * FROM tbl_supplies WHERE deleted = 0";
        $result =  $this->model->getResults($sql, []);  
        $data = [];
        $x = 1;
        if ($result) {
            foreach ($result as $key => $R) {
                $crdentials = '
                                 data-id = "'.$R->supply_id.'"
                             ';
                $data[] = [
                 '#' => $x++,
                 'supplier_id' => $R->supplier_id,
                 'item_desc' => $R->item_desc,
                 'item_unit' => $R->item_unit,
                 'unit_cost' => $R->unit_cost,
                 'stock_no' => $R->stock_no,
                 'action' => '
                         <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Action
                         </button>
                         <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="javascript:void(0);" '.$crdentials.' id = "viewData"><span class="fe fe-16 fe-edit"></span> Edit</a>
                         <a class="dropdown-item" href="javascript:void(0);" '.$crdentials.' id = "deleteData"><span class="fe fe-16 fe-trash-2"></span>  Delete</a>
                         </div>
                 ',
                ];
             }
        }
        return Helpers::generateDataTable($data);
    }
    public function viewData(){
        $post = Helpers::post();
        extract($post);
        $sql = "SELECT * FROM tbl_supplier WHERE deleted = 0";
        $d['suppliers'] =  $this->model->getResults($sql, []); 
   
        $sql = 'SELECT * FROM tbl_supplies WHERE supplier_id = ?';
        $param = [$id];
        $row =  $this->model->getRow($sql, $param);
        $d['data'] = $row;
        return [
            'action' => 'Edit',
            'body' =>  view('modal-content.view', $d)->render(),
            'footer' =>  '<button type="submit" class="btn btn-primary btn-sm">Save</button>',
        ];
    }
    public function addNew(){
        $post = Helpers::post();
        extract($post);
        $sql = "SELECT * FROM tbl_supplier WHERE deleted = 0";
        $d['suppliers'] =  $this->model->getResults($sql, []); 
        $d['data'] = false;
        return [
            'action' => 'Add New',
            'body' =>  view('modal-content.view', $d)->render(),
            'footer' =>  '<button type="submit" class="btn btn-primary btn-sm">Save</button>',
        ];
    }
    public function crudAction(){
        $post = Helpers::post();
        if ($post['action'] == 'add') {
            return $this->createData($post);
        }else{
            return $this->updateData($post);
        }
    }
    public function createData($post){
        extract($post);
        $data['supplier_id'] = $supplier_id;
        $data['item_desc'] = $item_desc;
        $data['item_unit'] = $item_unit;
        $data['qty'] = $qty;
        $data['unit_cost'] = $unit_cost;
        $data['stock_no'] = $stock_no;
        $res = $this->model->insert('tbl_supplies', $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = 'Successfully Added!';
        }
        return $response;
    }
    public function updateData($post){
        extract($post);
        $data['supplier_id'] = $supplier_id;
        $data['item_desc'] = $item_desc;
        $data['item_unit'] = $item_unit;
        $data['qty'] = $qty;
        $data['unit_cost'] = $unit_cost;
        $data['stock_no'] = $stock_no;
        $where = [
            ['field' => 'supply_id','value'=> $primary_id]
        ];
        $res = $this->model->updateWhere('tbl_supplies', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Updated!';
        }
        return $response;
    }
    public function deleteData(){
        $post = Helpers::post();
        $data['deleted'] = 1;
        $where = [
            ['field' => 'supply_id','value'=> $post['id']]
        ];
        $res = $this->model->updateWhere('tbl_supplies', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = 'Deleted Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
}