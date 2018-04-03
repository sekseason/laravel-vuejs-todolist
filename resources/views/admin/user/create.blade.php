@extends('layouts.app')

@section('content')
<div class="admin-user-create">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        เพิ่มผู้ใช้งาน

                        <div class="btn-actions pull-right">
                            <a href="{{ url('/admin/user') }}" class="btn btn-default btn-sm">
                            <i class="fa fa-chevron-left"></i>
                            ย้อนกลับ
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                {!! Form::open(['action' => 'Admin\UserController@store']) !!}
                                <div class="form-group" :class="{'has-error': $v.name.$error}">
                                    {!! Form::label('name', 'ชื่อ') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อ', 'v-model.trim' => 'name', '@input' => '$v.name.$touch()']) !!}
                                </div>

                                <div class="form-group" :class="{'has-error': $v.email.$error}">
                                    {!! Form::label('email', 'อีเมล์') !!}
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'อีเมล์', 'v-model.trim' => 'email', '@input' => '$v.email.$touch()']) !!}
                                </div>

                                <div class="form-group" :class="{'has-error': $v.password.$error}">
                                    {!! Form::label('password', 'รหัสผ่าน') !!}
                                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'รหัสผ่าน', 'v-model.trim' => 'password', '@input' => '$v.password.$touch()']) !!}
                                </div>

                                <div class="form-group" :class="{'has-error': $v.role.$error}">
                                    {!! Form::label('role', 'ระดับ') !!}
                                    {!! Form::select('role', $roles, 'user', ['class' => 'form-control', 'placeholder' => 'เลือกระดับผู้ใช้งาน', 'v-model.trim' => 'role', '@input' => '$v.role.$touch()']) !!}
                                </div>

                                <div class="text-right">
                                    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-success', ':disabled' => '$v.$invalid']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
