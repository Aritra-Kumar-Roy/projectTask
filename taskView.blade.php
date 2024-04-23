<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Task</title>
    <style>
      body{
        display: flex;
      }
    </style>

  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="col-md-8">
                    <h2 class="my-5 text-center">View Of Task</h2>
                    <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Task</a>
                    <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search Here">
                    <div class="table-data">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

  {{-- model page include  --}}
@include('task_model')
{{-- update modelpage --}}
@include('update_task_model')
{{-- script part add --}}
@include('task_js')
{!! Toastr::message() !!}

 
  </body>
</html>

{{-- Hello reader,i know my codeing not so good but i do my best ,i ensure that 
i will improve my codeing skill ,so i deserve a chance on your company 
where can i grow my career and the company too.
         if you face some error in my coding.so sorry for that 
         this project i do alone ...--}}