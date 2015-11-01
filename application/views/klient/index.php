<div class='midcontent centered' style='margin: auto;'>
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
</div>