<?php

namespace App\Repositories\Categories;

use App\Repositories\Categories\CategorieInterface as CategorieInterface;
use App\Categorie;

class CategorieRepository implements CategorieInterface {
        public $categorie;

        function __construct(Categorie $categorie) {
            $this->categorie = $categorie;
        }

        function getAll() {
            return $this->categorie->getAll();
        }

        function find($id) {
            return $this->categorie->findCategorie($id);
        }

        function delete($id) {
            return $this->categorie->deleteCategorie($id);
        }
}