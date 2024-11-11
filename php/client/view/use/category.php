<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/chitietsanpham.css">
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome -->
    <title>Website Bán Giày Converse</title>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.html'; ?>
    </header>

    <main>
        <section id="featured-products" class="my-4">
            <h2 class="text-center mb-4">Sản Phẩm Nổi Bật</h2>

            <div class="row g-4">

                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <aside id="sidebar" class="bg-light p-3 rounded">
                        <h2 class="fs-4">Danh Mục Nổi Bật</h2>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/watch/watch3.jpg" alt="Giày Nam" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="#">Giày Nam</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/shoes/lacoste/shoeL4.jpg" alt="Giày Nữ" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="#">Giày Nữ</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/watch/watch5.jpg" alt="Giày Trẻ Em" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="#">Giày Trẻ Em</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/bags/bag2.webp" alt="Khuyến Mãi" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="#">Khuyến Mãi</a>
                            </li>
                        </ul>
                    </aside>
                </div>

                <!-- Featured Products -->
                <div class="col-lg-9 col-md-8">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                        <?php foreach ($DanhSachCategory as $product) { ?>
                            <div class="col mb-4">
                                <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                    <div class="card product-item">
                                        <div class="product-thumb">
                                            <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="Product Image">
                                            <div class="product-action-link">
                                                <button class="btn cart-btn">
                                                    <i class="bi bi-cart-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
                                            <p class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="stretched-link">Xem Chi Tiết</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </section>

        <!-- Additional Products Section -->
        <section id="display-products" class="my-4">
            <h2 class="text-center mb-4">Sản Phẩm Khác</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5">
                <?php
                // Limit to 5 products for "Sản Phẩm Khác"
                $limitedProducts = array_slice($DanhSachobject, 0, 5);
                foreach ($limitedProducts as $product) { ?>
                    <div class="col mb-4">
                        <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                            <div class="card product-item">
                                <div class="product-thumb">
                                    <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="Product Image">
                                    <div class="product-action-link">
                                        <button class="btn cart-btn">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
                                    <p class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</p>
                                </div>
                                <div class="card-footer">
                                    <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="stretched-link">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>

    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>
