<?php 
    require_once("../functions.php"); 
    require_once("functions.php");

    if(!isset($_SESSION['type']) & empty($_SESSION['type'])) {  //checks if no session type exists, which means no logged in user.
      redirect('../index.php');                               //redirects to normal index.
  }
  if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is Tutor. Proceeds to page.
      if($_SESSION['type'] == 'Student') {    //checks if the type is student.
          redirect('../student/index.php');
      }elseif($_SESSION['type'] == 'Assistant') { //checks if the type is assistant.
          redirect('../assistant/index.php');
      }elseif($_SESSION['type'] == 'Admin') { //checks if the type is admin.
          redirect('../admin/index.php');
      }
  } 
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
    <meta charset='UTF-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="../assets/images/lc-logo1-121x74.png" type="image/x-icon">
    <meta name="description" content="">

    <title>Tutor Calendar - LC:TAM</title>
      <link rel="stylesheet" href="../assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/socicon/css/styles.css">
    <link rel="stylesheet" href="../assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="preload" as="style" href="../assets/mobirise/css/mbr-additional.css">
    
    <!-- css calendario -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /><!-- esta el css que cambia las letras y el colo r de las letras -->
    <!-- termina css calendario -->
    <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
    <!-- css calendario -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <!-- termina css calendario -->
      <script>
  
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({ //sets calendar variable. calendar plugin.
    editable:false,   //events cannot be edited. this disables the popup.
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php', //from this php, it loads the data from the DB.
    selectable:false,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {

      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:false,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },
 
    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },
   });
  });
  
  </script>
  <style>
   .fc-event {
	position: relative;
	display: block;
	font-size: .85em;
	line-height: 1.3;
	border-radius: 3px;
	border: 1px solid #fd8f00
}
.fc-event, .fc-event-dot {
	background-color: #fd8f00
}

  </style>
</head>
<body>
    <?php
        select_header($_SESSION['type']);
    ?>
     <div class="row featurette justify-content-center ">
        <div class="container text-center">
          <!-- <div class = "container container-sm"> -->
            <h1 class="display-3 text-center">Calendar of <?php echo $_SESSION['name']; ?></h1>
        </div>
          <!-- <div class="container"> -->
        <div class="col-md-8">
          <div id="calendar"></div>
        </div>
           <!-- </div> -->
    </div><br><br>
  <?php
      bottom_footer();
      credit_mobirise_1();
        ?>
</body>
</html>