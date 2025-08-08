<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Certificates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Certificate Management Panel</h1>

        @if($certificates->isEmpty())
            <div class="text-center text-red-500 text-lg">No certificates generated yet.</div>
        @else
            <table class="w-full bg-white shadow-lg rounded-md overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3">Cert. ID</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">User ID</th>
                        <th class="p-3">Domain</th>
                        <th class="p-3">Issued</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificates as $cert)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3 font-mono">{{ $cert->cert_id }}</td>
                            <td class="p-3">{{ $cert->user->full_name ?? 'N/A' }}</td>
                            <td class="p-3">{{ $cert->user->userid ?? 'N/A' }}</td>
                            <td class="p-3">{{ $cert->user->domain ?? $cert->course->name ?? 'N/A' }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($cert->issued_on)->toDateString() }}</td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('certificate.view', $cert->cert_id) }}" target="_blank" class="text-blue-600 hover:underline">View</a>
                                <a href="{{ route('certificate.download', $cert->cert_id) }}" class="text-green-600 hover:underline">PDF</a>
                                <a href="{{ url("/certificate/{$cert->cert_id}/png") }}" class="text-purple-600 hover:underline">PNG</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="text-center mt-8">
            <a href="/" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">← Back to Home</a>
        </div>
    </div>
</body>
</html>
