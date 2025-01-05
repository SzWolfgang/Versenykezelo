<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Versenykezelő Alkalmazás</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .hero-section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            overflow: hidden;
        }

        .hero-text {
            text-align: center;
            opacity: 0;
            animation: fadeIn 2s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>
    @include('navbar')
    <div class="hero-section">
        <div class="hero-text">
            <h1>Üdvözlünk a Versenykezelő Alkalmazásban</h1>
            <p>Kezeld egyszerűen és hatékonyan a versenyeidet!</p>
        </div>
    </div>
    @include('footer')
</body>
</html>
