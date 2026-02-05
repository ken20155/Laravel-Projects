<?php 
namespace App\Http\Controllers\Components\LoanRequest;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
class LoanRequest 
{

    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        $this->sessionall = Helpers::session();
        Helpers::getView('LoanRequest');
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
        $sql = "SELECT a.*,b.first_name,b.last_name,b.middle_name FROM tbl_loan as a INNER JOIN tbl_users as b ON a.user_id = b.user_id WHERE a.deleted = 0";
        $result =  $this->model->getResults($sql, []);  
        $data = [];
        $x = 1;
        if ($result) {
            foreach ($result as $key => $R) {
                $crdentials = 'data-id="'.$R->loan_id.'"';
                $view = '<a class="dropdown-item bg-primary actionExecute"  '.$crdentials.' data-action="view" href="javascript:void(0);" style="color:white !important"><i class="far fa-eye"></i> View</a>';
                $edit = '<a class="dropdown-item bg-warning actionExecute"  '.$crdentials.' data-action="edit" href="javascript:void(0);" style="color:white !important"><i class="far fa-edit"></i> Edit</a>';
                $approved = '<a class="dropdown-item bg-success actionExecuteApproved"  '.$crdentials.' data-action="Approved" href="javascript:void(0);" style="color:white !important"><i class="fas fa-check-circle"></i> Approved</a>';
                $disapproved = '<a class="dropdown-item bg-warning actionExecuteApproved"  '.$crdentials.' data-action="Disapproved" href="javascript:void(0);" style="color:white !important"><i class="fas fa-exclamation-circle"></i> Disapproved</a>';
                $declined = '<a class="dropdown-item bg-warning actionExecuteDelete"  '.$crdentials.' data-action="declined" data-msg="Declined" href="javascript:void(0);" style="color:white !important"><i class="fas fa-exclamation-circle"></i> Declined</a>';
                $delete = '<a class="dropdown-item bg-danger actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="delete" data-msg="Delete" style="color:white !important"><i class="fas fa-trash-alt"></i> Delete</a>';
                switch ($R->status) {
                    case 'PENDING':
                        $action = $view.$approved.$declined;
                        $status = 'primary';
                        break;
                    case 'DISAPPROVED':
                        $action = $view.$delete;
                        $status = 'danger';
                        break;
                    case 'APPROVED':
                        $action = $view.$disapproved;
                        $status = 'success';
                        break;
                    case 'DECLINED':
                        $action = $view.$delete;
                        $status = 'danger';
                        break;
                    default:
                        $action = '';
                        break;
                }
                $data[] = [
                 'num' => $x++,
                 'loan_id' => $R->loan_id,
                 'user_id' => $R->first_name.' '.$R->middle_name.' '.$R->last_name,
                 'remarks' => $R->remarks,
                 'status' => Helpers::status_badge($R->status,$status),
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
        switch ($action_fn) {
            case 'edit':
                $d['data'] = $this->viewDataModule($post);
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'view':
                $d['data'] = $this->viewDataModule($post);
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
            'body' =>  view('modal-views.modal-add', $d)->render(),
            'footer' => $footer,
        ];
    }
    public function viewDataModule($post){
        extract($post);
        $sql = 'SELECT * FROM tbl_loan WHERE loan_id = ?';
        $param = [$primary_id];
        return $this->model->getRow($sql, $param);
    }
    // public function deleteDocument(){
    //     $post = Helpers::post();
    //     extract($post);
    //     $data['deleted'] = 1;
    //     $where = [
    //         ['field' => 'loan_id','value'=> $post['primary_id']]
    //     ];
    //     $res = $this->model->updateWhere('tbl_loan', $where, $data);
    //     if ($res) {
    //         $response['success'] = true;
    //         $response['msg'] = 'Deleted Successfully';
    //     }else{
    //         $response['success'] = false;
    //         $response['msg'] = 'Error';
    //     }
    //     return response()->json($response);
    // }
    public function deleteDocument(){
        $post = Helpers::post();
        extract($post);
        if ($action == 'declined') {
            $data['status'] = 'DECLINED';
            $data['reason_declined'] = $value."\r\n".'DECLINED BY:'.$this->sessionall['user_details']->first_name.' '.$this->sessionall['user_details']->middle_name.' '.$this->sessionall['user_details']->last_name;
            $msg  = 'Cancelled';
            $response['msg'] = 'Declined Successfully';
        }else{
            $data['deleted'] = 1;
            $response['msg'] = 'Deleted Successfully';
        }
        $where = [
            ['field' => 'loan_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_loan', $where, $data);
        if ($res) {
            $response['success'] = true;
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
            return $this->updateUser($post);
        }
    }
    public function createDocument($post){
        $folder_name = Helpers::strRandom(10);
        $session = $this->session;
        $data['user_id'] = $session['user_id'];
        $data['added_by'] = $session['user_id'];
        $data['added_date'] = date(SQLDATETIME);
        $data['remarks'] = $post['remarks'];
        $file_array = [
            'attactment1' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment1']) ? $this->uploadFileLoan($folder_name,$post['attactment1']) : null,
            ],
            'attactment2' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment2']) ? $this->uploadFileLoan($folder_name,$post['attactment2']) : null,
            ],
            'attactment3' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment3']) ? $this->uploadFileLoan($folder_name,$post['attactment3']) : null,
            ],
            'attactment4' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment4']) ? $this->uploadFileLoan($folder_name,$post['attactment4']) : null,
            ],
            'attactment5' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment5']) ? $this->uploadFileLoan($folder_name,$post['attactment5']) : null,
            ],
            'attactment6' => [
                'folder'=>$folder_name,
                'label'=>$post['label'], 
                'file'=>isset($post['attactment6']) ? $this->uploadFileLoan($folder_name,$post['attactment6']) : null,
            ],
        ];
        $data['attachments'] = json_encode($file_array);
        $data['status'] = 'PENDING';
        $res = $this->model->insert('tbl_loan', $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Added!';
        }
        return $response;
    }
    public function uploadFileLoan($folder_name,$file_upload){
        $path = Helpers::getDir('apply-loan', $folder_name);
        $filename = Helpers::strRandom(10) . '-' . Helpers::strRandom(10) . '.' . $file_upload->extension();
        $file_upload->move($path, $filename);
        return $filename;
    }
    public function approvedDocument(){
        $post = Helpers::post();
        extract($post);
        $data['status'] = strtoupper($post['action']);
        $where = [
            ['field' => 'loan_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_loan', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = $post['action'].' Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
}