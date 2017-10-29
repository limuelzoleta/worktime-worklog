
<div id="addProjectModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Project</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url'=>'/admin/dashboard/add-project', 'role'=>'form', 'action'=>route('admin.add_project'), 'id'=>'add-project', 'class'=>'form-horizontal')) }}
		    <div class="row">
  	        <div class="form-group">
  	        	{{ Form::label('title', 'Title', array('class'=>'col-md-3 control-label'))  }}
  	        	<div class="col-md-8">
  					     {{ Form::text('title', null, array('class'=>'form-control')) }}
  				    </div>
  	        </div>
        </div>
        <div class="row">
          <div class="form-group">
            {{ Form::label('project_team', 'Team', array('class'=>'col-md-3 control-label'))  }}
            <div class="col-md-8">
              <select name="project_team" id="project_team" class="form-control">
                <option value="">Select Team</option>
                @foreach($teams as $team)
                  <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach               
              </select>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="form-group">
              {{ Form::label('target_date', 'Target Date', array('class'=>'col-md-3 control-label'))  }}
              <div class="col-md-8">
                 {{ Form::text('target_date', null, array('class'=>'form-control project_tdate', 'id'=>'project-datepicker')) }}
              </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
              {{ Form::label('project_desc', 'Description', array('class'=>'col-md-3 control-label'))  }}
              <div class="col-md-8">
                 {{ Form::textarea('project_desc', null, array('class'=>'form-control')) }}
              </div>
            </div>
        </div>


			
		{{ Form::submit('submit', array('style'=>'display:none;', 'id'=>'add-this-project')) }}
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger cancel-add" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary add-project-btn" disabled="true">Add Project</button>
      </div>
    </div>

  </div>
</div>

<script>
	$(function() {

      $("#project-datepicker").datepicker();
    	$('#add-project #title').keyup(function(){
    		if($(this).checkProjectInputs()){
    			$('.add-project-btn').removeAttr('disabled');
    		} else {
    			$('.add-project-btn').attr('disabled','disabled');
    		}
    	});
      $('#add-project #project_team').change(function(){
        if($(this).checkProjectInputs()){
          $('.add-project-btn').removeAttr('disabled');
        } else {
          $('.add-project-btn').attr('disabled','disabled');
        }
      });
      $('#add-project #project_desc').keyup(function(){
        if($(this).checkProjectInputs()){
          $('.add-project-btn').removeAttr('disabled');
        } else {
          $('.add-project-btn').attr('disabled','disabled');
        }
      });
      $('#add-project .project_tdate').change(function(){
        if($(this).checkProjectInputs()){
          $('.add-project-btn').removeAttr('disabled');
        } else {
          $('.add-project-btn').attr('disabled','disabled');
        }
      });


    	$('.cancel-add').click(function(){
    		$('#add-project input').val() = '';
    	});

    	$('.add-project-btn').click(function(){
    		$("#add-this-project").click();
    	});


      $.fn.checkProjectInputs = function(){
        if($("#title").val() !== '' && $("#project_team").val() !== "" && $(".project_tdate").val() !== "" && $("#project_desc").val()!=="") {

          return true;
        } else {
          return false;
        }
      }
    });
</script>
