@extends('layouts.dashboard')

@section('header_script')

@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Friend Requests</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_names as $user_name)
                        <tr>
                            <?php
                            $row = get_confirm_friend($user_name->from_id);
                            ?>
                            @if(count($row) > 0)
                                @if($row[0]->status == 0)
                            <td>
                                  {{$user_name->name}}
                            </td>
                            <td>
                                  <div class="friend-button-{{$user_name->from_id}}">
                                    <button id="confirm_friend-{{$user_name->from_id}}" class="btn btn-primary confirm_friend" role="button" user-id="{{$user_name->from_id}}" >Confirm Friend</button>
                                    <button id="delete_friend-{{$user_name->from_id}}" class="btn btn-primary delete_friend" role="button" user-id="{{$user_name->from_id}}" >Delete</button>
                                  </div>
                            </td>
                                @endif
                            @endif
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
    $(document).on('click', '.confirm_friend', function(){
        var user_id = $(this).attr('user-id');

        //Calling ajax
        $.ajax({
            type: "GET",
            data: {user_id: user_id},
            url: "{{ url('/confirm-friend') }}",
            success: function (res) {
                $('.friend-button-'+user_id).html('<p id="confirm_friend-'+user_id+'"  user-id="'+user_id+'">You are now friends</p>');
            }
        });
    });

    $(document).on('click', '.delete_friend', function(){
        var user_id = $(this).attr('user-id');

        //Calling ajax
        $.ajax({
            type: "GET",
            data: {user_id: user_id},
            url: "{{ url('/delete-friend') }}",
            success: function (res) {
                $('.friend-button-'+user_id).html('<p id="confirm_friend-'+user_id+'"  user-id="'+user_id+'">Your friend request deleted</p>');
            }
        });
    });
</script>
@endsection
