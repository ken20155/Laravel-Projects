<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Models\MainModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Helpers\Helpers;
use Illuminate\Support\Facades\Artisan;

use Request;


class AuthController extends Controller
{
    function __construct() {
        $this->model = new MainModel();
    }
    public function signin(){
        $post = Request::post();
        $post['validator'] = [
            'username' => 'required',
            'password' => 'required',
        ];
        if ($validationResponse = Helpers::validateData($post)) {
            return $validationResponse;
        }
        $username = $post['username'];
        $password = $post['password'];
        //dd(bcrypt($password));
        $sql = 'SELECT * FROM tbl_users WHERE username = ?';
        $param = [$username];
        $result =  $this->model->getRow($sql, $param);
        $response['msg'] = false;
        if ($result && Hash::check($password,$result->password)) {
            Auth::loginUsingId($result->user_id);
            $session = [
                'user_id' => $result->user_id,
                'user_role' => $result->user_role,
                'user_role_desc' => $this->userRoleDesc($result->user_role),
            ];
            session(['session' => $session]);
            Session::forget('url.intended');
            $response['user_role'] = $result->user_role;
            $response['msg'] = true;
        }
        return response()->json($response);
    }
    public function userRoleDesc($id){
        switch ($id) {
            case 1:
                return 'ADMIN';
                break;
            case 2:
                return 'USER';
                break;
        }
    }
    public function signup(){
        $post = Request::post();
        $post['validator'] = [
            'username' => 'required',
            'password' => 'required',
        ];
        if ($validationResponse = Helpers::validateData($post)) {
            return $validationResponse;
        }
        extract($post);
        $sql = 'SELECT * FROM tbl_users WHERE username = ?';
        $param = [$username];
        $result =  $this->model->getRow($sql, $param);
        if ($result) {
            $response['success'] = false;
            $response['exist'] = true;
            $response['msg'] = 'Username already exist';
        }else{
            if ($password != $confirm_password) {
                $response['success'] = false;
                $response['exist'] = true;
                $response['msg'] = 'Password & Confirm Password Not Match!';
            }else{
                $data['first_name'] = $username;
                $data['middle_name'] = $username;
                $data['last_name'] = $username;
                $data['username'] = $username;
                $data['phone_number'] = $contact_no;
                $data['email'] = $email;
                $data['username'] = $username;
                $data['password'] = Hash::make($password);
                $res = $this->model->insert('tbl_users', $data);
                if ($res) {
                    $response['success'] = true;
                    $response['exist'] = false;
                    $response['msg'] = 'Successfully Registered!';
                }
            }

        }
        return response()->json($response);
    }
    public function logout(){
        Auth::logout();
        Session::forget('url.intended');
        session()->invalidate();
        session()->regenerateToken();
        return redirect('auth/view/sign-in');
    }
}
