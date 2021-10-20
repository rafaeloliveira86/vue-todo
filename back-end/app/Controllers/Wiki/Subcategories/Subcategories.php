<?php
namespace App\Controllers\Wiki\Subcategories;

use App\Controllers\BaseController;
use App\Libraries\JWT\ValidateJWT;
use App\Models\Subcategories\SubcategoriesModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Subcategories extends BaseController {
    use ResponseTrait;

    public function index() {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
            //$jwt = new ValidateJWT();
            $subcategorieModel = new SubcategoriesModel();

            $objSubcategorie = $subcategorieModel->where('id_status <>', 3)->asObject()->findAll();
            //return json_encode($objSubcategorie);die;

            if (!$objSubcategorie) {
                return $this->fail('Oops! Desculpe, nenhuma subcategoria encontrada.', 404);
            } else {
                /*$decoded = $jwt->getToken();

                if ($decoded) {
                    $response = [
                        'status' => 200,
                        'error' => FALSE,
                        'messages' => 'Listagem de Categorias.',
                        'data' => $objSubcategorie
                    ];

                    return $this->respond($response);
                }*/
                $response = [
                    'status' => 200,
                    'error' => FALSE,
                    'messages' => 'Listagem de Subcategorias.',
                    'data' => $objSubcategorie
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

    public function subcategoriesByCategoriesAndUnitID(int $id_categorie, int $id_unit) {
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
                       ->setHeader('Access-Control-Allow-Headers', '*')
                       ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                       ->setStatusCode(200);
        $this->response->setContentType('application/json');

		try {
            //$jwt = new ValidateJWT();
            $subcategoriesModel = new SubcategoriesModel();

            //$objUnidade = $subcategoriesModel->where('id_unidade', $id_unidade)->where('id_status <>', 3)->asObject()->findAll();
            $objCategories = $subcategoriesModel->getSubcategorieByCategorieAndUnitID($id_categorie, $id_unit);
            //return json_encode($objCategories);die;

            if (!$objCategories) {
                return $this->fail('Oops! Desculpe, nenhuma subcategoria encontrada.', 404);
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
                    'messages' => 'Listagem de subcategorias.',
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