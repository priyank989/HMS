@extends('template.main')

@section('title', $title)

@section('content_title',"Category")
@section('content_description',"Category")
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection

@section('main_content')
{{--  issue medicine  --}}




<div class="col-xs-12" id="issuemedicine3">
	  @if ($message = Session::get('success'))
            <div style="margin-top:3.5vh !important" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>Success!</h4>
                {{$message}}
            </div>
            @endif
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Category</h3>
            <a href = {{route('category.create')}} class="btn btn-sm btn-success pull-right"> Add Category </a>
        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-active">
                <thead>
                    <tr>
                        
                        <th style="text-align:center;font-size:18px">Id</th>
                        <th style="text-align:center;font-size:18px">Name</th>
                        
             
                        <th>Edit</th>
                        <th style="text-align:center;font-size:18px">Delete</th>
                    </tr>
                </thead>
                <tbody id="bodyData">
                    @foreach ($records as $record)
                    <tr>
                        <td>
                            {{$record->id}}
                        </td>
                        <td style="text-align:center;font-size:15px;">
                            {{ $record->name }}</td>

                        <td style="text-align:center;font-size:15px;">
                         <a href = {{route('category.edit', $record->id)}} class="btn btn-sm btn-primary">   Edit </a>
                            </td>
                        <td style="text-align:center;font-size:15px;">
                        <form method="post" action ="{{route('category.destroy', $record->id)}}">
                        	@method('delete')
                        	@csrf
	                        <button class ="btn btn-sm btn-danger"> Delete </button>
	                    </form>
                    </td>
                        
                    </tr>
                    @endforeach

                </tbody>
            </table>



       
        </div>


    </div>
</div>

@endsection