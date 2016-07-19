<?php 
	class Hello_Controller extends TinyMVC_Controller{
		/*function index(){
		 	$data['title'] = 'Title default';
			$data['body_text'] = 'Text defautl.';//$this->view->assign($data);
			$output = $this->view->fetch('hello_view',$data); echo $output;*/
			 //echo $output;
		//}
		/*function index1(){
		    $this->load->library('demo','mydemo');
		    $this->view->assign('output', $this->mydemo->test());
		    $this->view->display('hello_view');
		}
		function index2(){
		    $this->load->script('myhelpers');
		    $this->view->display('hello_view');
		}*/
		function index(){
		    $this->view->display('hello_view');
		}
		function action1(){
			$this->load->model('Page_Model','page');
			$title = $this->page->get_title();
		    $body_text = $this->page->get_body_text();
		    $this->view->assign('title',$title);
		    $this->view->assign('body_text',$body_text);
		    $this->view->display('hello_view');
		}
		function time(){
			echo 'The time is now';
		}
	}
 ?>