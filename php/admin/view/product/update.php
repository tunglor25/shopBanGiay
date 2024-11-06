<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <title></title>
    <style>
        form {
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            background-color: #f8f9fa;
        }

        .form-input,
        .form-select {
            width: 100%;
        }

        .text-danger {
            color: red;
        }

        .text-success {
            color: green;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form method="post" enctype="multipart/form-data" class="mx-auto" style="max-width: 800px;">
            <?php if (!empty($baoThanhCong)) { ?>
                <div class="alert alert-success text-center mb-4"><?= htmlspecialchars($baoThanhCong) ?></div>
            <?php } ?>
            <h3 class="text-center mb-4">Trang Tạo Mới Sản Phẩm</h3>

            <div class="mb-3">
                <label for="name" class="form-label">Nhập tên giày</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($DanhSachOne->name) ?>">
                <div class="text-danger"><?= htmlspecialchars($loi_ten) ?></div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Nhập giá giày</label>
                <input type="text" name="price" id="price" class="form-control" value="<?= htmlspecialchars($DanhSachOne->price) ?>">
                <div class="text-danger"><?= htmlspecialchars($loi_price) ?></div>
            </div>

            <div class="mb-3">
                <label for="fileUpload" class="form-label">Nhập hình ảnh giày</label>
                <input type="file" name="fileUpload" id="fileUpload" class="form-control" value="<?= htmlspecialchars($DanhSachOne->img) ?>">
                <div class="text-danger"><?= htmlspecialchars($loi_anh) ?></div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Nhập miêu tả giày</label>
                <input type="text" name="description" id="description" class="form-control" value="<?= htmlspecialchars($DanhSachOne->description) ?>">
                <div class="text-danger"><?= htmlspecialchars($loi_description) ?></div>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Nhập số lượng giày</label>
                <input type="number" name="stock" id="stock" class="form-control" value="<?= htmlspecialchars($DanhSachOne->stock) ?>">
                <div class="text-danger"><?= htmlspecialchars($loi_stock) ?></div>
            </div>
            <div class="mb-3">
                <label for="views" class="form-label">Nhập số lượng xem giày</label>
                <input type="number" name="views" id="views" class="form-control" value="<?= htmlspecialchars($DanhSachOne->views) ?>">
                <div class="text-danger"><?= htmlspecialchars($loi_views) ?></div>
            </div>



            <div class="text-center">
                <button type="submit" name="submitForm" class="btn btn-success">Lưu lại</button>
                <a href="?act=product-list" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

    <footer>

    </footer>
</body>

</html>