
<!------------------DODAWANIE KSIĄŻKI------------------------------->

<div class='addItem'>

<?= form_open_multipart("/admin/addrecord", 'class="addBookForm"') ?>
	<h2>Książka</h2>
	<input type="hidden" name="action" value="ksiazka"/>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="isbn" required/>
		<label class="mdl-textfield__label" for="p1">ISBN</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p2" name="tytul_ksiazki" required/>
		<label class="mdl-textfield__label" for="p2">Tytuł książki</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class='materialDropdown' name="autor_ksiazki" id='authorSelect' required>
		<?php foreach($pisarze as $pisarz): ?>
			<option value="<?= $pisarz->id_autora ?>"><?php echo $pisarz->imie_autora." ".$pisarz->nazwisko_autora ?></option>
		<?php endforeach; ?>
		</select>
		<div class="mdl-button mdl-js-button mdl-button--icon addPopupBtn" onclick='showPopupAdd(1)'>
			<i class="material-icons">add_box</i>
		</div>
		<label class="mdl-textfield__label" for="p2">Autor książki</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p4' name="epoka_ksiazki" required>
			<?php foreach($epoki as $epoka): ?>
			<option value="<?= $epoka->ID_epoki ?>"><?= $epoka->nazwa_epoki ?></option>
			<?php endforeach; ?>
		</select>
		<label class="mdl-textfield__label" for="p2">Nazwa epoki</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p5" name="data_wydania_ksiazki" required/>
		<label class="mdl-textfield__label" for="p5">Data wydania</label>
	</div>
	<?= form_error('data_wydania_ksiazki'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" name="wydawnictwo_ksiazki" id='distributorSelect' required>
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
		<select class="materialDropdown" id='p7' name="okladka" required>
			<option value=1>Miękka</option>
			<option value=2>Twarda</option>
		</select>
		<label class="mdl-textfield__label" for="p2">Okładka</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p8" name="liczba_egz"/>
		<label class="mdl-textfield__label" for="p8">Liczba egzemplarzy</label>
	</div>
	<span class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored upfile" onclick='this.nextElementSibling.click()'>Wybierz okładkę</span>
	<input type="file" name="upfile" accept="image/*" hidden/>
	<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>

<!-----------------DODAWANIE ALBUMU------------------------->

<?= form_open_multipart("/admin/addrecord", 'class="addBookForm"') ?>
	<h2>Album</h2>
	<input type="hidden" name="action" value="album"/>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="nazwa_albumu" required/>
		
		<label class="mdl-textfield__label" for="p1">Nazwa albumu</label>
	</div>
	<?= form_error('nazwa_albumu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p2' name="autor_albumu" required>
			<?php foreach($muzycy as $muzyk): ?>
			<option value="<?= $muzyk->id_autora ?>"><?php if($muzyk->nazwa_zespolu): ?><?= $muzyk->nazwa_zespolu; ?><?php else: ?><?= $muzyk->imie_autora." ".$muzyk->nazwisko_autora; ?><?php endif; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="mdl-button mdl-js-button mdl-button--icon addPopupBtn" onclick='showPopupAdd(1)'>
			<i class="material-icons">add_box</i>
		</div>
		<label class="mdl-textfield__label" for="p1">Autor albumu</label>
	</div>
	<?= form_error('autor_albumu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input type="checkbox" name="kompilacja"/> Kompilacja 
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p4" name="data_wydania_albumu" required/>
		<label class="mdl-textfield__label" for="p4">Data wydania albumu</label>
	</div>
	<?= form_error('data_wydania_albumu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input type="checkbox" name="soundtrack"/> Soundtrack
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p6" name="liczba_utworow" required/>
		<label class="mdl-textfield__label" for="p6">Liczba utworów</label>
	</div>
	<?= form_error('liczba_utworow'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p7' name="nosnik_fizyczny" required>
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
	<span class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored upfile" onclick='this.nextElementSibling.click()'>Wybierz okładkę</span>
	<input type="file" name="upfile" hidden/>
	<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>

<!------------------DODAWANIE FILMU------------------------------->

<?= form_open_multipart("/admin/addrecord", 'class="addBookForm"') ?>
	<h2>Film</h2>
	<input type="hidden" name="action" value="film">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="tytul_filmu" required/>
		<label class="mdl-textfield__label" for="p1">Tytuł filmu</label>
	</div>
	<?= form_error('nazwa_filmu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p2' name="rezyser_filmu" required>
			<?php foreach($rezyserowie as $rezyser): ?>
			<option value="<?= $rezyser->id_autora ?>"><?= $rezyser->imie_autora." ".$rezyser->nazwisko_autora; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="mdl-button mdl-js-button mdl-button--icon addPopupBtn" onclick='showPopupAdd(1)'>
			<i class="material-icons">add_box</i>
		</div>
		<label class="mdl-textfield__label" for="p2">Autor filmu</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p3' name="studio_filmowe" required>
			<?php foreach($studiafilmowe as $studio): ?>
			<option value="<?= $studio->id_studia ?>"><?= $studio->nazwa_studia; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="mdl-button mdl-js-button mdl-button--icon addPopupBtn" onclick='showPopupAdd(2)'>
			<i class="material-icons">add_box</i>
		</div>
		<label class="mdl-textfield__label" for="p3">Studio filmowe</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p4' name="kraj_produkcji_filmu" required>
			<?php foreach($kraje as $kraj): ?>
				<option value="<?= $kraj->ID_kraju ?>"><?= $kraj->nazwa_kraju ?></option>
			<?php endforeach; ?>
		</select>
		<label class="mdl-textfield__label" for="p4">Kraj produkcji</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p5" name="data_wydania_filmu" required/>
		<label class="mdl-textfield__label" for="p5">Data wydania</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p6" name="liczba_egzemplarzy_filmu"/>
		<label class="mdl-textfield__label" for="p6">Liczba egzemplarzy</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
		<select class="materialDropdown" id='p7' name="nosnik_fizyczny_filmu" required>
		<?php foreach($nosniki as $nosnik): ?>
			<option value="<?= $nosnik->ID_nosnika ?>"><?= $nosnik->nazwa_nosnika ?></option>
		<?php endforeach; ?>
		</select>
		<label class="mdl-textfield__label" for="p7">Nośnik fizyczny</label>
	</div>
	<span class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored upfile" onclick='this.nextElementSibling.click()'>Wybierz okładkę</span>
	<input type="file" name="upfile" hidden/>
	<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>

<!------------------    POPUPY      ------------------------------->
<!------------------DODAWANIE AUTORA------------------------------->

<div class='popupAlert' id='popupAutorKsiazki'>
	<h2>Autor</h2>
	<form action="/admin/add_author" method="POST" id='addAuthorForm'>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p1" name="imie_autora" required/>
			<label class="mdl-textfield__label" for="p1">Imię</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p2" name="nazwisko_autora" required/>
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
			<input class="mdl-textfield__input" type="date" id="p4" name="data_urodzenia_autora" required/>
			<label class="mdl-textfield__label" for="p4">Data urodzenia autora</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="date" id="p5" name="data_smierci_autora"/>
			<label class="mdl-textfield__label" for="p5">Data śmierci autora</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
			<select class="materialDropdown" id='p6' name="kraj_autora" required>
			<?php foreach($kraje as $kraj): ?>
				<option value="<?= $kraj->ID_kraju ?>"><?= $kraj->nazwa_kraju ?></option>
			<?php endforeach; ?>
			</select>
			<label class="mdl-textfield__label">Kraj autora</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty">
			<select class="materialDropdown" id='p7' name="typ_autora" required>
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
	<form action="/admin/add_publisher" method="POST" id='addDistributorForm'>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p1" name="nazwa_wydawnictwa" required/>
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

<!------------------DODAWANIE STUDIA FILMOWEGO----------------------->

<div class='popupAlert' id='popupStudioFilmowe'>
	<h4>Studio filmowe</h4>
	<form action="/admin/add_studio" method="POST" id='addStudioForm'>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="p1" name="nazwa_studia_filmowego" required/>
			<label class="mdl-textfield__label" for="p1">Nazwa studia filmowego</label>
		</div>
		<input type="submit" value="Dodaj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
	</form>
</div>

<!------------------------------------------------------------------->

<div class="obfuscator"></div>
</div>
<script>
	var formAuthor = document.getElementById('addAuthorForm');
	var formDistributor = document.getElementById('addDistributorForm');
	
	formAuthor.addEventListener('submit', add_author);
	formDistributor.addEventListener('submit', add_distributor);
	
	function add_author(evt){
		evt.preventDefault();
		
		var inputs = document.querySelectorAll('#addAuthorForm input, #addAuthorForm select');
		var data = "";
		for(var x = 0; x < inputs.length; x++){
			
			if(inputs[x].getAttribute('name') != null){
				if(inputs[x].getAttribute('type') == 'checkbox' && inputs[x].checked){
					data += inputs[x].getAttribute('name') + "=" + inputs[x].value;
				}else if(inputs[x].getAttribute('type') != 'checkbox'){
					data += inputs[x].getAttribute('name') + "=" + inputs[x].value;
				}
			}
			data += "&";
		}
		data.substring(0, data.length-1);
		var r = new XMLHttpRequest();
		r.open("POST", '/admin/add_author', true);
		r.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		r.onreadystatechange = function () {
		if (r.readyState != 4 || r.status != 200) return;
			lastMessageFromPost = JSON.parse(r.responseText);
			if(lastMessageFromPost.status == "ok"){
				var authorselect = document.getElementById("authorSelect");
				var option = document.createElement('option');
				option.innerText = lastMessageFromPost.autor;
				option.value = lastMessageFromPost.id;
				authorselect.appendChild(option);
				var authorDiv = document.querySelector('div[data-id="authorSelect"]');
				var data_index = authorDiv.children[0].children.length;
				var divOption = document.createElement('div');
				divOption.setAttribute('data-index', data_index);
				divOption.setAttribute('value', lastMessageFromPost.id)
				divOption.innerText = lastMessageFromPost.autor;
				divOption.addEventListener('click', optionClick);
				authorDiv.children[0].appendChild(divOption);
				var pos = divOption.getAttribute('data-index') * 28;
				authorDiv.children[0].style.top = -pos + "px";
				authorselect.value = lastMessageFromPost.id;
				var width = authorDiv.children[0].offsetWidth;
				authorDiv.children[0].style.clip = 'rect('+pos+'px, '+(width+10)+'px, '+(pos+28)+'px, 0px)';
				var alertbox = document.getElementById('popupAutorKsiazki')
				if(alertbox.classList.contains('error'))
					alertbox.classList.remove('error');
				alertbox.classList.remove('show');
				document.getElementsByClassName('obfuscator')[0].classList.remove('show');
				for(var x = 0; x < inputs.length; x++){
			
				if(inputs[x].getAttribute('name') != null){
					if(inputs[x].getAttribute('type') == 'checkbox' && inputs[x].checked){
						inputs[x].checked = false;
					}else if(inputs[x].getAttribute('type') != 'checkbox'){
						inputs[x].value = "";
					}
				}
				data += "&";
			}
			}else{
				var alertbox = document.getElementById('popupAutorKsiazki')
				if(!alertbox.classList.contains('error'))
					alertbox.classList.add('error');
			}
		};
		r.send(data);
	}
	function add_distributor(evt){
		evt.preventDefault();
		
		var inputs = document.querySelectorAll('#addDistributorForm input, #addDistributorForm select');
		var data = "";
		for(var x = 0; x < inputs.length; x++){
			
			if(inputs[x].getAttribute('name') != null){
				data += inputs[x].getAttribute('name') + "=" + inputs[x].value;
				data += "&";
			}
			
		}
		data.substring(0, data.length-1);
		var r = new XMLHttpRequest();
		r.open("POST", '/admin/add_publisher', true);
		r.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		r.onreadystatechange = function () {
		if (r.readyState != 4 || r.status != 200) return;
			lastMessageFromPost = JSON.parse(r.responseText);
			if(lastMessageFromPost.status == "ok"){
				var authorselect = document.getElementById("distributorSelect");
				var option = document.createElement('option');
				option.innerText = lastMessageFromPost.nazwa;
				option.value = lastMessageFromPost.id;
				authorselect.appendChild(option);
				var authorDiv = document.querySelector('div[data-id="distributorSelect"]');
				var data_index = authorDiv.children[0].children.length;
				var divOption = document.createElement('div');
				divOption.setAttribute('data-index', data_index);
				divOption.setAttribute('value', lastMessageFromPost.id)
				divOption.innerText = lastMessageFromPost.nazwa;
				divOption.addEventListener('click', optionClick);
				authorDiv.children[0].appendChild(divOption);
				var pos = divOption.getAttribute('data-index') * 28;
				authorDiv.children[0].style.top = -pos + "px";
				authorselect.value = lastMessageFromPost.id;
				var width = authorDiv.children[0].offsetWidth;
				authorDiv.children[0].style.clip = 'rect('+pos+'px, '+(width+10)+'px, '+(pos+28)+'px, 0px)';
				var alertbox = document.getElementById('popupWydawnictwo')
				if(alertbox.classList.contains('error'))
					alertbox.classList.remove('error');
				alertbox.classList.remove('show');
				document.getElementsByClassName('obfuscator')[0].classList.remove('show');
				for(var x = 0; x < inputs.length; x++){
			
				if(inputs[x].getAttribute('name') != null){
					if(inputs[x].getAttribute('type') == 'checkbox' && inputs[x].checked){
						inputs[x].checked = false;
					}else if(inputs[x].getAttribute('type') != 'checkbox'){
						inputs[x].value = "";
					}
				}
				data += "&";
			}
			}else{
				var alertbox = document.getElementById('popupWydawnictwo')
				if(!alertbox.classList.contains('error'))
					alertbox.classList.add('error');
			}
			console.log(lastMessageFromPost)
		};
		r.send(data);
		console.log(data);
	}
	var lastMessageFromPost;
</script>