<?php

function get_register_validation_config()
{
	$validation_config = array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|is_unique[klient.email]',
			'errors' => array(
				'required'		=> 'Email jest wymagany',
				'valid_email'	=> 'Wprowadź prawidłowy adres email',
				'is_unique'		=> 'Istnieje już klient z tym adresem email'
			),
		)
	);
}