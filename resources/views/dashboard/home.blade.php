@extends('layouts.dashboard')

@section('header_script')
	<link rel="stylesheet" href="{{url('public/custom/css/style.css')}}">
@endsection

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @if (session('new_post'))
        <div class="alert alert-success">
            {{ session('new_post') }}
        </div>
        @endif
        @if (session('fail'))
        <div class="alert alert-success">
            {{ session('new_post') }}
        </div>
        @endif
        <div class="loading" style="display:none"></div>
        <h3>
            <strong>Dashboard</strong>
        </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </section>
    
    <hr>
    <h4>Create a post</h4>
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{route('create.post')}}" id="create_post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control p-3" id="title" aria-describedby="title" placeholder="Enter title" value="{{ old('title') }}" name="title">
                    <span class="text-danger">@error('title'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="content" placeholder="What's on your mind" value="{{ old('content') }}" name="content" rows="4" cols="50"></textarea>
                    <span class="text-danger">@error('content'){{ $message }}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Create a post</button>
            </form>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footer_script')
<script src="{{asset('public/js/jquery.validate.js')}}"></script>
<script>
$(document).ready(function(){
    $("#create_post").validate({
        rules: {
            title: {
                required: true,
                title: true
            },
            content: {
                required: true,
                content: true
            }
        },
        messages: {
            title: "Please enter a post title",
            content: "Please provide an article what's in your mind"
        }
    });
});
    $(document.body).on('click', '.post', function () {
        $('.loading').show();
        setTimeout(
            function () {
                $.ajax({
                    data : {},
                    success: function (response) {
                        $('.loading').hide();
                    }
                });
            }, 1000);
    });
</script>
	
@endsection