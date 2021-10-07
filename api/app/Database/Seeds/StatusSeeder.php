<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Status\StatusModel;

class StatusSeeder extends Seeder {
	public function run() {
		$statusModel = new StatusModel();

		$arrStatus = [];

		$arrStatus = [
			['status_name' => 'Ativo', 'class' => 'green darken-2', 'role_scope' => 'role.admin role.ti', 'order' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['status_name' => 'Inativo', 'class' => 'amber darken-2', 'role_scope' => 'role.admin role.ti', 'order' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['status_name' => 'Excluído', 'class' => 'red darken-2', 'role_scope' => 'role.admin role.ti', 'order' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
		];

		foreach ($arrStatus as $value) {
			if (is_array($value)) {
				$inputs = [
					'status_name' => $value['status_name'],
					'class' => $value['class'],
					'role_scope' => $value['role_scope'],
					'order' => $value['order'],
					'id_user_created' => $value['id_user_created'],
					'id_user_updated' => $value['id_user_updated'],
					'id_user_deleted' => $value['id_user_deleted'],
					'created_at' => $value['created_at'],
					'updated_at' => $value['updated_at'],
					'deleted_at' => $value['deleted_at']
				];
			}

			$statusModel->save($inputs);
		}
	}
}