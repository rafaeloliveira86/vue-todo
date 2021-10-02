<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder {
    public function run() {
        $this->call('CategoriasSeeder');
        $this->call('CategoriasUnidadesSeeder');
		$this->call('StatusSeeder');
        $this->call('SubcategoriasSeeder');
        $this->call('UnidadesSeeder');
    }
}