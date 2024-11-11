<?php

// 1. Khai báo class ProductController
class ProductController
{
    // Khai báo thuộc tính
    public $productQuery;



    // Khai báo phương thức 
    public function __construct()
    {
        $this->productQuery = new ProductQuery();
    }

    public function __destruct()
    {
        // Code...
    }

    // Khái báo phương thức showList() để xử lý trường hợp người dùng truy cập trang danh sách
    public function showList()
    {
        // Hiển thị file view tương ứng. Hiển thị file list.php
        $DanhSachobject = $this->productQuery->all();
        include "view/use/list.php";
    }



    public function showDetail($id)
    {
        $DanhSachOne = $this->productQuery->find($id);
        include "view/use/detail.php";
        
    }

    public function showDelete($product_id)
    {
        if ($product_id != "") {
            //1> gọi xuống model để xóa
            $dataDelete = $this->productQuery->delete($product_id);
            //2.cuyển hướng về trang danh sách
            if ($dataDelete === "ok") {
                header("location:?act=product-list");
            }
        } else {
            echo "Lỗi không tìm thấy id này!";
        }
    }

    // Khái báo phương thức showCreate() để xử lý trường hợp người dùng truy cập trang tạo mới
    public function showCreate()
    {
        // Initialize variables
        $loi_ten = "";
        $loi_anh = "";
        $loi_price = "";
        $loi_description = "";
        $loi_stock = "";
        $loi_views = "";
        $loi_category = "";
        $baoThanhCong = "";
    
        if (isset($_POST["submitForm"])) {
            $product = new Product();
            
            // Retrieve form data with isset check
            $product->name = $_POST["name"] ?? '';
            $product->stock = $_POST["stock"] ?? '';
            $product->price = $_POST["price"] ?? '';
            $product->description = $_POST["description"] ?? '';
            $product->views = $_POST["views"] ?? '';
            $product->category = $_POST["category"] ?? '';
    
            // Validation
            if ($product->name === "") {
                $loi_ten = "Hãy nhập tên giày đi!!";
            }
            if ($product->price === "") {
                $loi_price = "Hãy nhập giá giày đi!!";
            }
            if ($product->description === "") {
                $loi_description = "Hãy nhập mô tả giày đi!!";
            }
            if ($product->stock === "") {
                $loi_stock = "Hãy nhập số lượng giày đi!!";
            }
            if ($product->views === "") {
                $loi_views = "Hãy nhập lượt xem giày đi!!";
            }
            if ($product->category === "") {
                $loi_category = "Hãy chọn phân loại giày đi!!";
            }
    
            // File upload
            $thanSo01 = $_FILES['fileUpload']['tmp_name'];
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $product->img = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không upload lên đc";
            }
    
            // If no errors, insert product
            if ($loi_ten === "" && $loi_anh === "" && $loi_price === "" && $loi_description === "" && $loi_stock === "" && $loi_views === "" && $loi_category === "") {
                $baoThanhCong = "Bạn đã cập nhập ok";
                $dataCreated = $this->productQuery->insert($product);
                if ($dataCreated == "ok") {
                    $product = new Product();
                }
            }
        }
    
        include "view/product/create.php";
    }
    

    // Khái báo phương thức showDetail($id) để xử lý trường hợp người dùng truy cập trang chi tiết
    // Lưu ý: Phải nhận vào param là $id muốn xem xem chi tiết
    public function showCategory($category)
    {
        $category = $category;
        
        $DanhSachobject = $this->productQuery->all();
        $DanhSachCategory = $this->productQuery->findCategory($category);
            include "view/use/category.php";
        
    }

    // Khái báo phương thức showUpdate($id) để xử lý trường hợp người dùng truy cập trang chỉnh sửa
    // Lưu ý: Phải nhận vào param là $id muốn xem chỉnh sửa
    public function showUpdate($id)
    {
        if ($id !== "") {
            $loi_ten = "";
            $loi_anh = "";
            $loi_price = "";
            $loi_description = "";
            $loi_stock = "";
            $loi_views = "";
            $loi_category="";
            $baoThanhCong = "";
            $DanhSachOne = $this->productQuery->find($id);
            if (isset($_POST["submitForm"])) {
                $product = new Product();
            $product->name = $_POST["name"];
            //  $product->img=$_POST["img"];
            $product->stock = $_POST["stock"];
            $product->price = $_POST["price"];
            $product->description = $_POST["description"];
            $product->views = $_POST["views"];
            $product->category=$_POST["category"];

            if ($_POST["name"] === "") {
                $loi_ten = "Hãy nhập tên giày đi!!";
            }
            if ($_POST["price"] === "") {
                $loi_price = "Hãy nhập giá giày đi!!";
            }
            if ($_POST["description"] === "") {
                $loi_description = "Hãy nhập mô tả giày đi!!";
            }
            if ($_POST["stock"] === "") {
                $loi_stock = "Hãy nhập số lượng giày đi!!";
            }
            if ($_POST["views"] === "") {
                $loi_views = "Hãy nhập lượt xem giày đi!!";
            }
            if ($_POST["category"]==="") {
                $loi_category="Hãy chọn phân loại giày đi!!";
            }


                $thanSo01 = $_FILES['fileUpload']['tmp_name']; //Bộ nhớ tạm đang lưu trữ file
                $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; // Đường dẫn để chuyển file từ bộ nhớ tạm vào
                if (move_uploaded_file($thanSo01, $thanSo02)) {
                    $product->img = "upload/" . $_FILES['fileUpload']['name'];
                    $loi_anh = "";
                } else {
                    $loi_anh = "Không uplod lên đc";
                }
                if ($loi_ten === "" && $loi_anh === "" && $loi_price === "" && $loi_description === "" && $loi_stock === "" && $loi_views === ""&&$loi_category==="") {
                    $baoThanhCong = "Bạn đã cập nhập ok";
                    $dataCreated = $this->productQuery->update($product , $id);
                    if ($dataCreated == "ok") {
                        $product = new Product();
                    }
                }
            }
            include "view/product/update.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }
}
