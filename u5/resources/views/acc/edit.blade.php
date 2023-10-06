@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-4">
                <div class="card-header">
                  <h2>Funds Transfer</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('acc-update', $account) }}">
                        @csrf
                        
                        <div class="mb-9">
                            <div class="col-md-12 iban">
                                <p style="text-transform: capitalize">From {{$account->user->name}} {{$account->user->last}} {{$account->type == 'normal' ? ' account' : ' savings account'}}</p>
                            </div>
                            <div class="col-md-12">
                                <span>{{$account->iban}}</span> <span style="margin-right: 50px"><b>{{$account->balance}} &euro;</b></span>
                            </div>
                            
                                <div class="input-group mb-3 mt-2">
                                    <span class="input-group-text">&euro;</span>
                                    
                                    <input type="text" class="form-control" name="amount">
                                </div>
                                  
                            
                            <div class="col-md-12 iban">
                                To:
                            </div>
                            <div class="col-md-7">
                                <select name="receiver" class="form-select">
                                    @foreach($accounts as $acc)
                                        <option value="{{$acc->id}}">{{$acc->iban}} {{$acc->type}} {{$acc->balance}} &euro;</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-7 mt-2">
                                <button type="submit" class="btn btn-outline-primary" style="margin-right: 5px">Transfer</button>
                                <a href="{{route('acc-show', $account->id)}}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                   
                    @method('PUT')
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection