
  
  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateTaskForm">
      @csrf
      <input type="hidden" id="up_id" name="up_id">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" style="color: lightgreen" id="updateModalLabel">Update Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            {{-- body field error msg  ... --}}
            <div class="errMsgContainer mb-3">
            </div>
            <div class="box">                  
                  <div class="form-group mt-2">
                      <label>Title :</label>
                      <input type="text" onkeyup="expPattan();" id="up_title" name="up_title" >        
                   
                  </div>
    
                  <div class="form-group mt-2">
                      <label>Description :</label>
                    <input type="text" name="up_description" id="up_description" required>                            
                   </div>       
      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger rounded-pill" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-primary rounded-pill update_task">Save</button>
          </div>
        </div>
      </div>
    </form>
      </div>
    
      
    
        