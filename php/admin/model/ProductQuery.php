<?php

class ProductQuery
{
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;port=3306;dbname=duan1", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Kết nối database thất bại";
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    // Find all products with category names
    public function all()
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            
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
                $product->category = $value["category_name"];

                array_push($danhSach, $product);
            }

            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm tất cả thất bại";
        }
    }

    // Find a single product by ID
    public function find($id)
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id
                    WHERE p.product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                $product = new Product();
                $product->product_id = $data["product_id"];
                $product->name = $data["name"];
                $product->description = $data["description"];
                $product->price = $data["price"];
                $product->stock = $data["stock"];
                $product->img = $data["img"];
                $product->views = $data["views"];
                $product->category = $data["category_name"];

                return $product;
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm sản phẩm thất bại";
        }
    }

    // Insert a new product
    public function insert(Product $product)
    {
        try {
            $sql = "INSERT INTO products (name, price, img, description, stock, views, category_id) 
                    VALUES (:name, :price, :img, :description, :stock, :views, :category_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $product->name,
                ':price' => $product->price,
                ':img' => $product->img,
                ':description' => $product->description,
                ':stock' => $product->stock,
                ':views' => $product->views,
                ':category_id' => $product->category_id
            ]);

            return "ok";
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Thêm mới thất bại";
        }
    }

    // Update an existing product
    public function update(Product $product, $id)
    {
        try {
            $sql = "UPDATE products SET 
                    name = :name,
                    description = :description,
                    price = :price,
                    stock = :stock,
                    img = :img,
                    views = :views,
                    category_id = :category_id
                    WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $product->name,
                ':description' => $product->description,
                ':price' => $product->price,
                ':stock' => $product->stock,
                ':img' => $product->img,
                ':views' => $product->views,
                ':category_id' => $product->category_id,
                ':id' => $id
            ]);

            return "ok";
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Cập nhật thất bại";
        }
    }

    // Find products by category
    public function findCategory($category)
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id
                    WHERE c.name = :category";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                $product->category = $value["category_name"];

                array_push($danhSach, $product);
            }

            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm phân lớp thất bại";
        }
    }

    // Delete a product
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return "ok";
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Xóa thất bại";
        }
    }
}
