<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Categories\CategoriesModel;

class CategoriesSeeder extends Seeder {
	public function run() {
		$categoriaModel = new CategoriesModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrCategorie = [];

		$arrCategorie = [
			['categorie_name' => 'Sistema UniMestre', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'Sistema RM Totvs', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'RD Station', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'Portal do Aluno', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'Biblioteca', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'PIT', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'Sistema CFM', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'Sistema Escola Web', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'ClassApp', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['categorie_name' => 'Microsoft Teams', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],			
		];

		foreach ($arrCategorie as $value) {
			if (is_array($value)) {
				$inputs = [
					'categorie_name' => $value['categorie_name'],
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
			$categoriaModel->save($inputs);
			$db->enableForeignKeyChecks();
		}
	}
}