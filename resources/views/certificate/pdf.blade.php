<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&family=Great+Vibes&display=swap" rel="stylesheet">

  <meta charset="UTF-8">
  <title>Certificate - {{ $name }}</title>
  <style>
    @page {
      margin: 0;
      size: A4;
    }

    html, body {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 90%;
      background-color: #0D1B2A; /* from logo */
      
      
    }

    .wrapper {
      width: 80%;
      height: 90vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 50px;
      box-sizing: border-box;
    }

    .certificate-box {
      background: white;
      width: 100%;
      max-width: 700px;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(37,99 235, 0.35);
      text-align: center;
      position: relative;
      box-sizing: border-box;
    }

    .certificate-box img.logo {
      width: 80px;
      margin-bottom: 20px;
    }

    .certificate-box h1 {
      font-size: 24px;
      margin: 0 0 10px;
      
    }

    .certificate-box h2 {
      font-size: 22px;
      color: #2563EB;
      margin: 5px 0;
      
    }

    .certificate-box h3 {
      font-size: 20px;
      margin: 10px 0;
    }

    .certificate-box p {
      font-size: 14px;
      color: #333;
      margin: 6px 0;
      
    }

    .qr-container {
      margin-top: 15px;
    }

    .qr-container img {
      height: 90px;
    }

    .footer {
      margin-top: 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    .seal img, .sign img {
      height: 60px;
    }

    .sign-label {
      font-size: 10px;
      margin-top: 4px;
      color: #555;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="certificate-box">
      <img src="{{ public_path('images/logo.jpeg') }}" class="logo">
      <h1>Internship Certificate</h1>

      <p>This is to certify that</p>
      <h2>{{ $name }}</h2>
      <p>has successfully completed internship in</p>
      <h3>{{ $domain }}</h3>
      <p style="font-family: 'Garamond', serif;">with dedication and commendable performance during the internship period.</p>
      <p>We appreciate their valuable contribution and learning spirit.</p>

      <p><strong>Certificate ID:</strong> {{ $certificate_id }}</p>
      <p><strong>Issued On:</strong> {{ \Carbon\Carbon::parse($issue_date)->format('d M Y') }}</p>

     
      <div class="qr-container">
  <img src="data:image/svg+xml;base64,{{ $qr_code }}">
  <p style="font-size: 12px; margin: 10px 0;">
    Scan to verify:
    <a href="{{ route('certificate.verify', ['cert_id' => $certificate_id]) }}" style="display:inline-block; padding:6px 12px; background:#2563EB; color:white; border-radius:6px; text-decoration:none; font-size:13px; font-weight:bold;">
      Verify Certificate
    </a>
  </p>
</div>

<div class="buttons" style="margin-top: 16px;">
  <a href="{{ route('certificate.download', ['cert_id' => $certificate_id]) }}" style="display:inline-block; padding:10px 20px; background-color:#2563EB; color:white; font-weight:bold; font-size:13px; border-radius:6px; text-decoration:none; margin: 6px 10px;">
    Download PDF
  </a>
  <a href="{{ route('certificate.png', ['cert_id' => $certificate_id]) }}" style="display:inline-block; padding:10px 20px; background-color:#2563EB; color:white; font-weight:bold; font-size:13px; border-radius:6px; text-decoration:none; margin: 6px 10px;">
    Download PNG
  </a>
</div>

<div class="mt" style="margin-top: 12px;">
  <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" style="display:inline-block; padding:10px 20px; background-color:#2563EB; color:white; font-weight:bold; font-size:13px; border-radius:6px; text-decoration:none; margin: 6px 10px;">Share on LinkedIn</a>
  <a href="https://wa.me/?text={{ urlencode('Check out my internship certificate: ' . url()->current()) }}" style="display:inline-block; padding:10px 20px; background-color:#2563EB; color:white; font-weight:bold; font-size:13px; border-radius:6px; text-decoration:none; margin: 6px 10px;">Share on WhatsApp</a>
</div>


      <div class="footer">
        <div class="seal">
          <img src="{{ public_path('images/seal.png') }}" alt="Seal">
        </div>
        <div class="sign">
          <img src="{{ public_path('images/sign_manager.png') }}" alt="Signature">
          <p class="sign-label">John Smith<br>Manager<br>Authorized Signatory</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
