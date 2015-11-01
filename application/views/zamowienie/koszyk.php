<div class='midcontent centered' style='margin: auto;'>
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
		<thead>
		<tr>
			<td>#</td><td>Nazwa przedmiotu</td><td>Cena za tydzień</td><td></td>
		</tr>
		</thead>
		<tbody>
		<?php if($cart): ?>
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
			<td>
				<button class="mdl-button mdl-js-button mdl-button--icon" productType="<?= $product['type'] ?>" itemID="<?= $id ?>" onclick='removeFromCart(this)'>
					<i class="material-icons">delete</i>
				</button>
			</td>
		</tr>
	<?php $i++; endforeach; endif; ?>
	<?php if($cart && $i > 1): ?>
		<tr>
			<td colspan="2">Razem</td>
			<td><?= $sum ?>zł</td>
			<td></td>
		</tr>
		</tbody>
		<?php else: ?>
		<tr>
			<td colspan='4' style='text-align:center'>Brak przedmiotów</td>
		</tr>
		<?php endif; ?>
	</table>
	<form action="/wypozycz" method="post" style='margin-top:10px;'>
		<input type="hidden" name="wypozyczenie" value="1"/>
		<input type="submit" value="Przejdź dalej" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
	</form>
</div>