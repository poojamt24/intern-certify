<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Generate Internship Certificate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom right, #050f24, #0d1c33); /* From logo */
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .container {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 90%;
      max-width: 480px;
      z-index: 10;
    }

    .logo-center {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 14px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    h1 {
      margin: 0 0 20px 0;
      font-size: 26px;
      color: #2c3e50;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-size: 16px;
      color: #555;
    }

    input[type="number"] {
      padding: 12px;
      width: 100%;
      font-size: 16px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-bottom: 20px;
      outline: none;
    }

    button {
      padding: 12px 25px;
      font-size: 16px;
      background: linear-gradient(to right, #4facfe, #00f2fe);
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    button:hover {
      background: linear-gradient(to right, #00f2fe, #4facfe);
    }

    footer {
      margin-top: 60px;
      font-size: 13px;
      color: #eee;
    }
  </style>
</head>
<body>

  <div class="container">
    <!-- Centered Logo Above Heading -->
    <img src="/images/logo.jpeg" alt="Logo" class="logo-center">
    <h1>🎓 Generate Internship Certificate</h1>

    <form action="{{ route('certificate.generate') }}" method="POST">
      @csrf
      <label for="user_id">Enter User ID</label>
      <input type="number" id="user_id" name="user_id" required>
      <button type="submit">🚀 Generate & Send Certificate</button>
    </form>
  </div>

  <footer>© 2025 ComputePool Solutions</footer>

</body>
</html>
