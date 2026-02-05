<?php 
namespace App\Http\Controllers\Components\Annoucement;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;

class Annoucement 
{

    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        $this->sessionall = Helpers::session();
        Helpers::getView('Annoucement');
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
    public function list(){
        $post = Helpers::post();
        $sql = "SELECT a.* FROM tbl_annoucement as a WHERE a.deleted = 0 ";
        $result =  $this->model->getResults($sql, []);  
        $data = [];
        $x = 1;
        if ($result) {
            foreach ($result as $key => $R) {
                $crdentials = 'data-id="'.$R->annoucement_id.'"';
                $view = '<a class="dropdown-item bg-primary actionExecute"  '.$crdentials.' data-action="view" href="javascript:void(0);" style="color:white !important"><i class="far fa-eye"></i> View</a>';
                $edit = '<a class="dropdown-item bg-info actionExecute"  '.$crdentials.' data-action="edit" href="javascript:void(0);" style="color:white !important"><i class="far fa-edit"></i> Edit</a>';
                $delete = '<a class="dropdown-item bg-danger actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="delete" data-msg="Delete"  style="color:white !important"><i class="fas fa-trash-alt"></i> Delete</a>';
                $cancelled = '<a class="dropdown-item bg-warning actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="cancel"  data-msg="Cancel" style="color:white !important"><i class="fas fa-times"></i> Cancel</a>';
                $action = $view.$edit.$delete;
                $data[] = [
                 'num' => $x++,
                 'annoucement_id' => $R->annoucement_id,
                 'title' => $R->title,
                 'remarks' => $R->remarks,
                 'added_date' => date(LONGDATETIME,strtotime($R->added_date)),
                 'action' => '
                        <div class="btn-group dropdown">
                        <button type="button" class="btn btn-primary btn-sm btn-round dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu" role="menu" style="">
                            <li>
                                '.$action.'
                            </li>
                        </ul>
                    </div>
                 ',
                ];
            }
        }

        return Helpers::generateDataTable($data);
    }
    public function openDynamicModal(){
        $post = Helpers::post();
        extract($post);
        $footer = '';
        $d['participants'] = false;
        $data_file = [];
        switch ($action_fn) {
            case 'edit':
                $d['data'] = $this->viewDataModule($post);
                $data_file = $this->model->getFiles($post['primary_id'],'annoucement');
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'add':
                $d['data'] = false;
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'view':
                $d['data'] = $this->viewDataModule($post);
                $data_file = $this->model->getFiles($post['primary_id'],'annoucement');
                break;
            default:
                $d['data'] = false;
                break;
        }
        $d['action'] = $action;
        $d['action_fn'] = $action_fn;
        return [
            'element' => '#modal-dynamic',
            'file'=> $data_file,
            'action_modal' => 'open',
            'action' => $action,
            'action_fn' => $action_fn,
            'body' =>  view('modal-views.modal-add', $d)->render(),
            'footer' => $footer,
        ];
    }
    public function viewDataModule($post){
        extract($post);
        $sql = 'SELECT * FROM tbl_annoucement WHERE annoucement_id = ?';
        $param = [$primary_id];
        $main_info = $this->model->getRow($sql, $param);
        return $main_info;
    }
    public function deleteDocument(){
        $post = Helpers::post();
        extract($post);
        $msg  = 'Deleted';
        if ($action == 'delete') {
            $data['deleted'] = 1;
        }else{
            $data['status'] = 'CANCELLED';
            $data['reason_cancel'] = $value."\r\n".'CANCELLED BY:'.$this->sessionall['user_details']->first_name.' '.$this->sessionall['user_details']->middle_name.' '.$this->sessionall['user_details']->last_name;
            $msg  = 'Cancelled';
        }
        $where = [
            ['field' => 'annoucement_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_annoucement', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = $msg.' Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
    public function crudAction(){
        $post = Helpers::allr();
        if ($post['action'] == 'add') {
            return $this->createDocument($post);
        }else{
            return $this->updateDocument($post);
        }
    }
    public function createDocument($post){
        $session = $this->session;
        $data['title'] = $post['title'];
        $data['remarks'] = $post['remarks'];
        $data['added_by'] = $session['user_id'];
        $data['added_date'] = date(SQLDATETIME);
        $res = $this->model->insert('tbl_annoucement', $data);
        if ($res) {
            if (isset($post['file_upload'])) {
                $data_file = [
                    'doc_id'=>$res['id'],
                    'module_name'=>'annoucement',
                    'files'=>$post['file_upload']
                ];
                $this->model->uploadFileMultiple($data_file);
            }
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Added!';
        }
        return $response;
    }
    public function updateDocument($post){
        $session = $this->session;
        $data['title'] = $post['title'];
        $data['remarks'] = $post['remarks'];
        $data['added_by'] = $session['user_id'];
        $where = [
            ['field' => 'annoucement_id','value'=> $post['annoucement_id']]
        ];
        $res = $this->model->updateWhere('tbl_annoucement', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Updated!';
        }else{
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Updated!';
        }
        if (isset($post['file_upload'])) {
            $data_file = [
                'doc_id'=>$post['annoucement_id'],
                'module_name'=>'annoucement',
                'files'=>$post['file_upload']
            ];
            $this->model->uploadFileMultiple($data_file);
        }
        return $response;
    }
    
}