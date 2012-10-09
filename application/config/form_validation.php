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
            'field' => 'code',
            'label' => 'Code Certificate',
            'rules' => 'required|max_length[30]'
        ),
        array(
            'field' => 'badges',
            'label' => 'Badge',
            'rules' => 'numeric|required'
        )
    ),
    'message' => array(
        array(
            'field' => 'message',
            'label' => 'Activity Feed',
            'rules' => 'required|max_length[140]'
        )
    ),
    'editProfile' => array(
        array(
            'field' => 'video_url',
            'label' => 'Video URL',
            'rules' => 'max_length[255]'
        ),        
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'max_length[100]'
        ),        
        array(
            'field' => 'surname',
            'label' => 'Surname',
            'rules' => 'max_length[200]'
        ),        
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'max_length[255]'
        )
    ),
    'registerNewJob' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|max_length[500]'
        ),        
        array(
            'field' => 'quantity',
            'label' => 'Quantity',
            'rules' => 'numeric|required'
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
