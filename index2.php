<?php 

$roomFile = file_get_contents('./room.json');
$room_array = json_decode($roomFile);

?>
<pre>
    <?php echo print_r($room_array); ?>
</pre>