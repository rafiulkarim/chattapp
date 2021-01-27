@extends('layouts.dashboard')

@section('header_script')
<link rel="stylesheet" href="{{url('public/custom/css/style.css')}}">
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">People You May Know</h4>
                </div>
                <div class="loading" style="display:none"></div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($people_you_may_know as $people)
                        <?php
                            $user_details = get_user_details_by_id($people);
                        ?>
                        <tr>
                            <td>{{$user_details->name}}</td>
                            <td>
                                <?php
                                $friend = get_friend_status($people);
                                //print_r($people);die();
                                ?>
                                @if($friend)
                                    @if($friend->status == 0)
                                    <div class="friend-button-{{$people}}">
                                        <button id="cancel-friend-{{$people}}" class="btn btn-primary cancel_friend" role="button" user-id="{{$people}}">Cancel Friend</button>
                                    </div>
                                    @else
                                    <div class="friend-button-{{$people}}">
                                        <button id="add-friend-{{$people}}" class="btn btn-primary add_friend" role="button" user-id="{{$people}}">Add Friend</button>
                                    </div>
                                    @endif
                                @else
                                <div class="friend-button-{{$people}}">
                                    <button id="add-friend-{{$people}}" class="btn btn-primary add_friend" role="button" user-id="{{$people}}">Add Friend</button>
                                </div>
                                @endif
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
    $(document).on('click', '.add_friend', function(){
        $('.loading').show();
        var user_id = $(this).attr('user-id');

        //Calling ajax
        setTimeout(
            function () {
                $.ajax({
                    type: "GET",
                    data: {user_id: user_id},
                    url: "{{ url('/add-friend') }}",
                    success: function (res) {
                        $('.friend-button-'+user_id).html('<button id="cancel-friend-'+user_id+'" class="btn btn-primary cancel_friend" role="button" user-id="'+user_id+'">Cancel Friend</button>');
                    }
                });
                $('.loading').hide();
            }, 1000);

    });

    $(document).on('click', '.cancel-friend', function(){
        $('.loading').show();
        var user_id = $(this).attr('user-id');

        //Calling ajax
        setTimeout(
            function () {
                $.ajax({
                    type: "GET",
                    data: {user_id: user_id},
                    url: "{{ url('/cancel-friend') }}",
                    success: function (res) {
                        $('.friend-button-'+user_id).html('<button id="add-friend-'+user_id+'" class="btn btn-primary add_friend" role="button" user-id="'+user_id+'">Add Friend</button>');
                    }
                });
                $('.loading').hide();
            }, 1000);

    });
</script>
@endsection
