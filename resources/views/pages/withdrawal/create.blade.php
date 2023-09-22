@extends('master')
@section('content')
    <section class="container ">
        <div class="row data-body">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5 class="card-title">  <i class="fa fa-edit"></i> {{$title}}</h5>
                    </div>
                    <form method="post" action="{{url($bUrl.'/store')}}" >
                        @csrf
                        <input type="hidden" name="id" value="{{$objData->id??''}}">
                    <div class="card-body">

                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="amount" class="col-sm-4 col-form-label">Amount<code>*</code></label>
                                <div class="col-sm-8">
                                    <input type="text" id="amount" name="amount" value="{{ old('amount', $objData->amount??'')}} " class="form-control number @error('amount') is-invalid @enderror" >
                                    <span id="amount-error" class="error invalid-feedback">{{$errors->first('amount')}}</span>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="date" class="col-sm-4 col-form-label">Date<code>*</code></label>
                                <div class="col-sm-8">
                                    <input type="text" id="date" name="date" value="{{ old('date', $objData->date??date('Y-m-d'))}} " readonly autocomplete="off" class="form-control datepicker @error('date') is-invalid @enderror" >
                                    <span id="date-error" class="error invalid-feedback">{{$errors->first('date')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-footer">
                            <div class="offset-md-2 col-sm-10">
                                @php
                                    $spinner=  '<i class="fas fa-spinner fa-pulse"></i> Please Wait';
                                @endphp
                                <button type="submit" onclick="this.disabled=true;this. innerHTML='{{$spinner}}';this.form.submit();" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>&nbsp;&nbsp;
                                <a href="{{url($pageUrl)}}"  class="btn btn-warning">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection