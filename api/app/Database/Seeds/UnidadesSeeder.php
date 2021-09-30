<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Unidades\UnidadesModel;

class UnidadesSeeder extends Seeder {
    public function run() {
        $unidadeModel = new UnidadesModel();

		$arrUnidade = [];

		$arrUnidade = [
			['unidade' => 'UniSãoJosé', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['unidade' => 'Colégio Realengo', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['unidade' => 'Colégio Aplicação Taquara', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['unidade' => 'Colégio Aplicação Vila Militar', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
		];

		foreach ($arrUnidade as $value) {
			if (is_array($value)) {
				$inputs = [
					'unidade' => $value['unidade'],
					'id_status' => $value['id_status'],
					'id_usuario_criado' => $value['id_usuario_criado'],
					'id_usuario_atualizado' => $value['id_usuario_atualizado'],
					'id_usuario_excluido' => $value['id_usuario_excluido'],
					'criado_em' => $value['criado_em'],
					'atualizado_em' => $value['atualizado_em'],
					'excluido_em' => $value['excluido_em']
				];
			}

			$unidadeModel->save($inputs);
		}
    }
}