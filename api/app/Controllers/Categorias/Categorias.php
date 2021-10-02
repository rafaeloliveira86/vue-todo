<?php
namespace App\Controllers\Categorias;

use App\Controllers\BaseController;
use App\Libraries\JWT\ValidateJWT;
use App\Models\Categorias\CategoriasModel;
use App\Models\CategoriasUnidades\CategoriasUnidadesModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Categorias extends BaseController {
	use ResponseTrait;

	public function index() {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
            //$jwt = new ValidateJWT();
            $categoriaModel = new CategoriasModel();

            $objCategoria = $categoriaModel->where('id_status <>', 3)->asObject()->findAll();
            //return json_encode($objCategoria);die;

            if (!$objCategoria) {
                return $this->fail('Nenhum usuário encontrado.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de Categorias.',
                        'data' => $objCategoria
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de Categorias.',
                    'data' => $objCategoria
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

	public function categoriasPorUnidadeID($id_unidade) {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
            //$jwt = new ValidateJWT();
            $categoriaUnidadeModel = new CategoriasUnidadesModel();
            $categoriaModel = new CategoriasModel();

            //$objUnidade = $categoriaModel->where('id_unidade', $id_unidade)->where('id_status <>', 3)->asObject()->findAll();
            $objCategorias = $categoriaModel->listarCategoriasPorUnidadeID($id_unidade);
            //return json_encode($objCategorias);die;

            if (!$objCategorias) {
                return $this->fail('Nenhum usuário encontrado.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de categorias por unidade.',
                        'data' => $objCategorias
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de categorias por unidade.',
                    'data' => $objCategorias
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