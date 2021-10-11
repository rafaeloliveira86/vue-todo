<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\JWT\ValidateJWT;
use App\Models\Login\LoginModel;
use CodeIgniter\API\ResponseTrait;

class Login extends BaseController {
	use ResponseTrait;

	public function auth() {
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');
        
		$jwt = new ValidateJWT();
        $loginModel = new LoginModel();

        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getJSON();

            $options = [
                'email' => $data->email,
                'password' => $data->password
            ];

            $rules = $loginModel->getValidationRules($options);

            if (!$this->validate($rules)) {
				$validation = $this->validator;
                
				if (isset($validation)) {
                    return $this->response->setJSON($validation->getErrors($this->response->setStatusCode(403)));
				}
			} else {
                $login = $loginModel->where("email", $data->email)->asObject()->first();

                if (!empty($login)) {
                    if (password_verify($data->password, $login->password)) {    
                        unset($login->password); //Remove a senha do token
    
                        $token = $jwt->setToken($login);
                        
                        $response = [
                            'status' => 200,
                            'error' => FALSE,
                            'messages' => 'Usuário conectado com sucesso!',
                            'token' => $token
                        ];
                        
                        return $this->respondCreated($response);
                    } else {
                        $response = [
                            'status' => 500,
                            'error' => TRUE,
                            'messages' => 'Usuário ou senha inválidos.'
                        ];
        
                        return $this->respondCreated($response);
                    }
                } else {
                    $response = [
                        'status' => 500,
                        'error' => TRUE,
                        'messages' => 'Usuário não encontrado.'
                    ];
        
                    return $this->respondCreated($response);
                }
            }
        }
    }

	public function noAuth() {
		return redirect()->to('/');
	}
}