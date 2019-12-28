<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;

class PollsController extends Controller
{
    public function index(){
        return response()->json(Poll::get(),200);
    }

    public function show($id){
        return response()->json(Poll::find($id),200);
    }

    public function store(Request $request){

        $poll = Poll::create($request->all());

        return response()->json($poll,201);
        //201 => request create new resource
    }

    public function update(Request $request, Poll $poll)
    {
        $poll->update($request->all());
        return response()->json($poll,200);
        // 200 just add item
    }

    public function delete(Request $request, Poll $poll)
    {
        $poll->delete();
        return response()->json(null,203);
        // 204 no respose, already delete recode
    }
}
