<!DOCTYPE html>
<html class="mdl-js">
	<head>
		<title>Projekt</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset='utf-8'>
		
		<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="/assets/css/material.min.css">
		<link rel='stylesheet' href='/assets/css/header.css'>
		<link rel='stylesheet' href='/assets/css/main.css'>
		<link rel='stylesheet' href='/assets/css/cards.css'>
	</head>
	<body>
		<div class='mdl-layout mdl-js-layout'>
			<div class='mdl-layout mdl-js-layout is-upgraded' data-upgraded=",MaterialLayout" >
				<header class='mdl-layout__header mdl-layout__header--transparent' style='background: #263238'>
					<div class="mdl-layout-icon"></div>
					<div class="mdl-layout__header-row">
						<span class="mdl-layout-title"><a href='/'>Wypożyczalnia</a></span>
						<div class="mdl-layout-spacer"></div>
						<nav class="mdl-navigation">
							<a class="mdl-navigation__link" href="/">Wszystkie</a>
							<a class="mdl-navigation__link" href="#">Książki</a>
							<a class="mdl-navigation__link" href="#">Filmy</a>
							<a class="mdl-navigation__link" href="#">Muzyka</a>
							<?php if(isset($user))
								echo '<a class="mdl-navigation__link" href="/profil">'.$user['imie'].'</a>';
							else
								echo '<a class="mdl-navigation__link" href="/rejestracja">Zaloguj się</a>';
							?>
						</nav>
					</div>
				</header>
				<div class="mdl-layout__drawer" id='drawer'>
					<span class="mdl-layout-title">Kategorie</span>
					<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="/">Wszystkie</a>
					<a class="mdl-navigation__link" href="#">Książki</a>
					<a class="mdl-navigation__link" href="#">Filmy</a>
					<a class="mdl-navigation__link" href="#">Muzyka</a>
					<?php if(isset($user))
						echo '<a class="mdl-navigation__link" href="/profil">'.$user['imie'].'</a>';
					else
						echo '<a class="mdl-navigation__link" href="/rejestracja">Zaloguj się</a>';
					?>
					</nav>
				</div>
				<div class="mdl-layout__drawer-button"><i class="material-icons">menu</i></div>
				<div class='small-screen-header'>Wypożyczalnia</div>
				<main class='mdl-layout__content mdl-color-text--grey-600'>