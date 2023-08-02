@extends('layouts.app')

@section('content')

    <div class="container w-25 mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1  class="display-6 fw-light">Account List</h1>
            </div> 
        
            <div class="col-md-4 text-end">
                <a href="{{ route('account.create') }}"><i class="fa-solid fa-square-plus text-primary fa-3x"></i></a> 
            </div>
        </div>
    </div>
   
    <div class="container w-25 mt-5">
        @forelse(Auth::user()->account as $balance)
            <div class="row gx-3">
                <div class="col">
                    <div class="card border-0 text-decoration-none bg-light mb-3 shadow">
                        <div class="card-body">
                            <div class="col">
                                <div class="row mb-3">
                                    <div class="row">
                                        <h1 class="h5 fw-bold text-uppercase">saving account</h1>
                                    </div>
                                    <div class="row">
                                        <p class="h6 fw-light text-muted">{{ $balance->id }}</p>
                                    </div>
                                </div>
                                <div class="row text-end">
                                    <div class="row px-0">
                                        <h1 class="h5 px-0"> ${{ number_format($balance->balance,2) }} </h1>
                                    </div>
                                    <div class="row px-0">
                                        <span class="fs-6 px-0 fw-light text-muted">Available Balance</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty 
        @endforelse
    </div>

@endsection
