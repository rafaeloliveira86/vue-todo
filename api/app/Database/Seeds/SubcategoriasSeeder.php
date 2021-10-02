<?php
namespace App\Database\Seeds;

use App\Models\Subcategorias\SubcategoriasModel;
use CodeIgniter\Database\Seeder;

class SubcategoriasSeeder extends Seeder {
    public function run() {
        $subcategoriaModel = new SubcategoriasModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrSubcategorias = [];

		$arrSubcategorias = [
			//Subcategorias UniSãoJosé
			['subcategoria' => 'Relatórios', 'id_unidade' => 1, 'id_categoria' => 1, 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['subcategoria' => 'Boletos', 'id_unidade' => 1, 'id_categoria' => 2, 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			//Subcategorias Colégio Realengo
			['subcategoria' => 'Alterar Senha', 'id_unidade' => 2, 'id_categoria' => 7, 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['subcategoria' => 'Matrícula Aluno', 'id_unidade' => 2, 'id_categoria' => 8, 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			//Subcategorias Colégio Aplicação Taquara
			['subcategoria' => 'Matrícula Aluno', 'id_unidade' => 3, 'id_categoria' => 15, 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['subcategoria' => 'Visualizar Notas', 'id_unidade' => 3, 'id_categoria' => 16, 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			//Subcategorias Colégio Aplicação Vila Militar
			['subcategoria' => 'Matrícula Aluno', 'id_unidade' => 4, 'id_categoria' => 19, 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['subcategoria' => 'Visualizar Notas', 'id_unidade' => 4, 'id_categoria' => 20, 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],			
		];

		foreach ($arrSubcategorias as $value) {
			if (is_array($value)) {
				$inputs = [
					'subcategoria' => $value['subcategoria'],
					'id_unidade' => $value['id_unidade'],
                    'id_categoria' => $value['id_categoria'],
					'id_status' => $value['id_status'],
					'id_usuario_criado' => $value['id_usuario_criado'],
					'id_usuario_atualizado' => $value['id_usuario_atualizado'],
					'id_usuario_excluido' => $value['id_usuario_excluido'],
					'criado_em' => $value['criado_em'],
					'atualizado_em' => $value['atualizado_em'],
					'excluido_em' => $value['excluido_em']
				];
			}

			$db->disableForeignKeyChecks();
			$subcategoriaModel->save($inputs);
			$db->enableForeignKeyChecks();
		}
    }
}