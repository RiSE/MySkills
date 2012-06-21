<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Naips Tecnoogia
 * 
 * Medical Software Technology 
 * 
 * @package		Naips
 * @author		Tiago Perrelli
 * @copyright           Copyright (c) 2012, NAIPS, Inc.
 * @license		
 * @link		http://www.naips.com.br
 * @since		2012
 * @filesource
 * @version             0.1
 */
$config = array(
    
    'programmer' => array(
        array(
            'field' => 'code',
            'label' => 'Code',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'selectUf',
            'label' => 'UF',
            'rules' => 'required|numeric'
        )
    )
);
?>
