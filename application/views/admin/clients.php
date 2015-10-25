<?php foreach($clients as $client): ?>
	<h3><?= $client->imie_klienta." ". $client->nazwisko_klienta ?></h3>
	<p>ID: <?= $client->ID_klienta ?></p>
	<p>Email: <?= $client->email ?></p>
	<p>Miejscowość: <?= $client->miejscowosc ?></p>
	<p>Adres: <?= $client->ulica." ".$client->nr_domu."/".$client->nr_lokalu ?></p>
	<p>Data urodzenia: <?= $client->data_urodzenia ?></p>
	<p>PESEL: <?= $client->pesel ?></p>
<?php endforeach; ?>