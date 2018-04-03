@extends('layouts.app')

@section('content')
<div class="admin-job">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    งาน

                    <div class="btn-actions pull-right">
                        <a href="{{ url('/admin/job/create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        เพิ่มงาน
                        </a>
                    </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-stripe">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>To</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobs as $job)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->assignTo->name }}</td>
                                    <td>{{ $job->start_date->format('d/m/Y') }}</td>
                                    <td>{{ $job->end_date->format('d/m/Y') }}</td>
                                    <td>
                                        {!! Form::open(['action' => ['Admin\JobController@destroy', $job->id]]) !!}
                                        <a href="{{ action('Admin\JobController@edit', $job->id) }}">
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
                                    <td colspan="6">
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
