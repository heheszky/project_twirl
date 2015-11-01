<div class='product'>
	<div class="photo">
		<img src='/<?= $product->okladka ?>'/>
	</div>
	<div class="content">
		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp table-centered" id='tableClients'>
		    <tbody>
			<?php foreach($product as $k=>$v): ?>
				<?php if ((strpos($k,'id') === false && strpos($k,'ID') === false && strpos($k,'liczba_egzemplarzy') === false) && $v != null && $k != "okladka"): ?>
				<tr>
					<td><?= str_replace("_", " ", $k) ?></td><td><?= $v ?></td>
				</tr>
				<?php endif; ?>
			<?php endforeach; ?>
				<tr>
					<td>Liczba egzemplarzy</td><td><?= $product->liczba_egzemplarzy ?> (<?=$available?> dostępne)</td>
				</tr>
			</tbody>
		</table>
		<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Dodaj do koszyka</button>
	</div>
</div>