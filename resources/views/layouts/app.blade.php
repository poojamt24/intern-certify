<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Certificate System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 40px;
        }
        .certificate-box {
            background: white;
            border: 1px solid #ccc;
            padding: 30px;
            border-radius: 10px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        footer {
            margin-top: 40px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

<footer>
    <p>&copy; {{ date('Y') }} ComputePool Solutions</p>
</footer>

</body>
</html>
