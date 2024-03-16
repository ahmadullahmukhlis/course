<div class="containe-fluid">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">add new student </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form  class="form-horizontal" action="{{route('student.store')}}" method="POST" id="save">
          @csrf

          <div class="card-body">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="name" placeholder="full name" name="name">
              </div>
            </div>
            <div class="form-group row">
              <label for="father_name" class="col-sm-2 col-form-label">father name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="father_name" placeholder="father name" name="father_name">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="phone" class="col-sm-2 col-form-label">contact naumber</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="phone" placeholder="phone number" name="phone">
              </div>
            </div>
            <div class="form-group row">
              <label for="age" class="col-sm-2 col-form-label">age </label>
              <div class="col-sm-6">
                <input type="date" class="form-control" id="age" placeholder="age" name="age">
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-sm-2 col-form-label">address</label>
              <div class="col-sm-6">
                <input type="test" class="form-control" id="address" placeholder="address" name="address">
              </div>
            </div>
            <div class="form-group row">
              <label for="subject" class="col-sm-2 col-form-label">subject</label>
              <div class="col-sm-6">
                <select class="form-control" name="subject_id">
                  <option selected>Select an subject</option>
                  @foreach($subject  as $sub)
                  <option value="{{$sub->id}}">{{$sub->name}}</option>
                  @endforeach
                </select>
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
    var father_name =$('#father_name').val();
    if(name=="" && father_name==""){
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