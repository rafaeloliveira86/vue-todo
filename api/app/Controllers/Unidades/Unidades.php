<?php
namespace App\Controllers\Unidades;

use App\Controllers\BaseController;
use App\Libraries\JWT\ValidateJWT;
use CodeIgniter\API\ResponseTrait;
use Restserver\Libraries\Format;
use App\Models\Unidades\UnidadesModel;
use Exception;

class Unidades extends BaseController {
    use ResponseTrait;

    public function index() {
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

        try {
            //$jwt = new ValidateJWT();
            $unidadeModel = new UnidadesModel();

            $objUnidade = $unidadeModel->where('id_status <>', 3)->asObject()->findAll();
            //return json_encode($objUnidade);die;

            if (!$objUnidade) {
                return $this->fail('Nenhum usuário encontrado.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de usuários.',
                        'data' => $objUnidade
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de usuários.',
                    'data' => $objUnidade
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