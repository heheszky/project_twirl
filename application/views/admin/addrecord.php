<!------------------DODAWANIE KSIĄŻKI------------------------------->
<div class='addItem'>
<form action="/admin/addrecord" class='addBookForm' method="POST">
	<h2>Książka</h2>
	<input type="hidden" name="action" value="ksiazka">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="isbn"/>
		<label class="mdl-textfield__label" for="p1">ISBN</label>
	</div>
	<?= form_error('isbn'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p2" name="tytul_ksiazki"/>
		<label class="mdl-textfield__label" for="p2">Tytuł książki</label>
	</div>
	<?= form_error('tytul_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<select class="mdl-textfield__input dropDownInput" id='p3' name="autor_ksiazki">
		<?php foreach($pisarze as $pisarz): ?>
			<option value="<?= $pisarz->id_autora ?>">
				<?= $pisarz->imie_autora." ".$pisarz->nazwisko_autora ?>
			</option>
		<?php endforeach; ?>
		</select>
		<div class="mdl-button mdl-js-button mdl-button--icon addPopupBtn" onclick='showPopupAdd(1)'>
			<i class="material-icons">add_box</i>
		</div>
		<label class="mdl-textfield__label" for="p3">Autor książki</label>
	</div>
	<?= form_error('autor_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<select class="mdl-textfield__input" id='p4' name="epoka_ksiazki">
		<?php foreach($epoki as $epoka): ?>
			<option value="<?= $epoka->ID_epoki ?>">
				<?= $epoka->nazwa_epoki ?>
			</option>
		<?php endforeach; ?>
		</select>
		<label class="mdl-textfield__label" for="p4">Epoka książki</label>
	</div>
	<?= form_error('epoka_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p5" name="data_wydania_ksiazki"/>
		<label class="mdl-textfield__label" for="p5">Data wydania</label>
	</div>
	<?= form_error('data_wydania_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<select class="mdl-textfield__input dropDownInput" id='p6' name="wydawnictwo_ksiazki">
		<?php foreach($wydawnictwa as $wydawnictwo): ?>
			<option value="<?= $wydawnictwo->id_wydawnictwa ?>">
				<?php if($wydawnictwo->krotka_nazwa_wydawnictwa)
					echo $wydawnictwo->krotka_nazwa_wydawnictwa;
				else
					echo $wydawnictwo->nazwa_wydawnictwa;
				?>
			</option>
		<?php endforeach; ?>
		</select>
		<div class="mdl-button mdl-js-button mdl-button--icon addPopupBtn" onclick='showPopupAdd(0)'>
			<i class="material-icons">add_box</i>
		</div>
		<label class="mdl-textfield__label" for="p6">Wydawnictwo książki</label>
	</div>
	<?= form_error('wydawnictwo_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<select class="mdl-textfield__input" id='p7' name="okladka">
			<option value=1>Miękka</option>
			<option value=2>Twarda</option>
		</select>
		<label class="mdl-textfield__label" for="p7">Okładka</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p8" name="liczba_egz"/>
		<label class="mdl-textfield__label" for="p8">Liczba egzemplarzy</label>
	</div>
	<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>

<!------------------DODAWANIE AUTORA------------------------------->
<div class='popupAlert' id='popupAutorKsiazki'>
	<h2>Autor</h2>
	<form action="/admin/addrecord" method="POST">
		<input type="hidden" name="action" value="autor">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p1" name="imie_autora"/>
			<label class="mdl-textfield__label" for="p1">Imię</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p2" name="nazwisko_autora"/>
			<label class="mdl-textfield__label" for="p2">Nazwisko</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p3" name="pseudonim_autora"/>
			<label class="mdl-textfield__label" for="p3">Pseudonim</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="date" id="p4" name="data_urodzenia_autora"/>
			<label class="mdl-textfield__label" for="p4">Data urodzenia autora</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="date" id="p5" name="data_smierci_autora"/>
			<label class="mdl-textfield__label" for="p5">Data śmierci autora</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<select class="mdl-textfield__input dropDownInput" id='p6' name="kraj_autora">
			<?php foreach($kraje as $kraj): ?>
				<option value="<?= $kraj->ID_kraju ?>">
					<?= $kraj->nazwa_kraju ?>
				</option>
			<?php endforeach; ?>
			</select>
			<label class="mdl-textfield__label" for="p6">Kraj</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<select class="mdl-textfield__input dropDownInput" id='p7' name="typ_autora">
				<option disabled selected>---</option>
				<option value=1>Pisarz</option>
				<option value=2>Reżyser</option>
				<option value=3>Piosenkarz</option>
			</select>
			<label class="mdl-textfield__label" for="p7">Typ</label>
		</div>
		<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
	</form>
</div>
<!------------------DODAWANIE WYDAWNICTWA---------------------------->
<div class='popupAlert' id='popupWydawnictwo'>
	<h4>Wydawnictwo</h4>
	<form action="/admin/addrecord" method="POST">
		<input type="hidden" name="action" value="wydawnictwo">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p1" name="nazwa_wydawnictwa"/>
			<label class="mdl-textfield__label" for="p1">Nazwa wydawnictwa</label>
		</div>
		<?= form_error('nazwa_wydawnictwa'); ?>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p2" name="krotka_nazwa_wydawnictwa"/>
			<label class="mdl-textfield__label" for="p2">Krótka nazwa wydawnictwa</label>
		</div>
		<?= form_error('krotka_nazwa_wydawnictwa'); ?>
		<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
	</form>
</div>
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
<div class="obfuscator"></div>
</div>
