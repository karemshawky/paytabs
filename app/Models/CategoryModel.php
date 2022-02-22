<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $allowedFields = ['name', 'parent_id'];

    public function getParent()
    {
        return $this->where('parent_id', 0)->findAll();
    }

    public function getSub()
    {
        return $this->where('parent_id !=', 0)->findAll();
    }
}
