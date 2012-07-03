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
            'field' => 'emailp',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[255]'
        ),
        array(
            'field' => 'selectUfp',
            'label' => 'UF',
            'rules' => 'numeric|max_length[2]'
        )
    ),
    'programmer/claimbadges' => array(
        array(
            'field' => 'ioscode',
            'label' => 'iOS Certificate COde',
            'rules' => 'numeric|max_length[30]'
        ),
        array(
            'field' => 'zendcode',
            'label' => 'Zend Certificate Code',
            'rules' => 'numeric|max_length[30]'
        )
    ),
    'recruiter' => array(
        array(
            'field' => 'company',
            'label' => 'Company',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'emailr',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[255]'
        ),
        array(
            'field' => 'selectUfr',
            'label' => 'UF',
            'rules' => 'numeric|max_length[2]'
        )
    )
);
?>
