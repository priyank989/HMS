@extends('template.main')

@section('title', $title)

@section('content_title',__("Edit Service"))
@section('content_description',__("Edit Service To The System"))
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
                Edit Service-{{$message}} Update To The System.
            </div>
            @endif

            <div style="padding:10px;margin-top:4.5vh !important" class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('Edit Service Form')}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('service.update', $record->id) }}">
                    @csrf
                    @method('put')
                    <div class="box-body">

                        <div class="form-group">
                            <label for="category_id">{{__('Select Category')}} <span class="text-red">*</span></label>
                           <select class="form-control @error('category_id') is-invalid @enderror form-select" name ="category_id" aria-label="Default select example">
                              <option selected> Select Category</option>
                              @foreach($category as $index => $value)
                                <option 
                                    {{ ($record->category_id == $index ? "selected":"") }}
                                 value ="{{$index}} "> {{$value}} </option>
                              @endForeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="name">{{__('Name Of Service')}} <span class="text-red">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $record->name }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        


                        <div class="form-group">
                            <label for="price">{{__('Price')}} <span class="text-red">*</span></label>
                            <input id="price" maxlength="6" class="form-control @error('price') is-invalid @enderror"
                            type = "number"
                                name="price" value="{{ $record->price }}" required autocomplete="price" autofocus>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        

                        <div>

                            <button type="submit" class="pull-right btn btn-primary">{{__('Update')}}</button>

                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


@endsection