<?php @$q=@$_GET['q']; ?>
<!DOCTYPE html>
<html>
 <head>
  <title>Cari Hadits</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </head>
 <body>
 <main id="main-container">
  <div class="content">

		  
		   <div class="row justify-content-center">
			  <div class="col-12 col-md-10 col-lg-8">
				 <form class="card card-sm" method="get" action="">
					<div class="card-body row no-gutters align-items-center">
					   <div class="col-auto">
						  <i class="fas fa-search h4 text-body"></i>
					   </div>
					   <!--end of col-->
					   <div class="col">
						  <input class="form-control form-control-lg form-control-borderless" type="search" name="q" value="<?php echo @$q; ?>" placeholder="Cari Hadits">
					   </div>
					   <!--end of col-->
					   <div class="col-auto">
						  <button class="btn btn-lg btn-success" type="submit">Search</button>
					   </div>
					   <!--end of col-->
					</div>
				 </form>
			  </div>
			  <!--end of col-->
		   </div>




  <div class="block">
   <div id="load_data"></div>
   <div id="load_data_message"></div>
   <br />
   <br />
   <br />
   <br />
   <br />
   <br />
  </div>
 </div>
  </main>
 </body>
</html>
<script>

$(document).ready(function(){
 var limit = 5;
 var start = 1;
 var action = 'inactive';
 function load_radio_data(limit, start)
 {
  $.ajax({
   url:"data.php?q=<?php echo $q; ?>",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<br><button type='button' class='btn btn-info' style=\"width:60%;margin: auto;position:center\"><small>No Data Found/End Data</small></button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<div class=\"spinner-border\" role=\"status\"><span class=\"sr-only\"  style=\"margin: auto;position:center\">Loading...</span></div>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_radio_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_radio_data(limit, start);
   }, 1);
  }
 });
 
});
</script>