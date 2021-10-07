<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Entities\Users\UsersEntity;
use App\Models\Users\UsersModel;

class UsersSeeder extends Seeder {
    protected $configs;

    public function __construct() {
        $this->configs = config('WikiConfig');
    }

	public function run() {
		$userModel = new UsersModel();

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
				'id_role' => 1, 
				'id_status' => 1, 
				'id_user_created' => 1,
				'id_user_updated' => 0,
				'id_user_deleted' => 0,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('0000-00-00 00:00:00'),
				'deleted_at' => date('0000-00-00 00:00:00')
			]
		];

		foreach ($arrUsers as $value) {
			if (is_array($value)) {
				$inputs = [
					'avatar' => $value['avatar'],
					'first_name' => $value['first_name'],
					'last_name' => $value['last_name'],
					'gender' => $value['gender'],
					'email' => $value['email'],
					'password' => $value['password'],
					'id_role' => $value['id_role'],
					'id_status' => $value['id_status'],
					'id_user_created' => $value['id_user_created'],
					'id_user_updated' => $value['id_user_updated'],
					'id_user_deleted' => $value['id_user_deleted'],
					'created_at' => $value['created_at'],
					'updated_at' => $value['updated_at'],
					'deleted_at' => $value['deleted_at']
				];
			}

			$db->disableForeignKeyChecks();

			$userEntity = new UsersEntity($inputs);

			$userModel->withRole('Administrador');

			$userModel->save($userEntity);
			
			$db->enableForeignKeyChecks();
		}
	}
}