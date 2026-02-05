<?php 
namespace App\Http\Controllers\Components\Dashboard;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;

class Dashboard
{
    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session()['session'];
        Helpers::getView('Dashboard');
    }
    public static function js(){
        return [
            'js/sample'
        ];
    }
    public function defaultPage($params){
        $data = [];
        $d['getTotalUsers'] = $this->getTotalUsers();
        $d['getTotaBnr'] = $this->getTotaBnr();
        $d['getTotaMsme'] = $this->getTotalMsme();
        $d['getTotaLoan'] = $this->getTotalLoan();
        $d['getTotalMsmeClassification'] = $this->getTotalMsmeClassification();
        $d['getTotalBnr'] = $this->getTotalBnr();
        // $d['totalAnnoucement'] = $this->totalAnnoucement();
        return [
            'content' => $this->session['user_role'] == 1 ? view('dashboard-admin', $d)->render() : view('dahsboard-businessowner', $d)->render()
        ];
    }
    public function totalAnnoucement($year){
        $sql = "SELECT COUNT(*) as total FROM tbl_annoucement as a WHERE a.deleted = 0 and YEAR(added_date) = ?";
        $data = $this->model->getRow($sql, [$year]);  
        return $data->total;
    }
    public function getTotalUsers(){
        $sql = "SELECT COUNT(user_id) as total FROM tbl_users as a WHERE a.deleted = 0 and a.user_role = 2";
        $data = $this->model->getRow($sql, []);  
        return $data->total;
    }
    public function getTotaBnr(){
        $sql = "SELECT COUNT(b_id) as total FROM tbl_business as a WHERE a.deleted = 0";
        $data = $this->model->getRow($sql, []);  
        return $data->total;
    }
    public function getTotalMsme(){
        $sql = "SELECT COUNT(msme_id) as total FROM tbl_msme as a WHERE a.deleted = 0";
        $data = $this->model->getRow($sql, []);  
        return $data->total;
    }
    public function getTotalLoan(){
        //$sql = "SELECT COUNT(loan_id) as total FROM tbl_loan as a WHERE a.deleted = 0 and `status` = ?";
        $sql = "SELECT COUNT(loan_id) as total FROM tbl_loan as a WHERE a.deleted = 0";
        $data = $this->model->getRow($sql, []);  
        return $data->total;
    }
    public function getTotalMsmeClassification(){
        // Define the SQL query
        $sql = "SELECT 
                b.barangay AS brgy,
                a.category_of_entrepreneur AS category,
                COUNT(a.msme_id) AS total_count
            FROM 
                tbl_msme AS a
                LEFT JOIN tbl_users AS b ON a.added_by = b.user_id
            WHERE 
                a.deleted = 0
            GROUP BY 
                b.barangay, a.category_of_entrepreneur
            ORDER BY 
                b.barangay, a.category_of_entrepreneur;
        ";

        // Execute the query
        $data = $this->model->getResults($sql, []);
        $values = [];

        // List of valid categories
        $validCategories = ['MICRO', 'SMALL', 'MEDIUM'];

        // Process the query result
        if ($data) {
            foreach ($data as $R) {
                if (!empty($R->brgy)) {
                    $brgyName = $R->brgy;
                    $category = strtoupper(trim($R->category ?? '')); // Ensure uppercase and remove extra spaces
                    
                    // Only process if the category is valid
                    if (in_array($category, $validCategories)) {
                        // Initialize barangay data if not already set
                        if (!isset($values[$brgyName])) {
                            $values[$brgyName] = [
                                'MICRO' => 0,
                                'SMALL' => 0,
                                'MEDIUM' => 0,
                                'TOTAL' => 0
                            ];
                        }

                        // Increment category and total counts
                        $values[$brgyName][$category] += $R->total_count;
                        $values[$brgyName]['TOTAL'] += $R->total_count;
                    }
                }
            }
        }

        // Define all barangay locations
        $locations = [
            "BALUARTE",
            "CASINGLOT",
            "GRACIA",
            "MOHON",
            "NATUMOLAN",
            "POBLACION",
            "ROSARIO",
            "SANTA ANA",
            "SANTA CRUZ",
            "SUGBONGCOGON"
        ];

        // Prepare the final result
        $brgy = [];
        foreach ($locations as $location) {
            $brgy[$location] = [
                'brgy' => $location,
                'MICRO' => $values[$location]['MICRO'] ?? 0,
                'SMALL' => $values[$location]['SMALL'] ?? 0,
                'MEDIUM' => $values[$location]['MEDIUM'] ?? 0,
                'TOTAL' => $values[$location]['TOTAL'] ?? 0
            ];
        }

        return $brgy;
    }

    public function getTotalBnr(){
        $sql = "		SELECT 
        b.barangay as brgy,
        a.`status` AS category,
        COUNT(*) AS total_count
        FROM 
            tbl_business AS a
            LEFT JOIN tbl_users AS b ON a.added_by = b.user_id
        WHERE 
            a.deleted = 0 and a.`status` in ('PENDING','APPROVED')
        GROUP BY 
            b.barangay, a.`status`
        ORDER BY 
            b.barangay, a.`status`;
        ";
        $data = $this->model->getResults($sql, []); 
        $values = [];
        if ($data) {
        foreach ($data as $R) {
            $brgyName = $R->brgy;
            $category = strtoupper($R->category); // Ensure the category is in uppercase to match "MICRO", "SMALL", etc.
            
            // Initialize the barangay entry if not already set
            if (!isset($values[$brgyName])) {
                $values[$brgyName] = [
                    'PENDING' => 0,
                    'APPROVED' => 0,
                    'TOTAL' => 0,
                ];
            }
            
            // Add the total count to the respective category
            $values[$brgyName][$category] += $R->total_count;
            $values[$brgyName]['TOTAL'] += $R->total_count; // Accumulate the total for all categories
        }
        }

        // Define all barangay locations
        $locations = [
            "BALUARTE",
            "CASINGLOT",
            "GRACIA",
            "MOHON",
            "NATUMOLAN",
            "POBLACION",
            "ROSARIO",
            "SANTA ANA",
            "SANTA CRUZ",
            "SUGBONGCOGON"
        ];

        $brgy = [];
        foreach ($locations as $location) {
            // If values exist for this barangay, use them; otherwise, initialize with 0
            $brgy[$location] = [
                'brgy' => $location,
                'PENDING' => $values[$location]['PENDING'] ?? 0,
                'APPROVED' => $values[$location]['APPROVED'] ?? 0,
                'TOTAL' => $values[$location]['TOTAL'] ?? 0
            ];
        }
        return $brgy;
    }
    public function getAnnoucement(){
        $post = Helpers::post();
        extract($post);
        $wherein = '';
        if (isset($month) && isset($year) && $month != ''&& $year != '') {
            $wherein .= "AND YEAR(a.added_date) = '".$year."' AND MONTH(a.added_date) = '".$month."'";
        }
        $sql = "SELECT a.*,fs.folder,fs.file_name,fs.module_name FROM tbl_files_source as fs LEFT JOIN tbl_annoucement as a ON fs.source_id = a.annoucement_id and fs.module_name = 'annoucement' WHERE a.deleted = 0 $wherein";
        $result =  $this->model->getResults($sql, []);  
        $annouce_arry = [];
        if ($result) {
            foreach ($result as $key => $R) {
                $annouce_arry[$R->annoucement_id]['title'] = $R->title;
                $annouce_arry[$R->annoucement_id]['added_date'] = $R->added_date;
                $annouce_arry[$R->annoucement_id]['remarks'] = $R->remarks;
                $annouce_arry[$R->annoucement_id]['files'][] = [
                    'module_name'   =>$R->module_name,
                    'folder'        =>$R->folder,
                    'file_name'     =>$R->file_name,
                ];
            }
        }
        $d['res'] = $annouce_arry;
        $response['body'] = view('annoucement.content', $d)->render();
        return $response;
    }
    public function msmeRegisteredLineChart(){
        $post = Helpers::post();
        extract($post);
        $wherein = '';
        if (isset($year) && $year != '') {
            $wherein .= " AND YEAR(a.added_date) = '".$year."'";
        }
        if (isset($category_filter) && $category_filter != '') {
            $wherein .= " AND a.category_of_entrepreneur = '".$category_filter."'";
        }
        $sql = "SELECT 
                    MONTH(a.added_date) AS month,
                    COUNT(*) AS total_count
                FROM 
                    tbl_msme AS a
                WHERE 
                    a.deleted = 0 
                    $wherein
                GROUP BY 
                    MONTH(a.added_date)
                ORDER BY 
                    MONTH(a.added_date)";
        $res =  $this->model->getResults($sql, []); 
        $month_value = [];
        if ($res) {
            $data_value = [];
            foreach ($res as $key => $R) {
                $data_value[$R->month] = $R->total_count;
            }
            $months = [1,2,3,4,5,6,7,8,9,10,11,12];
            foreach ($months as $key => $month) {
                if (isset($data_value[$month])) {
                    $month_value[] = $data_value[$month];
                }else{
                    $month_value[] = 0;
                }
            }
        }
        $d['data'] = $month_value;
        return $d;
    }
    public function msmeRegisteredLineChartAnnoucement(){
        $post = Helpers::post();
        extract($post);
        $wherein = '';
        if (isset($year_a) && $year_a != '') {
            $wherein .= " AND YEAR(a.added_date) = '".$year_a."'";
        }
        $sql = "SELECT 
                    MONTH(a.added_date) AS month,
                    COUNT(*) AS total_count
                FROM 
                    tbl_events AS a
                WHERE 
                    a.deleted = 0 and `status` = 'POSTED'
                    $wherein
                GROUP BY 
                    MONTH(a.added_date)
                ORDER BY 
                    MONTH(a.added_date)";
        $res =  $this->model->getResults($sql, []); 
        $month_value = [];
        if ($res) {
            $data_value = [];
            foreach ($res as $key => $R) {
                $data_value[$R->month] = $R->total_count;
            }
            $months = [1,2,3,4,5,6,7,8,9,10,11,12];
            foreach ($months as $key => $month) {
                if (isset($data_value[$month])) {
                    $month_value[] = $data_value[$month];
                }else{
                    $month_value[] = 0;
                }
            }
        }
        $d['year'] = $this->totalAnnoucement($year_a);
        $d['data'] = $month_value;
        return $d;
    }
}