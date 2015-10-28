<div id='Books' class='homeCategory'>
  <h4>Książki <button onclick='location.href = "/ksiazki"' class='mdl-button mdl-js-button'>więcej</button></h4>
  <div class='itemSection'>
    <?php foreach($ksiazki as $ksiazka): ?>
    <card cardTitle='<?=$ksiazka->tytul_ksiazki?>' cardCover='<?=$ksiazka->okladka_ksiazki?>'  cardActionHref='/ksiazka/<?=$ksiazka->id_ksiazki?>' cardType='0'></card>
    <?php endforeach; ?>
  </div>
</div>

<div id='Film' class='homeCategory'>
  <h4>Filmy <button onclick='location.href = "/filmy"' class='mdl-button mdl-js-button'>więcej</button></h4>
  <div class='itemSection'>
    <?php foreach($filmy as $film): ?>
    <card cardTitle='<?=$film->tytul_filmu?>' cardCover='<?=$film->okladka_filmu?>'  cardActionHref='/film/<?=$film->id_filmu?>' cardType='2'></card>
    <?php endforeach; ?>
  </div>
</div>

<div id='Music' class='homeCategory'>
  <h4>Muzyka <button onclick='location.href = "/albumy"' class='mdl-button mdl-js-button'>więcej</button></h4>
  <div class='itemSection'>
    <?php foreach($albumy as $album): ?>
    <card cardTitle='<?=$album->nazwa_albumu?>' cardCover='<?=$album->okladka_albumu?>'  cardActionHref='/album/<?=$album->id_albumu?>' cardType='2'></card>
    <?php endforeach; ?>
  </div>
</div>