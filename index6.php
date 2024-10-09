<?php
require_once('room.php');

$roomArray = Room::loadFromDatabase();
?>
<body>
<ol>
<?php
if(isset($_GET['id']))
{
    $room = Room::loadFromIdOnDatabase($_GET['id']);
    if($room == null)
    {
        ?>
        <h1>Unknown ID</h1>
        <?php
    } else {
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

} else {
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
}
?>
</ol>
</body>