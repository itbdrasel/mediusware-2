@extends('master')
@section('content')
    <section class="container">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">  <i class="fa fa-book"></i> {{$title}}</h5>
            </div>
            <div class="card-body" >
                <a href="{{url($bUrl.'/create')}}" class="btn bg-success text-white"><i class="mdi mdi-plus"></i> <i class="fa fa-plus-circle"></i> Add New Deposit</a>
                <br>
                <br>
                <div class="col-md-12 table-responsive">
                    <p>Name : {{$user->name}}</p>
                    <p>Current Balance : {{$user->balance}}</p>
                    <p>Transaction Type : Deposit</p>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-end">Amount</th>
                                <th class="text-end">Fee</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $transaction)
                            <tr>
                                <td class="text-end">{{$transaction->amount}}</td>
                                <td class="text-end">{{$transaction->fee}}</td>
                                <td class="text-center">{{$transaction->date}}</td>
                                <td class="text-center">
                                    <a href="{{url($bUrl.'/'.$transaction->id.'/edit')}}" class="btn bg-primary text-white"><i class="mdi mdi-plus"></i> <i class="fa fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"></td>
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
