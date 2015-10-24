<form action="/rejestracja" method="post" class='regForm' autocomplete="off">
	<input type="hidden" name="action" value="register"/>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="imie_klienta"/>
		<label class="mdl-textfield__label" for="p1">Imię</label>
		<?php echo form_error('imie_klienta'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p2" name="nazwisko_klienta"/>
		<label class="mdl-textfield__label" for="p2">Nazwisko</label>
		<?php echo form_error('nazwisko_klienta'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="email" id="p3" name="email"/>
		<label class="mdl-textfield__label" for="p3">Email</label>
		<?php echo form_error('email'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="password" id="p3" name="password"/>
		<label class="mdl-textfield__label" for="p3">Hasło</label>
		<?php echo form_error('password'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="password" id="p3" name="rpassword"/>
		<label class="mdl-textfield__label" for="p3">Powtórz hasło</label>
		<?php echo form_error('rpassword'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p4" name="miejscowosc"/>
		<label class="mdl-textfield__label" for="p4">Miejscowość</label>
		<?php echo form_error('miejscowosc'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p5" name="ulica"/>
		<label class="mdl-textfield__label" for="p5">Ulica</label>
		<?php echo form_error('ulica'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p6" name="nr_domu"/>
		<label class="mdl-textfield__label" for="p6">Numer domu</label>
		<?php echo form_error('nr_domu'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p7" min="0" name="nr_lokalu"/>
		<label class="mdl-textfield__label" for="p7">Numer lokalu</label>
		<?php echo form_error('nr_lokalu'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p8" name="data_urodzenia"/>
		<label class="mdl-textfield__label" for="p8">Data urodzenia</label>
		<?php echo form_error('data_urodzenia'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p9" min="10000000000"name="pesel"/>
		<label class="mdl-textfield__label" for="p9">PESEL</label>
		<?php echo form_error('pesel'); ?>
	</div>
	<input type="submit" value="Zarejestruj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>
<form action="/rejestracja" method="post" class='regForm' autocomplete="off">
	<input type="hidden" name="action" value="login"/>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="login_email"/>
		<label class="mdl-textfield__label" for="p1">Adres email</label>
		<?php echo form_error('login_email'); ?>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="password" id="p2" name="login_password"/>
		<label class="mdl-textfield__label" for="p2">Hasło</label>
		<?php echo form_error('login_password'); ?>
	</div>
	<input type="submit" value="Zaloguj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>