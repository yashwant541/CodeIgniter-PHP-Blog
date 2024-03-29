<?php
	class Users extends CI_Controller{
		//User Register
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{
				//Encrypt your passwords bitches!
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				//Set Flash Message using sessions
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in!');

				return redirect(base_url('posts'));
			}
		}

		//User Login
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{

				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					//Create session
					$userdata = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($userdata);

					//Set Flash Message using sessions
					$this->session->set_flashdata('login_success', 'You are now logged in!');

					return redirect(base_url('posts'));
				}else{
					//Set Flash Message using sessions
					$this->session->set_flashdata('login_failed', 'Incorrect Login/Password Combination!');

					return redirect(base_url('users/login'));
				}
			}
		}

		//Logout User
		public function logout(){
			//Unset all  sessions
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			//Set Flash Message using sessions
			$this->session->set_flashdata('logout', 'You are logged out!');

			return redirect(base_url('users/login'));
		}

		//Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'This username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			}else{
				return false;
			}
		}

		//Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			}else{
				return false;
			}
		}
	}