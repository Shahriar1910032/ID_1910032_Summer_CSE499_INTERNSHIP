<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackagePlan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ManagePackageController extends Controller
{
    public function packageHistory()
    {
        $pageTitle = 'Buy Professional Plan';
        $packageHistory = PackagePlan::latest()->get();

        return view('admin.package.history', compact('pageTitle', 'packageHistory'));
    }

    public function packageInvoice($id)
    {
        $packageDownload = PackagePlan::where('id', $id)->first();

        $pdf = Pdf::loadView('admin.package.invoice_pdf', compact('packageDownload'))->setPaper('a4')->setOption([
            'temDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('package.pdf');
    }
}
