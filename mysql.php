<?php

class MySQL {
    static protected $mysqli = null;

    public static function generateConnection()
    {
        self::$mysqli = new mysqli("localhost","admin","Marta123*","miranda");
    }

    public static function runFetchArrayQuery($query)
    {
        if (self::$mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $result = self::$mysqli->query($query);
        $assocResult = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        
        return $assocResult;
    }

    public static function runFetchRowQuery($query)
    {
        if (self::$mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $result = self::$mysqli->query($query);
        $assocResult = $result->fetch_assoc();
        $result->free_result();
        
        return $assocResult;
    }

    public static function runFetchRowQueryWithParam($query, $param)
    {

        if (self::$mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $statement = self::$mysqli->prepare($query);
        $statement->bind_param("s", $param);
        $statement->execute();
        $result = $statement->get_result();
        $assocResult = $result->fetch_assoc();
        $result->free_result();
        
        return $assocResult;
    }

    public static function runFetchArrayQueryWithParams($query, $param, $secondaryParam)
    {
        if (self::$mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $statement = self::$mysqli->prepare($query);
        $statement->bind_param("ss", $param, $secondaryParam);
        $statement->execute();
        $result = $statement->get_result();
        $assocResult = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        
        return $assocResult;
    }

    public static function createRoom($room)
    {
        if (self::$mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $statement = self::$mysqli->prepare("INSERT INTO rooms (type, floor, number, images, price, offer, status, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
        $statement->bind_param("ssssssss", $room->type, $room->floor, $room->number, $room->images, $room->price, $room->offer, $room->status, $room->description);
        $statement->execute();
    }

    public static function closeConnection()
    {
        self::$mysqli->close();
    }

}

?>