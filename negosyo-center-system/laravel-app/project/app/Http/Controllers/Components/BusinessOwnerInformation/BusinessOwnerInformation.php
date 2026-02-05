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
        c.`business_approved` as business_approved_msme,
        c.`majority_business_activity` as majority_business_activity
        FROM tbl_business as a 
        INNER JOIN tbl_users as b ON a.added_by = b.user_id 
        INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection 
        WHERE a.deleted = 0 and a.added_by = ? ";
        $d['result'] =  $this->model->getResults($sql, [$this->session['user_id']]); 
        $data['html'] = view('list.business', $d)->render();
        return $data;
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
                if ($action == 'add') {
                    $d['data'] = $this->getBnrDetails($id,true);
                }else{
                    $d['data'] = $this->getBnrDetails($id);
                }
                
                $user_primry_id = $this->session['user_role'] == 2 ? $this->session['user_id'] : $this->viewDataModule($post)->added_by;
                $d['user_details_session'] =  $this->getUserDetails($user_primry_id);
                $d['bday_user'] = Helpers::segregateDate($d['user_details_session']->bday);

                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                $title = 'Business Name Registration Form <br><i class="text-danger">NOTE: For Existing MSME (Unregistered).*</i>';
                $form = view('modal-views.modal-bnr', $d)->render();
                break;
            case 'bnrprinted':
               
               
                //dd($d['data']);
                $user_primry_id = $this->session['user_role'] == 2 ? $this->session['user_id'] : $this->viewDataModule($post)->added_by;
                $d['user_details_session'] =  $this->getUserDetails($user_primry_id);
                $d['bday_user'] = Helpers::segregateDate($d['user_details_session']->bday);

                $footer = '';
                $title = 'Business Name Registration Form';
                if ($isupload == 1) {
                    $d['data'] = $this->getBnrDetails($id);
                    $form = view('modal-views.modal-bnr', $d)->render();
                }else{
                    $d['data'] = $this->viewDataModule($post);
                    $form = view('print.bnr', $d)->render();
                }
                break;
            case 'msme':
                if ($action == 'add') {
                    $d['data'] = $this->getMsmeDetails($id,true);
                    //dd($d);
                }else{
                    $d['data'] = $this->getMsmeDetails($id);
                }
                //dd($d);
                $title = 'Micro, Small and Medium Enterprises Form <br><i class="text-danger">NOTE: For Existing MSME (Registered).*</i>';
                $form = view('modal-views.modal-msme', $d)->render();
                $footer = '<button type="submit" class="btn btn-primary btn-sm">Save</button>';
                break;
            case 'msmeprinted':
                $d['data'] = $this->viewDataModule2($post);
                $d['personal_info'] = $this->getMsmeDetails($id);
                $user_primry_id = $this->session['user_role'] == 2 ? $this->session['user_id'] : $this->viewDataModule($post)->added_by;
                $d['user_details_session'] =  $this->getUserDetails($user_primry_id);
                $title = 'Micro, Small and Medium Enterprises Form';
                $form = view('print.msme', $d)->render();
                $footer = '';
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
    public function getBnrDetails($id,$prev=false){

        $session = $this->session;

        if (!$prev) {
            $sql = "SELECT        
            a.*,
            c.*,
            b.first_name,b.last_name,b.middle_name,b.suffix,
            a.`status` as status_bnr,
            a.`bnr_certificate_file` as bnr_certificate_file,
            c.`status` as status_msme,
            c.`msme_id` as msme_id,
            c.`majority_business_activity` as majority_business_activity
            FROM tbl_business as a 
            INNER JOIN tbl_users as b ON a.added_by = b.user_id 
            INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection WHERE a.deleted = 0 and a.b_id = ? ";
            return $this->model->getRow($sql, [$id]); 
        }else{
            $sql = "SELECT     
            a.*,
            c.*,
            b.first_name,b.last_name,b.middle_name,b.suffix,
            a.`status` as status_bnr,
            a.`bnr_certificate_file` as bnr_certificate_file,
            c.`status` as status_msme,
            c.`msme_id` as msme_id,
            c.`majority_business_activity` as majority_business_activity
            FROM tbl_business as a 
            INNER JOIN tbl_users as b ON a.added_by = b.user_id 
            INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection WHERE a.deleted = 0 and a.added_by = ? and a.bnr_certificate_file is null ORDER BY a.b_id DESC LIMIT 1";
            return $this->model->getRow($sql, [$session['user_id']]); 
        }
        if ($id == null && $id == '') {
            return false;
        }

    }
    public function getMsmeDetails($id,$prev=false){

        $session = $this->session;
        if (!$prev) {
            $sql = "SELECT        
            a.*,
            c.*,
            b.first_name,
            b.last_name,
            b.middle_name,
            b.suffix,
            b.email,
            b.barangay,
    
            a.`status` as status_bnr,
            c.`status` as status_msme,
            c.`msme_id` as msme_id,
            c.`majority_business_activity` as majority_business_activity
            FROM tbl_business as a 
            INNER JOIN tbl_users as b ON a.added_by = b.user_id 
            INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection WHERE a.deleted = 0 and c.msme_id = ? ";
            return $this->model->getRow($sql, [$id]); 
        }else{
            $sql = "SELECT        
            a.*,
            c.*,
            b.first_name,
            b.last_name,
            b.middle_name,
            b.suffix,
            b.email,
            b.barangay,
    
            a.`status` as status_bnr,
            c.`status` as status_msme,
            c.`msme_id` as msme_id,
            c.`majority_business_activity` as majority_business_activity
            FROM tbl_business as a 
            INNER JOIN tbl_users as b ON a.added_by = b.user_id 
            INNER JOIN tbl_msme as c ON a.unique_connection = c.unique_connection WHERE a.deleted = 0 and a.added_by = ?  AND c.status = 'APPROVED'  ORDER BY c.msme_id DESC LIMIT 1 ";
            $data = $this->model->getRow($sql, [$session['user_id']]); 
            //dd($data);
            return $data;
        }
        if ($id == null && $id == '') {
            return false;
        }
    }
    public function viewDataModule($post){
        extract($post);
        $sql = 'SELECT * FROM tbl_business WHERE b_id = ?';
        $param = [$id];
        $result = $this->model->getRow($sql, $param);
        return is_object($result) ? (array) $result : $result;

    }
    public function viewDataModule2($post){
        extract($post); 
        $sql = 'SELECT a.*,c.*,b.form_ownership,b.category_entrepreneur FROM tbl_msme as a
        INNER JOIN tbl_users as b ON a.added_by = b.user_id 
        INNER JOIN tbl_business as c ON a.unique_connection = c.unique_connection
        WHERE a.msme_id = ?';
        $param = [$id];
        $result = $this->model->getRow($sql, $param);
        return is_object($result) ? (array) $result : $result;

    }
    public function crudAction(){
        $post = Helpers::allr();
        if ($post['action'] == 'add') {
            if (isset($post['msme_id'])) {
                return $this->createDocumentMsme($post);
            }else{
                return $this->createDocumentBnr($post);
            }
        }else{
            if (isset($post['msme_id'])) {
                return $this->updateDocumentMsme($post);
            }else{
                return $this->updateDocumentBnr($post);
            }
        }
    }
    //bnr
        public function createDocumentBnr($post){
     
            $session = $this->session;
            // foreach ($post as $key => $R) {
            //     $form[$key] = $R;
            // }
            // $data['form_bnr'] = json_encode($form);
            // $data['brgy'] = $post['business_details_Barangay'];
            // $data['type_of_form'] = $post['type_of_form'];
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

            $data['business_details_house_no'] = $post['business_details_house_no'];
            $data['business_details_brgy'] = $post['business_details_brgy'];
            $data['business_details_street'] = $post['business_details_street'];
            $data['business_details_phone_no'] = $post['business_details_phone_no'];
            $data['business_mobile_no'] = $post['business_mobile_no'];
            $data['is_same'] = isset($post['is_same']) ? 1 : 0;
            $data['owner_details_house_no'] = $post['owner_details_house_no'];
            $data['owner_details_brgy'] = $post['owner_details_brgy'];
            $data['owner_details_street'] = $post['owner_details_street'];
            $data['owner_details_phone_no'] = $post['owner_details_phone_no'];
            $data['owner_details_mobile_no'] = $post['owner_details_mobile_no'];
            $data['owner_details_email'] = $post['owner_details_email'];
            

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
    
        public function updateDocumentBnr($post){
        
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

            $data['business_details_house_no'] = $post['business_details_house_no'];
            $data['business_details_brgy'] = $post['business_details_brgy'];
            $data['business_details_street'] = $post['business_details_street'];
            $data['business_details_phone_no'] = $post['business_details_phone_no'];
            $data['business_mobile_no'] = $post['business_mobile_no'];
            $data['is_same'] = isset($post['is_same']) ? 1 : 0;
            $data['owner_details_house_no'] = $post['owner_details_house_no'];
            $data['owner_details_brgy'] = $post['owner_details_brgy'];
            $data['owner_details_street'] = $post['owner_details_street'];
            $data['owner_details_phone_no'] = $post['owner_details_phone_no'];
            $data['owner_details_mobile_no'] = $post['owner_details_mobile_no'];
            $data['owner_details_email'] = $post['owner_details_email'];
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
    //msme
        public function createDocumentMsme($post){
            $session = $this->session;

            $data['business_approved'] = $post['business_approved'];
            $data['majority_business_activity'] = $post['majority_business_activity'];
            $data['product_service_line'] = $post['product_service_line'];
            $data['year_established'] = $post['year_established'];
            $data['initial_capitalization'] = $post['initial_capitalization'];
            $data['as_of_asset_classification'] = $post['as_of_asset_classification'];
            $data['asset_classification'] = $post['asset_classification'];
            $data['full_time_no_employees_male_pwd'] = $post['full_time_no_employees_male_pwd'];
            $data['full_time_no_employees_male_ip'] = $post['full_time_no_employees_male_ip'];
            $data['full_time_no_employees_male_sr'] = $post['full_time_no_employees_male_sr'];
            $data['full_time_no_employees_female_abled'] = $post['full_time_no_employees_female_abled'];
            $data['full_time_no_employees_female_pwd'] = $post['full_time_no_employees_female_pwd'];
            $data['full_time_no_employees_female_ip'] = $post['full_time_no_employees_female_ip'];
            $data['full_time_no_employees_female_sr'] = $post['full_time_no_employees_female_sr'];
            $data['part_time_no_employees_male_abled'] = $post['part_time_no_employees_male_abled'];
            $data['part_time_no_employees_male_pwd'] = $post['part_time_no_employees_male_pwd'];
            $data['part_time_no_employees_male_ip'] = $post['part_time_no_employees_male_ip'];
            $data['part_time_no_employees_male_sr'] = $post['part_time_no_employees_male_sr'];
            $data['part_time_no_employees_female_abled'] = $post['part_time_no_employees_female_abled'];
            $data['part_time_no_employees_female_pwd'] = $post['part_time_no_employees_female_pwd'];
            $data['part_time_no_employees_female_ip'] = $post['part_time_no_employees_female_ip'];
            $data['part_time_no_employees_female_sr'] = $post['part_time_no_employees_female_sr'];
            $data['physical_store_food'] = $post['physical_store_food'];
            $data['physical_store_nonfood'] = $post['physical_store_nonfood'];
            $data['physical_store_food_nonfood'] = $post['physical_store_food_nonfood'];
            $data['physical_store_area_owner'] = $post['physical_store_area_owner'];
            $data['physical_store_area_rented'] = $post['physical_store_area_rented'];
            $data['physical_store_govn_supervised'] = $post['physical_store_govn_supervised'];
            $data['ambulant_vending_food'] = $post['ambulant_vending_food'];
            $data['ambulant_vending_nonfood'] = $post['ambulant_vending_nonfood'];
            $data['ambulant_vending_food_nonfood'] = $post['ambulant_vending_food_nonfood'];
            $data['ambulant_vending_area_owner'] = $post['ambulant_vending_area_owner'];
            $data['ambulant_vending_area_rented'] = $post['ambulant_vending_area_rented'];
            $data['ambulant_vending_govn_supervised'] = $post['ambulant_vending_govn_supervised'];
            $data['online_store_food'] = $post['online_store_food'];
            $data['online_store_nonfood'] = $post['online_store_nonfood'];
            $data['online_store_food_nonfood'] = $post['online_store_food_nonfood'];
            $data['online_store_area_owner'] = $post['online_store_area_owner'];
            $data['online_store_area_rented'] = $post['online_store_area_rented'];
            $data['online_store_govn_supervised'] = $post['online_store_govn_supervised'];
            $data['category_entrepreneur'] = $post['category_entrepreneur'];
            $data['social_classification'] = $post['social_classification'];
            $data['no_employees'] = $post['no_employees'];
            $data['full_time_no_employees_male_abled'] = $post['full_time_no_employees_male_abled'];
            $data['physical_store_area_owner_indicate'] = $post['physical_store_area_owner_indicate'];
            $data['physical_store_area_rented_indicate'] = $post['physical_store_area_rented_indicate'];
            $data['ambulant_vending_area_owner_indicate'] = $post['ambulant_vending_area_owner_indicate'];
            $data['ambulant_vending_area_rented_indicate'] = $post['ambulant_vending_area_rented_indicate'];
            $data['online_store_area_owner_indicate'] = $post['online_store_area_owner_indicate'];
            $data['online_store_area_rented_indicate'] = $post['online_store_area_rented_indicate'];
            $data['online_store_govn_supervised_indicate'] = $post['online_store_govn_supervised_indicate'];
            $options1 = [
                "BELOW P10,000" => "MICRO",
                "P10,000 - P20,000" => "MICRO",
                "P20,000 - P50,000" => "MICRO",
                "P50,000 - P100,000" => "MICRO",
                "P100,000 - P500,000" => "MICRO",
                "P100,000 - P1.5M" => "MICRO",
                "P1.5M - P3M" => "MICRO",
                "P3M - P5M" => "SMALL",
                "P5M - P10M" => "SMALL",
                "P10M - P15M" => "SMALL",
                "P15M - P100M" => "MEDIUM"
            ];
            $data['category_of_entrepreneur'] = $options1[$post['asset_classification']]; 

            $data['unique_connection'] = strtotime(date(SQLDATETIME));
            $data['added_by'] = $session['user_id'];
            $data['added_date'] = date(SQLDATETIME);
            $data['status'] = 'PENDING';
            $res = $this->model->insert('tbl_msme', $data);
            if ($res) {
                $folder_name = Helpers::strRandom(10);
                $data_msme['unique_connection'] = $data['unique_connection'];
                $data_msme['bnr_certificate_file'] = $this->uploadFileLoan($folder_name,$post['bnr_certificate_file']);
                $data_msme['added_by'] = $session['user_id'];
                $data_msme['added_date'] = date(SQLDATETIME);
                $data_msme['status'] = 'PENDING';
                $this->model->insert('tbl_business', $data_msme);

                $response['success'] = true;
                $response['exist'] = false;
                $response['msg'] = 'Successfully Added!';
            }
            return $response;
        }
        public function updateDocumentMsme($post){
            $session = $this->session;
            
            $data['business_approved'] = $post['business_approved'];
            $data['majority_business_activity'] = $post['majority_business_activity'];
            $data['product_service_line'] = $post['product_service_line'];
            $data['year_established'] = $post['year_established'];
            $data['initial_capitalization'] = $post['initial_capitalization'];
            $data['as_of_asset_classification'] = $post['as_of_asset_classification'];
            $data['asset_classification'] = $post['asset_classification'];
            $data['full_time_no_employees_male_pwd'] = $post['full_time_no_employees_male_pwd'];
            $data['full_time_no_employees_male_ip'] = $post['full_time_no_employees_male_ip'];
            $data['full_time_no_employees_male_sr'] = $post['full_time_no_employees_male_sr'];
            $data['full_time_no_employees_female_abled'] = $post['full_time_no_employees_female_abled'];
            $data['full_time_no_employees_female_pwd'] = $post['full_time_no_employees_female_pwd'];
            $data['full_time_no_employees_female_ip'] = $post['full_time_no_employees_female_ip'];
            $data['full_time_no_employees_female_sr'] = $post['full_time_no_employees_female_sr'];
            $data['part_time_no_employees_male_abled'] = $post['part_time_no_employees_male_abled'];
            $data['part_time_no_employees_male_pwd'] = $post['part_time_no_employees_male_pwd'];
            $data['part_time_no_employees_male_ip'] = $post['part_time_no_employees_male_ip'];
            $data['part_time_no_employees_male_sr'] = $post['part_time_no_employees_male_sr'];
            $data['part_time_no_employees_female_abled'] = $post['part_time_no_employees_female_abled'];
            $data['part_time_no_employees_female_pwd'] = $post['part_time_no_employees_female_pwd'];
            $data['part_time_no_employees_female_ip'] = $post['part_time_no_employees_female_ip'];
            $data['part_time_no_employees_female_sr'] = $post['part_time_no_employees_female_sr'];
            $data['physical_store_food'] = $post['physical_store_food'];
            $data['physical_store_nonfood'] = $post['physical_store_nonfood'];
            $data['physical_store_food_nonfood'] = $post['physical_store_food_nonfood'];
            $data['physical_store_area_owner'] = $post['physical_store_area_owner'];
            $data['physical_store_area_rented'] = $post['physical_store_area_rented'];
            $data['physical_store_govn_supervised'] = $post['physical_store_govn_supervised'];
            $data['ambulant_vending_food'] = $post['ambulant_vending_food'];
            $data['ambulant_vending_nonfood'] = $post['ambulant_vending_nonfood'];
            $data['ambulant_vending_food_nonfood'] = $post['ambulant_vending_food_nonfood'];
            $data['ambulant_vending_area_owner'] = $post['ambulant_vending_area_owner'];
            $data['ambulant_vending_area_rented'] = $post['ambulant_vending_area_rented'];
            $data['ambulant_vending_govn_supervised'] = $post['ambulant_vending_govn_supervised'];
            $data['online_store_food'] = $post['online_store_food'];
            $data['online_store_nonfood'] = $post['online_store_nonfood'];
            $data['online_store_food_nonfood'] = $post['online_store_food_nonfood'];
            $data['online_store_area_owner'] = $post['online_store_area_owner'];
            $data['online_store_area_rented'] = $post['online_store_area_rented'];
            $data['online_store_govn_supervised'] = $post['online_store_govn_supervised'];
            $data['category_entrepreneur'] = $post['category_entrepreneur'];
            $data['social_classification'] = $post['social_classification'];
            $data['no_employees'] = $post['no_employees'];
            $data['full_time_no_employees_male_abled'] = $post['full_time_no_employees_male_abled'];
            $data['physical_store_area_owner_indicate'] = $post['physical_store_area_owner_indicate'];
            $data['physical_store_area_rented_indicate'] = $post['physical_store_area_rented_indicate'];
            $data['ambulant_vending_area_owner_indicate'] = $post['ambulant_vending_area_owner_indicate'];
            $data['ambulant_vending_area_rented_indicate'] = $post['ambulant_vending_area_rented_indicate'];
            $data['online_store_area_owner_indicate'] = $post['online_store_area_owner_indicate'];
            $data['online_store_area_rented_indicate'] = $post['online_store_area_rented_indicate'];
            $data['online_store_govn_supervised_indicate'] = $post['online_store_govn_supervised_indicate'];
            $options1 = [
                "BELOW P10,000" => "MICRO",
                "P10,000 - P20,000" => "MICRO",
                "P20,000 - P50,000" => "MICRO",
                "P50,000 - P100,000" => "MICRO",
                "P100,000 - P500,000" => "MICRO",
                "P100,000 - P1.5M" => "MICRO",
                "P1.5M - P3M" => "MICRO",
                "P3M - P5M" => "SMALL",
                "P5M - P10M" => "SMALL",
                "P10M - P15M" => "SMALL",
                "P15M - P100M" => "MEDIUM"
            ];
            $data['category_of_entrepreneur'] = $options1[$post['asset_classification']]; 

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
        public function uploadFileLoan($folder_name,$file_upload){
            $path = Helpers::getDir('profile', $folder_name);
            $filename = Helpers::strRandom(10) . '-' . Helpers::strRandom(10) . '.' . $file_upload->extension();
            $file_upload->move($path, $filename);
            return $folder_name.'/'.$filename;
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
        $sql = 'SELECT * FROM tbl_users as a WHERE user_id = ?';
        $exe = $this->model->getRow($sql, [$id]); 
        return $exe;
    }
}