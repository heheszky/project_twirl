<form action="/klient/rejestracja" method="post" class='regForm'>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="imie_klienta"/>
		<label class="mdl-textfield__label" for="p1">Imię</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p2" name="nazwisko_klienta"/>
		<label class="mdl-textfield__label" for="p2">Nazwisko</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="email" id="p3" name="email"/>
		<label class="mdl-textfield__label" for="p3">Email</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p4" name="miejscowosc"/>
		<label class="mdl-textfield__label" for="p4">Miejscowość</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p5" name="ulica"/>
		<label class="mdl-textfield__label" for="p5">Ulica</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p6" name="nr_domu"/>
		<label class="mdl-textfield__label" for="p6">Numer domu</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p7" min="0" name="nr_lokalu"/>
		<label class="mdl-textfield__label" for="p7">Numer lokalu</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p8" name="data_urodzenia"/>
		<label class="mdl-textfield__label" for="p8">Data urodzenia</label>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p9" min="10000000000"name="pesel"/>
		<label class="mdl-textfield__label" for="p9">PESEL</label>
	</div>
	<input type="submit" value="Zarejestruj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>