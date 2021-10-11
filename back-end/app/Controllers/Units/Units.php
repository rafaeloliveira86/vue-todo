<?php
namespace App\Controllers\Units;

use App\Controllers\BaseController;
use App\Libraries\JWT\ValidateJWT;
use CodeIgniter\API\ResponseTrait;
use App\Models\Units\UnitsModel;
use Exception;

class Units extends BaseController {
    use ResponseTrait;

    public function index() {
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

        try {
            //$jwt = new ValidateJWT();
            $unitModel = new UnitsModel();

            $objUnit = $unitModel->where('id_status <>', 3)->asObject()->findAll();
            //return json_encode($objUnit);die;

            if (!$objUnit) {
                return $this->fail('Nenhum usuário encontrado.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de Unidades.',
                        'data' => $objUnit
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de Unidades.',
                    'data' => $objUnit
                ];

                return $this->respond($response);
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

    public function getUnitByID($id_unit) {
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

        try {
            //$jwt = new ValidateJWT();
            $unitModel = new UnitsModel();

            $objUnit = $unitModel->where('id', $id_unit)->where('id_status <>', 3)->asObject()->find();
            //return json_encode($objUnit);die;

            if (!$objUnit) {
                return $this->fail('Nenhum registro encontrado.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de Unidades.',
                        'data' => $objUnit
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Unidade',
                    'data' => $objUnit
                ];

                return $this->respond($response);
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