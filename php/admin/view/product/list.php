<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Website Bán Giày Converse</title>
</head>

<body>
    <header>
        <?php include '../html/header.html'; ?>
    </header>

    <div class="container">
        <a href="?act=product-create" class="btn btn-primary">Trang tạo mới</a>
        <h3>Trang Danh Sách Sản Phẩm</h3>
        <div class="container-table">
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Phân loại</th>
                        <th>Mô tả</th>
                        <th>Giá cả</th>
                        <th>Số lượng tồn kho</th>
                        <th>Số lượng xem</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($DanhSachobject as $product) { ?>
                        <tr>
                            <td><?= htmlspecialchars($product->product_id) ?></td>
                            <td><?= htmlspecialchars($product->name) ?></td>
                            <td>
                                <div class="anh">
                                    <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" style="width: 100px; height: 100px;" alt="Product Image">
                                </div>
                            </td>
                            <td><?= htmlspecialchars($product->category) ?></td>
                            <td><?= htmlspecialchars($product->description) ?></td>
                            <td><?= htmlspecialchars($product->price) ?></td>
                            <td><?= htmlspecialchars($product->stock) ?></td>
                            <td><?= htmlspecialchars($product->views) ?></td>
                            <td>
                                <a href="?act=product-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="btn btn-info btn-xs">Xem chi tiết</a>
                                <a href="?act=product-update&id=<?= htmlspecialchars($product->product_id) ?>" class="btn btn-warning btn-xs">Sửa</a>
                                <a href="?act=product-delete&id=<?= htmlspecialchars($product->product_id) ?>" onclick="return confirm('Bạn có chắc xóa?')" class="btn btn-danger btn-xs">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <?php include '../html/footer.html'; ?>
    </footer>
</body>


</html>