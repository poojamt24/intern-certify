<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AdminController;




// Home page - show form to enter User ID and generate certificate
Route::get('/', [CertificateController::class, 'showGenerateForm']);

// Form submission to generate certificate
Route::post('/generate', [CertificateController::class, 'generateViaForm'])->name('certificate.generate');

// View a certificate by ID
Route::get('/certificate/{cert_id}', [CertificateController::class, 'viewCertificate'])->name('certificate.view');

// Download certificate as PDF
Route::get('/certificate/{cert_id}/download', [CertificateController::class, 'downloadPdf'])->name('certificate.download');

// Download certificate as PNG
Route::get('/certificate/png/{cert_id}', [CertificateController::class, 'downloadPng'])->name('certificate.png');



// Certificate verification form and submission
Route::get('/verify', [CertificateController::class, 'showVerifyForm'])->name('certificate.verify');
Route::post('/verify', [CertificateController::class, 'verify'])->name('certificate.verify.post');
Route::get('/verify', [CertificateController::class, 'directVerify']);

Route::get('/verify', [CertificateController::class, 'directVerify'])->name('certificate.verify');
Route::get('/test-pdf', [CertificateController::class, 'testPDF']);








// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/certificates', [AdminController::class, 'listCertificates'])->name('admin.certificates');
    Route::post('/certificates/approve/{cert_id}', [AdminController::class, 'approveCertificate'])->name('admin.certificates.approve');
    Route::delete('/certificates/delete/{cert_id}', [AdminController::class, 'deleteCertificate'])->name('admin.certificates.delete');
});
