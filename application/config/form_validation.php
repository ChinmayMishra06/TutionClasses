<?php
    $config = array(
       'signup' => array(
            array(
                'field' => 'username',
                'label' => 'User name',
                'rules' => 'trim|required',
                'errors' => array('required'=>'User name is required.')
            ),

            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array('required'=>'Email is required.', 'valid_email'=>'Email must be valid.')
            ),
            
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]',
                'errors' => array('required'=>'Password is required.', 'min_length'=>'Minimum 6 charector is required.')
            ),

            array(
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'trim|required|matches[password]',
                'errors' => array('required'=>'Confirm password is required.', 'matches'=>'Confirm password doesn\'t match with password.')
            ),
       ),

       'login' => array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array('required'=>'Email is required.', 'valid_email'=>'Email must be valid.')
            ),
            
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]',
                'errors' => array('required'=>'Password is required.', 'min_length'=>'Minimum 6 charector is required.')
            ),
        ),
        
        'error_prefix' => '<i class="text-danger">',
        'error_suffix' => '</i>',
    );
?>