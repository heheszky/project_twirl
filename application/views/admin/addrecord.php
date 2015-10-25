<h2>Autor</h2>
<form action="/admin/addproduct" method="POST">
	<input type="hidden" name="action" value="autor">
	<input type="text" name="imie" placeholder="Imie"/>
	<input type="text" name="nazwisko" placeholder="Nazwisko"/>
	<input type="text" name="pseudo" placeholder="Pseudonim"/>
	<input type="date" name="data_urodzenia" placeholder="Data urodzenia"/>
	<input type="date" name="data_smierci" placeholder="Data śmierci"/>
	<select name="kraj">
	<?php foreach($kraje as $kraj) { ?>
		<option value="<?php echo $kraj->ID_kraju ?>">
			<?php echo $kraj->nazwa_kraju ?>
		</option>
	<?php } ?>
	</select>
	<select name="typ">
		<option disabled selected>---</option>
		<option value=1>Pisarz</option>
		<option value=2>Reżyser</option>
		<option value=3>Piosenkarz</option>
	</select>
	<input type="submit" value="Dodaj">
</form>
<h2>Książka</h2>
<form action="/admin/addproduct" method="POST">
	<input type="hidden" name="action" value="ksiazka">
	<input type="text" name="isbn" placeholder="ISBN"/>
	<input type="text" name="tytul" placeholder="Tytuł książki"/>
	<select name="autor">
	<?php foreach($pisarze as $pisarz) { ?>
		<option value="<?php echo $pisarz->id_autora ?>">
			<?php echo $pisarz->imie_autora." ".$pisarz->nazwisko_autora ?>
		</option>
	<?php } ?>
	</select>
	<select name="epoka">
		<option>Epoka TO DO</option>
	</select>
	<input type="date" name="data_wydania" placeholder="Data wydania"/>
	<select name="wydawnictwo">
		<option>Wydawnictwo TO DO</option>
	</select>
	<select name="okladka">
		<option value=1>Miękka</option>
		<option value=2>Twarda</option>
	</select>
	<input type="number" name="liczba_egz" placeholder="Liczba egzemplarzy"/>
	<input type="submit" value="Dodaj"/>
</form>