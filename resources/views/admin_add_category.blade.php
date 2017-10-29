
<div id="addCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url'=>'/admin/dashboard/add-category', 'role'=>'form', 'action'=>route('admin.add_category'), 'id'=>'add-category', 'class'=>'form-horizontal')) }}
		<div class="row">
	        <div class="form-group">
	        	{{ Form::label('category_name', 'Category', array('class'=>'col-md-3 control-label'))  }}
	        	<div class="col-md-8">
					{{ Form::text('category_name', null, array('class'=>'form-control')) }}
				</div>
	        </div>
        </div>

			
		{{ Form::submit('submit', array('style'=>'display:none;', 'id'=>'add-this-category')) }}
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger cancel-add" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary add-category-btn" disabled="true">Add Category</button>
      </div>
    </div>

  </div>
</div>

<script>
	$(function() {
    	$('#add-category input').keyup(function(){
    		if($(this).val() !== ""){
    			$('.add-category-btn').removeAttr('disabled');
    		} else {
    			$('.add-category-btn').attr('disabled','disabled');
    		}
    	});
    	$('.cancel-add').click(function(){
    		$('#add-category input').val() = '';
    	});

    	$('.add-category-btn').click(function(){
    		$("#add-this-category").click();
    	});
    });
</script>
