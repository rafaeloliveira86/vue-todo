<?php
namespace App\Models\Categorias;

use CodeIgniter\Model;
use Exception;

class CategoriasModel extends Model {
	protected $DBGroup              = 'default';
	protected $table                = 'tbl_categorias';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id',
		'categoria',
		'id_unidade',
		'id_status',
		'id_usuario_criado',
		'id_usuario_atualizado',
		'id_usuario_excluido',
		'criado_em',
		'atualizado_em',
		'excluido_em'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'criado_em';
	protected $updatedField         = 'atualizado_em';
	protected $deletedField         = 'excluido_em';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function listarCategoriasPorUnidadeID($id_unidade) {
        try {
            $this->select('c.*');
			$this->from('tbl_categorias AS c');
            $this->join('tbl_categorias_unidades AS cu', 'cu.id_categoria = c.id');
			$this->join('tbl_unidades AS u', 'cu.id_unidade = u.id');
            $this->where('u.id', $id_unidade);
			$this->where('c.id_status', 1);
			$this->groupBy('c.categoria');
			$this->orderBy('c.id', 'ASC');
            return $this->asObject()->findAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}