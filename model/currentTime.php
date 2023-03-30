<?php
/**
 * Returns the current time in the specified timezone.
 * @return string The current time in the format 'y-m-d H:i'
 */
function currentTime(){
$now = new DateTime();
// Create a DateTimeZone object for the desired timezone
$timezone = new DateTimeZone('Asia/Kolkata');
// Set the timezone of the DateTime object
$now->setTimezone($timezone);
// Format and display the time in the desired timezone
$dateTime=$now->format('y-m-d H:i');
return $dateTime;
}

?>
