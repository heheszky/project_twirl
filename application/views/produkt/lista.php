<div id="products"></div>

<script>
	function get_url_content(url)
	{
		xmlhttpreq = new XMLHttpRequest();
		xmlhttpreq.onreadystatechange = function()
		{
			if(xmlhttpreq.readyState==4 && xmlhttpreq.status==200)
				return;
		}
		xmlhttpreq.open("GET", url, false);
		xmlhttpreq.send();
	}
	var product = "<?=$product?>";
	switch(product)
	{
		case 'ksiazka':
			var names = ['id_ksiazki', 'tytul_ksiazki', 'okladka_ksiazki'];
			var cType = 0;
			break;
		case 'album':
			var names = ['id_albumu', 'nazwa_albumu', 'okladka_albumu'];
			var cType = 1;
			break;
		case 'film':
			var names = ['id_filmu', 'tytul_filmu', 'okladka_filmu'];
			var cType = 2;
			break;
	}
	get_url_content("/get_json/" + product);
	result = xmlhttpreq.responseText;
	products = JSON.parse(result);
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