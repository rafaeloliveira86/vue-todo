<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\OData\GenerateDAO;
use App\Libraries\JWT\ValidateJWT;
use App\Models\Usuarios\UsuariosModel;
use App\Models\UsersRoles\UsersRolesModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control");

class Usuarios extends BaseController {
	use ResponseTrait;

	//Listar detalhes do usuário logado
	public function getUserDetail() {
        try {
			$jwt = new ValidateJWT();

            $decoded = $jwt->getToken();

            if ($decoded) {
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Detalhes do usuario',
                    'data' => $decoded
                ];

                return $this->respondCreated($response);
            }
        } catch (Exception $ex) {
            $response = [
                'status' => 401,
                'error' => TRUE,
                'messages' => 'Acesso negado'
            ];

            return $this->respondCreated($response);
        }
    }

	//Listar todos os usuários
	public function index() {
		/*$usersModel = new UsersModel();
		$user = $usersModel->where('id_status <>', 3)->findAll();
		return $this->respond($user);*/
		try {
			$jwt = new ValidateJWT();
			$usersModel = new UsersModel();

			$user = $usersModel->where('id_status <>', 3)->asObject()->findAll();

			if (!$user) {
				return $this->fail('Nenhum usuário encontrado.', 404);
			} else {
				$decoded = $jwt->getToken();
				if ($decoded) {
					unset($user->password); //Remove a senha do token
					$response = [
						'status' => 200,
						'error' => FALSE,
						'messages' => 'Listagem de usuários.',
						'data' => $user
					];
					return $this->respond($response);
				}
			}
		} catch (Exception $ex) {
            $response = [
                'status' => 401,
                'error' => TRUE,
                'messages' => 'Acesso Negado. Token expirado ou não existe.'
            ];
            return $this->respond($response);
        }
	}

	//Listar usuário por ID
	public function show($id) {
		try {
			$jwt = new ValidateJWT();
			$usersModel = new UsersModel();

			$user = $usersModel->asObject()->find($id);

			if (!$user) {
				return $this->fail('Usuário não encontrado.', 404);
			} else {
				$decoded = $jwt->getToken();
				if ($decoded) {
					unset($user->password); //Remove a senha do token
					$response = [
						'status' => 200,
						'error' => FALSE,
						'messages' => 'Usuários selecionado.',
						'data' => $user
					];
					return $this->respond($response);
				}
			}
		} catch (Exception $ex) {
            $response = [
                'status' => 401,
                'error' => TRUE,
                'messages' => 'Acesso Negado. Token expirado ou não existe.'
            ];
            return $this->respond($response);
        }
	}

	//Criar novo usuário
	public function create() {
		try {
			$jwt = new ValidateJWT();
			$usersModel = new UsersModel();
			$usersRolesModel = new UsersRolesModel();

			$data = $this->request->getJSON();

			$decoded = $jwt->getToken();
			if ($decoded) {
				$data->id_user_created = $decoded->data->id; //ID do usuário autenticado no token

				$id = $usersModel->insert($data);

				if ($usersModel->errors()) {
					return $this->fail($usersModel->errors());
				}

				if ($id === false) {
					return $this->failServerError();
				}

				$userData = [
					'id_user' => $id,
					'id_role' => 2,
					'updated_at' => date('0000-00-00 00:00:00')
				];
				
				$usersRolesModel->insert($userData);

				$user = $usersModel->find($id);
				$user['url'] = site_url('/users/'.$id);

				$this->response->setHeader('location', $user['url']);

				return $this->respondCreated($user);
			}
		} catch (Exception $ex) {
            $response = [
                'status' => 401,
                'error' => TRUE,
                'messages' => 'Acesso Negado. Token expirado ou não existe.'
            ];

            return $this->respond($response);
		}
	}

	//Atualizar usuário por ID
	public function update($id) {
		$usersModel = new UsersModel();

		$data = $this->request->getJSON(true);

		$usersModel->setUpdateRules($data);

		$updated = $usersModel->update($id, $data);

		if ($usersModel->errors()) {
			return $this->fail($usersModel->errors());
		}

		if ($updated === false) {
			return $this->failServerError();
		}

		$user = $usersModel->find($id);

		return $this->respond($user);
	}

	//Deletar usuário por ID
	public function delete($id) {
		$usersModel = new UsersModel();

		$user = $usersModel->select('id')->findAll($id);
		
		if (!$user) {
			return $this->fail('O usuário não existe.', 404);
		}

		if ($usersModel->delete($id)) {
			return $this->respondDeleted();
		} else {
			return $this->failServerError();
		}
	}

	//Deletar usuário logicamente por ID
	public function deleteUser($id) {
		try {
			$jwt = new ValidateJWT();
			$usersModel = new UsersModel();

			$user = $usersModel->select('id')->find($id);
			
			if (!$user) {
				return $this->fail('O usuário não existe.', 404);
			}

            $decoded = $jwt->getToken();
            if ($decoded) {
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Usuário excluído com sucesso.',
                    'data' => $decoded
                ];

				$data = [];
				$data = [
					'id' => $id,
					'id_status' => 3,
					'id_user_deleted' => 1,
					'deleted_at' => date('Y-m-d H:i:s')
				];

				if ($usersModel->save($data)) {
					return $this->respondDeleted($response);
				} else {
					return $this->failServerError();
				}
			}
		} catch (Exception $ex) {
            $response = [
                'status' => 401,
                'error' => TRUE,
                'messages' => 'Acesso negado'
            ];

            return $this->respondDeleted($response);
        }

		/*try {
            $decoded = $this->validateJWT();

            if ($decoded) {
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Exclusão do usuario',
                    'data' => $decoded
                ];

                //return $this->respondCreated($response);
				$user = $usersModel->select('id')->find($id);
		
				if (!$user) {
					return $this->fail('O usuário não existe.', 404);
				}

				$data = [];
				$data = [
					'id' => $id,
					'id_status' => 3,
					'id_user_deleted' => 1,
					'deleted_at' => date('Y-m-d H:i:s')
				];

				if ($usersModel->save($data)) {
					return $this->respondDeleted($response);
				} else {
					return $this->failServerError();
				}
            }
        } catch (Exception $ex) {
            $response = [
                'status' => 401,
                'error' => TRUE,
                'messages' => 'Acesso negado'
            ];

            return $this->respondCreated($response);
        }*/
	}

    public function getUserById($id) {
 		try {
			//print_r($_SERVER['QUERY_STRING']);die;

            $generateDAO = new GenerateDAO('users');

 			$data = $generateDAO->find();
            //var_dump($data);exit;

			

			$query = [];
			foreach(explode("&", $_SERVER['QUERY_STRING']) as $value) {
			   $array = explode("=", $value);
			   $newArray[$array[0]] = $array[1];
			   $query = array_merge($query, $newArray);
			}

			//print_r($query);die;
		   	$data->set(['filter'], $query);

 		
 			$result = $data->commit();



 			return $this->respondCreated($result);
 		} catch (Exception $e) {
 			throw new Exception($e->getMessage(), 1);
 		}
 	}
}