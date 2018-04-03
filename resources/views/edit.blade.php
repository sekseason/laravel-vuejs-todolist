@extends('layouts.app')

@section('content')
<div class="job-edit">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    ปรังปรุงงาน

                    <div class="btn-actions pull-right">
                        <a href="{{ url('/home') }}" class="btn btn-default btn-sm">
                        <i class="fa fa-chevron-left"></i>
                        ย้อนกลับ
                        </a>
                    </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                {!! Form::open(['action' => ['HomeController@update', $job->id]]) !!}
                                <div class="form-group" :class="{'has-error': $v.title.$error}">
                                    <label>ชื่องาน</label>
                                    <p>{{ $job->title }}</p>
                                </div>

                                <div class="text-right">
                                    <label class="radio-inline">
                                        {!! Form::radio('priority', 'normal', true) !!} ปกติ
                                    </label>

                                    <label class="radio-inline">
                                        {!! Form::radio('priority', 'medium') !!} ด่วน
                                    </label>

                                    <label class="radio-inline">
                                        {!! Form::radio('priority', 'high') !!} ด่วนมาก
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group" :class="{'has-error': $v.startDate.$error}">
                                            {!! Form::label('startDate', 'วันเริ่มต้น *') !!}
                                            <div class="input-group date datepicker">
                                                {!! Form::text('startDate', $job->start_date->format('d/m/Y'), ['class' => 'form-control datepicker', 'v-model.trim' => 'startDate', '@input' => '$v.startDate.$touch()', 'readonly']) !!}
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group" :class="{'has-error': $v.endDate.$error}">
                                            {!! Form::label('endDate', 'วันสิ้นสุด *') !!}
                                            <div class="input-group date datepicker">
                                                {!! Form::text('endDate', $job->end_date->format('d/m/Y'), ['class' => 'form-control datepicker', 'v-model.trim' => 'endDate', '@input' => '$v.endDate.$touch()', 'readonly']) !!}
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" :class="{'has-error': $v.category.$error}">
                                    {!! Form::label('category', 'ประเภทงาน *') !!}
                                    {!! Form::select('category', $categories, $job->category, ['class' => 'form-control', 'placeholder' => 'เลือกประเภทงาน', 'v-model.trim' => 'category', '@input' => '$v.category.$touch()']) !!}
                                </div>

                                <div class="form-group" :class="{'has-error': $v.description.$error}">
                                    {!! Form::label('description', 'รายละเอียด *') !!}
                                    {!! Form::textarea('description', $job->description, ['class' => 'form-control', 'rows' => 6, 'v-model.trim' => 'description', '@input' => '$v.description.$touch()']) !!}
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('attache', 'ไฟล์แนบ') !!}
                                            {!! Form::file('attache', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6 text-right">
                                        <a href="{{ url('/attache/' . $job->attache) }}" target="_blank" class="btn bth-default">
                                            <i class="fa fa-paperclip fa-3x"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('link', 'Link URL') !!}
                                    {!! Form::textarea('link', $job->link, ['class' => 'form-control', 'rows' => 2, 'v-model.trim' => 'link']) !!}
                                </div>

                                <div class="text-right">
                                    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-success', ':disabled' => '$v.$invalid']) !!}
                                </div>
                                {{ method_field('PATCH') }}
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
