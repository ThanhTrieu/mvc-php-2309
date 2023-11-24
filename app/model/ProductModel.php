<?php
namespace app\model;

class ProductModel
{
    const dataProducts = [
        [
            "id" => 1,
            "image" => "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
            "name" => "Iphone",
            "price" => 1000,
            "sale_price" => 800,
            "star" => 5,
            "sale" => 1
        ],
        [
            "id" => 2,
            "image" => "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
            "name" => "Samsung Galaxy S10",
            "price" => 1000,
            "sale_price" => null,
            "star" => 3,
            "sale" => 0
        ],
        [
            "id" => 3,
            "image" => "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
            "name" => "Iphone X",
            "price" => 1500,
            "sale_price" => null,
            "star" => 4,
            "sale" => 0
        ],
        [
            "id" => 4,
            "image" => "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
            "name" => "Samsung Galaxy S20",
            "price" => 2000,
            "sale_price" => 1800,
            "star" => 5,
            "sale" => 1
        ],
        [
            "id" => 5,
            "image" => "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
            "name" => "Iphone 13",
            "price" => 2200,
            "sale_price" => 2000,
            "star" => 5,
            "sale" => 1
        ],
        [
            "id" => 6,
            "image" => "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
            "name" => "Samsung Galaxy S21+",
            "price" => 2200,
            "sale_price" => null,
            "star" => 5,
            "sale" => 0
        ],
        [
            "id" => 7,
            "image" => "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
            "name" => "Iphone 14",
            "price" => 3000,
            "sale_price" => null,
            "star" => 5,
            "sale" => 0
        ],
        [
            "id" => 8,
            "image" => "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
            "name" => "Iphone 15",
            "price" => 3500,
            "sale_price" => 3400,
            "star" => 5,
            "sale" => 1
        ]
    ];

    public function getAllDataProducts()
    {
        return self::dataProducts;
    }

    public function getDetailProductById($id = 0)
    {
        $products = self::dataProducts;
        $detail = [];
        foreach($products as $item){
            if($item['id'] == $id){
                $detail = $item;
            }
        }
        return $detail;
    }

}