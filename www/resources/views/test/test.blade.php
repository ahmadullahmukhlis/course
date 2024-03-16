<meta name="csrf-token" content="{{csrf_token()}}">
<div class="containe-fluid">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">all students that have taken the test or not in current month </h3>
        </div>
        <!-- /.card-header -->
       <div class="table-responsive">
        <h1 class="text-center">none taken student</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>name</th>
                    <th>father name</th>
                    <th>contact naumber</th>
                    <th>address</th>
                    <th>age</th>
                    <th>add fees</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->father_name}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->age}}</td>
                    <td><a class="add_fess btn btn-info add_fees" data-id="{{$student->id}}">add test marks</a></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
       </div>

       <div class="table-responsive">
        <h1 class="text-center">taken test </h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>name</th>
                    <th>father name</th>
                    <th>contact naumber</th>
                    <th>address</th>
                    <th>age</th>
                    <th>history</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach($test as $student)
                <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->father_name}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->age}}</td>
                    <td><a class="add_fess btn btn-info show" href="{{route('student.show',['student'=>$student->id])}}" >history</a></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
       </div>
        
      </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="add_fees_modal" tabindex="-1" role="dialog" aria-labelledby="add_fees_modalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add maeks to student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="fees_form" action="{{ route('test.store') }}">
     <div class="modal-body">
        <!-- amount Field -->
        <input type="hidden" name="student_id" id="student_id" >
        <div class="mb-3">
            <label for="name" class="form-label">score</label>
            <input type="text" class="form-control "
                id="score" name="score" placeholder="Ex: 200">
      
        <div class="mb-3">
            <label for="name" class="form-label">test date</label>
            <input type="date" class="form-control "
                id="date" name="date" placeholder="Ex: 200">
      
        <div class="form-group ">
            <label for="subject" class=" col-form-label">subject</label>
            <select class="form-control" name="subject_id" id="subject_id">
                <option selected disabled>Select an subject</option>
                @foreach($subject  as $sub)
                <option value="{{$sub->id}}">{{$sub->name}}</option>
                @endforeach
              </select>
        
          </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">add marks</button>
      </div>
     </form>
    </div>
  </div>
</div>



  <script>
    $(document).ready(function(){
        //edit the record code
        $('.edit').click(function(e){
            e.preventDefault();
            var href = $('.edit').attr('href');
            $.ajax({
                url: href, // Replace with the URL to your server-side script
                type: 'GET',
                success: function(data){
                $('#content').html('')
                $('#content').html(data.html)
                 }
            })
        });
        // delete the record code here
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete').click(function(e){
            e.preventDefault();
            var href = $('.delete').attr('href');
           if(confirm("do you want to delete this record")){
            $.ajax({
                url: href, // Replace with the URL to your server-side script
                type: 'DELETE',
                success: function(data){
                alert('the record has been deletedd')
                 }
            })
           }
        });


        $('.add_fees').click(function(e){
            e.preventDefault()
            id = $(this).data('id')
            $('#student_id').val(id)
            $('#add_fees_modal').modal('show')
        })


       $(document).on('submit','#fees_form',function(e){
        event.preventDefault(); // Prevent form submission
    // the form action geting
    var score =$('#score').val();
    if(score==""){
     alert("you must fail the faild");
    }else{
    var action = $(this).attr('action');
    // Serialize form data as an array of objects
    var formData = $(this).serializeArray();
    // ajax function call here 
    $('#add_fees_modal').modal('hide')
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

   //edit the record code
   $('.show').click(function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            $.ajax({
                url: href, // Replace with the URL to your server-side script
                type: 'GET',
                success: function(data){
                $('#content').html('')
                $('#content').html(data.html)
                 }
            })
        });
       
       })



  </script>