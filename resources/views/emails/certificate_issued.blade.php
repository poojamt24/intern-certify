<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Internship Certificate</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f1f5f9;
            padding: 40px 0;
        }

        .container {
            max-width: 640px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(13, 27, 42, 0.2);
            padding: 40px;
            color: #0D1B2A;
        }

        h2 {
            font-size: 24px;
            color: #2563EB;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #334155;
        }

        .button {
            display: inline-block;
            margin: 20px 0;
            padding: 12px 28px;
            background-color: #2563EB;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #64748B;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            height: 60px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ $message->embed(public_path('images/logo.jpeg')) }}" alt="ComputePool Solutions Logo" class="logo">

        <h2>Hello {{ $name }},</h2>

        <p>🎉 <strong>Congratulations</strong> on successfully completing your internship in the <strong>{{ $course }}</strong> domain!</p>

        <p>Your certificate ID is <strong>{{ $cert_id }}</strong>.</p>

        <p>You can download your certificate using the button below:</p>

        <p style="text-align: center;">
            <a href="{{ $download_link }}" class="button">📄 Download PDF</a>
        </p>

        <p>🔒 You can also verify your certificate using the link embedded inside the certificate itself.</p>

        <div class="footer">
            <p>Thank you for being a part of <strong>ComputePool Solutions</strong>!<br>We wish you continued success in your future endeavors.</p>
            <br>
            <p>Regards,<br><strong>ComputePool Solutions Team</strong></p>
        </div>
    </div>
</body>
</html>
