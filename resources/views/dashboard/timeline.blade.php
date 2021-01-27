@extends('layouts.dashboard')

@section('header_script')
<link rel="stylesheet" href="{{url('public/custom/css/style.css')}}">
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <section>
            @foreach($posts as $post)
            <div class="" style="background: white; padding: 10px; border-radius: 3px">
                <h5>Posted By: <?php echo $post->user_id ?></h5>
                <?php
                    echo '<h4>'.$post->title.'</h4>';
                    echo $post->content;
                    echo '<hr>'; 
                ?>
            </div>
            @endforeach
        </section>
    </div>
</div>
@endsection

@section('footer_script')
	
@endsection