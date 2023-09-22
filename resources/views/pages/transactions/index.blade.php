@extends('master')
@section('content')
    <section class="container">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">  <i class="fa fa-book"></i> {{$title}}</h5>
            </div>
            <div class="card-body" >
                <div class="col-md-12 table-responsive">
                    <p>Name : {{$user->name}}</p>
                    <p>Current Balance : {{$user->balance}}</p>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Transaction Type</th>
                                <th class="text-end">Amount</th>
                                <th class="text-end">Fee</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->transaction_type}}</td>
                                <td class="text-end">{{$transaction->amount}}</td>
                                <td class="text-end">{{$transaction->fee}}</td>
                                <td class="text-center">{{$transaction->date}}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $transactions->links() }}
                </div>

            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>
@endsection
