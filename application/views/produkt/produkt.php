<div class='product'>
	<div class="photo">
		<img src='/<?= $product[0]->okladka ?>'/>
	</div>
	<div class="content">
		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp table-centered" id='tableClients'>
		    <tbody>
			<?php foreach($product[0] as $k=>$v): ?>
				<?php if ((strpos($k,'id') === false && strpos($k,'ID') === false) && $v != null && $k != "okladka"): ?>
				<tr>
					<td><?= str_replace("_", " ", $k) ?></td><td><?= $v ?></td>
				</tr>
				<?php endif; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>