<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Product extends ResourceController
{
    protected $modelName = 'App\Models\API\v1\Product';
    protected $format    = 'json';

    public function index()
    {
        $limit = 10;
        $page = $this->request->getGet('page') ? $this->request->getGet('page') : 1;
        $total = $this->model->countAllResults();
        
        return $this->respond([
            'products' => $this->model->paginate($limit),
            'total' => $total,
            'limit' => $limit,
            'page' => (int) $page,
            'pages' => ceil($total / $limit)
        ]);
    }

    public function create()
    {
        $data = [];
        $postData = $this->request->getJSON();
        $find = $this->model->insert($postData);

        if ($find)
            $data = ['id' => $find];

        return $this->respond($data);
    }

    public function show($id = NULL)
    {
        $data = [];
        $find = $this->model->find($id);

        if ($find)
            $data = $find;

        return $this->respond($data);
    }
}
