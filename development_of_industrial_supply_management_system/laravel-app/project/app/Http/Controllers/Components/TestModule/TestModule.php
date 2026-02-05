<?php 
namespace App\Http\Controllers\Components\TestModule;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
class TestModule 
{
    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        Helpers::getView('TestModule');
    }
    public static function js(){
        return [
            'js/sample'
        ];
    }
    public function defaultPage($params){
        $data = [];
        $d['test'] = 'testme';
        return [
            'data' => $d,
        ];
    }
    public function listClients(){
        $post = Helpers::post();
    }
}