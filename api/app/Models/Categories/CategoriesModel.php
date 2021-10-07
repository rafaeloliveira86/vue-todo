<?php
namespace App\Models\Categories;

use CodeIgniter\Model;
use Exception;

class CategoriesModel extends Model {
	protected $DBGroup              = 'default';
	protected $table                = 'tbl_categories';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id',
		'categorie_name',
		'id_status',
		'id_user_created',
		'id_user_updated',
		'id_user_deleted',
		'created_at',
		'updated_at',
		'deleted_at'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

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

	public function getCategorieByUnitID($id_unidade) {
        try {
            $this->select('c.*');
			$this->from('tbl_categories AS c');
            $this->join('tbl_categories_units AS cu', 'cu.id_categorie = c.id');
			$this->join('tbl_units AS u', 'cu.id_unit = u.id');
            $this->where('u.id', $id_unidade);
			$this->where('c.id_status', 1);
			$this->groupBy('c.categorie_name');
			$this->orderBy('c.id', 'ASC');
            return $this->asObject()->findAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}