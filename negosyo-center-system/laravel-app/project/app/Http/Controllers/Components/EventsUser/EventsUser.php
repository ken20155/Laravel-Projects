<?php 
namespace App\Http\Controllers\Components\EventsUser;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;

class EventsUser 
{

    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        $this->sessionall = Helpers::session();
        Helpers::getView('EventsUser');
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
        $sql = "SELECT a.*,a.status as status_participant,b.*,b.status as event_status FROM tbl_participants as a INNER JOIN tbl_events as b on a.event_id = b.event_id WHERE a.deleted = 0 and a.user_id = ? and `type` = ?";
        $result =  $this->model->getResults($sql, [$this->session['user_id'],'Event']);  
        $data = [];
        $x = 1;
        if ($result) {
            foreach ($result as $key => $R) {
                $crdentials = '
                data-id="'.$R->participant_id.'"
                data-eventid="'.$R->event_id.'"
                ';
                $view = '<a class="dropdown-item bg-primary actionExecute"  '.$crdentials.' data-action="view" href="javascript:void(0);" style="color:white !important"><i class="far fa-eye"></i> View</a>';
                $edit = '<a class="dropdown-item bg-warning actionExecute"  '.$crdentials.' data-action="edit" href="javascript:void(0);" style="color:white !important"><i class="far fa-edit"></i> Edit</a>';
                $delete = '<a class="dropdown-item bg-danger actionExecuteDelete" href="javascript:void(0);" '.$crdentials.' data-action="delete"  data-msg = "Delete" style="color:white !important"><i class="fas fa-trash-alt"></i> Delete</a>';
                $cancel = '<a class="dropdown-item bg-warning actionExecuteDelete"  '.$crdentials.' data-action="Cancelled" data-msg = "Cancel" href="javascript:void(0);" style="color:white !important"><i class="fas fa-exclamation-circle"></i> Cancel</a>';
                
                switch ($R->status_participant) {
                    case 'PENDING':
                        $action = $view.$cancel;
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
                    case 'CANCELLED':
                        $action = $view;
                        $status = 'danger';
                        break;
                    default:
                        $action = '';
                        break;
                }
                switch ($R->event_status) {
                    case 'POSTED':
                        $event_status = 'primary';
                        break;
                    case 'CANCELLED':
                        $action = $view;
                        $event_status = 'danger';
                        break;
                    default:
                        $action = $view.$edit.$delete;
                        break;
                }
                $data[] = [
                 'num' => $x++,
                 'event_id' => $R->event_id,
                 'date' =>  date(LONGDATE,strtotime($R->date)),
                 'time' => Helpers::timeFormat($R->start_time).' - '.Helpers::timeFormat($R->end_time),
                 'type' => $R->type,
                 'status' => Helpers::status_badge($R->status_participant,$status),
                 'event_status' => Helpers::status_badge($R->event_status,$event_status),
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
        $data_events = [];
        $d['participants'] = false;
        switch ($action_fn) {
            case 'edit':
                $d['data'] = $this->viewDataModule($post);
                $d['participants'] = $this->viewDataParticipants($post);
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'add':
                $d['data'] = false;
                $data_events = $this->viewEvents($post);
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
        //dd($d);
        return [
            'element' => '#modal-dynamic',
            'data_events' => $data_events,
            'action_modal' => 'open',
            'action' => $action,
            'action_fn' => $action_fn,
            'body' =>  view('modal-views.modal-add', $d)->render(),
            'footer' => $footer,
        ];
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
        $data['user_id'] = $session['user_id'];
        $data['event_id'] = $post['selected_event_id'];
        $data['added_by'] = $session['user_id'];
        $data['added_date'] = date(SQLDATETIME);
        $res = $this->model->insert('tbl_participants', $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Added!';
        }
        return $response;
    }
    public function viewDataParticipants($post){
        extract($post);
        // $sql = "SELECT a.*,b.first_name,b.last_name,b.middle_name FROM tbl_participants as a INNER JOIN tbl_users as b ON a.user_id = b.user_id WHERE a.event_id = ? and a.status in ('PENDING','APPROVED','PRESENT')";
        $sql = "SELECT a.*,b.first_name,b.last_name,b.middle_name FROM tbl_participants as a INNER JOIN tbl_users as b ON a.user_id = b.user_id WHERE a.participant_id = ?";
        $param = [$primary_id];
        return $this->model->getRow($sql, $param);
    }
    public function viewDataModule($post){
        extract($post);
        $sql = 'SELECT * FROM tbl_events WHERE event_id = ?';
        $param = [$event_id];
        return $this->model->getRow($sql, $param);
    }
    public function viewEvents($post){
        extract($post);
        $sql = 'SELECT
                `a`.`event_id`,
                `a`.`date`,
                `a`.`start_time`,
                `a`.`end_time`,
                `a`.`type`,
                `a`.`location`,
                `a`.`purpose`,
                `a`.`status`,
                `a`.`added_by`,
                `a`.`added_date`,
                `a`.`deleted`,
                GROUP_CONCAT(b.user_id) AS user_ids
            FROM
                tbl_events AS a
            LEFT JOIN tbl_participants AS b
                ON b.event_id = a.event_id
            WHERE
                a.deleted = ? AND a.`type` = ? AND a.`status` IN("POSTED","CANCELLED")
            GROUP BY
                a.event_id, a.date, a.start_time, a.end_time, a.type, a.location, a.purpose, a.status, a.added_by, a.added_date, a.deleted;
';
        $param = [0,'Event'];
        $data = $this->model->getResults($sql, $param);
        $array_data = [];
        if ($data) {
            foreach ($data as $key => $R) {

                if ($R->status == 'CANCELLED') {
                    $array_data[] = [
                        'id'    =>  $R->event_id,
                        'title' => 'Status: CANCELLED <br>TIME START: '.Helpers::timeFormat($R->start_time).'<br>TIME END: '.Helpers::timeFormat($R->end_time).'<br>',
                        'start' => date('Y-m-d',strtotime($R->date)),
                        'status' => 'CANCELLED',
                        'color' => '#de2d2d',
                        'className' => 'schedule-'.$R->event_id,
                    ];
                }else{
                    if (strtotime($R->date.' '.$R->end_time) < time()) {
                        $color = '#de2d2d';
                        $status = 'NOT AVAILABLE';
                    }else{
                        if ($R->status == 'NOT AVAILABLE') {
                            $color = '#de2d2d';
                            $status = 'NOT AVAILABLE';
                        }else{
                            $status = 'AVAILABLE';
                            $color = '';
                        }
                    }
                    $user_ids = explode(',',$R->user_ids);
                    if (in_array($this->session['user_id'], $user_ids)) {
                        $array_data[] = [
                            'id'    =>  $R->event_id,
                            'title' => 'Status: APPLIED <br>TIME START: '.Helpers::timeFormat($R->start_time).'<br>TIME END: '.Helpers::timeFormat($R->end_time).'<br>',
                            'start' => date('Y-m-d',strtotime($R->date)),
                            'status' => 'NOT AVAILABLE',
                            'color' => '#de2d2d',
                            'className' => 'schedule-'.$R->event_id,
                        ];
                    }else{
                        $array_data[] = [
                            'id'    =>  $R->event_id,
                            'title' => 'Status: AVAILABLE <br>TIME START: '.Helpers::timeFormat($R->start_time).'<br>TIME END: '.Helpers::timeFormat($R->end_time).'<br>',
                            'start' => date('Y-m-d',strtotime($R->date)),
                            'status' => $status,
                            'color' => '',
                            'className' => 'schedule-'.$R->event_id,
                        ];
                    }
                }


            }
        }
        return $array_data;
    }
    public function approvedDocument(){
        $post = Helpers::post();
        extract($post);
        $data['status'] = strtoupper($post['action']);
        $where = [
            ['field' => 'participant_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_participants', $where, $data);

        $event['status'] = 'AVAILABLE';
        $where = [
            ['field' => 'event_id','value'=> $post['event_id']]
        ];
        $this->model->updateWhere('tbl_events', $where, $event);

        if ($res) {
            $response['success'] = true;
            $response['msg'] = $post['action'].' Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
    public function openDynamicModalOther(){
        $post = Helpers::post();
        extract($post);
        $sql = 'SELECT * FROM tbl_events WHERE event_id = ?';
        $param = [$id];
        $d['data'] = $this->model->getRow($sql, $param);
        return [
            'element' => '#modal-dynamic-2',
            'action_modal' => 'open',
            'body' =>  view('modal-views.modal-schedule', $d)->render(),
            'footer' => $status == 'CANCELLED' || $status == 'NOT AVAILABLE' ? '' : '<button type="button" data-id = "'.$id.'" id = "selectSchedule" class="btn btn-primary btn-sm">Select</button>',
        ];
    }
    public function deleteDocument(){
        $post = Helpers::post();
        extract($post);
        //dd($post);
        //dd($this->sessionall['user_details']->first_name);
        $msg  = 'Deleted';
        if ($action == 'delete') {
            $data['deleted'] = 1;
        }else{
            $data['status'] = 'CANCELLED';
            $data['reason_cancel'] = $value."\r\n".'CANCELLED BY:'.$this->sessionall['user_details']->first_name.' '.$this->sessionall['user_details']->middle_name.' '.$this->sessionall['user_details']->last_name;
            $msg  = 'Cancelled';
        }
        $where = [
            ['field' => 'participant_id','value'=> $post['primary_id']]
        ];
        $res = $this->model->updateWhere('tbl_participants', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = $msg.' Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
}