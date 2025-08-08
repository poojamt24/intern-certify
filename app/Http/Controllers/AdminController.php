<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificate;
use App\Models\Course;

class AdminController extends Controller
{
    // Show admin dashboard
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCertificates = Certificate::count();
        $totalCourses = Course::count();

        return view('admin.dashboard', compact('totalUsers', 'totalCertificates', 'totalCourses'));
    }

    // List all users
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // List all certificates
    public function certificates()
    {
        $certificates = Certificate::with('user', 'course')->latest()->get();
        return view('admin.certificates', compact('certificates'));
    }

    // List all courses
    public function courses()
    {
        $courses = Course::all();
        return view('admin.courses', compact('courses'));
    }

    // Show certificate details
    public function showCertificate($cert_id)
    {
        $certificate = Certificate::where('cert_id', $cert_id)->firstOrFail();
        $user = $certificate->user;
        $course = $certificate->course;

        return view('certificate.details', compact('certificate', 'user', 'course'));
    }

    // Delete certificate (optional)
    public function deleteCertificate($cert_id)
    {
        $certificate = Certificate::where('cert_id', $cert_id)->first();

        if ($certificate) {
            $certificate->delete();
            return redirect()->back()->with('success', 'Certificate deleted successfully.');
        }

        return redirect()->back()->with('error', 'Certificate not found.');
    }
}
