<?php 
namespace App\Http\Controllers\Components\AppointmentSchedule;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;

class AppointmentSchedule 
{

    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        $this->sessionall = Helpers::session();
        Helpers::getView('AppointmentSchedule');
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
        $sql = "SELECT a.* FROM tbl_events as a WHERE a.deleted = 0 and `type` = ?";
        $result =  $this->model->getResults($sql, ['Appointment']);  
        $data = [];
        $x = 1;
        if ($result) {
            foreach ($result as $key => $R) {
                $crdentials = 'data-id="'.$R->event_id.'"';
                $view = '<a class="dropdown-item bg-primary actionExecute"  '.$crdentials.' data-action="view" href="javascript:void(0);" style="color:white !important"><i class="far fa-eye"></i> View</a>';
                $edit = '<a class="dropdown-item bg-info actionExecute"  '.$crdentials.' data-action="edit" href="javascript:void(0);" style="color:white !important"><i class="far fa-edit"></i> Edit</a>';
                $delete = '<a class="dropdown-item bg-danger actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="delete" data-msg="Delete"  style="color:white !important"><i class="fas fa-trash-alt"></i> Delete</a>';
                $cancelled = '<a class="dropdown-item bg-warning actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="cancel"  data-msg="Cancel" style="color:white !important"><i class="fas fa-times"></i> Cancel</a>';
                if ($R->status != 'CANCELLED') {
                    $status_action = strtotime($R->date.' '.$R->end_time) < time() ? 'DONE' : 'ONGOING';
                }else{
                    $status_action = $R->status;
                }

                switch ($status_action) {
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
                    case 'DONE':
                        $action = $view;
                        $status = 'success';
                        break;
                    case 'DECLINED':
                        $action = $view.$delete;
                        $status = 'danger';
                        break;
                    case 'ONGOING':
                        $action = $view.$edit.$cancelled.$delete;
                        $status = 'primary';
                        break;
                    case 'CANCELLED':
                        $action = $view;
                        $status = 'danger';
                        break;
                    default:
                        $action = $view.$edit.$delete;
                        $status = '';
                        break;
                }
                $data[] = [
                 'num' => $x++,
                 'event_id' => $R->event_id,
                 'date' =>  date(LONGDATE,strtotime($R->date)),
                 'time' => Helpers::timeFormat($R->start_time).' - '.Helpers::timeFormat($R->end_time),
                 'type' => $R->type,
                 'status' => Helpers::status_badge($status_action,$status),
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
        switch ($action_fn) {
            case 'edit':
                $d['data'] = $this->viewDataModule($post);
                $d['participants'] = $this->viewDataParticipants($post);
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'add':
                $d['data'] = false;
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'view':
                $d['data'] = $this->viewDataModule($post);
                $d['participants'] = $this->viewDataParticipants($post);
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
        $sql = 'SELECT * FROM tbl_events WHERE event_id = ?';
        $param = [$primary_id];
        return $this->model->getRow($sql, $param);
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
            ['field' => 'event_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_events', $where, $data);
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
        $data['date'] = $post['date'];
        $data['start_time'] = $post['start'];
        $data['end_time'] = $post['end'];
        $data['type'] = 'Appointment';
        $data['location'] = $post['location'];
        $data['purpose'] = $post['purpose'];
        $data['added_by'] = $session['user_id'];
        $data['added_date'] = date(SQLDATETIME);
        $res = $this->model->insert('tbl_events', $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Added!';
        }
        return $response;
    }
    public function updateDocument($post){
        $data['date'] = $post['date'];
        $data['start_time'] = $post['start'];
        $data['end_time'] = $post['end'];
        $data['location'] = $post['location'];
        $data['purpose'] = $post['purpose'];
        $where = [
            ['field' => 'event_id','value'=> $post['event_id']]
        ];
       
        $res = $this->model->updateWhere('tbl_events', $where, $data);
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
    public function viewDataParticipants($post){
        extract($post);
        $sql = "SELECT a.*,b.first_name,b.last_name,b.middle_name FROM tbl_participants as a INNER JOIN tbl_users as b ON a.user_id = b.user_id WHERE a.event_id = ? and a.status in ('PENDING','APPROVED','PRESENT')";
        $param = [$primary_id];
        return $this->model->getResults($sql, $param);
    }
    public function acceptAppointment(){
        $post = Helpers::post();
        extract($post);
        if (strtoupper($post['action']) == 'PRESENT') {
            $data['attendance'] = strtoupper($post['action']);
        }else{
            $data['status'] = strtoupper($post['action']);
        }
        $where = [
            ['field' => 'participant_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_participants', $where, $data);

        if ($post['action'] == 'Declined') {
            $event['status'] = 'AVAILABLE';
            $where = [
                ['field' => 'event_id','value'=> $post['event_id']]
            ];
            $this->model->updateWhere('tbl_events', $where, $event);    
        }
 
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