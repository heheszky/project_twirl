<div id='Books' class='homeCategory'>
  <h4>Książki <button onclick='location.href = "/ksiazki"' class='mdl-button mdl-js-button'>więcej</button></h4>
  <div class='itemSection'>
    <?php foreach($ksiazki as $ksiazka): ?>
    <card itemID='<?=$ksiazka->id_ksiazki?>' cardTitle='<?=$ksiazka->tytul_ksiazki?>' cardCover='<?=$ksiazka->okladka?>'  cardActionHref='/ksiazka/<?=$ksiazka->id_ksiazki?>' cardType='0'></card>
    <?php endforeach; ?>
  </div>
</div>

<div id='Film' class='homeCategory'>
  <h4>Filmy <button onclick='location.href = "/filmy"' class='mdl-button mdl-js-button'>więcej</button></h4>
  <div class='itemSection'>
    <?php foreach($filmy as $film): ?>
    <card itemID='<?=$film->id_filmu?>' cardTitle='<?=$film->tytul_filmu?>' cardCover='<?=$film->okladka?>'  cardActionHref='/film/<?=$film->id_filmu?>' cardType='1'></card>
    <?php endforeach; ?>
  </div>
</div>

<div id='Music' class='homeCategory'>
  <h4>Muzyka <button onclick='location.href = "/albumy"' class='mdl-button mdl-js-button'>więcej</button></h4>
  <div class='itemSection'>
    <?php foreach($albumy as $album): ?>
    <card itemID='<?=$album->id_albumu?>' cardTitle='<?=$album->nazwa_albumu?>' cardCover='<?=$album->okladka?>'  cardActionHref='/album/<?=$album->id_albumu?>' cardType='2'></card>
    <?php endforeach; ?>
  </div>
</div>
<script>
  var cards = document.getElementsByTagName("card");
  var cardsLen = cards.length;
  for(var x = 0; x < cardsLen; x++)
    cardToDiv(cards[0], x);
</script>