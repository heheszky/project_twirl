<!------------------DODAWANIE AUTORA------------------------------->
<h2>Autor</h2>
<form action="/admin/addrecord" method="POST">
	<input type="hidden" name="action" value="autor">
	<input type="text" name="imie_autora" placeholder="Imie"/>
	<?= form_error('imie_autora'); ?>
	<input type="text" name="nazwisko_autora" placeholder="Nazwisko"/>
	<?= form_error('nazwisko_autora'); ?>
	<input type="text" name="pseudonim_autora" placeholder="Pseudonim"/>
	<?= form_error('pseudonim_autora'); ?>
	<input type="date" name="data_urodzenia_autora"/>
	<?= form_error('data_urodzenia_autora'); ?>
	<input type="date" name="data_smierci_autora"/>
	<?= form_error('data_smierci_autora'); ?>
	<select name="kraj_autora">
		<option disabled selected>Kraj</option>
	<?php foreach($kraje as $kraj): ?>
		<option value="<?= $kraj->ID_kraju ?>">
			<?= $kraj->nazwa_kraju ?>
		</option>
	<?php endforeach; ?>
	</select>
	<?= form_error('kraj_autora'); ?>
	<select name="typ_autora">
		<option disabled selected>Typ</option>
		<option value=1>Pisarz</option>
		<option value=2>Reżyser</option>
		<option value=3>Muzyk</option>
	</select>
	<?= form_error('typ_autora'); ?>
	<input type="submit" value="Dodaj">
</form>

<!------------------DODAWANIE KSIĄŻKI------------------------------->
<h2>Książka</h2>
<form action="/admin/addrecord" method="POST">
	<input type="hidden" name="action" value="ksiazka">
	<input type="text" name="isbn" placeholder="ISBN"/>
	<?= form_error('isbn'); ?>
	<input type="text" name="tytul_ksiazki" placeholder="Tytuł książki"/>
	<?= form_error('tytul_ksiazki'); ?>
	<select name="autor_ksiazki">
		<option disabled selected>Autor</option>
	<?php foreach($pisarze as $pisarz): ?>
		<option value="<?= $pisarz->id_autora ?>">
			<?= $pisarz->imie_autora." ".$pisarz->nazwisko_autora ?>
		</option>
	<?php endforeach; ?>
	</select>
	<?= form_error('autor_ksiazki'); ?>
	<select name="epoka_ksiazki">
		<option disabled selected>Epoka</option>
	<?php foreach($epoki as $epoka): ?>
		<option value="<?= $epoka->ID_epoki ?>">
			<?= $epoka->nazwa_epoki ?>
		</option>
	<?php endforeach; ?>
	</select>
	<?= form_error('epoka_ksiazki'); ?>
	<input type="date" name="data_wydania_ksiazki" placeholder="Data wydania"/>
	<?= form_error('data_wydania_ksiazki'); ?>
	<select name="wydawnictwo_ksiazki">
		<option disabled selected>Wydawnictwo</option>
	<?php foreach($wydawnictwa as $wydawnictwo): ?>
		<option value="<?= $wydawnictwo->id_wydawnictwa ?>">
			<?= $wydawnictwo->krotka_nazwa_wydawnictwa ?>
		</option>
	<?php endforeach; ?>
	</select>
	<?= form_error('wydawnictwo_ksiazki'); ?>
	<select name="okladka">
		<option disabled selected>Okładka</option>
		<option value=1>Miękka</option>
		<option value=2>Twarda</option>
	</select>
	<input type="number" name="liczba_egz" placeholder="Liczba egzemplarzy"/>
	<input type="submit" value="Dodaj"/>
</form>

<!------------------DODAWANIE WYDAWNICTWA---------------------------->
<h2>Wydawnictwo</h2>
<form action="/admin/addrecord" method="POST">
	<input type="hidden" name="action" value="wydawnictwo">
	<input type="text" name="nazwa_wydawnictwa" placeholder="Nazwa wydawnictwa"/>
	<?= form_error('nazwa_wydawnictwa'); ?>
	<input type="text" name="krotka_nazwa_wydawnictwa" placeholder="Krótka nazwa wydawnictwa"/>
	<?= form_error('krotka_nazwa_wydawnictwa'); ?>
	<input type="submit" value="Dodaj"/>
</form>

<!-----------------DODAWANIE ALBUMU------------------------->
<h2>Album</h2>
<form action="/admin/addrecord" method="POST">
	<input type="hidden" name="action" value="album">
	<input type="text" name="nazwa_albumu" placeholder="Nazwa albumu"/>
	<?= form_error('nazwa_albumu'); ?>
	<select name="autor_albumu">
		<option disabled selected>Autor</option>
	<?php foreach($muzycy as $muzyk): ?>
		<option value="<?= $muzyk->ID_autora ?>">
			<?= $muzyk->imie_autora." ".$muzyk->nazwisko_autora ?>
		</option>
	<?php endforeach; ?>
	</select>
	<?= form_error('autor_albumu'); ?>
	<input type="checkbox" name="kompilacja"/> Kompilacja 
	<input type="date" name="data_wydania_albumu"/>
	<?= form_error('data_wydania_albumu'); ?>
	<input type="checkbox" name="soundtrack"/> Soundtrack
	<input type="number" name="liczba_utworow" placeholder="Liczba utworów"/>
	<?= form_error('liczba_utworow'); ?>
	<select name="nosnik_fizyczny">
		<option disabled selected>Nośnik</option>
	<?php foreach($nosniki as $nosnik): ?>
		<option value="<?= $nosnik->ID_nosnika ?>">
			<?= $nosnik->nazwa_nosnika ?>
		</option>
	<?php endforeach; ?>
	</select>
	<?= form_error('nosnik_fizyczny'); ?>
	<input type="number" name="liczba_nosnikow" placeholder="Liczba nośników"/>
	<input type="number" name="liczba_egzemplarzy_albumu" placeholder="Liczba egzemplarzy"/>
	<input type="submit" value="Dodaj"/>
</form>