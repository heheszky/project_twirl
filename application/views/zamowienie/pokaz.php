<div class='midcontent centered' style='margin: auto;'>
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id='tableWypozyczenia'>
		<tr>
			<td>#</td>
			<td>Nazwa przedmiotu</td>
			<td>Cena za tydzień</td>
		</tr>
		<?php $i = 1;foreach($products as $p):
		switch($p['type'])
		{
			case 'ksiazka':
				$id = $p['product']->id_ksiazki; $name = $p['product']->tytul_ksiazki;
				break;
			case 'album':
				$id = $p['product']->ID_albumu; $name = $p['product']->nazwa_albumu;
				break;
			case 'film':
				$id = $p['product']->ID_filmu;$name = $p['product']->tytul_filmu;
				break;
		}
		?>
		<tr>
			<td><?=$i?></td>
			<td><?=$name?></td>
			<td><?=$p['product']->cena_za_tydzien?>zł</td>
		</tr>
		<?php $i++;endforeach; ?>
		<tr>
			<?php if($czyZaplacono): ?>
			<td colspan="2">Zapłacono</td>
			<?php else: ?>
			<td colspan="2">Do zapłacenia</td>
			<?php endif; ?>
			<td><?=$suma?></td>
		</tr>
		<?php if(isset($przedluzenie)): ?>
		<tr>
			<td colspan="3"><?=$przedluzenie?></td>
		</tr>
		<?php endif; ?>
	</table>
</div>
