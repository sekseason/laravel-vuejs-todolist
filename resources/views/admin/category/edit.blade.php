@extends('layouts.app')

@section('script')
<script>
window.form = {
    name: `{!! $category->name !!}`
}
</script>
@endsection

@section('content')
<div class="admin-category-create">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    แก้ไขประเภทงาน

                    <div class="btn-actions pull-right">
                        <a href="{{ url('/admin/category') }}" class="btn btn-default btn-sm">
                        <i class="fa fa-chevron-left"></i>
                        ย้อนกลับ
                        </a>
                    </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                {!! Form::open(['action' => ['Admin\CategoryController@update', $category->id]]) !!}
                                <div class="form-group" :class="{'has-error': $v.name.$error}">
                                    {!! Form::label('name', 'ประเภทงาน') !!}
                                    {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'ประเภทงาน', 'v-model.trim' => 'name', '@input' => '$v.name.$touch()']) !!}
                                </div>

                                <div class="text-right">
                                    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-success', ':disabled' => '$v.$invalid', '@click.prevent.stop' => 'edit($event)']) !!}
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
