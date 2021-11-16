<?php
namespace App\Controllers\Unimestre\Courses;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\APIConfig;
use Exception;

class Courses extends BaseController {
    use ResponseTrait;

    public function getTypeSubscription() {
		try {
            $config = new APIConfig();

            //$curl = \Config\Services::curlrequest();
            $curl = service('curlrequest');
            
            $curl->setHeader('Content-type', 'application/json');
            $curl->setHeader('Authorization', 'UNIMESTRE 6d3b4140103e5a917fbade9b6fadb5b0');

            $data = $curl->get($config->urlUnimestre.'/projetos/api/index.php?api=unimestre_inscricao.vestibular.busca.ApiBuscaTipoInscricao', [
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]);

            //echo $data->getReason();
		    //echo $data->getStatusCode();
            //echo "<pre>";

            return $data->getBody();

            

            // if (!$data) {
            //     return $this->fail('Oops! Desculpe, nenhuma categoria encontrado.', 404);
            // } else {
            //     $response = [
            //         'status' => 200,
            //         'error' => FALSE,
            //         'messages' => 'Listagem de Categorias.',
            //         'data' => $data
            //     ];

            //     return $this->respond($response);
            // }
        } catch (Exception $ex) {
            $response = [
                'status' => 401,
                'error' => TRUE,
                'messages' => 'Acesso Negado. Token expirado ou não existe.'
            ];

            return $this->respond($response);
        }
	}

    public function getTypeSubscription2() {
		try {
            $config = new APIConfig();

            /* Endpoint */
            $url = $config->urlUnimestre.'/projetos/api/index.php?api=unimestre_inscricao.vestibular.busca.ApiBuscaTipoInscricao';
    
            /* eCurl */
            $curl = curl_init($url);
    
            
                
            /* Define content type */
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'Authorization:UNIMESTRE 6d3b4140103e5a917fbade9b6fadb5b0'
            ));
                
            /* Return json */
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                
            /* make request */
            $result = curl_exec($curl);

            return json_decode($result);
                
            /* close curl */
            curl_close($curl);
        } catch (Exception $ex) {
            return $ex;
        }
	}
}