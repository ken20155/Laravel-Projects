<?php 
namespace App\Http\Controllers\Components\Supplier;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
class Supplier 
{
    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        Helpers::getView('Supplier');
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
        $sql = "SELECT * FROM tbl_supplier WHERE deleted = 0";
        $result =  $this->model->getResults($sql, []);  
        $data = [];
        $x = 1;
        if ($result) {
            foreach ($result as $key => $R) {
                $crdentials = '
                                 data-id = "'.$R->supplier_id.'"
                             ';
                $data[] = [
                 '#' => $x++,
                 'company_name' => $R->company,
                 'contact_person' => $R->contact_person,
                 'tin' => $R->tin,
                 'email' => $R->email,
                 'phone_number' => $R->contact_no,
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
        $sql = 'SELECT * FROM tbl_supplier WHERE supplier_id = ?';
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
        $data['company'] = $company;
        $data['contact_person'] = $contact_person;
        $data['contact_no'] = $contact_no;
        $data['email'] = $email;
        $data['tin'] = $tin;
        $data['address'] = $address;
        $res = $this->model->insert('tbl_supplier', $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = 'Successfully Added!';
        }
        return $response;
    }
    public function updateData($post){
        extract($post);
        $data['company'] = $company;
        $data['contact_person'] = $contact_person;
        $data['contact_no'] = $contact_no;
        $data['email'] = $email;
        $data['tin'] = $tin;
        $data['address'] = $address;
        $where = [
            ['field' => 'supplier_id','value'=> $primary_id]
        ];
        $res = $this->model->updateWhere('tbl_supplier', $where, $data);
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
            ['field' => 'supplier_id','value'=> $post['id']]
        ];
        $res = $this->model->updateWhere('tbl_supplier', $where, $data);
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