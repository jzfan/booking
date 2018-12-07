<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	// session('user', null);
    	if (!session('?user')) {
    		return $this->fetch('admin@auth/login');
    	}
    	return $this->fetch('index');
    }
}
