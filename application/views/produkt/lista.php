<div id="products" class='homeCategory itemSection'></div>

<script>
	var product = "<?=$product?>";
	switch(product)
	{
		case 'ksiazka':
			var names = ['id_ksiazki', 'tytul_ksiazki', 'okladka'];
			var cType = 0;
			break;
		case 'album':
			var names = ['id_albumu', 'nazwa_albumu', 'okladka'];
			var cType = 1;
			break;
		case 'film':
			var names = ['id_filmu', 'tytul_filmu', 'okladka'];
			var cType = 2;
			break;
	}
	products = JSON.parse('<?= $products ?>');
	var container = document.getElementById("products");
	for(i = 0 ; i < products.length ; i++)
	{
		card = document.createElement("card");
		cardTitle = document.createAttribute("cardTitle");
		cardCover = document.createAttribute("cardCover");
		cardActionHref = document.createAttribute("cardActionHref");
		cardType = document.createAttribute("cardType");
		cardActionHref.value = '/' + product + '/' + products[i][names[0]];
		cardTitle.value = products[i][names[1]];
		cardCover.value = products[i][names[2]];
		cardType.value = cType;
		card.setAttributeNode(cardTitle);
		card.setAttributeNode(cardCover);
		card.setAttributeNode(cardActionHref);
		card.setAttributeNode(cardType);
		container.appendChild(card);
	}
</script>