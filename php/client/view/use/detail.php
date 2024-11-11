<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eCommerce Product Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/chitietsanpham.css">
    <style>
        .color-option {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .color-option:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .stars .fa-star {
            color: #ffc107;
            /* Yellow color for checked stars */
        }

        .stars .fa-star.text-secondary {
            color: #e4e5e9;
            /* Light gray color for unchecked stars */
        }
            /* Main Image Styling */
    .main-image img {
        object-fit: cover;
        border-radius: 10px;
    }
    </style>
    
</head>

<body>
    <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.html'; ?>
    </header>

    <main>
        <div class="container py-5">
            <div class="row">
                <!-- Main Image -->
                <div class="col-md-6">
                    <div class="main-image">
                        <img id="main-img" src="<?= htmlspecialchars(BASE_URL . $DanhSachOne->img) ?>" class="img-fluid" />
                    </div>
                </div>

                <!-- Product Details Section (on the right) -->
                <div class="col-md-6">
                    <h3 class="card-title"><?= htmlspecialchars($DanhSachOne->name) ?></h3>
                    <div class="d-flex align-items-center mb-3">
                        <div class="stars">
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-secondary"></span>
                            <span class="fa fa-star text-secondary"></span>
                        </div>

                        <span class="ms-2"><?= htmlspecialchars($DanhSachOne->views) ?> reviews</span>
                    </div>
                    <h4 class="price">Giá bán: <span><?= htmlspecialchars($DanhSachOne->price) ?> vnd</span></h4>
                    <h5 class="mb-3">Màu sắc:</h5>
                    <div class="d-flex">
                        <img src="../../img/shoes/adidas/shoeA1.jpg" class="color-option" data-img="../../img/shoes/adidas/shoeA1.jpg" onclick="changeMainImage(this)" alt="Xanh" width="50" height="50">
                        <img src="../../img/shoes/adidas/shoeA2.jpg" class="color-option ms-2" data-img="../../img/shoes/adidas/shoeA2.jpg" onclick="changeMainImage(this)" alt="Đỏ" width="50" height="50">
                        <img src="../../img/shoes/adidas/shoeA3.jpg" class="color-option ms-2" data-img="../../img/shoes/adidas/shoeA3.jpg" onclick="changeMainImage(this)" alt="Đen" width="50" height="50">
                        <img src="../../img/shoes/adidas/shoeA4.jpg" class="color-option ms-2" data-img="../../img/shoes/adidas/shoeA4.jpg" onclick="changeMainImage(this)" alt="Trắng" width="50" height="50">
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success me-2" type="button"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                        <button class="btn btn-outline-danger" type="button">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="mt-3">
                        <p><?= htmlspecialchars($DanhSachOne->description) ?></p>
                    </div>
                </div>
            </div>

            <!-- Thumbnail Images (Optional) -->

        </div>
    </main>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>


    <!-- Custom Script to Change Main Image -->
    <script>
        // Change the main image based on the clicked color badge or thumbnail
        function changeMainImage(element) {
            var newImgSrc = element.getAttribute('data-img') || element.src; // Use data-img for color or src for thumbnails
            document.getElementById('main-img').src = newImgSrc;
        }
    </script>
</body>

</html>