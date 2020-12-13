<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;
use DB;
use App\Events\MessagePush;
class ChatController extends Controller
{
    public static function PeopleList(){
      $people_list = User::where('id','!=',Auth::user()->id)->get();

      return $people_list;
    }

    public function index(){
      $people_list = $this::PeopleList();
      $user = User::find(Auth::user()->id);

      return view('empty-page',compact('people_list','user'));
    }

    public function ChatRoom($people_id){
      $people_list = $this::PeopleList();
      $user = User::find(Auth::user()->id);
      $sender = User::find($people_id);

    	return view('chat-room',compact('people_list','sender','user'));
    }

    public function sendMessage(Request $r){
      // return $r->all();
      $user = Auth::user();
      $message = Message::create([
        'message'   => $r->message,
        'sender'    => Auth::user()->id,
        'receiver'  => $r->receiver
      ]);

      event(new MessagePush($message,$user,$r->receiver));

      return response()->json(['success'],200);
    }

    public function getMessage($people_id){
      $send  = DB::table('messages as m')
                  ->join('users as u','m.sender','u.id')
                  ->select('m.message','u.name',DB::raw("date_format(m.created_at,'%H:%i:%s') as created_at"),DB::raw('"sender" as type'),DB::raw('"message-main-sender" as type_class'))
                  ->where('m.sender',Auth::user()->id)->where('m.receiver',$people_id);
      $receive = DB::table('messages as m')
                  ->join('users as u','m.sender','u.id')
                  ->select('m.message','u.name',DB::raw("date_format(m.created_at,'%H:%i:%s') as created_at"),DB::raw('"receiver" as type'),DB::raw('"message-main-receiver" as type_class'))
                  ->where('m.sender',$people_id)->where('m.receiver',Auth::user()->id);

      $data = $send->union($receive)->orderBy('created_at','asc')->get();

      return $data;
    }
}
