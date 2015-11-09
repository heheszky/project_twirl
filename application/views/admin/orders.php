<div class='midcontent centered' style='margin: auto;display: flex;'>
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id='tableWypozyczenia' style="margin: 0 10px;">
		<thead>
			<tr>
				<td>Numer wypożyczenia</td><td>Klient</td><td>Data wypożyczenia</td><td>Data oddania</td><td>Status</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($wypozyczenia as $wyp): ?>
			<tr onclick="document.location = '/wypozyczenie/<?=$wyp->id_wypozyczenia?>';"
				style="cursor: pointer;">
				<td><?=$wyp->id_wypozyczenia?></td>
				<td><?=$wyp->klient?></td>
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