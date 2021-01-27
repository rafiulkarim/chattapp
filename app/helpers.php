<?php
    function get_friend_status($to_id){
        $from_id = \Illuminate\Support\Facades\Auth::user()->id;

        $row = DB::table('friends')
            ->where('from_id', $from_id)
            ->where('to_id', $to_id)
            ->first();
        return $row;
    }

    function get_user_details_by_id($user_id){
        $user = DB::table('users')
            ->where('id', $user_id)
            ->first();
        return $user;
    }

    function get_confirm_friend($sender_id){
        $receiver_id = \Illuminate\Support\Facades\Auth::user()->id;

        $row = DB::table('friends')
            ->where('from_id',$sender_id)
            ->where('to_id',$receiver_id)
            ->get();
        return $row;
    }
?>