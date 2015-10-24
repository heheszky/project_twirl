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
		),
		array(
			'field' => 'password',
			'label' => 'Hasło',
			'rules' => 'trim|required|min_length[8]',
			'errors' => array(
				'required'		=> 'Hasło jest wymagane',
				'min_length'	=> 'Hasło nie może być krótsze niż {param} znaków',
				'matches'		=> 'Podane hasła różnią się'
			),
		),
		array(
			'field' => 'rpassword',
			'label' => 'Powtórz hasło',
			'rules' => 'trim|required|matches[password]',
			'errors' => array(
				'required'		=> 'Musisz powtórzyć hasło',
				'matches'		=> 'Podane hasła różnią się'
			),
		),
		array(
			'field' => 'imie_klienta',
			'label' => 'Imie',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Imie jest wymagane',
			),
		),
		array(
			'field' => 'nazwisko_klienta',
			'label' => 'Nazwisko',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Nazwisko jest wymagane',
			),
		),
		array(
			'field' => 'miejscowosc',
			'label' => 'Miejscowość',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Miejscowość jest wymagana',
			),
		),
		array(
			'field' => 'ulica',
			'label' => 'Ulica',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Ulica jest wymagana',
			),
		),
		array(
			'field' => 'nr_domu',
			'label' => 'Numer domu',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Numer domu jest wymagany',
			),
		),
		array(
			'field' => 'data_urodzenia',
			'label' => 'Numer lokalu',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Data urodzenia jest wymagana',
			),
		),
		array(
			'field' => 'pesel',
			'label' => 'Pesel',
			'rules' => 'trim|required|callback_sprawdz_pesel',
			'errors' => array(
				'required'		=> 'PESEL jest wymagany',
				'sprawdz_pesel' => 'Podaj prawidłowy pesel',
			),
		),
	);
	return $validation_config;
}