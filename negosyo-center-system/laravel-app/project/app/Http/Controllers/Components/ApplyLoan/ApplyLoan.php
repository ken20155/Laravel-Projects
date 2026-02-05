<?php 
namespace App\Http\Controllers\Components\ApplyLoan;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
class ApplyLoan 
{

    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        Helpers::getView('ApplyLoan');
    }
    public static function js(){
        return [
            'js/sample'
        ];
    }
    public function defaultPage($params){
        $data = [];
        $session = $this->session;
        //dd($session);
        $msg = false;
        $get_validations = $this->model->getResults("SELECT DATE(added_date) as added_date FROM tbl_msme WHERE added_by = ?",[$session['user_id']]);
        if ($get_validations) {
            foreach ($get_validations as $key => $R) {
                $valid_date[] = $R->added_date;
            }
            $data = [];
            $date_now = date(SQLDATE); // Format date in 'YYYY-MM-DD'
            foreach ($valid_date as $date) {
                $date_timestamp = strtotime($date);
                $one_year_ago = strtotime('-1 year', strtotime($date_now));
            
                if ($date_timestamp <= $one_year_ago) {
                    $data[] =  1;
                } else {
                    $data[] =  0;
                }
            }
            if (in_array(1, $data)) {
                $msg = false;
            }else{
                $msg = "Business owners are eligible for a business loan upon obtaining a 1-year membership in the Negosyo Center, offering vital support and resources to foster growth.";
            } 
        }else{
            $msg = 'No MSME Registered!';
        }
        // dd($msg);
        return [
            'test' => 'ken',
            'msg' => $msg,
        ];
    }
    public function list(){
        $post = Helpers::post();
        $sql = "SELECT a.*,b.first_name,b.last_name,b.middle_name FROM tbl_loan as a INNER JOIN tbl_users as b ON a.user_id = b.user_id WHERE a.deleted = 0 and a.user_id = ?";
        $result =  $this->model->getResults($sql, [$this->session['user_id']]);  
        $data = [];
        $x = 1;
        if ($result) {
            foreach ($result as $key => $R) {
                $crdentials = 'data-id="'.$R->loan_id.'"';
                $view = '<a class="dropdown-item bg-primary actionExecute"  '.$crdentials.' data-action="view" href="javascript:void(0);" style="color:white !important"><i class="far fa-eye"></i> View</a>';
                $edit = '<a class="dropdown-item bg-warning actionExecute"  '.$crdentials.' data-action="edit" href="javascript:void(0);" style="color:white !important"><i class="far fa-edit"></i> Edit</a>';
                $delete = '<a class="dropdown-item bg-danger actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="delete" style="color:white !important"><i class="fas fa-trash-alt"></i> Delete</a>';
                switch ($R->status) {
                    case 'PENDING':
                        $action = $view.$edit.$delete;
                        $status = 'primary';
                        break;
                    case 'DISAPPROVED':
                        $action = $view.$delete;
                        $status = 'danger';
                        break;
                    case 'APPROVED':
                        $action = $view;
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
            case 'add':
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
    public function deleteDocument(){
        $post = Helpers::post();
        extract($post);
        $data['deleted'] = 1;
        $where = [
            ['field' => 'loan_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_loan', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = 'Deleted Successfully';
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
    public function updateDocument($post){
        $folder_name = $post['folder'];
        $data['remarks'] = $post['remarks'];
        $where = [
            ['field' => 'loan_id','value'=> $post['loan_id']]
        ];
        $file_array = [
            'attactment1' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment1']) ? $this->uploadFileLoan($folder_name,$post['attactment1']) : $post['attachment_filename1'],
            ],
            'attactment2' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment2']) ? $this->uploadFileLoan($folder_name,$post['attactment2']) : $post['attachment_filename2'],
            ],
            'attactment3' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment3']) ? $this->uploadFileLoan($folder_name,$post['attactment3']) : $post['attachment_filename3'],
            ],
            'attactment4' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment4']) ? $this->uploadFileLoan($folder_name,$post['attactment4']) : $post['attachment_filename4'],
            ],
            'attactment5' => [
                'folder'=>$folder_name,
                'label'=>null, 
                'file'=>isset($post['attactment5']) ? $this->uploadFileLoan($folder_name,$post['attactment5']) : $post['attachment_filename5'],
            ],
            'attactment6' => [
                'folder'=>$folder_name,
                'label'=>$post['label'], 
                'file'=>isset($post['attactment6']) ? $this->uploadFileLoan($folder_name,$post['attactment6']) : $post['attachment_filename6'],
            ],
        ];
        $data['attachments'] = json_encode($file_array);
        $res = $this->model->updateWhere('tbl_loan', $where, $data);
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
    public function uploadFileLoan($folder_name,$file_upload){
        $path = Helpers::getDir('apply-loan', $folder_name);
        $filename = Helpers::strRandom(10) . '-' . Helpers::strRandom(10) . '.' . $file_upload->extension();
        $file_upload->move($path, $filename);
        return $filename;
    }
}