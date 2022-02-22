<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Controllers\BaseController;

class Categories extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = model(CategoryModel::class);
    }

    /**
     * List categories resource.
     *
     * @return string
     */
    public function index()
    {
        return view('categories/index');
    }

    public function new()
    {
        $data['parentCategories'] = $this->categoryModel->getParent();
        $data['subCategories'] = $this->categoryModel->getSub();

        return view('categories/new', $data);
    }

    public function create()
    {
        if (
            $this->request->getMethod() === 'post' &&
            $this->validate([
                'name' => 'required|string|min_length[3]|max_length[255]',
                'parent_id'  => 'required|integer',
            ])
        ) {
            $this->categoryModel->save([
                'name' => $this->request->getPost('name'),
                'parent_id' => $this->request->getPost('parent_id'),
            ]);

            return redirect()->to('/categories');
        }
        return redirect()->back()->withInput();
    }
}
