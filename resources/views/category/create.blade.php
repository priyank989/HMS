@extends('template.main')

@section('title', $title)

@section('content_title',__("Create New Category"))
@section('content_description',__("Add a New Category To The System"))
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection

@section('main_content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            @if ($message = Session::get('success'))
            <div style="margin-top:3.5vh !important" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>Success!</h4>
                New Category-{{$message}} Added To The System.
            </div>
            @endif

            <div style="padding:10px;margin-top:4.5vh !important" class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('Category Form')}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">{{__('Name Of Category')}} <span class="text-red">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        

                        <div>

                            <button type="submit" class="pull-right btn btn-primary">{{__('Save')}}</button>

                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


@endsection