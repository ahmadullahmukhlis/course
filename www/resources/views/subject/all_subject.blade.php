<meta name="csrf-token" content="{{csrf_token()}}">
<div class="containe-fluid">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">all subjects </h3>
        </div>
        <!-- /.card-header -->
       <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>name</th>
                    <th>delete</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{$subject->name}}</td>
                    
                    <td><a class="delete" href="{{route('subject.destroy',['subject'=>$subject->id])}}"><i class="fas fa-trash  text-danger"></i></a></td>
                     <td><a class="edit" href="{{route('subject.edit',['subject'=>$subject->id])}}"><i class="fas fa-pencil-alt  text-warning"></i></a></td>
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