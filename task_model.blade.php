
  
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
<form action="" method="POST" id="addTaskForm">
  @csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" style="color: lightgreen" id="addModalLabel">Add Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- body field error msg  ... --}}
        <div class="errMsgContainer mb-3">
        </div>
        <div class="box">                  
              <div class="form-group mt-2">
                  <label>Title :</label>
                  <input type="text" onkeyup="expPattan();" id="title" name="title" ><span id="title_msg">*</span>        
               
              </div>

              <div class="form-group mt-2">
                  <label>Description :</label>
                <input type="text" name="description" id="description" required>                            
               </div>       
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger rounded-pill" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-primary rounded-pill add_task">Submit</button>
      </div>
    </div>
  </div>
</form>
  </div>

  {{-- java script validation srt   --}}

  <script> 
    
    
        function expPattan(){
        let title_val = document.querySelector("#title").value;
        let title_msg = document.querySelector("#title_msg");
        let title_style = document.querySelector("#title");
        let tittle_pattan = /^[A-Za-z0-9 .@_]{6,100}$/;
    
        if(tittle_pattan.test(title_val)){
            title_msg.innerHTML = "correct";
            title_msg.style.color="green";
            title_style.style.outline= "2px solid green";
            return true;
        }else{
            title_msg.innerHTML = "Min len 6 max len 100";
            title_msg.style.color="red";
            title_style.style.outline= "2px solid red";
            return false;
        }
    
        }  
    
    
        </script>

  {{-- java script validation end   --}}

    