@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                  <h2>Open New Account</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('acc-store') }}">
                        @csrf

                        
                        <div class="mb-3">
                            <label for="ibanType" class="form-label">Type Of The Account</label>
                            <select class="form-select" id="ibanType" name="type">
                                <option selected>Chose the type of the account</option>
                                <option value="savings">Savings</option>
                                <option value="normal">Normal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-success" style="margin-right: 5px">Open</button>
                        <a href="/" class="btn btn-outline-danger">Cancel</a>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection