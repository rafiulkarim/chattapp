<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PeopleController extends Controller
{
    public function add_friend(Request $request){
        $to_id = $request->input('user_id');
        $from_id = Auth::user()->id;

        $check = DB::table('friends')
            ->where('from_id', $from_id)
            ->where('to_id', $to_id)
            ->get();

        if(sizeof($check)>0){
            $res = DB::table('friends')
                ->where('from_id', $from_id)
                ->where('to_id', $to_id)
                ->update(['status' => 0]);
        }
        else{
            $res = DB::table('friends')->insertGetId(
                ['from_id' => $from_id, 'to_id'=> $to_id, 'created_at' => date('Y-m-d H:i:s')]
            );
        }
        return $res;
    }

    public function cancel_friend(Request $request){
        $to_id = $name = $request->input('user_id');
        $from_id = Auth::user()->id;

        $res = DB::table('friends')->where('from_id',$from_id)->where('to_id',$to_id)->delete();
        return $res;
    }

    public function confirm_friend(Request $request){
        $from_id = $name = $request->input('user_id');
        $to_id = Auth::user()->id;

        $res = DB::table('friends')
            ->where('from_id',$from_id)
            ->where('to_id',$to_id)
            ->update(['status' => 1]);
        return $res;
    }

    public function delete_friend(Request $request){
        $from_id = $name = $request->input('user_id');
        $to_id = Auth::user()->id;

        $res = DB::table('friends')
            ->where('from_id',$from_id)
            ->where('to_id',$to_id)
            ->update(['status' => 2]);
        return $res;
    }

    public function unfriend(Request $request){
        $from_id = $name = $request->input('user_id');
        $to_id = Auth::user()->id;

        $res = DB::table('friends')
            ->where(function ($query) use ($to_id) {
                $query->where('from_id', $to_id)
                    ->orWhere('to_id', $to_id);
            })
            ->where(function ($query) use ($from_id) {
                $query->where('from_id', $from_id)
                      ->orwhere('to_id', $from_id);
            })
            ->update(['status' => 3]);

        return $res;
    }
}
