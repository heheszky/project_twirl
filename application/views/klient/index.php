<div class='midcontent centered' style='margin: auto;display: flex;'>
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id='tableClients'>
		<tbody>
		<?php foreach($klient[0] as $k=>$v): ?>
			<?php if ((strpos($k,'id') === false && strpos($k,'ID') === false) && $v != null && $k != "okladka" && $k != 'admin'): ?>
			<tr>
				<td><?= str_replace("_", " ", $k) ?></td><td><?= $v ?></td>
			</tr>
			<?php endif; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id='tableWypozyczenia'>
		<thead>
			<tr>
				<td>Numer wypożyczenia</td><td>Data wypożyczenia</td><td>Data oddania</td><td>Status</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($wypozyczenia as $wyp): ?>
			<tr onclick="document.location = '/wypozyczenie/<?=$wyp->id_wypozyczenia?>';"
				style="cursor: pointer;">
				<td><?=$wyp->id_wypozyczenia?></td>
				<td><?=$wyp->data_wypozyczenia?></td>
				<?php if($wyp->data_oddania): ?>
				<td><?=$wyp->data_oddania?></td>
				<?php else: ?>
				<td>-</td>
				<?php endif; ?>
				<?php if($wyp->data_oddania): ?>
				<td>Zakończone</td>
				<?php else: ?>
				<td>Aktualne</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>