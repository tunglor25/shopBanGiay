<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Website Bán Giày Converse</title>

    <style>
        * {vertical-align: middle;}
        .tdBtn{
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/header.html'; ?>
    </header>

    <div class="container">
        <h3 class="text-center my-3">Trang Danh Sách Người Dùng</h3>

        <div class="container-table">
            <table class="table table-bordered  ">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Ảnh người dùng</th>
                        <th>Phân loại</th>
                        <th>Mô tả</th>
                        <th>Giá cả</th>
                        <th>Số lượng</th>
                        <th>Lượt xem</th>
                        <th colspan="2"><a href="?act=product-create" class="btn btn-primary">Thêm mới</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($DanhSachUsers as $product) { ?>
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
                            <td class="tdBtn">
                                <!-- Nút Sửa -->
                                <a href="?act=product-update&id=<?= htmlspecialchars($product->product_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>
                            <td class="tdBtn">
                                <!-- Nút Xóa -->
                                <a href="?act=product-delete&id=<?= htmlspecialchars($product->product_id) ?>" onclick="return confirm('Bạn có chắc xóa?')" class="btn btn-danger btn-xs">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/footer.html'; ?>
    </footer>
</body>

</html>
