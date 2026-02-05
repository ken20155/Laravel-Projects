<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Helpers\Helpers;

class MainModel extends Model {
    public function getRow($sql, $param = [], $value = null) {
        $res = DB::select($sql, $param);
        if ($value != null && $res) {
            return $res[0]->{$value};
        } else {
            return $res ? $res[0] : false;
        }
    }
 
    public function getResults($sql, $param = []) {
        $res = DB::select($sql, $param);
        return $res ? $res : false;
    }

    public function insert($table, $data) {
        $builder = DB::table($table);
        $id = $builder->insertGetId($data);
        return ['results' => ($id ? true : false), 'id' => $id];
    }

    public function updateWhere($table, $where, $data) {
        $builder = DB::table($table);
        foreach ($where as $W) {
            if (isset($W['type'])) {
                if ($W['type'] == 'wherein') {
                    $builder->whereIn($W['field'], $W['value']);
                }
            } else {
                $builder->where($W['field'], $W['value']);
            }
        }
        return $builder->update($data);
    }
    public function batchInsert($table, $param = []) {
        // try {
            $builder = DB::table($table);
            $builder->insert($param);
            return true;
        // } catch (\Exception $e) {
        //     //throw $th;
        // }
        // return false;
    }
    public function deleteData($table,$param){
        $builder = DB::table($table);
        $builder->where($param)->delete();
        return true;
    }
    public function uploadFileMultiple($data){
        $session = Helpers::session()['session'];
        $source_id = $data['doc_id'];
        $module_name = $data['module_name'];
        $files = $data['files'];
        $sql = 'SELECT folder FROM tbl_files_source WHERE source_id = ? and module_name = ?';
        $file_record = $this->getRow($sql,[$source_id,$module_name]);
        if ($file_record) {
            $folder_name = $file_record->folder;
        }else{
            $folder_name = Helpers::strRandom(10);
        }
        $path = Helpers::getDir($module_name,$folder_name);
        $added_date = date(SQLDATETIME);
        foreach ($files as $key => $R) {
            $file_extension = $R->extension();
            $file_type = $R->getMimeType();
            $file_name = Helpers::strRandom(10) . '-' . Helpers::strRandom(10) . '.' . $file_extension;
            $R->move($path, $file_name);
            $upload_data['source_id'] = $source_id;
            $upload_data['module_name'] = $module_name;
            $upload_data['folder'] = $folder_name;
            $upload_data['file_name'] = $file_name;
            $upload_data['file_type'] = $file_type;
            $upload_data['file_extension'] = $file_extension;
            $upload_data['added_by'] = $session['user_id'];
            $upload_data['added_date'] = $added_date;
            $res = $this->insert('tbl_files_source', $upload_data);    
        }
        return true;
    }
    public function getFiles($source_id,$module_name){
        $file_info = $this->getResults("SELECT * FROM tbl_files_source WHERE source_id = ? and module_name = ? and deleted = 0", [$source_id,$module_name]);
        $files = [];
        if ($file_info) {
            foreach ($file_info as $key => $R) {
                $file_extension = $R->file_extension;
                $file_type = $R->file_type;
                $file_link = env('APP_URL').'public/main/uploaded/'.$R->module_name.'/'.$R->folder.'/'.$R->file_name;
                $files[] = [
                    'file_link'=>$file_link,
                    'file_info'=>[
                        'type'          =>Helpers::getFileType($file_extension),
                        'filetype'      =>$file_type,
                        'downloadUrl'   =>$file_link,
                        'caption'       =>$R->file_name,
                        'description'   =>$R->file_name,
                        'url'           =>env('APP_URL').'file-delete',
                        'key'           =>$R->file_id,
                    ],
                ];
            }
        }
        return $files;
    }
}
