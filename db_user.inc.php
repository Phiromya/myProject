<?php
    include_once ('db_connect.inc.php');

    function get_users()
    {
        $con = Connect();
        $query = $con->query("SELECT FNAME,LNAME,USERNAME,STATUS FROM user");
        $result = $query->fetchAll();
        return $result;
    }

    function get_user($user)
    {
        $con = Connect();
        $query = $con->query("SELECT * FROM user WHERE USERNAME= '".$user."'");
        $result = $query->fetchAll();
        return $result;
    }

    function update_user($user,$status)
    {
        if($status==1)
        {
            $con = Connect();
            $con->query("UPDATE user SET FNAME ='".$user."',LNAME ='".$user."',USERNAME='".$user."' WHERE USER_ID =".$user);
            return true;
        }
        else
        {
            echo "Sorry! You can't edit data of this user.";
            return false;
        }
    }

    function delete_user($user_id,$status)
    {
        if($status==1)
        {
            $con = Connect();
            $con->query("DELETE FROM user WHERE USER_ID =".$user_id) or dir("Delete Fail!!");
            return true;
        }
        else
        {
            echo "Sorry! You can't delete data of this user.";
            return false;
        }
    }

    function  login($username,$password)
    {
        $con = Connect();
        $query = $con->query("SELECT * FROM user WHERE USERNAME='$username' AND PASSWORD='$password'");
        $result = $query->fetchAll();

        if ($result) {
            $_SESSION["status"]= $result['STATUS'];
            return true;
        } else {
            return false;
        }
    }

    function add_user($id,$fname,$lname,$username,$pass){

        $con=Connect();
        //$add="INSERT INTO user(USER_ID, FNAME, LNAME, USERNAME, PASSWORD, STATUS)VALUES (".$id.","..",'$surname','user','$username','$username')";
        //$con->exec($add);
    }

    /*function edit_user($user_detail)
    {
    $con = Connect();
    $id=$user_detail[0];
    $name=$user_detail[1];
    $surname=$user_detail[2];
    $username=$user_detail[3];
    $edit_sql="UPDATE members SET name='$name',surname='$surname',username='$username' WHERE id='$id'";
    $stmt = $con->prepare($edit_sql);
    $stmt->execute();

}*/
    echo "";
?>