<?php 

require_once('mysql.php');

class Room {
    public $id;
    public $type;
    public $floor;
    public $number;
    public $images;
    public $price;
    public $offer;
    public $status;
    public $description;

    public function __construct($id, $type, $floor, $number, $images, $price, $offer, $status, $description)
    {
        $this->id = $id;
        $this->type = $type;
        $this->floor = $floor;
        $this->number = $number;
        $this->images = $images;
        $this->price = $price;
        $this->offer = $offer;
        $this->status = $status;
        $this->description = $description;
    }

    public function getName()
    {
        return $this->type.' Room #'.$this->number;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setFloor($floor) {
        $this->floor = $floor;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function setImages($images) {
        $this->images = $images;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setOffer($offer) {
        $this->offer = $offer;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function create()
    {
        MySQL::createRoom($this);
    }

    public static function loadFromJson($file)
    {
        $roomFile = file_get_contents($file);
        $roomArray = json_decode($roomFile);

        $resultRoomArray = array();

        foreach($roomArray as $room)
        {
            $roomResult = new Room($room->id, $room->type, $room->floor, $room->number, $room->images,
                $room->price, $room->offer, $room->status, $room->description);

            array_push($resultRoomArray, $roomResult);
        }

        return $resultRoomArray;
    }

    public static function loadFromIdOnJson($id, $file)
    {
        $roomArray = Room::loadFromJson($file);

        $result = null;

        foreach($roomArray as $room)
        {
            if($room->id == $id)
            {
                $result = $room;
            }
        }

        return $result;
    }

    public static function loadFromDatabase()
    {
        $roomArray = MySQL::runFetchArrayQuery("SELECT * FROM rooms");
        $resultRoomArray = array();

        foreach($roomArray as $room)
        {
            $roomResult = new Room($room['id'], $room['type'], $room['floor'], $room['number'], $room['images'],
                $room['price'], $room['offer'], $room['status'], $room['description']);

            array_push($resultRoomArray, $roomResult);
        }

        return $resultRoomArray;
    }

    public static function loadFromIdOnDatabase($id)
    {
        $roomData = MySQL::runFetchRowQueryWithParam("SELECT * FROM rooms WHERE id = ?", $id);
        $roomResult = null;

        if(isset($roomData))
        {
            $roomResult = new Room($roomData['id'], $roomData['type'], $roomData['floor'], $roomData['number'], $roomData['images'],
                $roomData['price'], $roomData['offer'], $roomData['status'], $roomData['description']);
        }

        return $roomResult;
    }

    public static function loadFromSearchQueryOnDatabase($query)
    {
        $roomArray = MySQL::runFetchArrayQueryWithParams("SELECT * FROM rooms WHERE type LIKE CONCAT( '%',?,'%') OR number LIKE CONCAT( '%',?,'%')", $query, $query);
        $resultRoomArray = array();

        foreach($roomArray as $room)
        {
            $roomResult = new Room($room['id'], $room['type'], $room['floor'], $room['number'], $room['images'],
                $room['price'], $room['offer'], $room['status'], $room['description']);

            array_push($resultRoomArray, $roomResult);
        }

        return $resultRoomArray;
    }
}
?>