<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internship Certificate</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .certificate-container {
            width: 1000px;
            margin: 40px auto;
            padding: 40px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            border: 10px solid #ccc;
            position: relative;
            background-image: url('{{ public_path("images/bg_watermark.png") }}');
            background-size: 300px;
            background-repeat: no-repeat;
            background-position: center;
        }
        .logo {
            width: 120px;
        }
        .seal {
            width: 100px;
            position: absolute;
            bottom: 60px;
            right: 40px;
        }
        .signature {
            width: 150px;
            position: absolute;
            bottom: 60px;
            left: 60px;
        }
        .title {
            font-size: 36px;
            font-weight: bold;
            color: #003366;
            text-align: center;
            margin-top: 20px;
        }
        .subtitle {
            font-size: 18px;
            color: #555;
            text-align: center;
        }
        .content {
            margin-top: 50px;
            font-size: 18px;
            line-height: 1.6;
            color: #222;
            text-align: center;
        }
        .cert-id {
            margin-top: 40px;
            font-size: 14px;
            color: #999;
            text-align: right;
        }
        .btns {
            text-align: center;
            margin-top: 40px;
        }
        .btns a {
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div style="text-align:center;">
            <img src="{{ public_path('images/logo.jpeg') }}" class="logo">
        </div>
        <div class="title">Certificate of Completion</div>
        <div class="subtitle">This is to proudly certify that</div>

        <div class="content">
            <h2>{{ $name }}</h2>
            has successfully completed the internship in <strong>{{ $domain }}</strong><br>
            at <strong>ComputePool Solutions</strong>.
            <br><br>
            <em>We truly appreciate the dedication, commitment, and enthusiasm demonstrated during the internship. Wishing you continued success and many more accomplishments ahead!</em>
        </div>

        <div class="cert-id">
            Certificate ID: <strong>{{ $cert_id }}</strong>
        </div>

        <img src="{{ public_path('images/seal.png') }}" class="seal">
        <img src="{{ public_path('images/sign_manager.png') }}" class="signature">

        <div class="btns">
            <a href="{{ route('certificate.download.pdf', ['cert_id' => $cert_id]) }}">Download PDF</a>
            <a href="{{ route('certificate.verify', ['cert_id' => $cert_id]) }}" class="btn" style="padding:10px 20px; background:#28a745; color:white; text-decoration:none; border-radius:5px;">Verify Certificate</a>

        </div>
    </div>
</body>
</html>
