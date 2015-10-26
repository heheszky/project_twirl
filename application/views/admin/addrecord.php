
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
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class='materialDropdown' name="autor_ksiazki">
		<?php foreach($pisarze as $pisarz): ?>
			<option value="<?= $pisarz->id_autora ?>"><?php echo $pisarz->imie_autora." ".$pisarz->nazwisko_autora ?></option>
		<?php endforeach; ?>
		</select>
		<div class="mdl-button mdl-js-button mdl-button--icon addPopupBtn" onclick='showPopupAdd(1)'>
			<i class="material-icons">add_box</i>
		</div>
		<label class="mdl-textfield__label" for="p2">Autor książki</label>
	</div>
	<?= form_error('autor_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p4' name="epoka_ksiazki">
			<?php foreach($epoki as $epoka): ?>
			<option value="<?= $epoka->ID_epoki ?>"><?= $epoka->nazwa_epoki ?></option>
			<?php endforeach; ?>
		</select>
		<label class="mdl-textfield__label" for="p2">Nazwa epoki</label>
	</div>
	<?= form_error('epoka_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p5" name="data_wydania_ksiazki"/>
		<label class="mdl-textfield__label" for="p5">Data wydania</label>
	</div>
	<?= form_error('data_wydania_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p6' name="wydawnictwo_ksiazki">
		<?php foreach($wydawnictwa as $wydawnictwo): ?>
			<option value="<?= $wydawnictwo->id_wydawnictwa ?>"><?php if($wydawnictwo->krotka_nazwa_wydawnictwa): ?><?= $wydawnictwo->krotka_nazwa_wydawnictwa ?><?php else: ?><?= $wydawnictwo->nazwa_wydawnictwa; ?><?php endif; ?></option>
		<?php endforeach; ?>
		</select>
		<div class="mdl-button mdl-js-button mdl-button--icon addPopupBtn" onclick='showPopupAdd(0)'>
			<i class="material-icons">add_box</i>
		</div>
		<label class="mdl-textfield__label" for="p2">Wydawnictwo książki</label>
	</div>
	<?= form_error('wydawnictwo_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p7' name="okladka">
			<option value=1>Miękka</option>
			<option value=2>Twarda</option>
		</select>
		<label class="mdl-textfield__label" for="p2">Okładka</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p8" name="liczba_egz"/>
		<label class="mdl-textfield__label" for="p8">Liczba egzemplarzy</label>
	</div>
	<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>
<!-----------------DODAWANIE ALBUMU------------------------->

<form action="/admin/addrecord" method="POST" class='addBookForm'>
	<h2>Album</h2>
	<input type="hidden" name="action" value="album">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="nazwa_albumu"/>
		<label class="mdl-textfield__label" for="p1">Nazwa albumu</label>
	</div>
	<?= form_error('nazwa_albumu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p2' name="autor_albumu">
			<?php foreach($muzycy as $muzyk): ?>
			<option value="<?= $muzyk->id_autora ?>"><?php if($muzyk->nazwa_zespolu): ?><?= $muzyk->nazwa_zespolu; ?><?php else: ?><?= $muzyk->imie_autora." ".$muzyk->nazwisko_autora; ?><?php endif; ?></option>
			<?php endforeach; ?>
		</select>
		<label class="mdl-textfield__label" for="p1">Autor albumu</label>
	</div>
	<?= form_error('autor_albumu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input type="checkbox" name="kompilacja"/> Kompilacja 
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p4" name="data_wydania_albumu"/>
		<label class="mdl-textfield__label" for="p4">Data wydania albumu</label>
	</div>
	<?= form_error('data_wydania_albumu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input type="checkbox" name="soundtrack"/> Soundtrack
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p6" name="liczba_utworow"/>
		<label class="mdl-textfield__label" for="p6">Liczba utworów</label>
	</div>
	<?= form_error('liczba_utworow'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p7' name="nosnik_fizyczny">
		<?php foreach($nosniki as $nosnik): ?>
			<option value="<?= $nosnik->ID_nosnika ?>"><?= $nosnik->nazwa_nosnika ?></option>
		<?php endforeach; ?>
		</select>
		<label class="mdl-textfield__label">Nośnik fizyczny</label>
	</div>
	<?= form_error('nosnik_fizyczny'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p8" name="liczba_nosnikow"/>
		<label class="mdl-textfield__label" for="p8">Liczba nośników</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p9" name="liczba_egzemplarzy_albumu"/>
		<label class="mdl-textfield__label" for="p9">Liczba egzemplarzy</label>
	</div>
	<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>
<!------------------DODAWANIE FILMU------------------------------->
<form action="/admin/addrecord" method="POST" class='addBookForm'>
<h2>Film</h2>
</form>
<!------------------    POPUPY      ------------------------------->
<!------------------DODAWANIE AUTORA------------------------------->
<div class='popupAlert' id='popupAutorKsiazki'>
	<h2>Autor</h2>
	<form action="/admin/add_author" method="POST" id='addAuthorForm'>
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
			<input class="mdl-textfield__input" type="text" id="p3" name="nazwa_zespolu"/>
			<label class="mdl-textfield__label" for="p3">Nazwa zespołu</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input type="checkbox" name="isZespol"/> Zespół
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="date" id="p4" name="data_urodzenia_autora"/>
			<label class="mdl-textfield__label" for="p4">Data urodzenia autora</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="date" id="p5" name="data_smierci_autora"/>
			<label class="mdl-textfield__label" for="p5">Data śmierci autora</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
			<select class="materialDropdown" id='p6' name="kraj_autora">
			<?php foreach($kraje as $kraj): ?>
				<option value="<?= $kraj->ID_kraju ?>"><?= $kraj->nazwa_kraju ?></option>
			<?php endforeach; ?>
			</select>
			<label class="mdl-textfield__label">Kraj autora</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
			<select class="materialDropdown" id='p7' name="typ_autora">
				<option value=1>Pisarz</option>
				<option value=2>Reżyser</option>
				<option value=3>Piosenkarz</option>
			</select>
			<label class="mdl-textfield__label" for="p1">Typ autora</label>
		</div>
		<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
	</form>
</div>
<!------------------DODAWANIE WYDAWNICTWA---------------------------->
<div class='popupAlert' id='popupWydawnictwo'>
	<h4>Wydawnictwo</h4>
	<form action="/admin/add_publisher" method="POST">
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

<div class="obfuscator"></div>
</div>
<script>
	var formAuthor = document.getElementById('addAuthorForm');
	formAuthor.addEventListener('submit', add_author);
	function add_author(evt){
		evt.preventDefault();
		
		var inputs = document.querySelectorAll('#addAuthorForm input, #addAuthorForm select');
		var data = "";
		for(var x = 0; x < inputs.length; x++){
			
			if(inputs[x].getAttribute('name') != null){
				if(inputs[x].getAttribute('type') == 'checkbox' && inputs[x].checked){
					console.log(inputs[x].getAttribute('name'), inputs[x].value)
					data += inputs[x].getAttribute('name') + "=" + inputs[x].value;
				}else if(inputs[x].getAttribute('type') != 'checkbox'){
					console.log(inputs[x].getAttribute('name'), inputs[x].value)
					data += inputs[x].getAttribute('name') + "=" + inputs[x].value;
				}
			}
			data += "&";
			
		}
		data.substring(0, data.length-1);
		console.log(data);
		var r = new XMLHttpRequest();
		r.open("POST", '/admin/add_author', true);
		r.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		r.onreadystatechange = function () {
		if (r.readyState != 4 || r.status != 200) return;
			lastMessageFromPost = JSON.parse(r.responseText);
			console.log(lastMessageFromPost);
		};
		r.send(data);
	}
	
	var lastMessageFromPost;
</script>