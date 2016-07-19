<?php 
 
    class User_Model extends TinyMVC_Model{ 
        function loadList(){
            $this->db->query("SELECT * FROM Users ORDER BY id DESC");
            while($row = $this->db->next())
                $results[] = $row;
            //print_r($results);
            return $results;
            // return $this->db->query_all("SELECT * FROM Users");
            /*$this->db->select('id','firstname', 'lastname','fullname','date', 'gender', 'email', 'avatar');
            $this->db->from('Users');
            $this->db->query();*/

        }
        function addUser($id,$firstname, $lastname, $fullname,$date, $gender, $email, $avatar){
            $this->db->query("INSERT INTO Users (id, firstname, lastname, fullname,datet, gender, email, avatar) VALUES ('$id','$firstname', '$lastname', '$fullname','$date', '$gender', '$email', '$avatar')");
        }
        function editAnUser($data){
            $data['id'] = $data['edit_id'];
            $data['datet'] = $data['bday'];
            unset($data['edit_id']);
            unset($data['bday']);
            $sql = "";
            foreach ($data as $key => $value) {
                if($value){
                    $sql .= "$key = '$value',";
                }
            }
            $sql = trim($sql,','); 
            $sql = "UPDATE Users SET $sql WHERE id=".$data['id'];
            $this->db->query($sql);
        }
        function deleteAnUser($id){
            $sql = "DELETE FROM Users WHERE id='$id'";
            $user = $this->db->query($sql);
        } 
        function search($searchtxt){
            $sql = "SELECT * FROM Users WHERE fullname LIKE '%$searchtxt%'";
            $this->db->query($sql);
            while($row = $this->db->next())
                $results[] = $row;
            return $results;
        }
        /*function delete(){
            $this->db->where('id != 1'); // setup query conditions (optional)
            return $this->db->delete('Users');
        }
        function search($searchtxt){
            $this->db->query("SELECT * FROM Users WHERE fullname LIKE '%$searchtxt%'");
            while($row = $this->db->next())
              $results[] = $row;
            return $results;
            //
        }*/
    }  
    /*$a = new Model();
    $a->UserModel();
    $a->listOfUsers();*/
 ?>