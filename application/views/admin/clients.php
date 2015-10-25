<?php foreach($clients as $client) { ?>
	<h3><?php echo $client->imie_klienta." ". $client->nazwisko_klienta ?></h3>
	<p>ID: <?php echo $client->ID_klienta ?></p>
	<p>Email: <?php echo $client->email ?></p>
	<p>Miejscowość: <?php echo $client->miejscowosc ?></p>
	<p>Adres: <?php echo $client->ulica." ".$client->nr_domu."/".$client->nr_lokalu ?></p>
	<p>Data urodzenia: <?php echo $client->data_urodzenia ?></p>
	<p>PESEL: <?php echo $client->pesel ?></p>
<?php } ?>