@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                  <h2 style="text-transform: capitalize">{{$account->user->name}} {{$account->user->last}} Account</h2>
                </div>
                <div class="card-body justify-content-center">
                    <div class="col-md-3">
                        <label for="iban"><b>Account IBAN:</b></label>
                        <div>{{$account->iban}}</div>
                    </div>
                    <div class="col-md-3">
                        <label for="balance"><b>Balance:</b></label>
                        <div>{{$account->balance}} &euro;</div>
                    </div>
                    <div class="col-md-5">
                        <form method="POST" action="{{ route('acc-tax', $account) }}" class="inline" style="margin-right: 5px">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary mt-2 " >Tax</button>
                            @method('PUT')
                        </form>
                        <a href="{{route('acc-edit', $account->id)}}" class="btn btn-outline-secondary mt-2" style="margin-right: 5px">Transfer</a>
                        <a href="{{route('acc-delete', $account->id)}}" class="btn btn-outline-danger mt-2" style="margin-right: 5px">Delete</a>
                        <a href="{{route('acc-index')}}" class="btn btn-outline-secondary mt-2">Cancel</a>

                        
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection