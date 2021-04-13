<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(){
        $payments = DB::table('payments')
            ->join('patients', 'patients.id', '=', 'payments.patient_id')
            ->select('patients.id as pid', 'patients.name as name', 'patients.sex as sex', 'patients.address as address', 'patients.occupation as occ', 'patients.telephone as tel', 'patients.nic as nic', 'patients.bod as bod', 'patients.updated_at', 'payments.total_amount', 'payments.bill_type')
            ->get();
        return view('payment.index', ['title' => 'Payment', 'payments' => $payments]);

    }
}
