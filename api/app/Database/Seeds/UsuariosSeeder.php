<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Entities\Usuarios\UsuariosEntity;
use App\Models\Usuarios\UsuariosModel;

class UsuariosSeeder extends Seeder {
    protected $configs;

    public function __construct() {
        $this->configs = config('CFMConfig');
    }

	public function run() {
		$userModel = new UsuariosModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrUsers = [];

		$arrUsers = [
			[
				'avatar' => '', 
				'first_name' => 'Administrador', 
				'last_name' => 'Sistema', 
				'gender' => 'M', 
				'email' => 'admin@admin.com.br', 
				'password' => '12345678',
				'id_status' => 1, 
				'id_user_created' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('0000-00-00 00:00:00')
			]
		];

		foreach ($arrUsers as $value) {
			if (is_array($value)) {
				$users = [
					'avatar' => $value['avatar'],
					'first_name' => $value['first_name'],
					'last_name' => $value['last_name'],
					'gender' => $value['gender'],
					'email' => $value['email'],
					'password' => $value['password'],
					'id_status' => $value['id_status'],
					'id_user_created' => $value['id_user_created'],
					'created_at' => $value['created_at'],
					'updated_at' => $value['updated_at']
				];
			}

			$db->disableForeignKeyChecks();

			$userEntity = new UserEntity($users);

			$userModel->withRole('Administrador');

			$userModel->save($userEntity);
			
			$db->enableForeignKeyChecks();
		}
	}
}