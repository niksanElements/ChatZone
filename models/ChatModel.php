<?php

/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 1/11/2017
 * Time: 12:31 AM
 */
class ChatModel extends BaseModel
{
    function getFriends($userId) :array
    {
        $statment = self::$db->query(
            "SELECT id,userName,online FROM users, friends WHERE user_1 = $userId  AND  id = user_2
               ORDER BY users.online DESC, userName ASC"
        );
        return $statment->fetch_all(MYSQLI_ASSOC);
    }
    
    public function setMessage($currentID,$userID,$text)
    {
        if($currentID) {
            $statement = self::$db->prepare(
                "INSERT INTO webchat_lines(author,toUser,text) VALUES(?,?,?)"
            );
            $statement->bind_param("iis",$currentID,$userID,$text);
            $statement->execute();
            if ($statement->affected_rows !=1)
                return false;
            $lineId = self::$db -> query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
            $statement = self::$db->query(
                "SELECT * FROM webchat_lines WHERE id = $lineId"
            );
            return $statement->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function newMessages($fromUser,$toUser,$date, $maxLines = 10) :array
    {
        $fromUser = intval($fromUser);
        $toUser = intval($toUser);
        $statment = self::$db->query(
            "SELECT date,userName,text  FROM webchat_lines,users
            WHERE ((author=$toUser AND toUser=$fromUser) OR (author=$fromUser AND toUser=$toUser)) 
            AND date > '$date' AND users.id = author ORDER BY date"
        );
        if($statment){
            return $statment->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }
}