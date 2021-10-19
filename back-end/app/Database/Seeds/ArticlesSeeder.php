<?php
namespace App\Database\Seeds;

use App\Models\Articles\ArticlesModel;
use CodeIgniter\Database\Seeder;

class ArticlesSeeder extends Seeder {
    public function run() {
        $articleModel = new ArticlesModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrArticles = [];

		$arrArticles = [
            //Subcategoria Relatórios
			['article_name' => 'Como gerar relatórios no sistema Unimestre?', 'id_subcategorie' => 1, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como gerar declarações no sistema Unimestre?', 'id_subcategorie' => 1, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Gerando ficha financeira do aluno.', 'id_subcategorie' => 1, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Erro ao gerar a ata de assinatura.', 'id_subcategorie' => 1, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Problema ao gerar o histórico do aluno.', 'id_subcategorie' => 1, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			//Subacategoria Boletos
            ['article_name' => 'Boleto do aluno sem código de barras.', 'id_subcategorie' => 2, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Erro ao realizar o lançamento do boleto.', 'id_subcategorie' => 2, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Problema ao gerar o boleto do aluno.', 'id_subcategorie' => 2, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Alterar a data de vencimento do boleto.', 'id_subcategorie' => 2, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como gerar boleto no sistema Unimestre?', 'id_subcategorie' => 2, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
            //Subacategoria Alterar Senha
            ['article_name' => 'Como alterar a senha de acesso do usuário?', 'id_subcategorie' => 3, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
            //Subacategoria Matrícula do Aluno
            ['article_name' => 'Não consigo realizar a matrícula do aluno em curso.', 'id_subcategorie' => 4, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como alterar o responsável acadêmico da ficha de cadastro do aluno?', 'id_subcategorie' => 4, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Não consigo cadastrar o CPF do responsável financeiro.', 'id_subcategorie' => 4, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como emitir o contrato de matrícula?', 'id_subcategorie' => 4, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como inserir disciplinas da grade do aluno?', 'id_subcategorie' => 4, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
            //Subacategoria Lançamento de Notas
            ['article_name' => 'O sistema não faz o cálculo da média?', 'id_subcategorie' => 5, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como lançar notas no sistema?', 'id_subcategorie' => 5, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
            //Subacategoria Boletim
            ['article_name' => 'Como gerar o boletim do aluno?', 'id_subcategorie' => 6, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como alterar a nota de uma disciplina no boletim?', 'id_subcategorie' => 6, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
            //Subacategoria Financeiro
            ['article_name' => 'Como gerar lançamentos no sistema?', 'id_subcategorie' => 7, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como abrir um caixa no sistema?', 'id_subcategorie' => 7, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
            //Subacategoria Declarações
            ['article_name' => 'Solicitando declarações no sistema.', 'id_subcategorie' => 8, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
			['article_name' => 'Como solicitar uma declaração de matrícula?', 'id_subcategorie' => 8, 'id_status' => 1, 'id_user_created' => 1, 'id_user_updated' => 0, 'id_user_deleted' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('0000-00-00 00:00:00'), 'deleted_at' => date('0000-00-00 00:00:00')],
        ];

		foreach ($arrArticles as $value) {
			if (is_array($value)) {
				$inputs = [
					'article_name' => $value['article_name'],
					'id_subcategorie' => $value['id_subcategorie'],
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
			$articleModel->save($inputs);
			$db->enableForeignKeyChecks();
		}
    }
}