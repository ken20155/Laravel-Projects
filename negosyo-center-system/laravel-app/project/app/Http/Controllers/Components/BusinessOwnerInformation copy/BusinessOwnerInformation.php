<?php 
namespace App\Http\Controllers\Components\BusinessOwnerInformation;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
class BusinessOwnerInformation 
{

    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        $this->sessionall = Helpers::session();
        Helpers::getView('BusinessOwnerInformation');
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

    public function listOfBusiness(){
        $d['test'] = '';
        $sql = "SELECT 
        a.*,
        b.first_name,b.last_name,b.middle_name,b.suffix,
        a.`status` as status_bnr,
        c.`status` as status_msme,
        c.`msme_id` as msme_id,
        c.`majority_business_activity` as majority_business_activity
        FROM tbl_business as a 
        INNER JOIN tbl_users as b ON a.added_by = b.user_id 
        INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection 
        WHERE a.deleted = 0 and a.added_by = ? ";
        $d['result'] =  $this->model->getResults($sql, [$this->session['user_id']]); 
        $data['html'] = view('list.business', $d)->render();
        return $data;
    }
    public function getBnrDetails($id){
        if ($id == null && $id == '') {
            return false;
        }
        $sql = "SELECT        
        a.*,
        c.*,
        b.first_name,b.last_name,b.middle_name,b.suffix,
        a.`status` as status_bnr,
        c.`status` as status_msme,
        c.`msme_id` as msme_id,
        c.`majority_business_activity` as majority_business_activity
        FROM tbl_business as a 
        INNER JOIN tbl_users as b ON a.added_by = b.user_id 
        INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection WHERE a.deleted = 0 and a.b_id = ? ";
        return $this->model->getRow($sql, [$id]); 
    }
    public function getMsmeDetails($id){
        if ($id == null && $id == '') {
            return false;
        }
        $sql = "SELECT        
        a.*,
        c.*,
        b.first_name,b.last_name,b.middle_name,b.suffix,
        a.`status` as status_bnr,
        c.`status` as status_msme,
        c.`msme_id` as msme_id,
        c.`majority_business_activity` as majority_business_activity
        FROM tbl_business as a 
        INNER JOIN tbl_users as b ON a.added_by = b.user_id 
        INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection WHERE a.deleted = 0 and c.msme_id = ? ";
        return $this->model->getRow($sql, [$id]); 
    }
    public function openDynamicModal(){
        $post = Helpers::post();
        extract($post);
        $d['post'] = $post;
        $footer = '';
        switch ($form) {
            case 'add':
                $d['data'] = false;
                $title = 'Add New Business';
                $form = view('modal-views.modal-add', $d)->render();
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'bnr':
                $d['data'] = $this->getBnrDetails($id);
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                $title = 'Business Name Registration Form <br><i class="text-danger">NOTE: For Existing MSME (Unregistered).*</i>';
                $form = view('modal-views.modal-bnr', $d)->render();
                break;
            case 'bnrprinted':
                $d['data'] = $this->getBnrDetails($id);
                $footer = '<button type="button" class="btn btn-primary btn-sm">Print</button>';
                $title = 'Business Name Registration Form';
                $form = '';//view('modal-views.modal-bnr', $d)->render();
                break;
            case 'msme':
                $d['data'] = $this->getMsmeDetails($id);
                $title = 'Micro, Small and Medium Enterprises Form <br><i class="text-danger">NOTE: For Existing MSME (Registered).*</i>';
                $form = view('modal-views.modal-msme', $d)->render();
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'msmeprinted':
                $d['data'] = false;
                $title = 'Micro, Small and Medium Enterprises Form';
                $form = '';//view('modal-views.modal-msme', $d)->render();
                $footer = '<button type="button" class="btn btn-primary btn-sm">Print</button>';
                break;
            default:
                $d['data'] = false;
                break;
        }
        return [
            'element'       => '#modal-dynamic',
            'action_modal'  => 'open',
            'title'         => $title,
            'body'          => $form,
            'footer'        => $footer,
        ];
    }
    //old
    public function list(){
        $this->session = Helpers::session()['session'];
        $post = Helpers::post();
        if ($this->session['user_role'] == 2) {
            $sql = "SELECT a.*,b.first_name,b.last_name,b.middle_name,b.suffix FROM tbl_business as a INNER JOIN tbl_users as b ON a.added_by = b.user_id WHERE a.deleted = 0 and a.added_by = ? ";
            $result =  $this->model->getResults($sql, [$this->session['user_id']]); 
        }else{
            $sql = "SELECT a.*,b.first_name,b.last_name,b.middle_name,b.suffix FROM tbl_business as a INNER JOIN tbl_users as b ON a.added_by = b.user_id WHERE a.deleted = 0";
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
                $crdentials = 'data-id="'.$R->b_id.'"';
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
                 'mobile_no'=> $json_data['owner_details_Mobile_no'], 
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
    public function viewDataModule($post){
        extract($post);
        $sql = 'SELECT * FROM tbl_business WHERE b_id = ?';
        $param = [$primary_id];
        return $this->model->getRow($sql, $param);
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
        // foreach ($post as $key => $R) {
        //     $form[$key] = $R;
        // }
        // $data['form_bnr'] = json_encode($form);
        // $data['brgy'] = $post['business_details_Barangay'];
        $data['type_of_form'] = $post['type_of_form'];
        $data['certificate_no'] = $post['certificate_no'];
        $data['date_registered'] = $post['date_registered'];
        $data['tin_type'] = $post['tin_type'];
        $data['tin_no'] = $post['tin_no'];
        $data['philsys_no'] = $post['philsys_no'];
        $data['is_refugee'] = $post['is_refugee']; // Convert to integer (boolean-like)
        $data['is_stateless_person'] = $post['is_stateless_person']; // Convert to integer (boolean-like)
        $data['business_address'] = $post['business_address'];
        $data['business_name_territorial_scope'] = $post['business_name_territorial_scope'];
        $data['business_name_1'] = $post['business_name_1'];
        $data['business_name_2'] = $post['business_name_2'];
        $data['business_name_3'] = $post['business_name_3'];
        $data['business_desc_1'] = $post['business_desc_1'];
        $data['business_desc_2'] = $post['business_desc_2'];
        $data['business_desc_3'] = $post['business_desc_3'];
        $data['unique_connection'] = strtotime(date(SQLDATETIME));

        $data['added_by'] = $session['user_id'];
        $data['added_date'] = date(SQLDATETIME);
        $data['status'] = 'PENDING';
        $res = $this->model->insert('tbl_business', $data);
        if ($res) {
            $data_msme['unique_connection'] = $data['unique_connection'];
            $data_msme['added_by'] = $session['user_id'];
            $data_msme['added_date'] = date(SQLDATETIME);
            $data_msme['status'] = 'PENDING';
            $this->model->insert('tbl_msme', $data_msme);

            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Added!';
        }
        return $response;
    }
    // public function createDocument($post){
    //     $session = $this->session;
    //     foreach ($post as $key => $R) {
    //         $form[$key] = $R;
    //     }
    //     $data['form_bnr'] = json_encode($form);
    //     $data['brgy'] = $post['business_details_Barangay'];
    //     $data['added_by'] = $session['user_id'];
    //     $data['added_date'] = date(SQLDATETIME);
    //     $data['status'] = 'PENDING';
    //     $res = $this->model->insert('tbl_business', $data);
    //     if ($res) {
    //         $response['success'] = true;
    //         $response['exist'] = false;
    //         $response['msg'] = 'Successfully Added!';
    //     }
    //     return $response;
    // }
    public function updateDocument($post){
    
        $data['type_of_form'] = $post['type_of_form'];
        $data['certificate_no'] = $post['certificate_no'];
        $data['date_registered'] = $post['date_registered'];
        $data['tin_type'] = $post['tin_type'];
        $data['tin_no'] = $post['tin_no'];
        $data['philsys_no'] = $post['philsys_no'];
        $data['is_refugee'] = $post['is_refugee']; // Convert to integer (boolean-like)
        $data['is_stateless_person'] = $post['is_stateless_person']; // Convert to integer (boolean-like)
        $data['business_address'] = $post['business_address'];
        $data['business_name_territorial_scope'] = $post['business_name_territorial_scope'];
        $data['business_name_1'] = $post['business_name_1'];
        $data['business_name_2'] = $post['business_name_2'];
        $data['business_name_3'] = $post['business_name_3'];
        $data['business_desc_1'] = $post['business_desc_1'];
        $data['business_desc_2'] = $post['business_desc_2'];
        $data['business_desc_3'] = $post['business_desc_3'];
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
        $data['status'] = strtoupper($post['action']);
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
}