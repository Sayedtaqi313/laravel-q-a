<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('check')->except(['show','index']);
    }
    public function index(){
        $questions = Question::orderBy('created_at','desc')->paginate(5);
        return view('questions.index',compact('questions'));
    }
    public function create() {
        return view('questions.create');
    }
    public function store(QuestionRequest $request) {

        $flag = Question::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => rand(1,4)
        ]);
        if($flag) {
            return redirect()->route('questions.index')->with('success','the quesiton submitted successfully');
        }else {
            return redirect()->route('questions.index')->with('error','there is error occured');
      }
    }
    public function edit($id) {
        $question = Question::findOrFail($id);
        return view('questions.edit',compact('question'));
    }

    public function update(QuestionRequest $request,$id) {
        $question = Question::findOrFail($id);
        $flag =  $question->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        if($flag) {
            return redirect()->route('questions.index')->with('success','the question updated successfully');
        }else {
            return redirect()->route('questions.index')->with('error','there is a problem occured');
        }
    }
    public function delete($id) {
        $question = Question::findOrFail($id);
        $flag = $question->delete();
        if($flag) {
            return redirect()->route('questions.index')->with('success','the question deleted successfully');
        }else {
            return redirect()->route('questions.index')->with('error','there is a problem occured');
        }
    }

    public function show($slug) {
        $question = Question::where('slug','=',$slug)->first();
        $question->increment('views');
        return view('questions.show',compact('question'));
    }

}
