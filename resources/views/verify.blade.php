@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
  <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-md">
    <h2 class="text-2xl font-semibold text-center text-blue-700 mb-4">🔍 Verify Certificate</h2>

    @if(session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
      </div>
    @endif

    <form action="{{ route('certificate.verify') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="cert_id" class="block text-gray-700 font-medium mb-2">Enter Certificate ID</label>
        <input type="text" id="cert_id" name="cert_id" required class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        ✅ Verify
      </button>
    </form>
  </div>
</div>
@endsection
