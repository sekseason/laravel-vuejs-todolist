@extends('layouts.app')

@section('content')
<div class="admin-user">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    ผู้ใช้งาน

                    <div class="btn-actions pull-right">
                        <a href="{{ url('/admin/user/create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        เพิ่มผู้ใช้งาน
                        </a>
                    </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-stripe">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role ? $user->role->role : '' }}</td>
                                    <td>
                                        {!! Form::open(['action' => ['Admin\UserController@destroy', $user->id]]) !!}
                                        <a href="{{ action('Admin\UserController@edit', $user->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a @click.prevent.stop="remove($event)" class="pointer text-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        {{ method_field('DELETE') }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <p class="text-center">ไม่พบข้อมูล</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
