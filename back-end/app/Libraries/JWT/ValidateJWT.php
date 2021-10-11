<?php
namespace App\Libraries\JWT;

use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

//headers
/*header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control");*/

class ValidateJWT {
	use ResponseTrait;

	public function getKey() {
        return "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ";
    }

	public function setToken($data) {
		$key = $this->getKey();

		$iat = time();
        //$nbf = $iat + 10;
        $exp = $iat + 3600;

        $payload = [
            "iss" => "The_claim",
            "aud" => "The_Aud",
            "iat" => $iat,
            //"nbf" => $nbf,
            "exp" => $exp,
            "data" => $data,
		];

        $token = JWT::encode($payload, $key);

		return $token;
	}

	public function getToken() {
		$request = \Config\Services::request();

		$key = $this->getKey();
        $authHeader = $request->getHeader("Authorization");
        $authHeader = $authHeader->getValue();
        $token = $authHeader;

		$decoded = JWT::decode($token, $key, array("HS256"));

		return $decoded;
	}
}