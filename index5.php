<?php
require_once('room.php');

MySQL::generateConnection();

$roomArray = Room::loadFromDatabase();
?>
<body>
<ol>
<?php
foreach($roomArray as $room)
{
?>
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
<?php
}

MySQL::closeConnection();
?>
</ol>
</body>