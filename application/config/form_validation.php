<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package		MySkills
 * @author		Tiago Perrelli
 * @copyright           Copyright (c) 2012, MySkills, Inc.
 * @license		
 * @since		2012
 * @filesource
 * @version             0.1
 */
$config = array(
    
    'programmer' => array(
        array(
            'label' => 'Code',
            'rules' => 'numeric',
            'rules' => 'numeric|max_length[30]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_emailmax_length[255]'
        ),
        array(
            'field' => 'selectUf',
            'label' => 'UF',
            'rules' => 'numeric|max_length[2]'
        )
    ),
    
    'recruiter' => array(
        array(
            'field' => 'company',
            'label' => 'Company',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[255]'
        ),
        array(
            'field' => 'selectUf',
            'label' => 'UF',
            'rules' => 'numeric|max_length[2]'
        )
    )
);
?>
