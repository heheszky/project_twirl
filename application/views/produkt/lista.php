<div id="sort-panel" class="sort-panel"></div>
<div class="homeCategory">
	<div id="products" class='itemSection'></div>
</div>
<script>
	var product = "<?=$product?>";
	switch(product)
	{
		case 'ksiazka':
			var names = ['id_ksiazki', 'tytul_ksiazki', 'okladka'];
			var filter_by = [
				['Epoka', 'id_epoki', 'nazwa_epoki'],
				['Okładka', 'id_okladki', 'typ_okladki']
			]
			var cType = 0;
			break;
		case 'album':
			var names = ['id_albumu', 'nazwa_albumu', 'okladka'];
			var filter_by = [];
			var cType = 1;
			break;
		case 'film':
			var names = ['id_filmu', 'tytul_filmu', 'okladka'];
			var filter_by = [];
			var cType = 2;
			break;
	}
	products = JSON.parse('<?= $products ?>');
	var container = document.getElementById("products");
	var filter = {};
	// Add filter keys
	for(i = 0 ; i < filter_by.length ; i++)
		filter[filter_by[i][1]] = [];
		
	for(i = 0 ; i < products.length ; i++)
	{
		// Add filter values
		for(j = 0 ; j < filter_by.length ; j++)
			if(filter[filter_by[j][1]].containsArray([String(products[i][filter_by[j][1]]), products[i][filter_by[j][2]]]))
				continue
			else
				filter[filter_by[j][1]].push([products[i][filter_by[j][1]], products[i][filter_by[j][2]]])
	}
	for(i = 0 ; i < filter_by.length ; i++)
	{
		div = document.createElement("div");
		div.style.width = "200px";
		div.style.display = "inline-block";
		div.innerText = filter_by[i][0];
		select = document.createElement("select");
		select.id = filter_by[i][1];
		select.classList.add("a");
		select.appendChild(document.createElement("option"));
		select.addEventListener("change", createCards);
		select.setAttribute("index", i);
		for(e = 0 ; e < filter[filter_by[i][1]].length ; e++)
		{
			option = document.createElement("option");
			option.value = filter[filter_by[i][1]][e][0];
			option.innerText = filter[filter_by[i][1]][e][1];
			select.appendChild(option);
		}
		div.appendChild(select);
		document.getElementById('sort-panel').appendChild(div);
	}
	function updateItems()
	{
		sortPanel = document.getElementById('sort-panel');
		selects = sortPanel.getElementsByTagName('select');
		filtered_products = products;
		for(i = 0 ; i < selects.length ; i++)
		{
			if(selects[i].value!="")
			{
				index = selects[i].attributes.index.value;
				filtered_products = filtered_products.filter(function(e){
					return e[filter_by[index][1]] == selects[i].value;
				});
			}
		}
		console.log(filtered_products);
	}
	function createCards()
	{
		updateItems();
		document.getElementById('products').innerHTML = "";
		// Create Cards
		for(i = 0 ; i < filtered_products.length ; i++)
		{
			card = document.createElement("card");
			cardTitle = document.createAttribute("cardTitle");
			cardCover = document.createAttribute("cardCover");
			cardActionHref = document.createAttribute("cardActionHref");
			cardType = document.createAttribute("cardType");
			cardActionHref.value = '/' + product + '/' + filtered_products[i][names[0]];
			cardTitle.value = filtered_products[i][names[1]];
			cardCover.value = filtered_products[i][names[2]];
			cardType.value = cType;
			card.setAttributeNode(cardTitle);
			card.setAttributeNode(cardCover);
			card.setAttributeNode(cardActionHref);
			card.setAttributeNode(cardType);
			container.appendChild(card);
			cardToDiv(card, filtered_products[i][names[0]]);
		}
	}
	createCards();
</script>