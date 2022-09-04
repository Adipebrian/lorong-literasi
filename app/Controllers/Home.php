<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ModelBuku;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new ModelBuku();
    }
    public function index()
    {
        return view('home/index');
    }
    public function index_login()
    {

        $data = [
            'books' => $this->model->paginate(12,'book_list'),
            'pager' => $this->model->pager,
        ];
        return view('home/index_login', $data);
    }
    public function about()
    {
        return view('home/about');
    }
    public function detail($id)
    {
        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get();

        $data = [
            'book' => $query->getRow()
        ];
        return view('home/detail', $data);
    }
}
