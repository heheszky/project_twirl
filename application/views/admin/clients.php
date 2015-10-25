<div class='midcontent centered'>
  <div class='container'>
  <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp table-centered" id='tableClients'>
    <thead>
      <tr>
      <th>ID</th>
        <th class="mdl-data-table__cell--non-numeric">Imię</th>
        <th>Nazwisko</th>
        <th>Email</th>
      <th>Miejscowość</th>
      <th>Adres</th>
      <th>Data urodzenia</th>
      <th>PESEL</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($clients as $client): ?>
      <tr>
        <td><?= $client->ID_klienta ?></td>
        <td><?= $client->imie_klienta ?></td>
        <td><?= $client->nazwisko_klienta ?></td>
        <td><?= $client->email ?></td>
        <td><?= $client->miejscowosc ?></td>
        <td><?= $client->ulica." ".$client->nr_domu."/".$client->nr_lokalu ?></td>
        <td><?= $client->data_urodzenia ?></td>
        <td><?= $client->pesel ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </div>
  <button class="mdl-button mdl-js-button mdl-button--icon tableScrollButtons tableScrollButtonLeft">
    <i class="material-icons">keyboard_arrow_left</i>
  </button>
  <button class="mdl-button mdl-js-button mdl-button--icon tableScrollButtons tableScrollButtonRight">
    <i class="material-icons">keyboard_arrow_right</i>
  </button>
</div>