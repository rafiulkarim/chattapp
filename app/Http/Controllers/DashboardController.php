<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        $data['title'] = 'Dashboard';
        return view('dashboard.home', $data);
    }

    public function users(){
        $data['title'] = 'Facebook - Users';
        $data['users'] = DB::table('users')->get();
        return view('dashboard/users', $data);
    }

    public function create_post(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $user_id = Auth::user()->id;
        $post_title = $request->input('title');
        $post_content = $request->input('content');
        //echo($user_id);die();
        $query = DB::table('posts')->insert(
            ['user_id' => $user_id, 'title' => $post_title, 'content'=> $post_content, 'status' => 1, 'created_at' => date('Y-m-d H:i:s')]
        );
        
        if($query){
            return redirect('dashboard')->with('new_post', 'New post created');
        }else{
            return back()->with('fail','Someting went wrong');
        }
    }

    public function timeline(){
        $user_id = Auth::user()->id;
        $data['title'] = 'Facebook - Timeline';
        $data['posts'] = DB::table('posts')->where('user_id'
        , $user_id)->get();
        //$data['posts'] = DB::table('posts')->join('friends','posts.user_id','=','friends.from_id')->get();
        //print_r($data); die();
        return view('dashboard/timeline', $data);
    }

    public function people(){
        $user_id = Auth::user()->id;
        $data['title'] = 'Facebook - People';

        $all_users = DB::table('users')->where('id','!=', $user_id)->get();
        $associate_users = DB::table('friends')
            ->where(function ($query) use ($user_id) {
                $query->where('from_id', $user_id)
                      ->orWhere('to_id', $user_id);
            })
            ->where(function ($query) {
                $query->where('status', '=', 0)
                      ->orWhere('status', '=', 1);
            })
            ->get();

        $people_you_may_know = array();

        // Looping for the filter
        foreach($all_users as $u){
            $flag = true;
            foreach($associate_users as $au){
                if($au->from_id == $u->id || $au->to_id == $u->id){
                    $flag = false;
                    break;
                }
            }
            if($flag){
                array_push($people_you_may_know, $u->id);
            }
        }
        $result = array_unique($people_you_may_know);
        $data['people_you_may_know'] = $result;
       //print_r($result);die();

        return view('dashboard.people', $data);
    }

    public function people_list(){
        $user_id = Auth::user()->id;
        $data['title'] = 'Facebook - Friends List';

        $all_users = DB::table('users')->where('id','!=', $user_id)->get();
        $associate_users = DB::table('friends')
            ->where(function ($query) use ($user_id) {
                $query->where('from_id', $user_id)
                    ->orWhere('to_id', $user_id);
            })
            ->where(function ($query) {
                $query->where('status', '=', 1);
            })
            ->get();
            //print_r($associate_users);die();
        $friends = array();

        // Looping for the filter
        foreach($all_users as $u){
            foreach($associate_users as $au){
                if($au->from_id == $u->id || $au->to_id == $u->id){
                    array_push($friends, $u->id);
                }
            }
        }
        $result = array_unique($friends);
        //print_r($result);die();
        $data['friends'] = $result;

        return view('dashboard.friend_list', $data);
    }

    public function friend_request(){
        $user_id = Auth::user()->id;
        $data['title'] = 'Facebook - Friend';
        $data['user_names'] = DB::table('users')
            ->join('friends', function ($join) use ($user_id) {
                $join->on('users.id', '=', 'friends.from_id')
                     ->where('friends.to_id', '=', $user_id );
            })
            ->get();

        return view('dashboard/friend_request', $data);
    }

    

}
