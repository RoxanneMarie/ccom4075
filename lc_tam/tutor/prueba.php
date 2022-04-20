<?php 
    require_once("../functions.php"); 
    require_once("functions.php") 
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
    <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
    <link href='../assets/fullcalendar/main.css' rel='stylesheet' />
  </head>
  <body>
        <?php
            top_header_6();
        ?>
    <div class = "container container-sm">
    <h1 class="display-3 text-center">Calendar of <?php echo $_SESSION['name']; ?></h1>
        <div id='calendar'></div><br><br>
    </div>
    <?php
      bottom_footer();
      credit_mobirise_1();
        ?>
  </body>
  <script src='../assets/fullcalendar/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
          /*initialView: 'dayGridMonth',*/
          headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
  events: [
    {
      /*id: ID Unico para uso de getEventById();
      //groupId: No aplica debido al uso del calendario para el proyecto.
      //allDay: tampoco aplica ya que ninguna tutoria sera todo el dia.
      //start: Inicio de actividad (Tutoria), debe seguir el formato 'YYYY-MM-DDTHH-MM, similar a el formato de HTML de date.
      //end: Final de la actividad, puede ir null lo que el programa asumira que puede ser todo el dia (?)
      //starStr: no aplica
      //endStr: no aplica
      //title: El titulo de la actividad.
      //url: Debatible (?) si aplica. Hace que si le das click cargue un URL.
      //classNames: no aplica (?)
      //editable: Si se permite editar. Usa booleanos para saber si es permitible o no.
      //startEditable: no aplica (?)
      //durationEditable: no aplica (?)
      //resourceEditable: no aplica (?)
      //display: Hace un estilo especifico de display si es deseado.
      //overlap: no aplica (?)
      Ejemplo:
      id: 1
      allDay: 'false',
      start: '2022-04-25',
      end: '2022-04-25',
      title: 'CCOM3002 M/J 2:00pm - 3:00pm',
      editable: 'false',
      display: 'block'

      */      
      allDay: 'false',
      start: '2022-04-25',
      end: '2022-04-25',
      title: 'CCOM3002 M/J 2:00pm - 3:00pm',
      editable: 'false',
      display: 'block'
      /*start: '2022-04-10',
      end: '2022-04-10',
      display: 'background'*/
    }
  ]
        });
        
        calendar.render();
      });

    </script>
</html>