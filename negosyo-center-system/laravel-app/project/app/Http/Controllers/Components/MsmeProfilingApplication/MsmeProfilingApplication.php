<?php 
namespace App\Http\Controllers\Components\MsmeProfilingApplication;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
class MsmeProfilingApplication 
{

    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        Helpers::getView('MsmeProfilingApplication');
    }
    public static function js(){
        return [
            'js/sample'
        ];
    }
    public function defaultPage($params){
        $data = [];
        $this->session = Helpers::session()['session'];
        return [
            'session_user_role' => $this->session['user_role']
        ];
    }
    public function list(){
        $post = Helpers::post();
        $this->session = Helpers::session()['session'];
        if ($this->session['user_role'] == 2) {
            $sql = "SELECT * FROM tbl_msme WHERE deleted = 0 and added_by = ?";
            $result =  $this->model->getResults($sql, [$this->session['user_id']]); 
        }else{
            $sql = "SELECT 
            a.*,a.`status` as msme_status,
            c.b_id as id_no 
            FROM tbl_msme as a
            INNER JOIN tbl_business as c ON a.unique_connection = c.unique_connection
            WHERE a.deleted = 0 and a.category_of_entrepreneur is not null
            ";
            $result =  $this->model->getResults($sql, []); 
        }
 
        $data = [];
        if ($result) {
            foreach ($result as $key => $R) {
                $view = '';
                $edit = '';
                $delete = '';
                $approved = '';
                $disapproved = '';
                $declined = '';
                $crdentials = 'data-id="'.$R->msme_id.'"';
                $view = '<a class="dropdown-item bg-primary actionExecute"  '.$crdentials.' data-action="view" href="javascript:void(0);" style="color:white !important"><i class="far fa-eye"></i> View</a>';
                if ($this->session['user_role'] == 2) {
                    $edit = '<a class="dropdown-item bg-warning actionExecute"  '.$crdentials.' data-action="edit" href="javascript:void(0);" style="color:white !important"><i class="far fa-edit"></i> Edit</a>';
                    $delete = '<a class="dropdown-item bg-danger actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="delete" style="color:white !important"><i class="fas fa-trash-alt"></i> Delete</a>';
                }else{
                    $approved = '<a class="dropdown-item bg-success actionExecuteApproved"  '.$crdentials.' data-action="Approved" href="javascript:void(0);" style="color:white !important"><i class="fas fa-check-circle"></i> Approved</a>';
                    $disapproved = '<a class="dropdown-item bg-warning actionExecuteApproved"  '.$crdentials.' data-action="Disapproved" href="javascript:void(0);" style="color:white !important"><i class="fas fa-exclamation-circle"></i> Disapproved</a>';
                    $declined = '<a class="dropdown-item bg-warning actionExecuteApproved"  '.$crdentials.' data-action="Declined" href="javascript:void(0);" style="color:white !important"><i class="fas fa-exclamation-circle"></i> Declined</a>';
                }
                switch ($R->msme_status) {
                    case 'PENDING':
                        $action = $view.$approved.$declined.$edit.$delete;
                        $status = 'primary';
                        break;
                    case 'APPROVED':
                        $action = $view.$disapproved;
                        $status = 'success';
                        break;
                    case 'DISAPPROVED':
                        $action = $view;
                        $status = 'danger';
                        break;
                    case 'DECLINED':
                        $action = $view;
                        $status = 'danger';
                        break;
                    default:
                        $action = $view;
                        break;
                } 
                $json_data = json_decode($R->form_msme,true);
                $data[] = [
                    'id_no' => 'ID-2024-'.$R->id_no,
                    'business_approved' => $R->business_approved,
                    'category_of_entrepreneur' => $R->category_of_entrepreneur,
                    'owner_name' => 'Juan Dela Cruz',
                    'added_date' => date(LONGDATE,strtotime($R->added_date)),
                    'status' => Helpers::status_badge($R->msme_status,$status),
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
    public function deleteDocument(){
        $post = Helpers::post();
        extract($post);
        $data['deleted'] = 1;
        $where = [
            ['field' => 'msme_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_msme', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = 'Deleted Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
    public function openModalAdd(){
        $post = Helpers::post();
        $data['test'] = 'test';

        return [
            'data' =>  view('modal-views.modal-add', $data)->render()
        ];
    }
    public function openDynamicModal(){
        $post = Helpers::post();
        extract($post);
        $footer = '';
        $user_primry_id = $this->session['user_role'] == 2 ? $this->session['user_id'] : $this->viewDataModule($post)['added_by'];
        $d['user_details_session'] =  $this->getUserDetails($user_primry_id);
        $d['bday_user'] = Helpers::segregateDate($d['user_details_session']->bday);

        $d['primary_id'] = $this->viewDataModule($post) ? $this->viewDataModule($post)['msme_id'] : false;
        switch ($action_fn) {
            case 'edit':
                $data = $this->viewDataModule($post);
                $d['data'] = $data;
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'add':
                $d['data'] = false;
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'view':
                $data = $this->viewDataModule($post);
                $d['data'] = $data;
                if ($this->session['user_role'] == 1) {
                    $footer = '<button type="button" class="btn btn-primary btn-sm" id="printNow">Print</button>';
                }
              
                break;
            default:
                $d['data'] = false;
                break;
        }
        $d['action'] = $action;
        $d['action_fn'] = $action_fn;
        return [
            'element' => '#modal-dynamic',
            'action_modal' => 'open',
            'action' => $action,
            'action_fn' => $action_fn,
            'body' =>   view('print.msme', $d)->render(),//$this->session['user_role'] == 2 ? view('modal-views.modal-add', $d)->render() : view('modal-views.modal-admin-view', $d)->render(),
            'footer' => $footer,
        ];
    }
    public function viewDataModule($post){
        extract($post);
        $sql = "SELECT a.*,c.*,
        b.email,
        b.last_name,
        b.first_name,
        b.middle_name,
        b.suffix,
        b.form_ownership,
            CONCAT(b.first_name, ' ', IFNULL(b.middle_name, ''), ' ', b.last_name) AS full_name

         FROM tbl_msme  as a
                INNER JOIN tbl_users as b ON a.added_by = b.user_id 
                INNER JOIN tbl_business as c ON a.unique_connection = c.unique_connection

        WHERE a.msme_id = ?";
        $param = [$primary_id];
        $result = $this->model->getRow($sql, $param);
        //dd($result);
        return is_object($result) ? (array) $result : $result;
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
        foreach ($post as $key => $R) {
            $form[$key] = $R;
        }
        $data['form_msme'] = json_encode($form);
        $data['brgy'] = $form['business_address_brgy']; 

        //MICRO
        if (isset($form['asses_classification_1'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_2'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_3'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_4'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_5'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_6'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_7'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }

        //SMALL
        if (isset($form['asses_classification_8'])) {
            $data['category_of_entrepreneur'] = 'SMALL'; 
        }
        if (isset($form['asses_classification_9'])) {
            $data['category_of_entrepreneur'] = 'SMALL'; 
        }
        if (isset($form['asses_classification_10'])) {
            $data['category_of_entrepreneur'] = 'SMALL'; 
        }

        //MEDIUM
        if (isset($form['asses_classification_11'])) {
            $data['category_of_entrepreneur'] = 'MEDIUM'; 
        }

        $data['added_by'] = $session['user_id'];
        $data['added_date'] = date(SQLDATETIME);
        $data['msme_status'] = 'PENDING';
        $res = $this->model->insert('tbl_msme', $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Added!';
        }
        return $response;
    }
    public function updateDocument($post){
        foreach ($post as $key => $R) {
            $form[$key] = $R;
        }
        $data['form_msme'] = json_encode($form);
        $data['brgy'] = $form['business_address_brgy']; 
        //MICRO
        if (isset($form['asses_classification_1'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_2'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_3'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_4'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_5'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_6'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }
        if (isset($form['asses_classification_7'])) {
            $data['category_of_entrepreneur'] = 'MICRO'; 
        }

        //SMALL
        if (isset($form['asses_classification_8'])) {
            $data['category_of_entrepreneur'] = 'SMALL'; 
        }
        if (isset($form['asses_classification_9'])) {
            $data['category_of_entrepreneur'] = 'SMALL'; 
        }
        if (isset($form['asses_classification_10'])) {
            $data['category_of_entrepreneur'] = 'SMALL'; 
        }

        //MEDIUM
        if (isset($form['asses_classification_11'])) {
            $data['category_of_entrepreneur'] = 'MEDIUM'; 
        }
        $where = [
            ['field' => 'msme_id','value'=> $post['msme_id']]
        ];
       
        $res = $this->model->updateWhere('tbl_msme', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Updated!';
        }else{
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Updated!';
        }
        return $response;
    }
    public function approvedDocument(){
        $post = Helpers::post();
        extract($post);
        $data['status'] = strtoupper($post['action']);
        $where = [
            ['field' => 'msme_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_msme', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = $post['action'].' Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
    public function getUserDetails($id){
        $sql = 'SELECT * FROM tbl_users WHERE user_id = ?';
        return $this->model->getRow($sql, [$id]); 
    }
}