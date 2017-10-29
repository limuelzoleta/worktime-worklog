
<div id="myWorklogModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Worklog</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url'=>'/admin/dashboard/add-category', 'role'=>'form', 'action'=>route('admin.add_category'), 'id'=>'add-category', 'class'=>'form-horizontal')) }}
		      <div class="row">
            <div class="col-md-6">
    	        <div class="form-group">
    	        	{{ Form::label('task', 'Task', array('class'=>'col-md-3 control-label'))  }}
    	        	<div class="col-md-8">
    					    <select name="task" id="task" class="form-control">
                    <option value="">Select Task</option>
                    @foreach($tasks as $task)
                      <option value="{{$task->id}}">{{$task->task_name}}</option>
                    @endforeach               
                  </select>
    				    </div>
    	        </div>
            </div>
            <div class="col-md-6 timeframe-block">
              <div class="form-group">
                {{ Form::label('', 'Timeframe', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8">
                  <div class="task-timeframe"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('clock_in', 'Clock in', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8">
                  <div class="input-group">
                    {{ Form::text('clock_in', null, array('class'=>'form-control', 'placeholder'=>'20:00')) }}
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li style="width: 13%;"><a class="tabsTitle">Logs</a></li>
              <li class="active"><a data-toggle="tab" href="#menu1">Select by time</a></li>
              <li><a data-toggle="tab" href="#menu2">Select by timer</a></li>
            </ul>

            <div class="tab-content">
              <div id="menu1" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-6">
                  <div class="col-md-3"></div>
                  <div class="col-md-9">
                    <div class="input-group">
                      {{ Form::text('clock_in', null, array('class'=>'form-control', 'placeholder'=>'20:00')) }}
                      <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                  </div>
                  </div>
                </div>

                <div class="row">
                  {{ Form::label('location', 'Location', array('class'=>'col-md-2 control-label'))  }}
                  <div class="col-md-8">
                      {{ Form::text('location', null, array('class'=>'form-control', 'placeholder'=>'http://location.com/')) }}
                  </div>
                </div>

                <div class="row">
                  {{ Form::label('collab', 'Collaborated With', array('class'=>'col-md-2 control-label'))  }}
                  <div class="col-md-8">
                      {{ Form::text('collab', null, array('class'=>'form-control')) }}
                  </div>
                </div>

                <div class="row">
                  {{ Form::label('desc', 'Description', array('class'=>'col-md-2 control-label'))  }}
                  <div class="col-md-8">
                      {{ Form::textarea('desc', null, array('class'=>'form-control')) }}
                  </div>
                </div>
              </div>
              <div id="menu2" class="tab-pane fade">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">

                  <div class="timer">00:00</div>
                  <button class="btn btn-primary" id="wl-start">Start</button>
                  <button class="btn btn-danger" id="wl-reset">Reset</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>

			
		{{ Form::submit('submit', array('style'=>'display:none;', 'id'=>'add-this-category')) }}
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger cancel-add" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary add-category-btn">Save</button>
      </div>
    </div>

  </div>
</div>

<script>
  var timerRunning = false;
  var interval;
  var token = {{ csrf_token() }}
	$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#wl-start').click(function(){
      if(timerRunning){
        $(this).html('Resume');
        timerRunning = false;
        clearInterval(interval);
      } else {
        timerRunning = true;
        $(this).html('Pause');
        var timer2 = $('.timer').html();
         interval = setInterval(function() {

          var timer = timer2.split(':');
          //by parsing integer, I avoid all extra string processing
          var minutes = parseInt(timer[0], 10);
          var seconds = parseInt(timer[1], 10);
          seconds++;
          minutes = (seconds > 59) ? ++minutes : minutes;
          
          seconds = (seconds > 59) ? 0 : seconds;
          seconds = (seconds < 10) ? '0' + seconds : seconds;
          minutes = (minutes < 10) ? '0' + minutes : minutes;
          $('.timer').html(minutes + ':' + seconds);
          timer2 = minutes + ':' + seconds;

        }, 1000);
      }

     
      return false;
    });

    $('#wl-reset').click(function(){
      $('#wl-start').html('Start');
      clearInterval(interval);
      timerRunning = false;
      $('.timer').html('00:00');

      return false;
    });

    $('#task').change(function(){
      if($(this).val() === ''){
        return;
      }

      var data = {
        _token : token,
        task_id : $(this).val()
      };
      $.ajax({
        type: 'post',
        url: '{{ route('users_home.get_tf_info') }}',
        data: data,
        dataType: 'json',
      }).done(function(data){
        
      }).error(function(e){

      });

    });
  });
</script>
