<?php 
       require_once("../functions.php"); 
       require_once("functions.php") 
?>

<!DOCTYPE html>
<html>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
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
      <link rel="preload" as="style" href="../assets/mobirise/css/mbr-additional.css">
      <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">

      <!-- Links de calendar -->
      
      <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
      <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
      <link rel="stylesheet" href="prueba/css/style.css">
        <style>
        /*----------------------- CSS HOME PAGE*/

        
        .cards{
            text-align: center;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            justify-content:center;

            }
            .card {
            flex: 0 0 270px;
            margin: 10px;
            border: 1px solid #ccc;
            height: 303.5px;
            box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
            background-color: white;
            }

            .card .text {
            padding: 0 5px 5px;
            }


            .card > .text > h3 {
            font-size:30px;
            text-shadow: 2px 5px 6px  rgba(0,0,0,0.3);
            }

            .card .text > button {
            background: #fd8f00;
            border: 1;
            color: white;
            padding: 15px;
            width: 100%;
            }

            .home_button {
                font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
                border: 4px solid #fd8f00;
                border-radius: 12px;
                padding: 5px;
                color: #fd8f00;
                background-color: white;
                text-align: center;
                font-weight: bold;
                text-decoration: none;
                display: inline-block;
                transition-duration: 0.4s;
                cursor: pointer;
                width: auto;
                font-size: 19px;
                box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
                /*hsl(44, 63%, 89%)*/
            }

    .text_title{
                text-align: center;
                padding: 15px;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            }
    </style>

    </head>
    <body>

        <?php
            
          top_header_6();
        ?>
        <div class="container theme-showcase">
        <h1 class="text_title">Calendar</h1>
        <div id="holder" class="row" ></div>
        </div>


        <script type="text/tmpl" id="tmpl">
        {{ 
        var date = date || new Date(),
            month = date.getMonth(), 
            year = date.getFullYear(), 
            first = new Date(year, month, 1), 
            last = new Date(year, month + 1, 0),
            startingDay = first.getDay(), 
            thedate = new Date(year, month, 1 - startingDay),
            dayclass = lastmonthcss,
            today = new Date(),
            i, j; 
        if (mode === 'week') {
            thedate = new Date(date);
            thedate.setDate(date.getDate() - date.getDay());
            first = new Date(thedate);
            last = new Date(thedate);
            last.setDate(last.getDate()+6);
        } else if (mode === 'day') {
            thedate = new Date(date);
            first = new Date(thedate);
            last = new Date(thedate);
            last.setDate(thedate.getDate() + 1);
        }
        
        }}
        <table class="calendar-table table table-condensed table-tight">
            <thead>
            <tr>
                <td colspan="7" style="text-align: center">
                <table style="white-space: nowrap; width: 100%">
                    <tr>
                    <td style="text-align: left;">
                        <span class="btn-group">
                        <button class="js-cal-prev btn btn-default">&lt;</button>
                        <button class="js-cal-next btn btn-default">&gt;</button>
                        </span>
                        <button class="js-cal-option btn btn-default {{: first.toDateInt() <= today.toDateInt() && today.toDateInt() <= last.toDateInt() ? 'active':'' }}" data-date="{{: today.toISOString()}}" data-mode="month">{{: todayname }}</button>
                    </td>
                    <td>
                        <span class="btn-group btn-group-lg">
                        {{ if (mode !== 'day') { }}
                            {{ if (mode === 'month') { }}<button class="js-cal-option btn btn-link" data-mode="year">{{: months[month] }}</button>{{ } }}
                            {{ if (mode ==='week') { }}
                            <button class="btn btn-link disabled">{{: shortMonths[first.getMonth()] }} {{: first.getDate() }} - {{: shortMonths[last.getMonth()] }} {{: last.getDate() }}</button>
                            {{ } }}
                            <button class="js-cal-years btn btn-link">{{: year}}</button> 
                        {{ } else { }}
                            <button class="btn btn-link disabled">{{: date.toDateString() }}</button> 
                        {{ } }}
                        </span>
                    </td>
                    <td style="text-align: right">
                        <span class="btn-group">>
                        <button class="js-cal-option btn btn-default {{: mode==='month'? 'active':'' }}" data-mode="month">Month</button>
                        <button class="js-cal-option btn btn-default {{: mode==='week'? 'active':'' }}" data-mode="week">Week</button>
                        <button class="js-cal-option btn btn-default {{: mode==='day'? 'active':'' }}" data-mode="day">Day</button>
                        </span>
                    </td>
                    </tr>
                </table>
                
                </td>
            </tr>
            </thead>
            {{ if (mode ==='year') {
            month = 0;
            }}
            <tbody>
            {{ for (j = 0; j < 3; j++) { }}
            <tr>
                {{ for (i = 0; i < 4; i++) { }}
                <td class="calendar-month month-{{:month}} js-cal-option" data-date="{{: new Date(year, month, 1).toISOString() }}" data-mode="month">
                {{: months[month] }}
                {{ month++;}}
                </td>
                {{ } }}
            </tr>
            {{ } }}
            </tbody>
            {{ } }}
            {{ if (mode ==='month' || mode ==='week') { }}
            <thead>
            <tr class="c-weeks">
                {{ for (i = 0; i < 7; i++) { }}
                <th class="c-name">
                    {{: days[i] }}
                </th>
                {{ } }}
            </tr>
            </thead>
            <tbody>
            {{ for (j = 0; j < 6 && (j < 1 || mode === 'month'); j++) { }}
            <tr>
                {{ for (i = 0; i < 7; i++) { }}
                {{ if (thedate > last) { dayclass = nextmonthcss; } else if (thedate >= first) { dayclass = thismonthcss; } }}
                <td class="calendar-day {{: dayclass }} {{: thedate.toDateCssClass() }} {{: date.toDateCssClass() === thedate.toDateCssClass() ? 'selected':'' }} {{: daycss[i] }} js-cal-option" data-date="{{: thedate.toISOString() }}">
                <div class="date">{{: thedate.getDate() }}</div>
                {{ thedate.setDate(thedate.getDate() + 1);}}
                </td>
                {{ } }}
            </tr>
            {{ } }}
            </tbody>
            {{ } }}
            {{ if (mode ==='day') { }}
            <tbody>
            <tr>
                <td colspan="7">
                <table class="table table-striped table-condensed table-tight-vert" >
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th style="text-align: center; width: 100%">{{: days[date.getDay()] }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="timetitle" >All Day</th>
                        <td class="{{: date.toDateCssClass() }}">  </td>
                    </tr>
                    <tr>
                        <th class="timetitle" >Before 6 AM</th>
                        <td class="time-0-0"> </td>
                    </tr>
                    {{for (i = 6; i < 22; i++) { }}
                    <tr>
                        <th class="timetitle" >{{: i <= 12 ? i : i - 12 }} {{: i < 12 ? "AM" : "PM"}}</th>
                        <td class="time-{{: i}}-0"> </td>
                    </tr>
                    <tr>
                        <th class="timetitle" >{{: i <= 12 ? i : i - 12 }}:30 {{: i < 12 ? "AM" : "PM"}}</th>
                        <td class="time-{{: i}}-30"> </td>
                    </tr>
                    {{ } }}
                    <tr>
                        <th class="timetitle" >After 10 PM</th>
                        <td class="time-22-0"> </td>
                    </tr>
                    </tbody>
                </table>
                </td>
            </tr>
            </tbody>
            {{ } }}
        </table>
        </script>

        <script src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>

    <script src="prueba/js/index.js"></script>

        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>
