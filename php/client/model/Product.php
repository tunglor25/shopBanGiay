<?php
class Product
{
    public $product_id;
    public $name;
    public $description;
    public $price;
    public $stock;
    public $img;
    public $views;
    public $category_id;

    public function __construct() {}
    public function __destruct() {}
}

class categories
{   
    public $category_id;
    public $name;
    public $status;
}
