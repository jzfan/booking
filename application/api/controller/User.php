<?php
namespace app\api\controller;
use think\Controller;
use app\User as UserM;

class User extends Controller
{
	protected $model;

	public function _initialize()
    {
        $this->model = new UserM;
    }
	    
    public function test()
    {
    	$user = $this->model->byName('aa');
    	// $user->newToken();
    	return $user->name;
    }

    public function login() {
       return json_encode($this->model->doLogin(input('name'), input('password')));
   }
}
