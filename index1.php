<?php
$rooms = [
    [
        "id" => 1,
        "name" => 'Basic Room',
        "number" => 6,
        "price" => 10000,
        "discount" => 0,
    ],
    [
        "id" => 2,
        "name" => 'Super Room',
        "number" => 4,
        "price" => 20000,
        "discount" => 0,
    ],
    [
        "id" => 3,
        "name" => 'Ultra Room',
        "number" => 10,
        "price" => 30000,
        "discount" => 0,
    ]
]

?>
<body>
<h1>Room List</h1>
<pre>
    <?php print_r($rooms); ?>
</pre>
</body>