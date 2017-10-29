
<div id="addTeamModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Team</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url'=>'/admin/dashboard/add-team', 'role'=>'form', 'action'=>route('admin.add_team'), 'id'=>'add-team', 'class'=>'form-horizontal')) }}
		<div class="row">
	        <div class="form-group">
	        	{{ Form::label('name', 'Name', array('class'=>'col-md-3 control-label'))  }}
	        	<div class="col-md-8">
					{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Team Name')) }}
				</div>
	        </div>
        </div>

        <div class="row">
	        <div class="form-group">
	        	{{ Form::label('description', 'Description', array('class'=>'col-md-3 control-label'))  }}
	        	<div class="col-md-8">
					{{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Description')) }}
				</div>
	        </div>
        </div>
			
		{{ Form::submit('submit', array('style'=>'display:none;', 'id'=>'add-this-team')) }}
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger cancel-add" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary add-team-btn" disabled="true">Add Team</button>
      </div>
    </div>

  </div>
</div>

<script>
	$(function() {
    	$('#add-team input').keyup(function(){
    		if($(this).val() !== "" && $("#add-team textarea").val()!== ""){
    			$('.add-team-btn').removeAttr('disabled');
    		} else {
    			$('.add-team-btn').attr('disabled','disabled');
    		}
    	});

    	$('#add-team textarea').keyup(function(){
    		if($(this).val() !== "" && $("#add-team input").val()!== ""){
    			$('.add-team-btn').removeAttr('disabled');
    		} else {
    			$('.add-team-btn').attr('disabled','disabled');
    		}
    	});
    	$('.cancel-add').click(function(){
    		$('#add-team input').val() = '';
    		$('#add-team textarea').val() = '';
    	});

    	$('.add-team-btn').click(function(){
    		$("#add-this-team").click();
    	});
    });
</script>
