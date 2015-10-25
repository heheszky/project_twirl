<!------------------DODAWANIE AUTORA------------------------------->
<h2>Autor</h2>
<form action="/admin/addrecord" method="POST">
	<input type="hidden" name="action" value="autor">
	<input type="text" name="imie_autora" placeholder="Imie"/>
	<?php echo form_error('imie_autora'); ?>
	<input type="text" name="nazwisko_autora" placeholder="Nazwisko"/>
	<?php echo form_error('nazwisko_autora'); ?>
	<input type="text" name="pseudonim_autora" placeholder="Pseudonim"/>
	<?php echo form_error('pseudonim_autora'); ?>
	<input type="date" name="data_urodzenia_autora"/>
	<?php echo form_error('data_urodzenia_autora'); ?>
	<input type="date" name="data_smierci_autora"/>
	<?php echo form_error('data_smierci_autora'); ?>
	<select name="kraj_autora">
	<?php foreach($kraje as $kraj) { ?>
		<option value="<?php echo $kraj->ID_kraju ?>">
			<?php echo $kraj->nazwa_kraju ?>
		</option>
	<?php } ?>
	</select>
	<?php echo form_error('kraj_autora'); ?>
	<select name="typ_autora">
		<option disabled selected>---</option>
		<option value=1>Pisarz</option>
		<option value=2>Reżyser</option>
		<option value=3>Piosenkarz</option>
	</select>
	<?php echo form_error('typ_autora'); ?>
	<input type="submit" value="Dodaj">
</form>

<!------------------DODAWANIE KSIĄŻKI------------------------------->
<h2>Książka</h2>
<form action="/admin/addrecord" method="POST">
	<input type="hidden" name="action" value="ksiazka">
	<input type="text" name="isbn" placeholder="ISBN"/>
	<?php echo form_error('isbn'); ?>
	<input type="text" name="tytul_ksiazki" placeholder="Tytuł książki"/>
	<?php echo form_error('tytul_ksiazki'); ?>
	<select name="autor_ksiazki">
	<?php foreach($pisarze as $pisarz) { ?>
		<option value="<?php echo $pisarz->id_autora ?>">
			<?php echo $pisarz->imie_autora." ".$pisarz->nazwisko_autora ?>
		</option>
	<?php } ?>
	</select>
	<?php echo form_error('autor_ksiazki'); ?>
	<select name="epoka_ksiazki">
	<?php foreach($epoki as $epoka) { ?>
		<option value="<?php echo $epoka->ID_epoki ?>">
			<?php echo $epoka->nazwa_epoki ?>
		</option>
	<?php } ?>
	</select>
	<?php echo form_error('epoka_ksiazki'); ?>
	<input type="date" name="data_wydania_ksiazki" placeholder="Data wydania"/>
	<?php echo form_error('data_wydania_ksiazki'); ?>
	<select name="wydawnictwo_ksiazki">
	<?php foreach($wydawnictwa as $wydawnictwo) { ?>
		<option value="<?php echo $wydawnictwo->id_wydawnictwa ?>">
			<?php echo $wydawnictwo->krotka_nazwa_wydawnictwa ?>
		</option>
	<?php } ?>
	</select>
	<?php echo form_error('wydawnictwo_ksiazki'); ?>
	<select name="okladka">
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
	<?php echo form_error('nazwa_wydawnictwa'); ?>
	<input type="text" name="krotka_nazwa_wydawnictwa" placeholder="Krótka nazwa wydawnictwa"/>
	<?php echo form_error('krotka_nazwa_wydawnictwa'); ?>
	<input type="submit" value="Dodaj"/>
</form>