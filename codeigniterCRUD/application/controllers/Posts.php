<?php
defined('BASEPATH') OR exit('No direct script access allowed.');

class Posts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('post');
    }

    function index() {
        $data = array();

        // get session messages
        if($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['posts'] = $this->post->getRows();

        $this->load->view('/index',$data);
    }

    // post detail
    function view($id) {
        $data = array();

        if(!empty($id)) {
            $data['post'] = $this->post->getRows($id);

            $this->load->view('/view',$data);
        } else {
            redirect('/posts');
        }
    } 

    // add post
    function add() {
        $data = array();
        $postData = array();

        if($this->input->post('postSubmit')) {
            //validation
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('content','Content','required');

            $postData = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content')
            );

            // check validation
            if($this->form_validation->run() == true) {
                $insert = $this->post->insert($postData);

                if($insert) {
                    $this->session->set_userdata('success_msg','Successfully inserted.');
                    redirect('/posts');
                } else {
                    $data['error_msg'] = 'Failed to insert';
                }
            }
        }

        $data['post'] = $postData;
        $data['action'] = 'Add';

        $this->load->view('/add-edit',$data);
    }

    // update post
    function edit($id) {
        $data = array();

        $postData = $this->post->getRows($id);

        if($this->input->post('postSubmit')) {
            //set validation rules
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('content','Content','required');

            $postData = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content')
            );

            // check validation
            if($this->form_validation->run() == true) {
                $update = $this->post->update($postData,$id);

                if($update) {
                    $this->session->set_userdata('success_msg','Successfully updated.');
                    redirect('/posts');
                } else {
                    $data['error_msg'] = 'Failed to update';
                }
            }
        }
        $data['post'] = $postData;
        $data['action'] = 'Edit';

        $this->load->view('/add-edit',$data);
    }

    //delete post
    function delete($id) {
        if($id) {
            $delete = $this->post->delete($id);

            if($delete) {
                $this->session->set_userdata('success_msg','Successfully deleted');
            } else {
                $this->session->set_userdata('error_msg','Failed to delete');
            }
        }
        redirect('/posts');
    }
}
?>









