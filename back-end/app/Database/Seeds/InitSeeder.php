<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder {
    public function run() {
        $this->call('CategoriesSeeder');
        $this->call('CategoriesUnitsSeeder');
		$this->call('StatusSeeder');
        $this->call('SubcategoriesSeeder');
        $this->call('UnitsSeeder');
    }
}