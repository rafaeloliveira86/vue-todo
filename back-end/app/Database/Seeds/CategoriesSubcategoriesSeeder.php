<?php
namespace App\Database\Seeds;

use App\Models\CategoriesSubcategories\CategoriesSubcategoriesModel;
use CodeIgniter\Database\Seeder;

class CategoriesSubcategoriesSeeder extends Seeder {
    public function run() {
        $categorieSubcategorieModel = new CategoriesSubcategoriesModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrCategoriesSubcategories = [];

		$arrCategoriesSubcategories = [
            //Categoria Sistema Unimestre
			['id_categorie' => 1, 'id_subcategorie' => 1, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 2, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 3, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 4, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 5, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 6, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id_categorie' => 1, 'id_subcategorie' => 7, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 8, 'id_unit' => 1, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],

            ['id_categorie' => 1, 'id_subcategorie' => 1, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 2, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 3, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 4, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 5, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 6, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id_categorie' => 1, 'id_subcategorie' => 7, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 8, 'id_unit' => 2, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],

            ['id_categorie' => 1, 'id_subcategorie' => 1, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 2, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 3, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 4, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 5, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 6, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id_categorie' => 1, 'id_subcategorie' => 7, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
			['id_categorie' => 1, 'id_subcategorie' => 8, 'id_unit' => 4, 'id_user_created' => 1, 'created_at' => date('Y-m-d H:i:s')],
		];

		foreach ($arrCategoriesSubcategories as $value) {
			if (is_array($value)) {
				$inputs = [
					'id_categorie' => $value['id_categorie'],
					'id_subcategorie' => $value['id_subcategorie'],
                    'id_unit' => $value['id_unit'],
					'id_user_created' => $value['id_user_created'],
					'created_at' => $value['created_at']
				];
			}

			$db->disableForeignKeyChecks();
			$categorieSubcategorieModel->save($inputs);
			$db->enableForeignKeyChecks();
		}
    }
}