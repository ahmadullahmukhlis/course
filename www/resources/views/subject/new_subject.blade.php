<div class="containe-fluid">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">add new subject </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form  class="form-horizontal" action="{{route('subject.store')}}" method="POST" id="save">
          @csrf

          <div class="card-body">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="name" placeholder="subject name" name="name">
              </div>
            </div>
           
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info" >save</button>
            <button type="button" class="btn btn-default float-right" id="Cancel">Cancel</button>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
</div>



<script>
  $(document).ready(function() {
  $('#save').submit(function(event) {
    event.preventDefault(); // Prevent form submission
    // the form action geting
    var name =$('#name').val();
    if(name==""){
     alert("you must fail the faild");
    }else{
    var action = $('#save').attr('action');
    // Serialize form data as an array of objects
    var formData = $('#save').serializeArray();
    // ajax function call here 
 
    $.ajax({
      url: action, // Replace with the URL to your server-side script
      type: 'POST',
      data: formData,
      success: function(data) {
        $('#content').html('')
           $('#content').html(data.html)
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle any errors that occurred during the request
        console.error(textStatus, errorThrown);
        alert('An error occurred while saving the data.');
      }
    });
  }
  });
});
</script>