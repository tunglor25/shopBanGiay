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
        include "view/product/list.php";
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
        // Hiển thị file viewif ($id !== "") {
        $loi_ten = "";
        $loi_anh = "";
        $loi_price = "";
        $loi_description = "";
        $loi_stock = "";
        $loi_views = "";
        $baoThanhCong = "";
        if (isset($_POST["submitForm"])) {
            $product = new Product();
            $product->name = $_POST["name"];
            //  $product->img=$_POST["img"];
            $product->stock = $_POST["stock"];
            $product->price = $_POST["price"];
            $product->description = $_POST["description"];
            $product->views = $_POST["views"];

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

            $thanSo01 = $_FILES['fileUpload']['tmp_name']; //Bộ nhớ tạm đang lưu trữ file
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; // Đường dẫn để chuyển file từ bộ nhớ tạm vào
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $product->img = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không uplod lên đc";
            }

            if ($loi_ten === "" && $loi_anh === "" && $loi_price === "" && $loi_description === "" && $loi_stock === "" && $loi_views === "") {
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
    public function showDetail($id)
    {
        if ($id !== "") {
            // Tăng lượt xem
            //$this->productQuery->incrementViews($id);

            // Lấy thông tin chi tiết sản phẩm
            $DanhSachOne = $this->productQuery->find($id);
            include "view/use/detail.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
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

                if ($_POST["name"] === "") {
                    $loi_ten = "Hãy nhập tên giày đi !!";
                }
                if ($_POST["price"] === "") {
                    $loi_price = "Hãy nhập giá giày đi!!";
                }
                if ($_POST["description"] === "") {
                    $loi_description = "Hãy nhập mô tả giày đi!!";
                }
                if ($_POST["brand"] === "") {
                    $loi_brand = "Hãy nhập hãng giày đi!!";
                }
                if ($_POST["category"] === "") {
                    $loi_category = "Hãy chọn phân loại giày đi!!";
                }


                $thanSo01 = $_FILES['fileUpload']['tmp_name']; //Bộ nhớ tạm đang lưu trữ file
                $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; // Đường dẫn để chuyển file từ bộ nhớ tạm vào
                if (move_uploaded_file($thanSo01, $thanSo02)) {
                    $product->img = "upload/" . $_FILES['fileUpload']['name'];
                    $loi_anh = "";
                } else {
                    $loi_anh = "Không uplod lên đc";
                }
                if ($loi_ten === "" && $loi_anh === "" && $loi_price === "" && $loi_description === "" && $loi_stock === "" && $loi_views === "") {
                    $baoThanhCong = "Bạn đã cập nhập ok";
                    $dataUpdate = $this->productQuery->update($product, $id);
                    if ($dataUpdate == "ok") {
                        header("location:?act=product-list");
                    }
                }
            }
            include "view/product/update.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }
}
