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
			//UniSãoJosé
			['subcategorie_name' => 'Relatórios', 'id_unit' => 1, 'id_categorie' => 1, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Boletos', 'id_unit' => 1, 'id_categorie' => 2, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			//Colégio Realengo
			['subcategorie_name' => 'Alterar Senha', 'id_unit' => 2, 'id_categorie' => 7, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Matrícula Aluno', 'id_unit' => 2, 'id_categorie' => 8, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			//Colégio Aplicação Taquara
			['subcategorie_name' => 'Matrícula Aluno', 'id_unit' => 3, 'id_categorie' => 15, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Visualizar Notas', 'id_unit' => 3, 'id_categorie' => 16, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			//Colégio Aplicação Vila Militar
			['subcategorie_name' => 'Matrícula Aluno', 'id_unit' => 4, 'id_categorie' => 19, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['subcategorie_name' => 'Visualizar Notas', 'id_unit' => 4, 'id_categorie' => 20, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],			
		];

		foreach ($arrSubcategories as $value) {
			if (is_array($value)) {
				$inputs = [
					'subcategorie_name' => $value['subcategorie_name'],
					'id_unit' => $value['id_unit'],
                    'id_categorie' => $value['id_categorie'],
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