<?php
namespace App\Database\Seeds;

use App\Models\Subcategories\SubcategoriesModel;
use CodeIgniter\Database\Seeder;

class SubcategoriesSeeder extends Seeder {
    public function run() {
        $subcategorieModel = new SubcategoriesModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrSubcategories = [];

		$arrSubcategories = [
			['subcategorie_name' => 'Relatórios', 'slug' => 'relatorios', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Boletos', 'slug' => 'boletos', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Alterar Senha', 'slug' => 'alterar-senha', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Matrícula do Aluno', 'slug' => 'matricula-do-aluno', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Lançamento de Notas', 'slug' => 'lancamento-de-notas', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Boletim', 'slug' => 'boletim', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Financeiro', 'slug' => 'financeiro', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Declarações', 'slug' => 'declaracoes', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],			
		];

		foreach ($arrSubcategories as $value) {
			if (is_array($value)) {
				$inputs = [
					'subcategorie_name' => $value['subcategorie_name'],
					'slug' => $value['slug'],
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
			$subcategorieModel->save($inputs);
			$db->enableForeignKeyChecks();
		}
    }
}