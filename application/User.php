<?php
namespace app;

use think\Model;

class User extends Model
{
	public function byName($user_name){
	    return $this->where('name', $user_name)->find();
	}

	public function newToken()
	{
		$this->token = str_random(64);
		$this->save();
		return $this->token;
	}

	public function doLogin($name, $password)
	{
        if (empty($password) or empty($name)) {
            return [
            	'code' => 101,
            	'message' => 'username or password cannot be empty'
            ];
        }

        $user = $this->byName($name);
        if (!empty($user) && password_verify($password, $user['password'])) {
        	return [
        		'code' => 100,
        		'message' => 'ok',
        		'data' => [
        			'name' => $user['name'],
        			'phone' => $user['phone'],
        			'email' => $user['email'],
        			'role' => $user['role'],
        			'token' => $user->newToken(),
        		]
        	];
        } else {
        	return [
        		'code' => 102,
        		'message' => 'username or password wrong'
        	];
        }

	}

}