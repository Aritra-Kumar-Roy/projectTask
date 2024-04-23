<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
{{-- toastr js link --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{{-- toastr js link end--}}
{{-- Add Task --}}
<script>
$(document).ready(function(){
$(document).on('click','.add_task',function(e){
  e.preventDefault();
  let title = $('#title').val();
  let description = $('#description').val();
  // console.log(title+description);

  $.ajax({
url : "{{route('add.Task')}}",
method : 'POST',
data :{title:title,description:description},
success : function(res){
if(res.status=='success'){
  $('#addModal').modal('hide');
  $('#addTaskForm')[0].reset();
  $('.table').load(location.href+' .table');
  Command: toastr["success"]("Task Added", "Success")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"


}
}
},error:function(err){
let error = err.responseJSON;
$.each(error.errors,function(index,value){
$('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
});
}
  });

});
// end add task

// show task value in update form  ....

$(document).on('click','.update_task_form',function(){
let id = $(this).data('id');
let title = $(this).data('title');
let description = $(this).data('description');

$('#up_id').val(id);
$('#up_title').val(title);
$('#up_description').val(description);
});
// update task data  ...
$(document).on('click','.update_task_form',function(e){
  e.preventDefault();
  let up_id = $('#up_id').val();
  let up_title = $('#up_title').val();
  let up_description = $('#up_description').val();
  

  $.ajax({
url : "{{route('update.Task')}}",
method : 'POST',
data :{up_id:up_id,up_title:up_title,up_description:up_description},
success : function(res){
if(res.status=='success'){
  $('#updateModal').modal('hide');
  $('#updateTaskForm')[0].reset();
  $('.table').load(location.href+' .table');

}
},error:function(err){
let error = err.responseJSON;
$.each(error.errors,function(index,value){
$('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
});
}
  });

});
  // delete Task

  $(document).on('click','.delete_task_',function(e){
  e.preventDefault();
  let delete_id = $(this).data('id'); 

  if(confirm('Are You Sure Want To Delete This Task??')){
    $.ajax({
url : "{{route('delete.Task')}}",
method : 'POST',
data :{delete_id:delete_id},
success : function(res){
if(res.status=='success'){ 
  $('.table').load(location.href+' .table');
  Command: toastr["success"]("Task Deleted", "Success")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

}
}
  });


  }
});

// pagination////
$(document).on('click','.pagination a', function(e){
e.preventDefault();
let page = $(this).attr('href').split('page=')[1]
product(page)
})
function product(page){
  $.ajax({
 url : "/pagination/paginate-data?page="+page,
 success :function(res){
   $('.table-data').html(res);
 }
  });
}

// search Task
$(document).on('keyup',function(e){
  e.preventDefault();
  let search_string = $('#search').val();
  // console.log(search_string)
  $.ajax({
    url : "{{route('search.task')}}",
    methode : "GET",
    data :{search_string:search_string},
    success : function(res){
      $('.table-data').html(res);
      if(res.status=='Nothing_Found'){
        $('.table-data').html('<span class= "text-danger">'+'Nothing Found'+'</span>');
      }
    }
  });
})


});
</script>