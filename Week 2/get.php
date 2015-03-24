<div id="calendar">
<?php
    $host = 'mysql.metropolia.fi';
    $dbname = ''; // your username
    $user = ''; // your username
    $pass = ''; // your database password
    
    try {
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $DBH->query("SET NAMES 'UTF8';");
        
        } catch(PDOException $e) {
            echo "Could not connect to database.";
            file_put_contents('log.txt', $e->getMessage(), FILE_APPEND);
        }

try {
    $eventList = array();
    $sql = "SELECT * FROM calendar ORDER BY eDate ASC";
    $STH = $DBH->query($sql);
    $STH->setFetchMode(PDO::FETCH_OBJ);
    while ($row = $STH->fetch()){
		// create standard object which complies with this: http://fullcalendar.io/docs/event_data/Event_Object/
		
		$event = new stdClass();
    	$event->start = $row->eDate;
		// TODO: you also need
		// title
		$event->title = $row->eName;
		// description
		$event->description = $row->eDescription;
		// email
		$event->email = $row->pEmail;
		// phone
		$event->phone = $row->pPhone;
		$eventList[] = $event;
    }
	$eventsJSON = json_encode($eventList);
 } catch (PDOException $e) {
	echo 'Something went wrong';
	file_put_contents('log.txt', $e->getMessage()."\n\r", FILE_APPEND); // remember to set the permissions so that log.txt can be created
}      

?>
</div>
<script>
// JSON made in PHP is saved in JavaScript
var jsonEvents = <?php echo $eventsJSON; ?>;
console.log(jsonEvents);
// TODO: use jQuery FullCalendar plugin to display the events in a proper calendar
// calendar has to have at least month, week and day views
// timeformat is 24-hour clock
 $(document).ready(function() {
	  var date = new Date();
	  var d = date.getDate();
	  var m = date.getMonth();
	  var y = date.getFullYear();

  var calendar = $('#calendar').fullCalendar({
	   editable: true,
	   firstDay: 1, 
	   timeFormat: 'H:mm',
	   header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay'
	   },
   
   events: jsonEvents,
   
   eventClick: function(event) {
		console.log(event);
        alert('Event: ' + event.title + ' \n'+ 'Description: ' + event.description + ' \n \n'+ 'Phone: ' + event.phone + ' \n'+ 'Email: ' + event.email);

    },
   
   eventRender: function(event, element, view) {
    if (event.allDay === 'true') {
     event.allDay = true;
    } else {
     event.allDay = false;
    }
	}
  });
 });

// when an event is clicked all the event details (jsonEvents) are displayed	
</script>