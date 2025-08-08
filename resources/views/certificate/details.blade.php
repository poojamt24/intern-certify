<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate - {{ $user->full_name ?? 'Intern' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-900 py-12 px-4">
  <div class="max-w-3xl mx-auto border border-gray-300 shadow-xl rounded-xl p-10 text-center space-y-4">
    <h1 class="text-3xl font-bold">Internship Certificate</h1>
    <p class="text-lg">This is to certify that</p>

    <h2 class="text-2xl font-semibold text-blue-600">{{ $user->full_name }}</h2>
    <p>(User ID: {{ $user->id }})</p>

    <p class="text-lg">has successfully completed internship in</p>
    <h3 class="text-xl font-semibold">{{ $course->name }}</h3>

    <div class="mt-6 text-sm text-left">
      <p><strong>Certificate ID:</strong> {{ $cert->cert_id }}</p>
      <p><strong>Issued On:</strong> {{ \Carbon\Carbon::parse($cert->issued_on)->toFormattedDateString() }}</p>
    </div>

    <div class="mt-6">
      <img src="data:image/svg+xml;base64,{{ $qr }}" alt="QR Code" class="h-32 mx-auto">
      <p class="text-xs text-gray-500 mt-2">Scan to verify: <a href="{{ url('/verify?cert_id=' . $cert->cert_id) }}" class="text-blue-500 underline">Verify Certificate</a></p>
    </div>

    <div class="mt-8 space-x-4">
      <a href="{{ route('certificate.download', ['cert_id' => $cert->cert_id]) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Download PDF</a>
      <a href="{{ route('certificate.png', ['cert_id' => $cert->cert_id]) }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Download PNG</a>
    </div>

    <div class="mt-6 flex justify-center gap-4">
      <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" target="_blank" class="text-blue-700 underline">Share on LinkedIn</a>
      <a href="https://wa.me/?text={{ urlencode('Check out my internship certificate: ' . url()->current()) }}" target="_blank" class="text-green-600 underline">Share on WhatsApp</a>
    </div>
  </div>
</body>
</html>
