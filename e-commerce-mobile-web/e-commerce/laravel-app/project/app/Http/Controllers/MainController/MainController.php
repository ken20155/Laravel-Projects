<?php

namespace App\Http\Controllers\MainController;


use App\Http\Controllers\Controller;
use App\Models\MainModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Helpers\Helpers;


class MainController extends Controller
{
    function __construct() {
        $this->model = new MainModel();
    }
    public function redirect(){
        return redirect('auth/view/sign-in');
    }
    public function getContent($params){
        $session =  Helpers::session();
        if (!Auth::check()) {
            return redirect('auth/view/sign-in');
        }
        if ($session['session']['user_role'] == 2) {
            return 'Unabled To Access';
        }
        $componentsController = 'defaultPage';
        $componentsClass = str_replace(' ', '', ucwords(str_replace('-', ' ', $params)));
        $componentsController = Str::of($componentsController)->camel();
        $componentsClassRender = "App\\Http\\Controllers\\Components\\$componentsClass\\$componentsClass";
        $componentsController = ''.$componentsController.'';
        if(method_exists($componentsClassRender, $componentsController)) {
            $data = app($componentsClassRender)->$componentsController($params);
            $customViewPath = app_path('Http/Controllers/Components/'.$componentsClass.'/views');
            View::addLocation($customViewPath);
            $data['session'] = $session;
            $data['title']  =  str_replace(' ', ' ', ucwords(str_replace('-', ' ', $params)));
            $data['params'] =  $params;
            $data['content'] = view('content', $data)->render();
            $content = [
                'page'          =>  $params,
                'start'         => '<!DOCTYPE html><html lang="en">',
                'header'        => view('app.partials.__header', $data),
                'sidebar'       => view('app.partials.__sidebar', $data),
                'topbar'        => view('app.partials.__topbar', $data),
                'body'          => view('app.partials.__content', $data),
                'footer'        => view('app.partials.__footer', $data),
                'settings'      => view('app.partials.__settings', $data),
                'footerlink'    => view('app.partials.__footerjs', $data),
                'end'           => '</html>',
            ];
            return view('app.app', $content);
        }else{ 
            return 'Page Not Exist';
        }
    }
    public function getContentUser($params){
        if (!Auth::check()) {
            return redirect('auth/view/sign-in');
        }
        $session =  Helpers::session();
        if ($session['session']['user_role'] == 1) {
            return 'Unabled To Access';
        }
        $componentsController = 'defaultPage';
        $componentsClass = str_replace(' ', '', ucwords(str_replace('-', ' ', $params)));
        $componentsController = Str::of($componentsController)->camel();
        $componentsClassRender = "App\\Http\\Controllers\\UserComponents\\$componentsClass\\$componentsClass";
        $componentsController = ''.$componentsController.'';
        if(method_exists($componentsClassRender, $componentsController)) {
            $data = app($componentsClassRender)->$componentsController($params);
            $customViewPath = app_path('Http/Controllers/UserComponents/'.$componentsClass.'/views');
            View::addLocation($customViewPath);
            $data['session'] = $session;
            $data['title']  =  str_replace(' ', ' ', ucwords(str_replace('-', ' ', $params)));
            $data['params'] =  $params;
            $data['content'] = view('content', $data)->render();
            $content = [
                'page'          =>  $params,
                'start'         => '<!DOCTYPE html><html lang="en">',
                'header'        => view('app2.partials.__header', $data),
                'sidebar'       => view('app2.partials.__sidebar', $data),
                'topbar'        => view('app2.partials.__topbar', $data),
                'body'          => view('app2.partials.__content', $data),
                'footer'        => view('app2.partials.__footer', $data),
                'settings'      => view('app2.partials.__settings', $data),
                'footerlink'    => view('app2.partials.__footerjs', $data),
                'end'           => '</html>',
            ];
            return view('app2.app', $content);
        }else{ 
            return 'Page Not Exist';
        }
    }
    public function serveCustomJS($app = 'Components',$module){
        if (!Auth::check()) {
            return 'Unabled To Access';
        }
        $components = ucfirst(Str::camel($app));
        $module = ucfirst(Str::camel($module));
        $defaultJS = [
            app_path("Http/Controllers/{$components}/{$module}/custom.js"),
        ];
        $customJS = [];
        $componentsClassRender = "App\\Http\\Controllers\\{$components}\\{$module}\\{$module}";
        if (method_exists($componentsClassRender, 'js')) {
            $customRender = app($componentsClassRender)->js();
            foreach ($customRender as $R) {
                $customJS[] = app_path("Http/Controllers/{$components}/{$module}/js/sample.js");
            }
        }
        $allJSFiles = array_merge($defaultJS, $customJS);
        $response = '';
        foreach ($allJSFiles as $jsFile) {
            if (File::exists($jsFile)) {
                $response .= file_get_contents($jsFile) . "\n";
            }
        }
        if (!empty($response)) {
            return response($response)->header('Content-Type', 'application/javascript');
        } else {
            return '';
        }
    }
    public function runComponentFunction($componentsClass,$componentsController){
        if (!Auth::check()) {
            abort(403, 'Unable To Access');
        }
        $componentsClass = str_replace(' ', '', ucwords(str_replace('-', ' ', $componentsClass)));
        $componentsController = Str::of($componentsController)->camel();
        $componentsClass = "App\\Http\\Controllers\\Components\\$componentsClass\\$componentsClass";
        $componentsController = ''.$componentsController.'';
        return method_exists($componentsClass, $componentsController) ? app($componentsClass)->$componentsController() : 'Page Not Exist';
    }
    public function getPublicPages($componentsClass){
        $componentsController = 'defaultPage';
        $componentsClass = str_replace(' ', '', ucwords(str_replace('-', ' ', $componentsClass)));
        $componentsController = Str::of($componentsController)->camel();
        $componentsClass = "App\\Http\\Controllers\\Publicpages\\$componentsClass\\$componentsClass";
        $componentsController = ''.$componentsController.'';
        return method_exists($componentsClass, $componentsController) ? app($componentsClass)->$componentsController() : 'Page Not Exist';
        //return $componentsClass;
    }
    public function getAuthForm($param = 'sign-in'){
        if (Auth::check()) {
            $session =  Helpers::session();
            if ($session['session']['user_role'] == 1) {
                return redirect('component/view/dashboard');
            }else{
                return redirect('user-component/view/home');
            }
            
        }
        if ($param === 'sign-in' || $param === 'sign-up' || $param === 'forgot-password') {
            $content['page'] = ucwords(str_replace('-', ' ', $param));
            $content['content'] = view('auth.'.$param.'.content',$content);
            return view('auth.template', $content);
        }else{
            return 'Page Not Exist';
        }
    }
    public function authFn($page){
        $componentsClassRender = "App\\Http\\Controllers\\AuthController\\AuthController";
        return method_exists($componentsClassRender, $page) ? app($componentsClassRender)->$page() : 'Page Not Exist';
    }

}
