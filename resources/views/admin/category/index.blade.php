@extends('layouts.app')

@section('content')
<div class="admin-category">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    ประเภทงาน

                    <div class="btn-actions pull-right">
                        <a href="{{ url('/admin/category/create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        เพิ่มประเภทงาน
                        </a>
                    </div>
                    </div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @forelse ($categories as $category)
                            <li class="list-group-item">
                                {{ $loop->index + 1 }}. {{ $category->name }}

                                <div class="pull-right">
                                    {!! Form::open(['action' => ['Admin\CategoryController@destroy', $category->id]]) !!}
                                    <a href="{{ action('Admin\CategoryController@edit', $category->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a @click.prevent.stop="remove($event)" class="pointer text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    {{ method_field('DELETE') }}
                                    {!! Form::close() !!}
                                </div>
                            </li>
                            @empty
                            <p class="text-center">ไม่พบข้อมูล</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
