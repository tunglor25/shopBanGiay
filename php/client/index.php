<?php
define("BASE_URL", "http://localhost/shopBanGiay/php/");
// 1. Nhúng các file cần thiết
include_once "controller/ProductController.php";
include_once "model/Product.php";
include_once "model/ProductQuery.php";


// 2. Giới thiệu cách người dùng sẽ tương tác với phần mềm
// Người dùng sẽ sử dụng đường url để thể hiển tương tác của mình
// VD: Nếu muốn truy cập trang danh sách --> Người dùng sẽ truyền param ?act=product-list lên đường dẫn url
// VD: Nếu muốn truy cập trang chi tiết với id=3 --> Người dùng sẽ truyền param ?act=detail&id=3 lên đường đẫn url

// 2.1. Lấy giá trị param "act" từ đường dẫn url
$act = "";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    //echo $act . "<br>";
}

// 2.2. Lấy giá trị "id" từ đường dẫn url
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    //echo $id . "<br>";
}
$category = "";
if (isset($_GET["category"])) {
    $category = $_GET["category"];
    //echo $category . "<br>";
}


// 3. Kiểm tra giá trị act và gọi phương thức tương ứng
switch ($act) {
    case "":
        header("Location: ?act=client-list");
        break;

    case "client-list":
        $productCtrl = new ProductController();
        $productCtrl->showList();
        break;

    case "client-create":
        $productCtrl = new ProductController();
        $productCtrl->showCreate();
        break;

    case "client-category":
        $productCtrl = new ProductController();
        $productCtrl->showCategory($category);
        break;

    case "client-detail":
        $productCtrl = new ProductController();
        $productCtrl->showDetail($id);
        break;

    case "client-update":
        $productCtrl = new ProductController();
        $productCtrl->showUpdate($id);
        break;

    case "client-delete":
        $productCtrl = new ProductController();
        $productCtrl->showDelete($id);
        break;

    default:
        include "view/404.php";
        break;
}
