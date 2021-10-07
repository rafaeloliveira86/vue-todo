<?php
namespace App\Database\Seeds;

use App\Models\CategoriesUnits\CategoriesUnitsModel;
use CodeIgniter\Database\Seeder;

class CategoriesUnitsSeeder extends Seeder {
    public function run() {
        $categorieUnitModel = new CategoriesUnitsModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrCategoriesUnits = [];

		$arrCategoriesUnits = [
            //Categorias UniSãoJosé
			['id_categorie' => 1, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 2, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 3, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 4, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 5, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 6, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],

            //Categorias Colégio Realengo
            ['id_categorie' => 1, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 2, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 4, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 5, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 6, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 7, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 9, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],

            //Categorias Colégio Aplicação Taquara
			['id_categorie' => 4, 'id_unit' => 3, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 5, 'id_unit' => 3, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 6, 'id_unit' => 3, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 8, 'id_unit' => 3, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],

            //Categorias Colégio Aplicação Vila Militar
            ['id_categorie' => 1, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 2, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 4, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 5, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 6, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 9, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
		];

		foreach ($arrCategoriesUnits as $value) {
			if (is_array($value)) {
				$inputs = [
					'id_categorie' => $value['id_categorie'],
					'id_unit' => $value['id_unit'],
					'id_user_created' => $value['id_user_created'],
					'created_at' => $value['created_at']
				];
			}

			$db->disableForeignKeyChecks();
			$categorieUnitModel->save($inputs);
			$db->enableForeignKeyChecks();
		}
    }
}