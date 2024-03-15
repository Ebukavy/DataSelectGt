<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-brand {
            font-size: 1.5rem;
            color: #ffffff; 
        }

        .navbar-nav .nav-link {
            color: #ffffff; 
        }

        .navbar-toggler {
            border-color: #ffffff; 
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .navbar-collapse {
            background-color: #343a40; 
        }

        .nav-link:hover {
            color: #17a2b8 !important; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/Dbase/index.php">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/Dbase/reserveringen/add-reserveringen.php">Reserveringen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Dbase/rekening/add-rekening.php">Rekening</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Dbase/product/add-product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Dbase/tafel/add-tafel.php">Tafel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Dbase/klant/add-klant.php">Klant</a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>
