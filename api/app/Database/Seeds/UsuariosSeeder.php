<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Entities\Usuarios\UsuariosEntity;
use App\Models\Usuarios\UsuariosModel;

class UsuariosSeeder extends Seeder {
    protected $configs;

    public function __construct() {
        $this->configs = config('WikiConfig');
    }

	public function run() {
		$usuarioModel = new UsuariosModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrUsuarios = [];

		$arrUsuarios = [
			[
				'avatar' => '', 
				'nome' => 'Administrador', 
				'sobrenome' => 'Sistema', 
				'genero' => 'M', 
				'email' => 'admin@admin.com.br', 
				'senha' => '12345678',
				'id_permissao' => 1, 
				'id_status' => 1, 
				'id_usuario_criado' => 1,
				'id_usuario_atualizado' => 0,
				'id_usuario_excluido' => 0,
				'criado_em' => date('Y-m-d H:i:s'),
				'atualizado_em' => date('0000-00-00 00:00:00'),
				'excluido_em' => date('0000-00-00 00:00:00')
			]
		];

		foreach ($arrUsuarios as $value) {
			if (is_array($value)) {
				$inputs = [
					'avatar' => $value['avatar'],
					'nome' => $value['nome'],
					'sobrenome' => $value['sobrenome'],
					'genero' => $value['genero'],
					'email' => $value['email'],
					'senha' => $value['senha'],
					'id_permissao' => $value['id_permissao'],
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

			$usuarioEntity = new UsuariosEntity($inputs);

			$usuarioModel->withRole('Administrador');

			$usuarioModel->save($usuarioEntity);
			
			$db->enableForeignKeyChecks();
		}
	}
}