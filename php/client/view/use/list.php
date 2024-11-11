
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/styleindex.css">
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .slide {
            width: 100%;
            height: 500px;
            overflow: hidden;
        }
    </style>
    <title>Website Bán Giày Converse</title>
</head>

<body>
    <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.html'; ?>
    </header>

    <!-- slideshow -->
    <div class="slider">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/slideshow.html'; ?>
    </div>

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
                                <a href="?act=client-category&category=Giày nam" class="text-decoration-none">Giày Nam</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/shoes/lacoste/shoeL4.jpg" alt="Giày Nữ" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="?act=client-category&category=Giày nữ" class="text-decoration-none">Giày Nữ</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/watch/watch5.jpg" alt="Giày Trẻ Em" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="?act=client-category&category=Giày trẻ em" class="text-decoration-none">Giày Trẻ Em</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/bags/bag2.webp" alt="Khuyến Mãi" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="#" class="text-decoration-none">Khuyến Mãi</a>
                            </li>
                        </ul>
                    </aside>
                </div>


                <!-- Featured Products -->
                <div class="col-lg-9 col-md-8">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        <?php foreach ($DanhSachobject as $product) { ?>
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

        <!-- Additional Products -->
        <section id="display-products" class="my-4">
            <h2 class="text-center mb-4">Sản Phẩm</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <div class="col">
                    <div class="card">
                        <img src="../../img/shoes/lacoste/shoeL2.jpg" class="card-img-top" alt="Trưng bày 1" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Trưng bày 1</h5>
                            <p class="card-text">Giá: 800,000 VNĐ</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-dark">Thêm vào giỏ hàng</button>
                                <button class="btn btn-success">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../../img/shoes/nike/shoe4.jpg" class="card-img-top" alt="Trưng bày 2" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Trưng bày 2</h5>
                            <p class="card-text">Giá: 1,200,000 VNĐ</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-dark">Thêm vào giỏ hàng</button>
                                <button class="btn btn-success">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../../img/shoes/lacoste/shoeL5.jpg" class="card-img-top" alt="Trưng bày 3" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Trưng bày 3</h5>
                            <p class="card-text">Giá: 950,000 VNĐ</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-dark">Thêm vào giỏ hàng</button>
                                <button class="btn btn-success">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../../img/shoes/lacoste/shoeL3.jpg" class="card-img-top" alt="Trưng bày 4" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Trưng bày 4</h5>
                            <p class="card-text">Giá: 750,000 VNĐ</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-dark">Thêm vào giỏ hàng</button>
                                <button class="btn btn-success">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>