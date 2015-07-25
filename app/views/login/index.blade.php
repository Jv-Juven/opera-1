@extends('layouts.admin-master')



@section('title') Login @stop



@section('content')

<div class="col-md-4 col-md-offset-4">

    <div class="panel panel-default">

            <div class="panel-heading">

                    <h3 class="panel-title">请登录</h3>

            </div>

            <div class="panel-body">

                    @if ($errors->has())

                            @foreach ($errors->all() as $error)

                                    <div class='alert-danger alert'>{{ $error }}</div>

                            @endforeach

                    @endif



                    {{ Form::open(['role' => 'form']) }}

                    <fieldset>

                            <div class="form-group">

                                    {{ Form::text('username', null, ['placeholder' => '用户名', 'class' => 'form-control']) }}

                            </div>

                            <div class="form-group">

                                    {{ Form::password('password', ['placeholder' => '密码', 'class' => 'form-control']) }}

                            </div>

                                    {{ Form::submit('登录', ['class' => 'btn btn-primary']) }}

                    </fieldset>

                    {{ Form::close() }}

            </div>

    </div>

</div>

@stop