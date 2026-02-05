<?php 
namespace App\Http\Controllers\Components\Products;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;

class Products
{
    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
    }
    public static function js(){
      
        return [
            'js/sample'
        ];
    }
    public function defaultPage($params){
        $d['fake_names'] = Helpers::generateRandomNames(10);
        return $d;
    }
    
}