<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\Vendor;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $opening_balance = [];
    public $current_balance = [];
    public function index()
    {
        // Bank accounts
        $banks = BankAccount::all(); // getting records for calculations
        // $opening_balance = [];
        foreach ($banks as $bank) {
            $opening_balance[$bank->code] = $bank->opening_balance;           
        }

        // Payment dues + join vendors
        $payment_dues = Payment::select(
            'payments.id as PID', 
            'payments.*', 
            // 'bank_accounts.opening_balance',
            // 'bank_accounts.bcode',
            'vendors.*',
            'vendors.code as vcode'
        )
        ->join('vendors', 'payments.code', '=', 'vendors.code')
        ->get();
        
        $this->current_balance = $opening_balance; // copying as we want to remember opening balance
        
        foreach ($payment_dues as $payment) {
            $transaction_bank = null; // to get which bank is used to transfer
            if($this->current_balance[$payment->first_bank] >=  $payment->amount) { // we can use as we have stored bank codes in array before            
                
                $this->current_balance[$payment->first_bank] -= $payment->amount;
                $transaction_bank = BankAccount::where('code', '=', $payment->first_bank)->first();    
                // $total_transfer[$payment->first_bank];    
                $this->trigger_transfer($payment, $payment->first_bank);
            }
            else if($this->current_balance[$payment->second_bank] >=  $payment->amount) { // we can use as we have stored bank codes in array before            
               
                $this->current_balance[$payment->second_bank] -= $payment->amount;
                $transaction_bank = BankAccount::where('code', '=', $payment->second_bank)->first();
                $this->trigger_transfer($payment, $payment->second_bank);
            }
            else if($this->current_balance[$payment->third_bank] >=  $payment->amount) { // we can use as we have stored bank codes in array before            
               
                $this->current_balance[$payment->third_bank] -= $payment->amount;
                $transaction_bank = BankAccount::where('code', '=', $payment->third_bank)->first();
                $this->trigger_transfer($payment, $payment->third_bank);
            }
            else {

                // echo 'No bank had enough balance out of all 3';
                $payment->amount = 0; //
            }      
            $rp1[] = [
                'vendor_name' => $payment->name,
                'amount_transfered' => $payment->amount,
                'bank_ac_id' => $transaction_bank->id ?? null, 
                'bank_code' => $transaction_bank->code ?? null,
                'bank_name' => $transaction_bank->name ?? null,
                'ac_no' => $transaction_bank->ac_no ?? null,
            ];

            // RP-2
            $transfers = Payment::groupBy('payments.transfered_bank','bank_accounts.name','bank_accounts.id','bank_accounts.ac_no')
            ->selectRaw('sum(payments.transfered_amount) as sum, 
                payments.transfered_bank, 
                bank_accounts.id as bid,
                bank_accounts.name,
                bank_accounts.ac_no'
            )
            ->join('bank_accounts', 'bank_accounts.code', '=', 'payments.transfered_bank')
            ->orderBy('sum', 'DESC')
            ->get();
            
            
        }

        
        return view('welcome',compact('rp1', 'opening_balance', 'payment_dues'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trigger_transfer($payment, $bank)
    {
        Payment::where('id', $payment->PID)->update([
            'transfered_amount' => $payment->amount,
            'transfered_bank' =>  $bank
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function total_transfers_by_bank(Request $request)
    {
        // RP-2
        $transfers = Payment::groupBy('payments.transfered_bank','bank_accounts.name','bank_accounts.id','bank_accounts.ac_no')
        ->selectRaw('sum(payments.transfered_amount) as sum, 
            payments.transfered_bank, 
            bank_accounts.id as bid,
            bank_accounts.name,
            bank_accounts.ac_no'
        )
        ->join('bank_accounts', 'bank_accounts.code', '=', 'payments.transfered_bank')
        ->orderBy('sum', 'DESC')
        ->get();
        
        return view('total_transfers',compact('transfers'))->with('i');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function current_balance(Payment $payment)
    {
        // RP-3
        $banks = BankAccount::all(); // getting records for calculations
        
        
        // return view('total_transfers',compact('banks', $this->current_balance))->with('i');
        print_r($this->current_balance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
