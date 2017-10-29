
<link rel="stylesheet" href="{{asset('assets/bower/wickedpicker/dist/wickedpicker.min.css')}}">

<div id="addTimeframeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Timeframe</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url'=>'/admin/dashboard/add-timeframe', 'role'=>'form', 'action'=>route('admin.add_timeframe'), 'id'=>'add-timeframe', 'class'=>'form-horizontal')) }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('tf_project_id', 'Project', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8">
                 <select name="tf_project_id" id="tf_project_id" class="form-control">
                    <option value="">Select Project</option>
                    @foreach($projects as $project)
                      <option value="{{$project->id}}">{{$project->title}}</option>
                    @endforeach               
                  </select>
                </div>
              </div>
            </div>
          </div>
		      <div class="row">
            <div class="col-md-6">
  	          <div class="form-group">
  	        	  {{ Form::label('tf_cat_id', 'Category', array('class'=>'col-md-3 control-label'))  }}
  	        	  <div class="col-md-8">
  					      <select name="tf_cat_id" id="tf_cat_id" class="form-control" disabled="disabled">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach               
                  </select>
  				      </div>
  	         </div>
           </div>
           <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('tf_task_id', 'Task', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8">
                 <select name="tf_task_id" id="tf_task_id" class="form-control" disabled="disabled">
                    <option value="">Select Task</option>
                                 
                  </select>
                </div>
             </div>
           </div>
        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('tf_est_date', 'Estimated Date', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8">
                  {{ Form::text('tf_est_date', null, array('class'=>'form-control project_tdate date', 'id'=>'tf-datepicker')) }}
                </div>
             </div>
           </div>
           <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('tf_est_time', 'Estimated Time', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8">
                 {{ Form::text('tf_est_time', null, array('class'=>'form-control project_tdate timepicker', 'id'=>'tf-timepicker')) }}
                </div>
             </div>
           </div>
        </div>

        <div class="row">
           <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('tf_team_member', 'Assign to', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8">
                 <select name="tf_team_member" id="tf_team_member" class="form-control">
                    <option value="">Select Member</option>            
                  </select>
                </div>
             </div>
           </div>
        </div>

			
		{{ Form::submit('submit', array('style'=>'display:none;', 'id'=>'add-this-timeframe')) }}
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success add-timeframe-btn">Add Timeframe</button>
        <button type="button" class="btn btn-danger cancel-add" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>

  </div>
</div>
<script type="text/javascript" src="{{asset('assets/bower/wickedpicker/dist/wickedpicker.min.js')}}"></script>
<script>

var options = { 
    now: "00:00", //hh:mm 24 hour format only, defaults to current time 
    twentyFour: true, //Display 24 hour format, defaults to false 
    upArrow: 'wickedpicker__controls__control-up', //The up arrow class selector to use, for custom CSS 
    downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS 
    close: 'wickedpicker__close', //The close class selector to use, for custom CSS 
    hoverState: 'hover-state', //The hover state class to use, for custom CSS 
    title: 'Pick Estimated Time', //The Wickedpicker's title, 
    showSeconds: false, //Whether or not to show seconds, 
    secondsInterval: 1, //Change interval for seconds, defaults to 1  , 
    minutesInterval: 1, //Change interval for minutes, defaults to 1 
    beforeShow: null, //A function to be called before the Wickedpicker is shown 
    show: null, //A function to be called when the Wickedpicker is shown 
    clearable: false, //Make the picker's input clearable (has clickable "x")  
};
	$(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var token = '{{ csrf_token() }}';
      $("#tf-datepicker").datepicker();
      $(".timepicker").wickedpicker(options);

    	$('#tf_project_id').change(function(){
    		if($(this).val() !== ""){
    			$('#tf_cat_id').removeAttr('disabled');
    		} else {
    			$('#tf_cat_id').attr('disabled','disabled');
    		}

        var project_id = $(this).val();
        var data = {
            _token : token,
            project_id : project_id,
        };

        $("#tf_team_member").html('');
        $.ajax({
            type: 'post',
            url: '{{ route('admin.get_tf_team_members') }}',
            data: data,
            dataType: 'json',
          }).done(function(data){
            if(data.status === 'success'){
              // var html ='<option value="">Select Task</option>';
              data.members.forEach(function(member){
                $("#tf_team_member").append("<option value='"+ member.id +"'>"+ member.username + "</option>");
              });

              // $("#tf_task_id").html(html);

            }
          });




    	});

      $("#tf_cat_id").change(function(){
          var tf_project_id = $("#tf_project_id").val();
          var tf_cat_id = $("#tf_cat_id").val();

          var data = {
            _token : token,
            project_id : tf_project_id,
            category_id : tf_cat_id
          };


           $("#tf_task_id").html('');
          $.ajax({
            type: 'post',
            url: '{{ route('admin.get_timeframe_tasks') }}',
            data: data,
            dataType: 'json',
          }).done(function(data){
            if(data.status === 'success'){
              console.log(data);
              // var html ='<option value="">Select Task</option>';
              data.tf_tasks.forEach(function(task){
                $("#tf_task_id").append("<option value='"+ task.id +"'>"+ task.task_name + "</option>");
              });

              // $("#tf_task_id").html(html);
              $("#tf_task_id").removeAttr('disabled');

            }
          });
      });
    	$('.cancel-add').click(function(){
    		$('#add-category input').val() = '';
    	});

    	$('.add-timeframe-btn').click(function(){
    		$("#add-this-timeframe").click();
    	});
    });
</script>
