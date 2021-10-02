<?php
namespace App\Controllers\Subcategorias;

use App\Controllers\BaseController;
use App\Libraries\JWT\ValidateJWT;
use App\Models\Subcategorias\SubcategoriasModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Subcategorias extends BaseController {
    use ResponseTrait;

    public function index() {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
            //$jwt = new ValidateJWT();
            $subcategoriaModel = new SubcategoriasModel();

            $objSubcategoria = $subcategoriaModel->where('id_status <>', 3)->asObject()->findAll();
            //return json_encode($objSubcategoria);die;

            if (!$objSubcategoria) {
                return $this->fail('Nenhum usuário encontrado.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de Categorias.',
                        'data' => $objSubcategoria
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de Categorias.',
                    'data' => $objSubcategoria
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