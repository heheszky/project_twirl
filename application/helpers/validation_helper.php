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

function add_author_config()
{
	$validation_config = array(
		array(
			'field' => 'imie_autora',
			'label' => 'Imie',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Imie jest wymagane',
			),
		),
		array(
			'field' => 'nazwisko_autora',
			'label' => 'Nazwisko',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Nazwisko jest wymagane',
			),
		),
		array(
			'field' => 'typ_autora',
			'label' => 'Typ autora',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Typ autora jest wymagany',
			),
		),
	);
	return $validation_config;
}

function add_publisher_config()
{
	$validation_config = array(
		array(
			'field' => 'nazwa_wydawnictwa',
			'label' => 'Nazwa wydawnictwa',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Nazwa wydawnictwa jest wymagana',
			),
		),
	);
	return $validation_config;
}
function add_book_config()
{
	$validation_config = array(
		array(
			'field' => 'isbn',
			'label' => 'ISBN',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'ISBN jest wymagany',
			),
		),
		array(
			'field' => 'tytul_ksiazki',
			'label' => 'Tytuł książki',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Tytuł książki jest wymagany',
			),
		),
		array(
			'field' => 'autor_ksiazki',
			'label' => 'Autor książki',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Autor książki jest wymagany',
			),
		),
		array(
			'field' => 'epoka_ksiazki',
			'label' => 'Epoka',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Epoka jest wymagana',
			),
		),
		array(
			'field' => 'data_wydania_ksiazki',
			'label' => 'Data wydania',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Data wydania jest wymagana',
			),
		),
		array(
			'field' => 'wydawnictwo_ksiazki',
			'label' => 'Wydawnictwo książki',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Wydawnictwo jest wymagane',
			),
		),
	);
	return $validation_config;
}

function add_album_config()
{
	$validation_config = array(
		array(
			'field' => 'nazwa_albumu',
			'label' => 'Nazwa albumu',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Nazwa jest wymagana',
			),
		),
		array(
			'field' => 'autor_albumu',
			'label' => 'Autor albumu',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Autor jest wymagany',
			),
		),
		array(
			'field' => 'data_wydania_albumu',
			'label' => 'Data wydania albumu',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Data wydania jest wymagana',
			),
		),
		array(
			'field' => 'liczba_utworow',
			'label' => 'Liczba utworów',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Liczba utworów jest wymagana',
			),
		),
		array(
			'field' => 'nosnik_fizyczny',
			'label' => 'Nośnik fizyczny',
			'rules' => 'trim|required',
			'errors' => array(
				'required'		=> 'Nośnik fizyczny jest wymagany',
			),
		),
	);
	return $validation_config;
}