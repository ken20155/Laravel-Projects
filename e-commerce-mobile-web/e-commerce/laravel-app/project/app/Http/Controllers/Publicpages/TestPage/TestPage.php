<?php 
namespace App\Http\Controllers\Publicpages\TestPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainModel;

class TestPage extends Controller
{
    function __construct() {
        $this->model = new MainModel();
    }
    public function defaultPage(){
        $data['test'] = 'test';
        return view('public-pages.test-page.content', $data);
    }
}
?>