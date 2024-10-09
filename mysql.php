<?php
class MySQL {

    public static function runFetchArrayQuery($query)
    {
        $mysqli = new mysqli("localhost","admin","FamMarta123*","miranda");

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $result = $mysqli->query($query);
        $assocResult = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        $mysqli->close();
        
        return $assocResult;
    }

    public static function runFetchRowQuery($query)
    {
        $mysqli = new mysqli("localhost","admin","FamMarta123*","miranda");

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $result = $mysqli->query($query);
        $assocResult = $result->fetch_assoc();
        $result->free_result();
        $mysqli->close();
        
        return $assocResult;
    }

    public static function runFetchRowQueryWithParam($query, $param)
    {
        $mysqli = new mysqli("localhost","admin","FamMarta123*","miranda");

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $statement = $mysqli->prepare($query);
        $statement->bind_param("s", $param);
        $statement->execute();
        $result = $statement->get_result();
        $assocResult = $result->fetch_assoc();
        $result->free_result();
        $statement->close();
        $mysqli->close();
        
        return $assocResult;
    }

    public static function runFetchArrayQueryWithParams($query, $param, $secondaryParam)
    {
        $mysqli = new mysqli("localhost","admin","FamMarta123*","miranda");

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $statement = $mysqli->prepare($query);
        $statement->bind_param("ss", $param, $secondaryParam);
        $statement->execute();
        $result = $statement->get_result();
        $assocResult = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        $statement->close();
        $mysqli->close();
        
        return $assocResult;
    }

    public static function createRoom($room)
    {
        $mysqli = new mysqli("localhost","admin","FamMarta123*","miranda");

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $statement = $mysqli->prepare("INSERT INTO rooms (type, floor, number, images, price, offer, status, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
        $statement->bind_param("ssssssss", $room->type, $room->floor, $room->number, $room->images, $room->price, $room->offer, $room->status, $room->description);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

}

?>