<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragrance Library | Aromas Collective</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        :root {
            --aromas-red: #7E1A01;
            --aromas-sand: #AE9074;
            --aromas-white: #F2F1EE;
        }

        body {
            background-color: var(--aromas-white);
            font-family: 'Bodoni Moda', serif;
        }

        .library-header {
            padding: 60px 0;
            text-align: center;
            background-color: #fff;
            border-bottom: 1px solid var(--aromas-sand);
            margin-bottom: 50px;
        }

        .search-container {
            max-width: 600px;
            margin: -30px auto 0;
            position: relative;
            z-index: 5;
        }

        .search-input {
            border-radius: 0;
            border: 1px solid var(--aromas-sand);
            padding: 15px 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* Parfym-kort */
        .perfume-card {
            background: white;
            border: none;
            border-radius: 0;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            height: 100%;
        }

        .perfume-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .perfume-img-container {
            padding: 20px;
            background-color: #fcfcfc;
            text-align: center;
        }

        .perfume-img-container img {
            max-height: 250px;
            object-fit: contain;
        }

        .card-body {
            padding: 25px;
            text-align: center;
        }

        .brand-name {
            color: var(--aromas-sand);
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        .perfume-title {
            color: var(--aromas-red);
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        .btn-view {
            background-color: var(--aromas-red);
            color: white;
            border-radius: 0;
            padding: 10px 25px;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            border: none;
            transition: 0.3s;
        }

        .btn-view:hover {
            background-color: var(--aromas-sand);
            color: white;
        }
    </style>
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <header class="library-header">
        <div class="container">
            <h1 class="display-4" style="color: var(--aromas-red);">Discover Fragrances</h1>
            <p class="text-muted">Explore our curated collection of extraordinary scents.</p>
        </div>
    </header>

    <main class="container my-5">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="perfume-card shadow-sm">
                    <div class="perfume-img-container">
                        <img src="images/perfume-bottle-1.jpg" alt="Perfume Name" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <p class="brand-name">Chanel</p>
                        <h3 class="perfume-title">N°5 Eau de Parfum</h3>
                        <p class="small text-muted mb-4">Floral, Aldehydic, Powdery</p>
                        <a href="product.php?id=1" class="btn btn-view">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="perfume-card shadow-sm">
                    <div class="perfume-img-container">
                        <img src="images/perfume-bottle-2.jpg" alt="Perfume Name" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <p class="brand-name">Dior</p>
                        <h3 class="perfume-title">Sauvage</h3>
                        <p class="small text-muted mb-4">Citrus, Woody, Amber</p>
                        <a href="product.php?id=2" class="btn btn-view">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="perfume-card shadow-sm">
                    <div class="perfume-img-container">
                        <img src="images/perfume-bottle-3.jpg" alt="Perfume Name" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <p class="brand-name">Byredo</p>
                        <h3 class="perfume-title">Gypsy Water</h3>
                        <p class="small text-muted mb-4">Aromatic, Woody, Fresh Spicy</p>
                        <a href="product.php?id=3" class="btn btn-view">View Details</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <?php // include 'footer.php'; 
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>