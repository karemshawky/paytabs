<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $allowedFields = ['name', 'parent_id'];

    /**
     * Get parent categories.
     *
     * @return void|array
     */
    public function parentCategories()
    {
        return $this->where('parent_id', 0)->findAll();
    }

    /**
     * Get sub categories.
     *
     * @return void|array
     */
    public function subCategory($id)
    {
        return $this->where('parent_id', $id)->findAll();
    }
}
