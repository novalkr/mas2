@extends('layouts/main')

@section('content')
    <p>Это содержимое тела страницы.</p>

    @if ( count($uslugaAll) )
        <table>
            @foreach ( $uslugaAll as $uslugaOne)
            <tr>
                <td> {{ $uslugaOne->getAttribute('Name') }} </td>
                <td><a target="_blank" href="/usluga/{{ $uslugaOne->getId() }}"><button  class="btn btn-primary">Редактить</button></a></td>
            </tr>
            @endforeach
        </table>
    @else
        Нет записей
    @endif
<!--
<div id="appp-1">
    {{ '{'.'{ message }'.'}' }}
</div>
<div id="app-2">
  <span v-bind:title="message">
    Подержи курсор надо мной пару секунд,
    чтобы увидеть динамически связанное значение title!
  </span>
</div>

<div id="app-4">
  <ol>
    <li v-for="todo in todos">
     {{ '{'.'{ todo.text }'.'}' }}
    </li>
  </ol>
</div>
-->
<div id="app-5">
  <p>{{ '{'.'{ message }'.'}' }}</p>
  <button v-on:click="ddd()">Обратить порядок букв в сообщении</button>
</div>

<div id="app-6">
  <p>{{ '{'.'{ message }'.'}' }}</p>
  <input v-model="message">
</div>

        <div id="app-7">
            <ol>
                <!--
                  Теперь мы можем передать каждому компоненту todo объект
                  с информацией о задаче, который будет динамически меняться.
                  Мы также определяем для каждого компонента "key",
                  значение которого будет объяснено далее в руководстве.
                -->
                <todo-item
                    v-for="item in groceryList"
                    v-bind:todo="item"
                    v-bind:key="item.id"
                >
                </todo-item>
            </ol>
        </div>




<div id="demo">{{ '{'.'{ fullName }'.'}' }}</div>

<div  id="appm-1" v-bind:style="styleObject">р чем то</div>

<div id="todo-list-example">
  <input
    v-model="newTodoText"
    v-on:keyup.enter="addNewTodo"
    placeholder="Добавить todo"
  >
  <ul>
    <li
      is="todo-item"
      v-for="(todo, index) in todos"
      v-bind:key="todo.id"
      v-bind:title="todo.title"
      v-on:remove="todos.splice(index, 1)"
    ></li>
  </ul>
</div>

<script>
    ddd = function(){
        console.log( 'ddd' );
    }

/*
    var app4 = new Vue({
      el: '#appp-1',
      data: {
       message: 'Hello Vue!'
      }
    });
    var app2 = new Vue({
      el: '#app-2',
      data: {
        message: 'Вы загрузили эту страницу в: ' + new Date().toLocaleString()
      }
    });
    var app4 = new Vue({
      el: '#app-4',
      data: {
        todos: [
          { text: 'Посадить дерево' },
          { text: 'Построить дом' },
          { text: 'Вырастить сына' }
        ]
      }
    });
*/
    console.log( 'подгрузка тыка' );
    var app5 = new Vue({
        el: '#app-5',
        data: {
            message: 'Hello Vue.js! '
        },
        methods: {
            reverseMessage: function () {
                console.log( 'подгрузка тыка' );
                this.message = this.message.split('').reverse().join('')
            },
            ddd : function(){
                console.log( 'ddd' );
            }
        }
    });
    console.log( 'app5', app5 );

    var app6 = new Vue({
      el: '#app-6',
      data: {
        message: 'Hello Vue!'
      }
    });

            Vue.component('todo-item', {
              props: ['todo'],
              template: '<li>{'+'{ todo.text }'+'}</li>'
            })

            var app7 = new Vue({
              el: '#app-7',
              data: {
                groceryList: [
                  { id: 0, text: 'Овощи' },
                  { id: 1, text: 'Сыр' },
                  { id: 2, text: 'Что там ещё люди едят?' }
                ]
              }
            });


/*
var obj = {
  foo: 'bar'
}

//Object.freeze(obj)

new Vue({
  el: '#app',
  data () {
    return {
      obj
    }
  }
});
*/
console.log( '-- начинаем это' );
var vm = new Vue({
    el: '#demo',
    data: {
    firstName: 'Foo',
    lastName: 'Bar'
    },
    computed: {
        fullName: function () {
            console.log( '-- заканчи это' );
            return this.firstName + ' ' + this.lastName
        }
    }
})


var vm = new Vue({
    el: '#appm-1',
    data: {
        styleObject: {
            color: 'red',
            fontSize: '13px'
        }
    }
});


Vue.component('todo-item', {
  template: '\
    <li>\
      {{ '{'.'{ title }'.'}' }}\
      <button v-on:click="$emit(\'remove\')">X</button>\
    </li>\
  ',
  props: ['title']
})


new Vue({
  el: '#todo-list-example',
  data: {
    newTodoText: '',
    todos: [
      {
        id: 1,
        title: 'Вымыть посуду'
      },
      {
        id: 2,
        title: 'Вынести мусор'
      },
      {
        id: 3,
        title: 'Подстричь газон'
      }
    ],
    nextTodoId: 4
  },
  methods: {
    addNewTodo: function () {
      this.todos.push({
        id: this.nextTodoId++,
        title: this.newTodoText
      })
      this.newTodoText = ''
    }
  }
});
</script>
@endsection



