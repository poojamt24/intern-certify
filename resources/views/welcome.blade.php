<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Internship Certificate System</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-800">
  <div class="min-h-screen flex flex-col justify-center items-center space-y-10 py-10 px-4">
    <h1 class="text-3xl font-bold text-center">ComputePool Solutions - Internship Certificate System</h1>

    <form method="POST" action="{{ route('certificate.generate') }}" class="space-y-4 w-full max-w-sm">
      @csrf
      <label class="block text-sm font-medium">Enter User ID:</label>
      <input type="number" name="user_id" required class="w-full border px-3 py-2 rounded shadow" placeholder="Enter user ID (e.g. 2)">
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Generate Certificate</button>
    </form>

    <form method="POST" action="{{ route('certificate.verify') }}" class="space-y-4 w-full max-w-sm">
      @csrf
      <label class="block text-sm font-medium">Verify Certificate ID:</label>
      <input type="text" name="cert_id" required class="w-full border px-3 py-2 rounded shadow" placeholder="Enter certificate ID">
      <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Verify</button>
    </form>
  </div>
</body>
</html>
