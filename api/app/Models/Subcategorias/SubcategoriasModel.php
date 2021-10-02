<?php
namespace App\Models\Subcategorias;

use CodeIgniter\Model;

class SubcategoriasModel extends Model {
    protected $DBGroup              = 'default';
    protected $table                = 'tbl_subcategorias';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id',
        'subcategoria',
        'id_unidade',
        'id_categoria',
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
}