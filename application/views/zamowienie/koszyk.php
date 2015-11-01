<table>
	<tr>
		<td>#</td><td>Nazwa przedmiotu</td><td>Cena za tydzień</td>
	</tr>
<?php $sum = 0;$i = 1;foreach($cart as $product): ?>
	<?php
	switch($product['type'])
	{
		case 'ksiazka': $id = $product['product']->id_ksiazki; $title = $product['product']->tytul_ksiazki;break;
		case 'film': $id = $product['product']->ID_filmu; $title = $product['product']->tytul_filmu;break;
		case 'album': $id = $product['product']->ID_albumu; $title = $product['product']->nazwa_albumu;break;
	}
	$sum += $product['product']->cena_za_tydzien;
	?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $title; ?></td>
		<td><?= $product['product']->cena_za_tydzien; ?>zł</td>
	</tr>
<?php $i++; endforeach; ?>
	<tr>
		<td colspan="2">Razem</td>
		<td><?= $sum ?>zł</td>
	</tr>
</table>
<form action="/wypozycz" method="post">
	<input type="hidden" name="wypozyczenie" value="1"/>
	<input type="submit" value="Przejdź dalej"/>
</form>