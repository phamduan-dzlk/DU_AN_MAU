<?php

class HomeController
{
    public $products;
    public $category;
    function __construct(){
        $this->products = new Products();
        $this->category = new Categoty();
    }
    public function index() 
    {
        if(isset($_GET['id'])){
            $dataAll=$this->products->getAll();
            $data=$this->products->category($_GET['id']);
            require_once PATH_VIEW . 'main.php';            
        }
    }
}