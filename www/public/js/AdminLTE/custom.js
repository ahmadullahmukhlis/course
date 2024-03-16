function autoloading() {
    $(document).ready(function() {
        $('.nav-treeview li a').click(function(event) {
          event.preventDefault(); // Prevent default routing
          
  
          var href = $(this).attr('href'); // Get href attribute
          //ajax call for loading wiev
          $.ajax({
            url: href, // URL of the server-side script
            type: 'GET', // HTTP method
            success: function (data) {
              $('#content').html('')
           $('#content').html(data.html) // Display the response in the 'content' div
          },
            error: function(xhr, status, error) {
             console.log('AJAX request error:', status, error);
          }
           });

        });
});
  
  
}
//the loading view function is called
autoloading();

$('#search').keyup(function(){
  let search = $(this).val()
  link = $(this).data('id');

  $.ajax({
    url: link, // URL of the server-side script
    type: 'get', // HTTP method
    data:{
      search:search
    },
    success: function (data) {
      $('#content').html('')
   $('#content').html(data.html) // Display the response in the 'content' div
  },
    error: function(xhr, status, error) {
     console.log('AJAX request error:', status, error);
  }
   });
})