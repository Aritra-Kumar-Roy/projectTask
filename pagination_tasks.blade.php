<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
      <th scope="col">Titel</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $key=>$task)
      <tr>
        <th>{{$key+1}}</th>
        <td>{{$task->title}}</td>
        <td>{{$task->description}}</td>
        <td><a href ="{{url('update_task_model')}}" 
          class="btn btn-success update_task_form"
          data-bs-toggle="modal" 
          data-bs-target="#updateModal"
          data-id="{{ $task->id }}"
          data-title="{{ $task->name }}"
          data-description="{{ $task->description }}">
        
          <i class="las la-edit"></i>
        </a>
          <a href="" 
           class="btn btn-danger delete_task"
           data-id="{{ $task->id }}"                                   
           >                                 
          <i class="las la-times"></i>
        </a>
        </td>
      </tr>                             
    @endforeach
    </tbody>
  </table>
  {!! $tasks->links() !!}