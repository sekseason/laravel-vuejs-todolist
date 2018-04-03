@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">งานของฉัน</div>

                <div class="panel-body">
                    <table class="table table-stripe">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
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
                                <td>{{ $job->start_date->format('d/m/Y') }}</td>
                                <td>{{ $job->end_date->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ action('HomeController@edit', $job->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
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
@endsection
