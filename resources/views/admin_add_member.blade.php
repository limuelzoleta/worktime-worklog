
<div id="addMemberModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Member</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url'=>'/admin/dashboard/add-member', 'role'=>'form', 'action'=>route('admin.add_member'), 'id'=>'add-member', 'class'=>'form-horizontal')) }}
		<div class="row">
	        <div class="form-group">
	        	{{ Form::label('team', 'Team', array('class'=>'col-md-3 control-label'))  }}
	        	<div class="col-md-8">
					<select name="team" id="team" class="form-control">
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
	        	{{ Form::label('position', 'Position', array('class'=>'col-md-3 control-label'))  }}
	        	<div class="col-md-8">
					{{ Form::text('position', null, array('class'=>'form-control', 'placeholder'=>'Position')) }}
				</div>
	        </div>
        </div>

        <div class="row">
            <div class="form-group">
                {{ Form::label('settings', 'Settings', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8 add-member-settings">
                    <div class="col-md-12">
                        {{ Form::radio('settings', 'clock', true, array()) }} <div class="radio-name">Clock only</div>
                        {{ Form::radio('settings', 'timer', false, array()) }} <div class="radio-name">Timer only</div>
                        {{ Form::radio('settings', 'both', false, array()) }} <div class="radio-name">Both</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                {{ Form::label('username', 'Username', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-8">
                    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                {{ Form::label('temp-password', 'Password', array('class'=>'col-md-3 control-label'))  }}
                <div class="col-md-5">
                    <div class="input-group">
                        {{ Form::text('temp-password', null, array('class'=>'form-control', 'disabled'=>'disabled', 'id'=>'temp-password')) }}
                        {{ Form::text('password', null, array('class'=>'form-control', 'style'=>'display:none;', 'id'=>'password')) }}
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default gen-password"><i class="glyphicon glyphicon-repeat"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			
		{{ Form::submit('submit', array('style'=>'display:none;', 'id'=>'add-this-member')) }}
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger cancel-add" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary add-member-btn" disabled="true">Add Member</button>
      </div>
    </div>

  </div>
</div>

<script>
	$(function() {
        $('.add-member-modal').click(function(){
            $('.gen-password').click();

        });

    	$('.gen-password').click(function(){
            var password = randomPassword(8);
            $("#temp-password").val(password);
            $("#password").val(password);
        });

        $('#add-member #team').change(function(){
            if($(this).val() !== "" && $("#add-member #position").val() !== "" && $("#add-member input[name='settings']").val()!=="" && $('#add-member #username').val()!==""){
                $('.add-member-btn').removeAttr('disabled');
            } else {
                $('.add-member-btn').attr('disabled', 'disabled');
            }
        });

        $('#add-member #position').keyup(function(){
            if($(this).val() !== "" && $("#add-member #team").val() !== "" && $("#add-member input[name='settings']").val()!=="" && $('#add-member #username').val()!==""){
                $('.add-member-btn').removeAttr('disabled');
            } else {
                $('.add-member-btn').attr('disabled', 'disabled');
            }
        });

        $("#add-member input[name='settings']").change(function(){
            if($(this).val() !== "" && $("#add-member #team").val() !== "" && $("#add-member #position").val()!=="" && $('#add-member #username').val()!==""){
                $('.add-member-btn').removeAttr('disabled');
            } else {
                $('.add-member-btn').attr('disabled', 'disabled');
            }
        });

        $("#add-member #username").keyup(function(){
            if($(this).val() !== "" && $("#add-member #team").val() !== "" && $("#add-member #position").val()!=="" && $("#add-member input[name='settings']").val()!==""){
                $('.add-member-btn').removeAttr('disabled');
            } else {
                $('.add-member-btn').attr('disabled', 'disabled');
            }
        });

        $('.add-member-btn').click(function(){
            $("#add-this-member").click();
        });



    });
    function randomPassword(length) {
        var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
        var pass = "";
        for (var x = 0; x < length; x++) {
            var i = Math.floor(Math.random() * chars.length);
            pass += chars.charAt(i);
        }
        return pass;
    }
    
</script>
