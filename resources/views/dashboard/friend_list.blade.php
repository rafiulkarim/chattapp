@extends('layouts.dashboard')

@section('header_script')

@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Friends List</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Are you want to </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($friends as $friend)
                        <tr>
                            <?php
                            $user_details = get_user_details_by_id($friend);
                            ?>
                            <td><a href="{{url('/dashboard/chat/'.$user_details->id)}}">{{$user_details->name}}</a></td>
                            <td>
                                <div class="friend-button-{{$friend}}">
                                    <button id="confirm_friend-{{$friend}}" class="btn btn-primary unfriend" role="button" user-id="{{$friend}}" >Unfriend</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.unfriend', function(){
        var user_id = $(this).attr('user-id');
        //Calling ajax
        $.ajax({
            type: "GET",
            data: {user_id: user_id},
            url: "{{ url('/unfrined') }}",
            success: function (res) {
                $('.friend-button-'+user_id).html('<p id="unfriend-'+user_id+'"  user-id="'+user_id+'">Unfriend Successful</p>');
            }
        });
    });
</script>
@endsection
