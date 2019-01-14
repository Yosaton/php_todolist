<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Services\TodosService;


class TodosController extends Controller
{
    private $todoService;

    public function __construct(TodosService $todoService){
        $this->todoService = $todoService;
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
    // dd($request);
    // Get articles
    $todos = Todo::orderBy('created_at', 'desc')->get();
    // dd($todos);
    // return view('todos.index')]);
    return $this->todoService->transformCollection($todos);

    // Return collection of articles as a resource
    // return TodoResource::collection($todos);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string',
          ]);

        // Todo::create($validatedData);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        return response()->json('Stored');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required|string|max:15',
           ]);
           
           $todo->title = $data['title'];
           $todo->save();

           return response()->json(['message' => 'Todo Updated Successfully']);
        //    return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
		
        return response()->json(['message' => 'Todo Deleted']);
    }
}

//axios expects a response. DONT USE REDIRECT