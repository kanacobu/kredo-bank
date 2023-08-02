@extends('layouts.app')

@section('body_class', 'bg-dark')

@section('content')
<div class="container w-75">

    @if(Auth::user()->id)
        <h1 class="text-white">Good day, {{$user->name}}!</h1>
    @endif
    <div class="card">
        <div class="card card-header bg-info ">
            Announcements
        </div>
        <div class="card-body">
            Welcome to Kredo bank!
        </div>
    </div>
    
    <div class="mt-3">
        <div class="row">
            <div class="col d-flex">
                <div class="card card-body bg-success text-center text-white">
                    <h2 >Deposit</h2>
                    @foreach($all_accounts as $account)
                        <a href="{{ route('account.depositSlip', $account->id) }}" class="text-decoration-none mx-auto">
                    @endforeach
                        <i class="fa-solid fa-circle-dollar-to-slot text-center" style="font-size: 50px; color: white;"></i></a>
                </div>
            </div>

            <div class="col d-flex">
                <div class="card card-body bg-danger text-center text-white">
                    <h2 >Withdrawal</h2> 
                    @foreach($all_accounts as $account)
                        <a href="{{ route('account.withdrawal', $account->id) }}" class="text-decoration-none ">
                    @endforeach   
                        <i class="fa-solid fa-money-bill-wave text-center" style="font-size: 50px; color: white;"></i></a>
                </div>
            </div>

            <div class="col d-flex">
                <div class=" card card-body bg-secondary text-center text-white">
                    <h2 >Accounts</h2>  
                    <a href="{{ route('account.show') }}" class="text-decoration-none " ><i class="fa-solid fa-money-check-dollar" style="font-size: 50px; color: white;"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection

