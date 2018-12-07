<?php
namespace app\admin\controller;
use think\Controller;
use app\User as UserM;

class User extends Controller
{
	protected $model;

	public function _initialize()
    {
    	// session('user', null);
        if (!session('?user') || session('user.role') != 'admin') {
        	return $this->redirect('admin/auth/login_form');
        }
        $this->model = new UserM;
    }

    public function index()
    {
    	$users = $this->model->column(['id', 'name', 'role', 'phone', 'email']);
    	// return json_encode($users);
		return $this->fetch('index', ['users', $users]);
    }
}
