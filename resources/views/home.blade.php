@extends('layouts.app')

@section('content')
<div class="col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-3">
    {!! Form::open(['url' => 'results']) !!}
        <div class="form-group">
            {{Form::label('company_symbol', 'Company Symbol*')}}
            {{Form::text('company_symbol', '', ['required' => 'required', 'class'=> 'form-control', 'placeholder' => 'Enter the Company Symbol'])}}
        </div>
        <div class="form-group form-inline">
            {{Form::label('datefrom', 'From*')}}
            {{Form::text('datefrom', '', ['required' => 'required', 'class'=> 'form-control', 'placeholder' => 'From Date'])}}
            &rarr; {{Form::label('dateto', 'To*')}}
            {{Form::text('dateto', '', ['required' => 'required', 'class'=> 'form-control', 'placeholder' => 'To Date'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'E-Mail Address*')}}
            {{Form::email('email', '', ['required' => 'required', 'class'=> 'form-control', 'placeholder' => 'Enter you E-Mail'])}}
        </div>
        <div>
            {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
</div>
@endsection