@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-4">
                <div class="card-header">
                  <h2>Delete This Account</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('acc-destroy', $account) }}">
                        @csrf
                        
                        <div class="mb-9">
                            <div class="col-md-7 iban">
                                <p style="text-transform: capitalize">{{$account->user->name}} {{$account->user->last}} {{$account->type == 'normal' ? '' : 'savings'}} account:</p>
                            </div>
                            <div class="col-md-7 iban">
                                {{$account->iban}}
                            </div>
                            <div class="col-md-7 iban">
                                {{$account->balance}} &euro;
                            </div>
                            <button type="submit" class="btn btn-outline-danger" style="margin-right: 5px">Delete</button>
                            <a href="{{route('acc-show', $account->id)}}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                   
                    @method('DELETE')
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection