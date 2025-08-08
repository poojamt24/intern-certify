<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Mail\CertificateIssuedMail;
use App\Models\Certificate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf; // ✅ THIS LINE FIXES YOUR ERROR
use Illuminate\Support\Str;






class CertificateController extends Controller
{
    public function showGenerateForm()
    {
        return view('generate');
    }

    public function generateViaForm(Request $request)
    {
        $request->validate(['user_id' => 'required|integer']);

        $user = DB::table('internship_applications')->where('id', $request->user_id)->first();
        if (!$user) return back()->with('error', 'User not found.');

        $cert_id = 'CMP2025-' . strtoupper(Str::random(8));
        $issue_date = now()->toDateString();
        $domain = $user->domain;
        $name = $user->full_name;
        $email = $user->email;

        $pdf = Pdf::loadView('certificate.pdf', [
            'name'           => $name,
            'userid'         => $user->id,
            'domain'         => $domain,
            'issue_date'     => $issue_date,
            'certificate_id' => $cert_id,
            'qr_code' => base64_encode(QrCode::format('svg')->size(150)->generate(route('certificate.verify', ['cert_id' => $cert_id]))),

        ]);

        $pdfPath = 'certificates/' . $cert_id . '.pdf';
        Storage::put("public/" . $pdfPath, $pdf->output());

        Certificate::create([
            'cert_id'   => $cert_id,
            'user_id'   => $user->id,
            'course_id' => $domain,
            'issued_on' => $issue_date,
            'pdf_path'  => $pdfPath,
            'verified'  => true,
        ]);

        Mail::to($email)->send(new CertificateIssuedMail(
            $name,
            $cert_id,
            $domain,
            route('certificate.download', $cert_id),
            route('certificate.verify') . '?cert_id=' . $cert_id,
            $pdf->output()
        ));

        return redirect()->route('certificate.view', ['cert_id' => $cert_id])
                         ->with('success', 'Certificate generated and emailed!');
    }

    public function viewCertificate($cert_id)
    {
        $cert = Certificate::where('cert_id', $cert_id)->firstOrFail();
        $user = DB::table('internship_applications')->where('id', $cert->user_id)->first();
        $course = (object)[ 'name' => $cert->course_id ];

        $qr = base64_encode(QrCode::format('svg')->size(150)->generate(url("/verify?cert_id=$cert_id")));

        return view('certificate.details', compact('user', 'course', 'cert', 'qr'));
    }

    public function downloadPdf($cert_id)
    {
        $cert = Certificate::where('cert_id', $cert_id)->firstOrFail();
        $user = DB::table('internship_applications')->where('id', $cert->user_id)->first();
        $course = (object)[ 'name' => $cert->course_id ];

        $qr = base64_encode(QrCode::format('svg')->size(150)->generate(url("/verify?cert_id=$cert_id")));

        $pdf = Pdf::loadView('certificate.pdf', [
            'name'           => $user->full_name,
            'userid'         => $user->id,
            'domain'         => $course->name,
            'issue_date'     => $cert->issued_on,
            'certificate_id' => $cert_id,
            'qr_code'        => $qr,
        ]);

        return $pdf->download("Certificate-$cert_id.pdf");
    }

    public function showVerifyForm()
    {
        return view('verify');
    }

    public function verify(Request $request)
    {
        $request->validate(['cert_id' => 'required|string']);

        $cert = Certificate::where('cert_id', $request->cert_id)->first();

        if (!$cert) {
            return back()->with('error', 'Certificate not found.');
        }

        return redirect()->route('certificate.view', ['cert_id' => $cert->cert_id]);
    }

    public function directVerify(Request $request)
    {
        $cert_id = $request->query('cert_id');
        $cert = Certificate::where('cert_id', $cert_id)->first();
    
        if (!$cert) {
            return view('verify', ['not_found' => true]); // this works for cert not found
        }
    
        // Get user info
        $user = DB::table('internship_applications')->where('id', $cert->user_id)->first();
    
        // If user not found
        if (!$user) {
            return view('verify', ['not_found' => true]);
        }
    
        // Return a clean public verification view
        return view('certificate.verify-certificate', [
            'name' => $user->full_name,
            'domain' => $user->domain,
            'cert_id' => $cert_id,
            'issue_date' => $cert->issued_on
        ]);
    }

   public function downloadPng($cert_id)
{
    $cert = Certificate::where('cert_id', $cert_id)->firstOrFail();
    $user = DB::table('internship_applications')->where('id', $cert->user_id)->first();
    $course = (object)[ 'name' => $cert->course_id ];

    $qr = base64_encode(QrCode::format('svg')->size(150)->generate(url("/verify?cert_id=$cert_id")));

    return Pdf::loadView('certificate.pdf', [
        'name' => $user->full_name,
        'domain' => $course->name,
        'certificate_id' => $cert->cert_id,
        'issue_date' => $cert->issued_on,
        'qr_code' => $qr,  // base64 SVG QR
        'user_id' => $user->id  // ✅ Add this line
    ])->download('certificate.pdf');
    

    $dompdf = new Dompdf(new Options(['isHtml5ParserEnabled' => true]));
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    $output = $dompdf->output();
    $image = imagecreatefromstring($output);
    ob_start();
    imagepng($image);
    $pngOutput = ob_get_clean();

    return Response::make($pngOutput, 200, [
        'Content-Type' => 'image/png',
        'Content-Disposition' => "attachment; filename=Certificate-$cert_id.png"
    ]);
}
public function testPDF()
{
    $certificate_id = 'CMP2025-ZHR35GBV';
    $data = [
        'name' => 'Pooja M T',
        'domain' => 'Full stack development',
        'certificate_id' => $certificate_id,
        'issue_date' => '2025-08-05',
        'qr_code' => base64_encode(QrCode::format('svg')->size(100)->generate(route('certificate.verify', ['cert_id' => $certificate_id]))),
    ];

    return Pdf::loadView('certificate.pdf', $data)->stream('test-certificate.pdf');
}

}
