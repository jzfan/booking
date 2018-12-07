<?php
namespace app\admin\controller;
use think\Controller;
use app\User;

class Auth extends Controller
{
    public function login()
    {
    	$model = new User;
    	$result = $model->doLogin(input('name'), input('password'));
    	if ($result['code'] === 100) {
    		session('user', $result['data']);
    		return $this->redirect('/admin/index');
    	}
    	session('error', $result);
    	return $this->fetch('admin@auth/login');
    	// return json_encode($result);
    }

    public function login_form()
    {
    	return $this->fetch('admin@auth/login');
    }
}
