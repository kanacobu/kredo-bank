<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends UserController
{
    private $account;
    private $user;

    public function __construct(Account $account, User $user)
    {
        $this->account = $account;
        $this->user = $user;
    }

    public function index()
    { 
        $user=Auth::user();
        $all_accounts = $this->account->get();

        return view('index')->with('user', $user)->with('all_accounts', $all_accounts);
    }

    public function show()
    {
        $all_balances = $this->account->get();
        return view('accounts.list')->with('all_balances', $all_balances);
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'balance' => 'required|min:0'
        ]);

        $this->account->user_id = Auth::user()->id;
        $this->account->balance = $request->balance;
        $this->account->save();

        return redirect()->route('account.show');
    }

    public function depositSlip($id)
    {
        $account = $this->account->findOrFail($id);
        return view('accounts.deposite')->with('account', $account);
    }

    public function deposit(Request $request)
    {
        $account_details = $this->account->findOrFail($request->account);

        $request->validate([
            'amount'     => 'required|numeric|min:1',
            'account'    =>'required'
        ]);
            $balance = $account_details->balance;
            $deposite = $request->input('amount');
        
            $total = $deposite + $balance;
            
            $account_details->balance = $total;
            $account_details->save(); 
            
        return redirect()->route('account.show');
    }

    public function withdrawal($id) 
    {
        $account = $this->account->findOrFail($id);
        return view('accounts.withdrawal')->with('account', $account);   
    }

    public function withdraw(Request $request)
    {
        $account_details = $this->account->findOrFail($request->account);

        $request->validate([
            'amount' => 'required|numeric|min:1|max:'. $account_details->balance,
            'account'    =>'required'
        ],[ 
            'amount.max' =>'Your current account balance is: $' . $account_details->balance
        ]);
            
            $balance = $account_details->balance;
            $withdrawal = $request->input('amount');
        
            $total = $balance - $withdrawal;
            
            $account_details->balance = $total;
            $account_details->save(); 
            
        return redirect()->route('account.show');
    }
}

