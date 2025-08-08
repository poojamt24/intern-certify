<!DOCTYPE html>
<html>
<head>
    <title>Certificate Verification</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 100px; background: #f5f5f5; }
        .verify-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            display: inline-block;
        }
        h1 { color: green; }
        .info p { font-size: 18px; margin: 8px 0; }
    </style>
</head>
<body>
    <div class="verify-box">
        <h1>✅ Certificate Verified</h1>
        <div class="info">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Domain:</strong> {{ $domain }}</p>
            <p><strong>Certificate ID:</strong> {{ $cert_id }}</p>
            <p><strong>Issued On:</strong> {{ $issue_date }}</p>
        </div>
    </div>
</body>
</html>
