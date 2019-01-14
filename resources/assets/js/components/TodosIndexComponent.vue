<template>
  <div>
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <h1 class="todos-title">Todos</h1>
            <form @submit.prevent="addTodo" class="mb-3">
              <div class = "form-group">
                  <input type="text" class="form-control" placeholder="Title"
                  v-model="todo.title">
              </div>
              <button type="submit" class="btn btn-light btn-block"> Save </button>
            </form>
            <div class="todos-wrapper">
              <ul class="list-group todos-list">
                <li class="list-group-item todos-list-item" v-for="todo in todos" v-bind:key='todo.id'>
                  <a @click='editTodo(todo)' class="todos-list-item-link">{{ todo.title }}</a>
                  <button @click="deleteTodo(todo.id)" type="button" class="btn btn-primary btn-sm pull-right">Delete</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data: function(){
      return {
         todos: [],
         todo: {
           title: '',
         },
         edit: false		
      }
    },

    mounted(){
      this.getTodos();
    },
    
    methods: {
      getTodos: function(){
        axios.get('api/todos').then((res) => {
        this.todos = res.data;
        });
      },
      
      addTodo: function() {
        if(this.edit == false) {
              axios.post('api/todos', this.todo)
              .then((res) => {
                  this.todo.title = '';
                  this.edit = false;
                  this.getTodos();
              })
              .catch((err) => console.error(err));
        }else {
            // Update
            console.log('editing');
            axios({
                method: 'put',
                url: `api/todos/${this.todo.id}`,
                data: {
                    title: this.todo.title,
                },
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(data => {
                this.todo.title = '';
                this.edit = false;
                this.getTodos();
            }, (error) => {
            console.log(err);
            });
        }
      },

      deleteTodo: function(id) {
            axios.delete('api/todos/' + id)
              .then((response) => {
                  this.getTodos();
              })
              .catch((err) => console.error(err));
         }, 

      editTodo(todo) {
        console.log(todo)
        this.edit = true;
        this.todo.id = todo.id;
        this.todo.title = todo.title;
      }
    }
  }
</script>


