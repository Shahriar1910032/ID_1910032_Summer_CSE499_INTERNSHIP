<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\PackagePlan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyPackageController extends Controller
{
    public function buyPackage()
    {
        $pageTitle = 'Buy Package';

        return view('agent.package.index', compact('pageTitle'));
    }

    public function buyBuisnessPlan()
    {
        $pageTitle = 'Buy Buisness Plan';
        $user = Auth::user();
        // dd($user);
        return view('agent.package.buisness_plan', compact('pageTitle', 'user'));
    }

    public function storeBuisnessPlan(Request $request)
    {
        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;

        $packagePlan = new PackagePlan();

        $packagePlan->user_id          = $id;
        $packagePlan->package_name     = 'Buisness';
        $packagePlan->invoice          = 'PROPERTY' . mt_rand(10000000, 99999999);
        $packagePlan->package_credits  = '03';
        $packagePlan->package_amount   = '20';
        $packagePlan->created_at       = Carbon::now();
        $packagePlan->save();

        User::where('id', $id)->update([
            'credit' => DB::raw('3 +' . $nid)
        ]);

        $notification = array(
            'message' => 'You have purchase Basic Package Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('agent.all.property')->with($notification);
    }

    public function buyProfessionalPlan()
    {
        $pageTitle = 'Buy Professional Plan';
        $user = Auth::user();
        // dd($user);
        return view('agent.package.professional_plan', compact('pageTitle', 'user'));
    }

    public function storeProfessionalPlan(Request $request)
    {
        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;

        $packagePlan = new PackagePlan();

        $packagePlan->user_id          = $id;
        $packagePlan->package_name     = 'Professional';
        $packagePlan->invoice          = 'PROPERTY' . mt_rand(10000000, 99999999);
        $packagePlan->package_credits  = '10';
        $packagePlan->package_amount   = '50';
        $packagePlan->created_at       = Carbon::now();
        $packagePlan->save();

        User::where('id', $id)->update([
            'credit' => DB::raw('10 +' . $nid)
        ]);

        $notification = array(
            'message' => 'You have purchase Professional Package Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('agent.all.property')->with($notification);
    }

    public function packageHistory()
    {
        $pageTitle = 'Buy Professional Plan';
        $id = Auth::user()->id;
        $packageHistory = PackagePlan::where('user_id', $id)->latest()->get();

        return view('agent.package.history', compact('pageTitle', 'packageHistory'));
    }

    public function packageInvoice($id)
    {
        $packageDownload = PackagePlan::where('id', $id)->first();

        $pdf = Pdf::loadView('agent.package.invoice_pdf', compact('packageDownload'))->setPaper('a4')->setOption([
            'temDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('package.pdf');
    }
}
