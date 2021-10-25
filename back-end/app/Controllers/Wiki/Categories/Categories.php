<?php
namespace App\Controllers\Wiki\Categories;

use App\Controllers\BaseController;
use App\Libraries\JWT\ValidateJWT;
use App\Models\Categories\CategoriesModel;
use App\Models\CategoriesUnits\CategoriesUnitsModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Categories extends BaseController {
	use ResponseTrait;

	public function index() {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
            //$jwt = new ValidateJWT();
            $categoriesModel = new CategoriesModel();

            $objCategories = $categoriesModel->where('id_status <>', 3)->asObject()->findAll();
            //return json_encode($objCategories);die;

            if (!$objCategories) {
                return $this->fail('Oops! Desculpe, nenhuma categoria encontrado.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de Categorias.',
                        'data' => $objCategories
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de Categorias.',
                    'data' => $objCategories
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

	public function categoriesByUnitID($id_unidade) {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
            //$jwt = new ValidateJWT();
            //$categoriesUnitsModel = new CategoriesUnitsModel();
            $categoriesModel = new CategoriesModel();

            //$objUnidade = $categoriesModel->where('id_unidade', $id_unidade)->where('id_status <>', 3)->asObject()->findAll();
            $objCategories = $categoriesModel->getCategorieByUnitID($id_unidade);
            //return json_encode($objCategories);die;

            if (!$objCategories) {
                return $this->fail('Oops! Desculpe, nenhuma categoria encontrada.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de categorias por unidade.',
                        'data' => $objCategories
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de categorias por unidade.',
                    'data' => $objCategories
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

    public function categoriesByUnitSlug($unit_slug) {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
            //$jwt = new ValidateJWT();
            //$categoriesUnitsModel = new CategoriesUnitsModel();
            $categoriesModel = new CategoriesModel();

            //$objUnidade = $categoriesModel->where('id_unidade', $id_unidade)->where('id_status <>', 3)->asObject()->findAll();
            $objCategories = $categoriesModel->getCategorieByUnitSlug($unit_slug);
            //return json_encode($objCategories);die;

            if (!$objCategories) {
                return $this->fail('Oops! Desculpe, nenhuma categoria encontrada.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de categorias por unidade.',
                        'data' => $objCategories
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de categorias por unidade.',
                    'data' => $objCategories
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