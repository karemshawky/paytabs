<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Categories extends BaseController
{
    use ResponseTrait;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function new()
    {
        $data['categories'] = $this->categoryModel->parentCategories();

        return view('categories/new', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \CodeIgniter\HTTP\Response $response
     */
    public function create()
    {
        if (
            $this->request->getMethod() === 'post' &&
            $this->validate([
                'name' => 'required|string|min_length[3]|max_length[255]',
                'parent_id'  => 'required|integer'
            ])
        ) {
            $this->categoryModel->save([
                'name' => $this->request->getPost('name'),
                'parent_id' => $this->request->getPost('parent_id')
            ]);

            return $this->respondCreated(['message' => lang('category_added_successfully')]);
        }
        return $this->failValidationError();
    }

    /**
     * Get parent categories endpoint.
     *
     * @return \CodeIgniter\HTTP\Response $response
     */
    public function getCategories()
    {
        return $this->response->setJSON($this->categoryModel->all());
    }

    /**
     * Get parent categories endpoint.
     *
     * @return \CodeIgniter\HTTP\Response $response
     */
    public function getSubCategory($id)
    {
        return $this->response->setJSON($this->categoryModel->subCategory($id));
    }
}
