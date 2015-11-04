<div class='formContent'>
<form action="/rejestracja" method="post" class='loginForm' autocomplete="off">
	<h4>Zaloguj się</h4>
	<input type="hidden" name="action" value="login"/>
	<?php if(isset($next))echo $next; ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="login_email"/>
		<label class="mdl-textfield__label" for="p1">Adres email</label>
	</div>
	<?php echo form_error('login_email'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="password" id="p2" name="login_password"/>
		<label class="mdl-textfield__label" for="p2">Hasło</label>
	</div>
	<?php echo form_error('login_password'); ?>
	<input type="submit" value="Zaloguj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>
<form action="/rejestracja" method="post" class='regForm' autocomplete="off">
	<h4>Rejestracja</h4>
	<input type="hidden" name="action" value="register"/>
	<?php if(isset($next))echo $next; ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p1" name="imie_klienta"/>
		<label class="mdl-textfield__label" for="p1">Imię</label>
	</div>
	<?php echo form_error('imie_klienta'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p2" name="nazwisko_klienta"/>
		<label class="mdl-textfield__label" for="p2">Nazwisko</label>
	</div>
	<?php echo form_error('nazwisko_klienta'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="email" id="p3" name="email"/>
		<label class="mdl-textfield__label" for="p3">Email</label>
	</div>
	<?php echo form_error('email'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="password" id="p3" name="password"/>
		<label class="mdl-textfield__label" for="p3">Hasło</label>
	</div>
	<?php echo form_error('password'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="password" id="p3" name="rpassword"/>
		<label class="mdl-textfield__label" for="p3">Powtórz hasło</label>
	</div>
	<?php echo form_error('rpassword'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p4" name="miejscowosc"/>
		<label class="mdl-textfield__label" for="p4">Miejscowość</label>
	</div>
	<?php echo form_error('miejscowosc'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p5" name="ulica"/>
		<label class="mdl-textfield__label" for="p5">Ulica</label>
	</div>
	<?php echo form_error('ulica'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" id="p6" name="nr_domu"/>
		<label class="mdl-textfield__label" for="p6">Numer domu</label>
	</div>
	<?php echo form_error('nr_domu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p7" min="0" name="nr_lokalu"/>
		<label class="mdl-textfield__label" for="p7">Numer lokalu</label>
	</div>
	<?php echo form_error('nr_lokalu'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="date" id="p8" name="data_urodzenia"/>
		<label class="mdl-textfield__label" for="p8">Data urodzenia</label>
	</div>
	<?php echo form_error('data_urodzenia'); ?>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="number" id="p9" min="10000000000" max="99999999999" name="pesel"/>
		<label class="mdl-textfield__label" for="p9">PESEL</label>
	</div>
	<?php echo form_error('pesel'); ?>
	<input type="submit" value="Zarejestruj" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
</form>
</div>