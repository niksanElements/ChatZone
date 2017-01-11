<?php
/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 1/10/2017
 * Time: 10:10 PM
 */

class UserModel extends BaseModel
{
    public function registration(
        string $username, string $password){
        $password_hash = password_hash($password,PASSWORD_DEFAULT);

        $username = htmlspecialchars($username);

        $statement = self::$db->prepare(
            "INSERT INTO users(userName, password) values(?,?)");
        $statement->bind_param("ss",$username, $password_hash);
        $statement->execute();
        if ($statement->affected_rows !=1)
            return false;
        $userID = self::$db -> query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
        return $userID;
    }

    public function setOnline($userId,$state):bool
    {
        $statement = self::$db->prepare(
            "UPDATE users SET online = ? WHERE id=?"
        );
        $statement->bind_param("ii",$state,$userId);
        $statement->execute();
        if($statement->affected_rows != 1){
            return false;
        }
        return true;
    }

    public function login(string $username, string $password): int
    {
        $statement = self::$db->prepare(
            "SELECT id, password FROM users WHERE userName = ?");
        $statement ->bind_param("s", $username);
        $statement->execute();
        $result = $statement ->get_result()->fetch_assoc();
        if (password_verify($password, $result['password'])){
            return $result["id"];
        }
        return 0;
    }

    public function getUserAccount($id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE id = ?");
        $statement ->bind_param("i", $id);
        $statement->execute();
        $result = $statement ->get_result()->fetch_assoc();
        return $result;
    }

    public function editUserAccount($id, $full_name, $email, $password)
    {
        $id = htmlspecialchars($id);
        $full_name = htmlspecialchars($full_name);
        $email = htmlspecialchars($email);

        if($password != NULL) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $statement = self::$db->prepare(
                "UPDATE users SET full_name = ?, email = ?, password_hash = ? 
            WHERE id = ?");
            $statement->bind_param("sssi", $full_name, $email, $password_hash, $id);
            $statement->execute();
        }
        else {
            $statement = self::$db->prepare(
                "UPDATE users SET full_name = ?, email = ? 
            WHERE id = ?");
            $statement->bind_param("ssi", $full_name, $email, $id);
            $statement->execute();
        }
        if($statement->errno)
        {
            return false;
        }
        else {
            return true;
        }
    }
}