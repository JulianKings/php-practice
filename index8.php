<?php
require_once('room.php');

$roomArray = Room::loadFromDatabase();
?>
<body>
<?php
if(isset($_POST['type']))
{
    $room = new Room('unknown', $_POST['type'], $_POST['floor'], $_POST['number'], $_POST['images'],
    $_POST['price'], $_POST['offer'], $_POST['status'], $_POST['description']);
    
?>
<ol>
    <li> <h1><?=$room->getName(); ?></h1>
        <ul>
            <?php
                foreach($room as $key => $value)
                {
                    ?>
                    <li>
                        <strong><?=$key; ?>:</strong> <?=$value; ?>
                    </li>
            <?php
                }
            ?>
        </ul>
    </li>
</ol>
<?php

} else {
?>
<form method='post'>
    <label for='type'>Type: </label>
    <select id='type' name='type'>
        <option value='Single Bed'>Single Bed</option>
        <option value='Double Bed'>Double Bed</option>
        <option value='Double Superior'>Double Superior</option>
        <option value='Suite'>Suite</option>
    </select><br />

    <label for='floor'>Floor: </label>
    <input type='text' id='floor' name='floor' placeholder='Room floor' /> <br />

    <label for='number'>Number: </label>
    <input type='number' id='number' name='number' placeholder='Room Number' /> <br />

    <label for='images'>Image: </label>
    <input type='text' id='images' name='images' placeholder='Room image' /> <br />

    <label for='price'>Price: </label>
    <input type='number' id='price' name='price' placeholder='Room price' /> <br />

    <label for='offer'>Offer: </label>
    <input type='number' id='offer' name='offer' placeholder='Room offer' /> <br />

    <label for='status'>Status: </label>
    <select id='status' name='status'>
        <option value='available'>Available</option>
        <option value='maintenance'>Maintenance</option>
        <option value='booked'>Booked</option>
    </select><br />

    <label for='description'>Description: </label>
    <textarea id='description' name='description'></textarea> <br />

    <button type='submit'>Search</button>
</form>
<?php
}
?>
</body>