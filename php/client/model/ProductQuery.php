<?php

class ProductQuery
{
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;port=3306;dbname=duan1", "root", "");
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Kết nối database thất bại";
        }
    }
    public function __destruct()
    {
        $this->pdo = null;
    }


    //tìm all
    public function all()
    {
        try {
            $sql = "SELECT * FROM products";
            $data = $this->pdo->query($sql)->fetchAll();
            // var_dump($data);
            $danhSach = [];
            foreach ($data as $value) {
                $product = new Product();
                $product->product_id = $value["product_id"];
                $product->name = $value["name"];
                $product->description = $value["description"];
                $product->price = $value["price"];
                $product->stock = $value["stock"];
                $product->img = $value["img"];
                $product->views = $value["views"];
                $product->category = $value["category"];
                array_push($danhSach, $product);
            }
            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Tìm tất cả thất bại";
        }
    }


    //tìm 1 sản phẩm
    public function find($id)
    {
        try {
            $sql = "SELECT * FROM products WHERE product_id = $id";
            $data = $this->pdo->query($sql)->fetch();
            if ($data !== false) {
                $product = new Product();
                $product->product_id = $data["product_id"];
                $product->name = $data["name"];
                $product->description = $data["description"];
                $product->price = $data["price"];
                $product->stock = $data["stock"];
                $product->img = $data["img"];
                $product->views = $data["views"];
                $product->category = $data["category"];

                return $product;
            }
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Tìm sản phẩm thất bại";
        }
    }

    //thêm mới sản phẩm :
    public function insert(Product $product)
    {
        try {
            $sql = "INSERT INTO `products`( `name`, `price`, `img`, `description`, `stock`, `views`, `category`) VALUES ('" . $product->name . "','" . $product->price . "','" . $product->img . "','" . $product->description . "','" . $product->stock . "','" . $product->views . "','". $product->category. "')";
            $data = $this->pdo->exec($sql);
            if ($data == "1") {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Thêm mới thất bại";
        }
    }

    //Sửa sản phẩm :
    public function update(Product $product, $id)
    {
        try {
            $sql = "UPDATE `products` SET 
                    `name` = '{$product->name}',
                    `description` = '{$product->description}',
                    `price` = '{$product->price}',
                    `stock` = '{$product->stock}',
                    `img` = '{$product->img}',
                    `views` = '{$product->views}',
                    `category` = '{$product->category}'
                    WHERE `product_id` = $id";

            $data = $this->pdo->exec($sql);

            if ($data === 1 || $data === 0) {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Cập nhật thất bại";
        }
    }

    public function findCategory($category)
    {
        try {
            $sql = "SELECT * FROM products WHERE category = :category";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $danhSach = [];
            foreach ($data as $value) {
                $product = new Product();
                $product->product_id = $value["product_id"];
                $product->name = $value["name"];
                $product->description = $value["description"];
                $product->price = $value["price"];
                $product->stock = $value["stock"];
                $product->img = $value["img"];
                $product->views = $value["views"];
                $product->category = $value["category"];
                array_push($danhSach, $product);
            }
            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm phân lớp thất bại";
        }
    }
    

    //xóa sản phẩm:
    public function delete($id)
    {

        try {
            $sql = "DELETE FROM `products` WHERE product_id =$id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Xóa thất bại";
        }
    }
}
