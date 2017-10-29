
<div id="addTaskModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url'=>'/admin/dashboard/add-task', 'role'=>'form', 'action'=>route('admin.add_task'), 'id'=>'add-task', 'class'=>'form-horizontal')) }}
  		    <div class="row">
  	        <div class="form-group">
  	        	{{ Form::label('task_project_id', 'Project', array('class'=>'col-md-3 control-label'))  }}
  	        	<div class="col-md-8">
  					   <select name="task_project_id" id="task_project_id" class="form-control">
                <option value="">Select Project</option>
                @foreach($projects as $project)
                  <option value="{{$project->id}}">{{$project->title}}</option>
                @endforeach               
              </select>
  				    </div>
  	        </div>
          </div>

          <div class="row">
            <div class="form-group">
              {{ Form::label('task_cat_id', 'Category', array('class'=>'col-md-3 control-label'))  }}
              <div class="col-md-8">
               <select name="task_cat_id" id="task_cat_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach               
              </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              {{ Form::label('task_name', 'Task Name', array('class'=>'col-md-3 control-label'))  }}
              <div class="col-md-8">
               {{ Form::text('task_name', null, array('class'=>'form-control')) }}
              </div>
            </div>
          </div>

			
		      {{ Form::submit('submit', array('style'=>'display:none;', 'id'=>'add-this-task')) }}
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger cancel-add" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary add-task-btn" disabled="true">Add Task</button>
      </div>
    </div>

  </div>
</div>

<script>
	$(function() {
    	$('#add-task #task_name').keyup(function(){
    		if($(this).checkTaskInputs()){
    			$('.add-task-btn').removeAttr('disabled');
    		} else {
    			$('.add-task-btn').attr('disabled','disabled');
    		}
    	});

      $('#add-task #task_cat_id').change(function(){
        if($(this).checkTaskInputs()){
          $('.add-task-btn').removeAttr('disabled');
        } else {
          $('.add-task-btn').attr('disabled','disabled');
        }
      });
      
      $('#add-task #task_project_id').change(function(){
        if($(this).checkTaskInputs()){
          $('.add-task-btn').removeAttr('disabled');
        } else {
          $('.add-task-btn').attr('disabled','disabled');
        }
      });


    	$('.cancel-add').click(function(){
    		$('#add-task input').val() = '';
    	});

    	$('.add-task-btn').click(function(){
    		$("#add-this-task").click();
    	});

      $.fn.checkTaskInputs = function(){
        if($("#task_project_id").val() !== "" && $("#task_cat_id").val() !== "" && $("#task_name").val() !== ""){
          return true;
        } else {
          return false;
        }
      }
    });
</script>
