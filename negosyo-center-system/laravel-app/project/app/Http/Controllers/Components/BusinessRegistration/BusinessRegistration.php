<?php 
namespace App\Http\Controllers\Components\BusinessRegistration;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
class BusinessRegistration 
{

    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        $this->sessionall = Helpers::session();
        Helpers::getView('BusinessRegistration');
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
        $this->session = Helpers::session()['session'];
        $post = Helpers::post();
        if ($this->session['user_role'] == 2) {
            $sql = "SELECT a.*,b.first_name,b.last_name,b.middle_name,b.suffix FROM tbl_business as a INNER JOIN tbl_users as b ON a.added_by = b.user_id WHERE a.deleted = 0 and a.added_by = ? ";
            $result =  $this->model->getResults($sql, [$this->session['user_id']]); 
        }else{
            $sql = "SELECT 
            a.*,b.first_name,b.last_name,b.middle_name,b.suffix,
            c.`status` as status_msme,
            c.`msme_id` as msme_id,
            c.`business_approved` as business_approved_msme,
            c.`majority_business_activity` as majority_business_activity
            FROM tbl_business as a 
            INNER JOIN tbl_users as b ON a.added_by = b.user_id 
            INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection 
            WHERE a.deleted = 0";
            $result =  $this->model->getResults($sql, []); 
        }
        $data = [];
        $x = 1;
        if ($result) {
            foreach ($result as $key => $R) {
                $view = '';
                $edit = '';
                $delete = '';
                $approved = '';
                $disapproved = '';
                $declined = '';
                $is_upload = $R->bnr_certificate_file != null ? 1 : 0;
                $crdentials = '
                data-id="'.$R->b_id.'"
                data-uniqueconnection="'.$R->unique_connection.'"
                data-isupload="'.$is_upload.'"
                ';
                $view = '<a class="dropdown-item bg-primary actionExecute"  '.$crdentials.' data-action="view" href="javascript:void(0);" style="color:white !important"><i class="far fa-eye"></i> View</a>';

                if ($this->session['user_role'] == 2) {
                    $edit = '<a class="dropdown-item bg-warning actionExecute"  '.$crdentials.' data-action="edit" href="javascript:void(0);" style="color:white !important"><i class="far fa-edit"></i> Edit</a>';
                    $delete = '<a class="dropdown-item bg-danger actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="delete" style="color:white !important"><i class="fas fa-trash-alt"></i> Delete</a>';
                }else{
                    $approved = '<a class="dropdown-item bg-success actionExecuteApproved"  '.$crdentials.' data-action="Approved" href="javascript:void(0);" style="color:white !important"><i class="fas fa-check-circle"></i> Approved</a>';
                    $disapproved = '<a class="dropdown-item bg-warning actionExecuteApproved"  '.$crdentials.' data-action="Disapproved" href="javascript:void(0);" style="color:white !important"><i class="fas fa-exclamation-circle"></i> Disapproved</a>';
                    $declined = '<a class="dropdown-item bg-warning actionExecuteApproved"  '.$crdentials.' data-action="Declined" href="javascript:void(0);" style="color:white !important"><i class="fas fa-exclamation-circle"></i> Declined</a>';
                }
                switch ($R->status) {
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
                        $status = 'danger';
                        break;
                } 
                $json_data = json_decode($R->form_bnr,true);
                $data[] = [
                 'num' => $x++,
                 'owner_fullname'=> $R->first_name.' '.$R->middle_name.' '.$R->last_name.' '.$R->suffix,
                 'bsuiness_name'=> $R->bnr_certificate_file == null ? $R->business_approved : $R->business_approved_msme, 
                 'id_no'=> 'ID-2024-'.$R->b_id.'', 
                 'certificate_no'=> $R->certificate_no, 
                 'is_upload'=> $is_upload, 
                 'added_date'=>date(LONGDATE,strtotime($R->added_date)),
                 'status' => Helpers::status_badge($R->status,$status),
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
        $user_primry_id = $this->session['user_role'] == 2 ? $this->session['user_id'] : $this->viewDataModule($post)['added_by'];
        $d['user_details_session'] =  $this->getUserDetails($user_primry_id);
        $d['bday_user'] = Helpers::segregateDate($d['user_details_session']->bday);
        $d['primary_id'] = $this->viewDataModule($post) ? $this->viewDataModule($post)['b_id'] : false;
        switch ($action_fn) {
            case 'edit':
                $data = $this->viewDataModule($post);
                $d['data'] = $data ? json_decode($data->form_bnr,true) : false;
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'add':
                $d['data'] = false;
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'view':
                $data = $this->viewDataModule($post);

                if ($is_upload == 1) {
                    $view = '<img id="imageBnr" src="'.env('APP_URL').'public/main/uploaded/profile/'.$data['bnr_certificate_file'].'" class="w-100" alt="" sizes="" srcset="">';
                    $footer = '<button type="button" class="btn btn-primary btn-sm" id="downloadNow">Download</button>';
                }else{
                    $d['data'] = $data;
                    $view = view('print.bnr', $d)->render();
                    $footer = '<button type="button" class="btn btn-primary btn-sm" id="printNow">Print</button>';
                }
                // if ($this->session['user_role'] == 1) {
                //     $footer = '<button type="button" class="btn btn-primary btn-sm" id="printNow">Print</button>';
                // }               
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
            'action' => strtoupper($action_fn),
            'action_fn' => $action_fn,
            'body' =>   $view,
            'footer' => $footer,
        ];
    }
    public function viewDataModule($post){
        extract($post);
        $sql = 'SELECT * FROM tbl_business WHERE b_id = ?';
        $param = [$primary_id];
        $result = $this->model->getRow($sql, $param);
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
        $data['form_bnr'] = json_encode($form);
        $data['brgy'] = $post['business_details_Barangay'];
        $data['added_by'] = $session['user_id'];
        $data['added_date'] = date(SQLDATETIME);
        $data['status'] = 'PENDING';
        $res = $this->model->insert('tbl_business', $data);
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
        $data['form_bnr'] = json_encode($form);
        $data['brgy'] = $post['business_details_Barangay'];
        $where = [
            ['field' => 'b_id','value'=> $post['b_id']]
        ];
       
        $res = $this->model->updateWhere('tbl_business', $where, $data);
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
    public function deleteDocument(){
        $post = Helpers::post();
        extract($post);
        $data['deleted'] = 1;
        $where = [
            ['field' => 'b_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_business', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = 'Deleted Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
    public function approvedDocument(){
        $post = Helpers::post();
        extract($post);
        if ($action == 'Approved' && $isupload == 0) {
            $data2['business_approved'] = $choose_business_name;

            $where = [
                ['field' => 'unique_connection','value'=> $post['unique_connection']]
            ];
            $res = $this->model->updateWhere('tbl_msme', $where, $data2);
            $data['business_approved'] = $choose_business_name;
        }
        $data['status'] = strtoupper($post['action']);
        $data['business_approved'] = isset($choose_business_name) ? $choose_business_name : null;
        $where = [
            ['field' => 'b_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_business', $where, $data);
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
    public function businessNameChoose(){
        $post = Helpers::post();
        extract($post);
        $sql = 'SELECT * FROM tbl_business WHERE b_id = ?';
        $res = $this->model->getRow($sql, [$id]); 
        return [
            'data'=>[
                $res->business_name_1,
                $res->business_name_2,
                $res->business_name_3,
            ]
        ];
    }
}