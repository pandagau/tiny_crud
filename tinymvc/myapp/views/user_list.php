<?php 
    include 'add.php';
    include 'edit.php';
 ?>
<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="/tiny_crub/CRUD/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/tiny_crub/CRUD/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/tiny_crub/CRUD/css/style.css">
</head>
<body>
<center>

<div id="body">
 <div id="content">
 	<script type="text/javascript">

 		function editRecord(id, firstname, lastname, fullname, date, email){
                document.getElementById('edit_id').value = id;
                document.getElementById('id_fn').value = firstname;
                document.getElementById('id_ln').value = lastname;
                document.getElementById('id_fulln').value = fullname;
                document.getElementById("edit_date").value = date;
                document.getElementById('id_email').value = email;
                document.getElementById('def').style.display = "block";
        }
		function delete_id($id){
		     if(confirm('Bạn có chắc chắn xóa thông tin người dùng này không ?')){
		        window.location.href='/tiny_crub/CRUD/index.php/default/delete_user?delete_id='+$id;
		     }
		}
        function addRecord(){
            document.getElementById('record_id').value = '';
            document.getElementById('abc').style.display = "block";
        }
        function div_hide(){
            document.getElementById('fm').reset();
            document.getElementById('abc').style.display = "none";
            document.getElementById('def').style.display = "none";
        }
 	</script>
    
    <div id="form_head">
        <form method="post" id="form_home" action="/tiny_crub/CRUD/index.php">
            <button id="home">Home</button>
        </form>
        <div id="tab">
            <!-- <a id="home" href="popup_main.php">Home</a> -->
            <button id="popup" onclick="addRecord()">Add Contact</button>
        </div>
        
        <form method="get" id="form_search" action="/tiny_crub/CRUD/index.php/default/search_user" >
            <input type="text" id="search" name="search" placeholder=" Search..">
            <input type="submit" name="btn_search" id="btn_search" value="Search">
            
        </form>
        
    </div>
    <p><b>USERS LIST</b></p>
    <h2></h2>
    <table id="id_table" class="table table-hover table-condensed ">
        <tr style="background-color:#D8D8D8;">
            <th>Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of birth</th>
            <th>Gender</th>
            <th>Email</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
             foreach ($users as $row)
             {
              ?>
                   <tr>
                    <td><?php echo "<img src= \""."/tiny_crub/CRUD/".$row['avatar']."\"  width = 25 height = 25>";?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['datet']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    
                    <td align="center"><a href="javascript:editRecord('<?php echo $row['id']; ?>','<?php echo $row['firstname']; ?>','<?php echo $row['lastname']; ?>','<?php echo $row['fullname']; ?>','<?php echo $row['datet']; ?>','<?php echo $row['email']; ?>')"><img src="/tiny_crub/CRUD/css/image/images.png" align="EDIT" style="width: 15px;" /></a></td>
                    <td align="center"><a href="javascript:delete_id('<?php echo $row['id']; ?>')"><img src="/tiny_crub/CRUD/css/image/delete.png" align="DELETE" style="width: 15px;" /></a></td></tr>
                    </tr>
                    <?php
             }
        ?>
         
        </table>
    

    </div>
</div>

</center>
    <script type="text/javascript" src = "/tiny_crub/CRUD/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src = "/tiny_crub/CRUD/js/bootstrap.min.js"></script>
</body>
</html>