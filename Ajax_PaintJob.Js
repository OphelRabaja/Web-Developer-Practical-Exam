$('.mark-as-done-btn').on('click', function(e) 
{
  e.preventDefault();

  var jobId = $(this).data('job-id');

  $.ajax({
    url: '/paint_jobs/' + jobId,
    type: 'PUT',
    data: 
    {
      _token: '{{ csrf_token() }}'
    },
    success: function(response) 
    {
      console.log(response);
    },
    error: function(xhr) 
    {
      console.log(xhr.responseText);
    }
  });
});
