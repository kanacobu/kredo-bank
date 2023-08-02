@extends('layouts.app')

@section('body_class', 'bg-dark')

@section('content')

    <div class="container mt-5 text-white">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-dark border-0">
                    <div class="card-header bg-dark border-0 text-center">
                        <i class="fa-solid fa-money-bill-wave " style="font-size: 100px; color: red;"></i>
                        <h1 class="text-danger">WithDrawal</h1>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('account.withdraw',$account->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                        <div class="row mb-3">
                            <label for="account" class="col-md-4 col-form-label text-md-end text-white">Account</label>
                    
                            <div class="col-md-6">
                                @foreach(Auth::user()->account as $account)
                                    <input type="radio" class="btn-check" name="account" id="account-{{$account->id}}" value="{{ $account->id }}" autocomplete="off" >
                                    <label class="btn btn-outline-danger fw-bold" for="account-{{$account->id}}">{{ $account->id }}</label>
                                @endforeach
                            </div>
                            @error('account')
                                <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div> 
                    </div>

                    <div class="row mb-3"> 
                        <label for="amount" class="col-md-4 col-form-label text-white text-md-end">Withdrawal Ammount</label>

                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text" id="dollar-mark">$</span>

                                <input type="number" class="form-control @error('amount') is-invalid @enderror" placeholder="Enter your withdrawal amount here" name="amount" value="{{ old('amount') }}">
                            </div>
                            @error('amount')
                                <p class="text-danger text-small" role="alert">{{ $message }}</p>
                            @enderror
                        </div> 
                    </div>
        
                    <div class="row">
                        <div class="col-md-5 offset-md-4">
                            <button type="submit" class="btn btn-danger w-100 mt-3" >Withdraw</button>
                        </div> 
                    </div>   
                 </div>
            </div>
        </div>
    </div>
</form>

@endsection