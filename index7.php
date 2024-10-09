<?php
require_once('room.php');

$roomArray = Room::loadFromDatabase();
?>
<body>
<form>
    <input type='text' id='query' name='query' placeholder='Search input' />
    <button type='submit'>Search</button>
</form>
<ol>
<?php
if(isset($_GET['query']))
{
    $searchArray = Room::loadFromSearchQueryOnDatabase($_GET['query']);
    foreach($searchArray as $room)
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