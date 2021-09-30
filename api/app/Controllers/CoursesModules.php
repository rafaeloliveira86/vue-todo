<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\OData\GenerateDAO;
use App\Libraries\JWT\ValidateJWT;
use App\Models\CoursesModules\CoursesModulesModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class CoursesModules extends BaseController {
	use ResponseTrait;

	public function index() {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
			$jwt = new ValidateJWT();

			$decoded = $jwt->getToken();

			if ($decoded) {
				$coursesModulesModel = new CoursesModulesModel();

				$user = $coursesModulesModel->where('id_status <>', 3)->asObject()->findAll();

				if (!$user) {
					return $this->fail('Nenhum aluno encontrado.', 404);
				} else {
					unset($user->password); //Remove a senha do token
					$response = [
						'status' => 200,
						'error' => FALSE,
						'messages' => 'Listagem de Alunos.',
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