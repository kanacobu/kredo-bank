@extends('layouts.app')

@section('body_class', 'bg-dark')

@section('content')

    <div class="container mt-5 text-white">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-dark border-0">
                    <div class="card-header bg-dark border-0 text-center">
                        <i class="fa-solid fa-circle-dollar-to-slot text-success" style="font-size: 100px; "></i>
                        <h1 class="text-success">Deposit</h1>
                    </div>
                
                <div class="card-body">
                    <form action="{{ route('account.deposit', $account->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                        <div class="row mb-3">
                            <label for="account" class="col-md-4 col-form-label text-white text-md-end">Account</label>
                        
                            <div class="col-md-5">
                                <select name="account" id="account" class="form-select" required>
                                    <option hidden value="">Select your account:</option>
                                    @foreach(Auth::user()->account as $account)
                                        <option value="{{ $account->id }}">{{ $account->id }}</option>
                                    @endforeach
                                </select>

                                @error('account')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-white text-md-end">Deposite Amount</label>

                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-text" id="dollar-mark">$</span>
                                    <input type="number" class="form-control" placeholder="Enter your deposit amount here" aria-label="amount" aria-describedby="dollar-mark" name="amount" value="{{ old('amount') }}" min="1" required>
                                </div>
                                @error('amount')
                                    <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-5 offset-md-4">
                                <button type="submit" class="btn btn-success w-100 " >Deposite</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection