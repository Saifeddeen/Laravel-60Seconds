<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class MessagesController extends Controller
{
    
    public function index(){
        $tableName = 'Messages';
        $messages = Message::all();

        return view('Dashboard.messages.index', compact('messages', 'tableName'));
    }

    public function create(){

        return view('Dashboard.messages.add');
    }

    public function store2(Request $request){

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required']
        ]);

        Message::create($request->all());

        return redirect()->route('messages.index');

    }

    public function store(Request $request){
        $request->validate([
            'textarea_1' => ['required'],
            'textarea_2' => ['required', 'email'],
            'textarea_3' => ['required']
        ]);


        Message::create([
            'name' => $request->post('textarea_1'),
            'email' => $request->post('textarea_2'),
            'message' => $request->post('textarea_3')
        ]);

        return redirect()->route('index');
    }

    public function edit($id){
        
        $message = Message::where('id',$id)->first();

        return view('Dashboard.messages.update', compact('message'));
    }

    public function update(Request $request, $id){
        $message = Message::where('id', $id)->first();
        
        $message->update($request->all());
        
        return redirect()->route('messages.index');
    }

    public function destroy($id){
        Message::find($id)->delete();

        return redirect()->route('messages.index');
    }

    public function destroySelected(Request $request){

        $ids = $request->post('select_to_delete');
        if($ids == null){
            return redirect()->route('messages.index');
        }

        foreach($ids as $id){
            Message::find($id)->delete();
        }

        return redirect()->route('messages.index');

    }

}
