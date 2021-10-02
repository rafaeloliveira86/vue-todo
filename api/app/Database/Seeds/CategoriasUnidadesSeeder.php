<?php
namespace App\Database\Seeds;

use App\Models\CategoriasUnidades\CategoriasUnidadesModel;
use CodeIgniter\Database\Seeder;

class CategoriasUnidadesSeeder extends Seeder {
    public function run() {
        $categoriaUnidadeModel = new CategoriasUnidadesModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrCategoriasUnidades = [];

		$arrCategoriasUnidades = [
            //Categorias UniSãoJosé
			['id_categoria' => 1, 'id_unidade' => 1, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 2, 'id_unidade' => 1, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 3, 'id_unidade' => 1, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 4, 'id_unidade' => 1, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 5, 'id_unidade' => 1, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 6, 'id_unidade' => 1, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],

            //Categorias Colégio Realengo
            ['id_categoria' => 1, 'id_unidade' => 2, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 2, 'id_unidade' => 2, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 4, 'id_unidade' => 2, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 5, 'id_unidade' => 2, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 6, 'id_unidade' => 2, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 7, 'id_unidade' => 2, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 9, 'id_unidade' => 2, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],

            //Categorias Colégio Aplicação Taquara
			['id_categoria' => 4, 'id_unidade' => 3, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 5, 'id_unidade' => 3, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 6, 'id_unidade' => 3, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 8, 'id_unidade' => 3, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],

            //Categorias Colégio Aplicação Vila Militar
            ['id_categoria' => 1, 'id_unidade' => 4, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 2, 'id_unidade' => 4, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 4, 'id_unidade' => 4, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 5, 'id_unidade' => 4, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 6, 'id_unidade' => 4, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
			['id_categoria' => 9, 'id_unidade' => 4, 'id_usuario_criado' => 1, 'criado_em' => date('Y-m-d H:i:s')],
		];

		foreach ($arrCategoriasUnidades as $value) {
			if (is_array($value)) {
				$inputs = [
					'id_categoria' => $value['id_categoria'],
					'id_unidade' => $value['id_unidade'],
					'id_usuario_criado' => $value['id_usuario_criado'],
					'criado_em' => $value['criado_em']
				];
			}

			$db->disableForeignKeyChecks();
			$categoriaUnidadeModel->save($inputs);
			$db->enableForeignKeyChecks();
		}
    }
}