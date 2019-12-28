<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Http\Resources\Poll as PollResource;
use Illuminate\Http\Request;
use Validator;

class PollsController extends Controller
{
    public function index(){
        return response()->json(Poll::get(),200);
    }

    public function show($id){
        $poll = Poll::find(($id));
        if(is_null($poll)){
            return response()->json(null,404);
        }

        $poll_questons = Poll::with('questions')->findOrFail($id);

        $response = new PollResource($poll_questons);

        return response()->json($response,200);
    }

    public function store(Request $request){

        $rules = [
            'title' =>  'required|max:255',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
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

    Public function question(Request $request,POll $poll){
        $questions = $poll->questions;
        Return response()->json($questions,200);
    }


    public function error(){
        return response()->json(['msg' => 'missing payment method'],501);
    }
}
