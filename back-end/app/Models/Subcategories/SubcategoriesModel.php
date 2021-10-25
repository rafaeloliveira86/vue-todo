<?php
namespace App\Models\Subcategories;

use CodeIgniter\Model;
use Exception;

class SubcategoriesModel extends Model {
    protected $DBGroup              = 'default';
    protected $table                = 'tbl_subcategories';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id',
        'subcategorie_name',
        'slug',
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

    public function getSubcategorieByCategorieAndUnitID(int $id_categorie, int $id_unit) {
        try {
            $this->select('
                c.id AS id_categorie,
                c.categorie_name,
                s.id AS id_subcategorie,
                s.subcategorie_name,
                s.slug,
                s.id_status,
                u.unit_name
			');
			$this->from('tbl_subcategories AS s');
            $this->join('tbl_categories_subcategories AS cs', 'cs.id_subcategorie = s.id');
			$this->join('tbl_categories AS c', 'cs.id_categorie = c.id');
			$this->join('tbl_units AS u', 'cs.id_unit = u.id');
            $this->where('cs.id_categorie', $id_categorie);
            $this->where('cs.id_unit', $id_unit);
			$this->where('s.id_status', 1);
			$this->groupBy('s.subcategorie_name');
			$this->orderBy('s.id', 'ASC');
            return $this->asObject()->findAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getSubcategorieByCategorieAndUnitSlug(string $categorie_slug, string $unit_slug) {
        try {
            $this->select('
                c.id AS id_categorie,
                c.categorie_name,
                s.id AS id_subcategorie,
                s.subcategorie_name,
                s.slug,
                s.id_status,
                u.unit_name
			');
			$this->from('tbl_subcategories AS s');
            $this->join('tbl_categories_subcategories AS cs', 'cs.id_subcategorie = s.id');
			$this->join('tbl_categories AS c', 'cs.id_categorie = c.id');
			$this->join('tbl_units AS u', 'cs.id_unit = u.id');
            $this->where('c.slug', $categorie_slug);
            $this->where('u.slug', $unit_slug);
			$this->where('s.id_status', 1);
			$this->groupBy('s.subcategorie_name');
			$this->orderBy('s.id', 'ASC');
            return $this->asObject()->findAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}