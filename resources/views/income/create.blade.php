@extends('layouts.app')

@section('title')
    <a class="navbar-brand" href="#">Log Cash</a>
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-3 col-lg-6 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Income</h4>
                        </div>
                        <div class="content">
                            @if(auth()->user()->role == 'supervisor')
                                <form action="/supervisor/income" method="POST">
                            @elseif(auth()->user()->role == 'cashier')
                                <form action="/cashier/income" method="POST">
                            @endif
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input id="amount" type="number" name="amount" class="form-control border-input {{ $errors->has('amount') ? 'is-invalid': ''}}"
                                                   placeholder="Amount" value="{{ old('amount') }}">
                                        </div>
                                        @if($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" rows="4" name="description" class="form-control border-input {{ $errors->has('description') ? 'is-invalid': ''}}"
                                                      {{ old('description') }}></textarea>
                                        </div>
                                        @if($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Log Cash</button>
                                </div>

                                <div class="clearfix"></div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection