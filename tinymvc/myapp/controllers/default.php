<?php

/**
 * default.php
 *
 * default application controller
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */
// phpinfo();
class Default_Controller extends TinyMVC_Controller{
	function index(){
	  	// $output = $this->view->fetch('hello_view');
	  	//$this->view->display('header_view');
	  	//load csdl loatlist();
	  	// $user = $this->user->get_members();
	  	// $user = $this->user->deleteAnUser(85);
	  	$this->load->model('User_Model','user');
	  	$user = $this->user->loadList();
	  	$this->view->assign('users',$user);
	    $this->view->display('user_list');
	}
	function add_user(){
		if($_FILES["avatar"]["error"]>0){    
			echo "Error".$_FILES["avatar"]["error"]."<br/>";
		} 
		else {
		        if (file_exists("/folder/".$_FILES["avatar"]["tmp_name"])){//echo "File exists!!";
		        } else {
		            move_uploaded_file(($_FILES["avatar"]["tmp_name"]), "/folder/".$_FILES["avatar"]["name"]);
		        } 
        }
        $id = '';
        $link = "folder/".$_FILES["avatar"]["name"];
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $fullname = $_POST['full_name'];
        $var = $_POST['bday'];
		$d = str_replace('/', '-', $var);
		$date = date('Y-m-d', strtotime($d));
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $this->load->model('User_Model','user');
        /*$user = */$this->user->addUser($id,$firstname, $lastname, $fullname, $date, $gender, $email, $link);
	  	$user = $this->user->loadList();

	  	echo '<pre>';
	  	print_r($user);
	  	exit();

	  	$this->view->assign('users',$user);
	    $this->view->display('user_list');
	}
	function edit_user(){
		if($_FILES && $_FILES["avatar"]["error"] == 0){
		    if (file_exists("folder/".$_FILES["avatar"]["tmp_name"])){
		        echo "File exists!!";
		    } else {
		        move_uploaded_file(($_FILES["avatar"]["tmp_name"]), "folder/".$_FILES["avatar"]["name"]);
		                            $_POST['avatar'] = "folder/".$_FILES["avatar"]["name"];
		    } 
		}
		if(isset($_POST['bday'])){
			$var = $_POST['bday'];
            $d = str_replace('/', '-', $var);
            $date = date('Y-m-d', strtotime($d));
            $_POST['bday'] = $date;
		}
		$this->load->model('User_Model','user');
		$this->user->editAnUser($_POST);
		$user = $this->user->loadList();
		$this->view->assign('users',$user);
	    $this->view->display('user_list');
	}
	function delete_user(){
		$this->load->model('User_Model','user');
		$this->user->deleteAnUser($_GET['delete_id']);
		$user = $this->user->loadList();
		$this->view->assign('users',$user);
	    $this->view->display('user_list');
	}
	function search_user(){
		$this->load->model('User_Model','user');
		$user = $this->user->search($_GET['search']);
		/*echo $_GET['search'];
		exit();*/
		// $user = $this->user->loadList();
		$this->view->assign('users',$user);
	    $this->view->display('user_list');
	}
  
}

?>
