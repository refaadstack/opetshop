<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use PDF;

class LaporanController extends Controller
{
    public function transaksi(Request $request){

        $from = $request->from;
        $to = $request->to;
        $transaksi = Transaction::where('status','SUKSES')->
        where('created_at','>=',$from)
        ->where('created_at','<=',$to)
        ->get();

        // dd($transaksi);

        $pdf = PDF::loadView('admin.laporan.transaksi-pdf',compact(['transaksi']));

        return $pdf->stream('transaksi-pdf');
    }
    public function index(){
        return view('admin.transaction.laporan');
    }
}
