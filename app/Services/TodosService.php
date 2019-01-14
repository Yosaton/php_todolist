<?php 

namespace App\Services;
use App\Todo; 

class TodosService extends TransformerService{

    public function transform($todo){
        return [
            'id' => $todo->id,
            'title' => $todo->title
          ];
      }

      public function all(){
        $todos = Todo::all();
      
          return response()->json($this->transformCollection($todos));
        }
	
}