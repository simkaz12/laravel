@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                  <h2>Account List</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 >IBAN</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 >Type</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>Balance</h4>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </li>
                            
                        @forelse($accounts as $account)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        {{$account->iban}}
                                    </div>
                                    <div class="col-md-2">
                                        {{$account->type}}
                                    </div>
                                <div class="col-md-3">
                                    <b>{{$account->balance}} &euro;</b>
                                </div>
                                <div class="col-md-3" style="padding-left: 100px">
                                    <a href="{{route('acc-show', $account->id)}}" style="margin-right: 10px" class="btn btn-outline-secondary">More</a>
                                    
                                </div>
                            </div>
                            </li>
                        @empty 
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>No Active Accounts</h4>
                                    </div>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection