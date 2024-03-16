<meta name="csrf-token" content="{{csrf_token()}}">
<div class="containe-fluid">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title"> students information </h3>
        </div>
        <!-- /.card-header -->
        <div class="row p-2  ">
            <div class="col-md-3 ">
               <b> name</b>
            </div>
            <div class="col-md-3 ">
                {{$student->name ?? ''}}
             </div>
             <div class="col-md-3 ">
                <b> father name</b>
             </div>
             <div class="col-md-3 ">
                {{$student->father_name}}
              </div>
              <div class="col-md-3 ">
                <b> phone</b>
             </div>
             <div class="col-md-3 ">
                {{$student->phone}}
              </div>
              <div class="col-md-3 ">
                <b> age</b>
             </div>
             <div class="col-md-3 ">
                {{$student->age}}
              </div>
              <div class="col-md-3 ">
                <b> address</b>
             </div>
             <div class="col-md-3 ">
                {{$student->address}}
              </div>
              <div class="col-md-3 ">
                <b> subject</b>
             </div>
             <div class="col-md-3 ">
                {{$student->subject->name}}
              </div>
        </div>
       <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>fees</th>
                    <th>date</th>
                    <th>subject</th>
                    
                </tr>
            </thead>
            <tbody>
               @foreach ($student->fees as $item)
               <tr>
                <td>{{$item->amount}}</td>
                <td>{{$item->paydate}}</td>
                <td>{{$item->subject->name}}</td>


               </tr>
               @endforeach
            </tbody>
        </table>
       </div>
       <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>marks</th>
                    <th>date</th>
                    <th>subject</th>
                    
                </tr>
            </thead>
            <tbody>
               @foreach ($student->test as $item)
               <tr>
                <td>{{$item->test_score}}</td>
                <td>{{$item->test_date}}</td>
                <td>{{$item->subject?->name ?? ''}}</td>


               </tr>
               @endforeach
            </tbody>
        </table>
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
                    $('#content').html('')
                $('#content').html(data.html)
                 }
            })
           }
        });
    });
  </script>