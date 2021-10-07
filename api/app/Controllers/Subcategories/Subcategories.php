<?php
namespace App\Controllers\Subcategories;

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
                return $this->fail('Nenhum usuário encontrado.', 404);
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
                    'messages' => 'Listagem de Categorias.',
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
}