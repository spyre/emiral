jQuery(document).ready(function($) {
  //$('#nav a').last().addClass('last');
  $('#leftselect').change(function(){
    var filmId = $('#leftselect').find(":selected").val();
    console.log(filmId + " " + $('#leftselect').find(":selected").html() );




            jQuery.ajax({
              type:'POST',
              data:{action:'actiune_legatura', fid:filmId},
              url: "http://localhost:8080/zecl_workspace/wp2/wordpress/wp-admin/admin-ajax.php",
              success: function(response) {
                //val = value;
                console.log('RESPONSE: ' + response);
                jsonResponse = JSON.parse(response);
                for(i=0; i<jsonResponse.length; i++){
                  console.log(jsonResponse[i]);
                   $('#rightselect').append($('<option>').text(jsonResponse[i]['first_name']).attr('value', jsonResponse[i]['actor_id']));
                }
              },
              complete: function(){
                // jQuery(this).html(val);
              }
            });


  });
})
