<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Units\UnitsModel;

class UnitsSeeder extends Seeder {
    public function run() {
        $unitModel = new UnitsModel();

		$arrUnit = [];

		$arrUnit = [
			['unit_nickname' => 'USJ', 'unit_name' => 'UniSãoJosé', 'slug' => 'unisaojose', 'class' => 'blue darken-4', 'logo_navbar' => 'logo_usj_white.png', 'logo_footer' => 'logo_usj_blue.png', 'icon_footer' => 'icon_usj.png', 'site' => 'https://saojose.br', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['unit_nickname' => 'CR', 'unit_name' => 'Colégio Realengo', 'slug' => 'colegiorealengo', 'class' => 'red darken-4', 'logo_navbar' => 'logo_cr_white.png', 'logo_footer' => 'logo_cr_red.png', 'icon_footer' => 'icon_cr.png', 'site' => 'https://colegiorealengo.br', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['unit_nickname' => 'CCA.TQ', 'unit_name' => 'Colégio Aplicação Taquara', 'slug' => 'colegioaplicacaotaquara', 'class' => 'teal darken-2', 'logo_navbar' => 'logo_cca_tq_white.png', 'logo_footer' => 'logo_cca_tq_blue.png', 'icon_footer' => 'icon_cca.png', 'site' => 'https://aplicacao.rio.br/taquara', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['unit_nickname' => 'CCA.VM', 'unit_name' => 'Colégio Aplicação Vila Militar', 'slug' => 'colegioaplicacaovilamilitar', 'class' => 'teal darken-2', 'logo_navbar' => 'logo_cca_vm_white.png', 'logo_footer' => 'logo_cca_vm_blue.png', 'icon_footer' => 'icon_cca.png', 'site' => 'https://aplicacao.rio.br/vilamilitar', 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
		];

		foreach ($arrUnit as $value) {
			if (is_array($value)) {
				$inputs = [
					'unit_nickname' => $value['unit_nickname'],
					'unit_name' => $value['unit_name'],
					'slug' => $value['slug'],
					'class' => $value['class'],
					'logo_navbar' => $value['logo_navbar'],
					'logo_footer' => $value['logo_footer'],
					'icon_footer' => $value['icon_footer'],
					'site' => $value['site'],
					'id_status' => $value['id_status'],
					'id_user_created' => $value['id_user_created'],
					'id_user_updated' => $value['id_user_updated'],
					'id_user_deleted' => $value['id_user_deleted'],
					'created_at' => $value['created_at'],
					'updated_at' => $value['updated_at'],
					'deleted_at' => $value['deleted_at']
				];
			}

			$unitModel->save($inputs);
		}
    }
}