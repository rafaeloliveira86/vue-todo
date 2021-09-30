<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\OData\GenerateDAO;
use App\Libraries\JWT\ValidateJWT;
use App\Models\Students\StudentsModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Students extends BaseController {
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
				$studentsModel = new StudentsModel();

				$user = $studentsModel->where('id_status <>', 3)->asObject()->findAll();

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

	//Listar aluno por ID
	public function show($id) {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
			$jwt = new ValidateJWT();

			$decoded = $jwt->getToken();

			if ($decoded) {
				$studentsModel = new StudentsModel();

				$students = $studentsModel->asObject()->find($id);

				if (!$students) {
					return $this->fail('Aluno não encontrado.', 404);
				} else {
					unset($students->password); //Remove a senha do token

					$response = [
						'status' => 200,
						'error' => FALSE,
						'messages' => 'Aluno selecionado.',
						'data' => $students
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

	//Listar alunos por curso ID
	public function showStudentsCourse($id_course, $id_course_module) {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
			$jwt = new ValidateJWT();
		
			$decoded = $jwt->getToken();

			if ($decoded) {
				$studentsModel = new StudentsModel();

				$studentData = [];
				$studentData = [
					'id_course' => $id_course,
					'id_course_module' => $id_course_module
				];

				$students = $studentsModel->getStudentsCourse($studentData);

				if (!$students) {
					return $this->fail('Aluno não encontrado.', 404);
				} else {
					unset($students->password); //Remove a senha do token

					$response = [
						'status' => 200,
						'error' => FALSE,
						'messages' => 'Aluno selecionado.',
						'data' => $students
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