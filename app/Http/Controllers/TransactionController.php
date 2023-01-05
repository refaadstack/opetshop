<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coupon;
use Midtrans\Config;
use Midtrans\Snap;
use Auth;
use DB;
use DataTables;

class TransactionController extends Controller
{
    public function applyVoucher(Request $request){

        $coupon = DB::table('coupons')->
        where('coupons.kode',$request->kode)
        ->select('coupons.*')->first();

        $potongan = 0;
        
        if($coupon){
            $potongan = $request->total*($coupon->potongan/100);
            $bayar= $request->total - $potongan;
        }else{
            $potongan = 'KODE TIDAK BERLAKU';
            $bayar= $request->total - 0;
        }

        $ongkir = $request->ongkir;
        $bayarMidtrans = $ongkir+$bayar;

        // dd($request->all());
        $data = [$potongan,$bayar,$bayarMidtrans]; 
        return response()->json($data);
    }
    public function checkout(Request $request){
        $data = $request->all();

        //get cart data
        $carts = Cart::with(['product'])->where('user_id',Auth::user()->id)->get();

        //add to transaction data
        $transaction = new Transaction;

        $transaction->user_id = $request->user_id;
        $transaction->name = $request->user_name;
        $transaction->phone = $request->phone;
        $transaction->ongkir = $request->ongkir;
        $transaction->total_price = $request->bayarmidtrans;
        $transaction->save();

        //create transaction item

            foreach($carts as $cart) {
                $items[] = TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'user_id'        => $cart->user_id,
                    'product_id'     => $cart->product_id
                ]);
                $product = Product::findOrFail($cart->product_id);
                $product->decrement('stock',$cart->quantity);
            }

        //delete cart after checkout
        Cart::where('user_id',Auth::user()->id)->delete();


            //config midtrans
        Config::$serverKey      = config('services.midtrans.serverKey');
        Config::$isProduction   = config('services.midtrans.isProduction');
        Config::$isSanitized    = config('services.midtrans.isSanitized');
        Config::$is3ds          = config('services.midtrans.is3ds');

        //var midtrans
        $midtrans = [
            'transaction_details' =>[
                'order_id'       => 'OP-'. $transaction->id,
                'gross_amount'   => (int)$transaction->total_price,
            ],
            'enabled_payment'=>[
                'gopay',
                'bank_transfer',
                'alfamart',
                'indomaret',
                'shopeepay'
            ],
            
            'vtweb' =>[]
             ];
        
             //dd($midtrans);
        
        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            $transaction->payment_url = $paymentUrl;
            $transaction->save();
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function success(){
        return view('front.success');
    }

    public function index(){
        if(request()->ajax()){
                $query = Transaction::all();
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('action',function($item){
                        return
                        '
                            <div class="row">
                                <div class="col">
                                <a href="'. route('transaction.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a> 
                                </div>
                            </div>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->make(true); 
        }
        return view('admin.transaction.index');
    }
    public function edit($id){

        $transaction = Transaction::find($id);
        // dd($transaction);
        return view('admin.transaction.edit',compact(['transaction']));
    }

    public function update(Request $request,$id){
        $transaction = Transaction::find($id);

        $transaction->update($request->all());


        return view('admin.transaction.index');
    }
    public function indexMy(){
        if(request()->ajax()){
                $query = Transaction::where('user_id',Auth::user()->id);
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('action',function($item){
                        return
                        '
                            <div class="row">
                                <div class="col">
                                <a href="'. route('transaction.show',$item->id) .'" class="btn btn-sm btn-warning">show</a> 
                                </div>
                            </div>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->make(true); 
        }
        return view('admin.transaction.indexMy');
    }
    public function show($id){
        $transaction = Transaction::find($id);
        $transactionItem = DB::table('transaction_items as ti')
        ->join('transactions as t','ti.transaction_id','t.id')
        ->join('products as p','ti.product_id','p.id')
        // ->where('ti.user_id',Auth::user()->id)
        ->where('ti.transaction_id',$id)
        ->select('ti.*','t.*','p.name')
        ->get();
        // $transactionItem= TransactionItem::where('transaction_id',$id)->get();
        // dd($transactionItem);
        return view('admin.transaction.show',compact(['transaction','transactionItem']));
    }
}
