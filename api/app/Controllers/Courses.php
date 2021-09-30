<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\OData\GenerateDAO;
use App\Libraries\JWT\ValidateJWT;
use App\Models\Courses\CoursesModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Courses extends BaseController {
	use ResponseTrait;

	public function index() {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
			$jwt = new ValidateJWT();
			$coursesModel = new CoursesModel();

			$decoded = $jwt->getToken();
			if ($decoded) {
				$user = $coursesModel->where('id_status <>', 3)->asObject()->findAll();

				if (!$user) {
					return $this->fail('Nenhum curso encontrado.', 404);
				} else {
					unset($user->password); //Remove a senha do token
					$response = [
						'status' => 200,
						'error' => FALSE,
						'messages' => 'Listagem de Cursos.',
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
}