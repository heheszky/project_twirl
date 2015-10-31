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
				['select', 'Autor', 'id_autora', 'autor'],
				['select', 'Epoka', 'id_epoki', 'nazwa_epoki'],
				['select', 'Okładka', 'id_okladki', 'typ_okladki']
			];
			var cType = 0;
			break;
		case 'album':
			var names = ['id_albumu', 'nazwa_albumu', 'okladka'];
			var filter_by = [
				['select', 'Autor', 'id_autora', 'autor'],
				['cb', 'Soundtrack', 'soundtrack']
			];
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
		filter[filter_by[i][2]] = [];
		
	for(i = 0 ; i < products.length ; i++)
	{
		// Add filter values
		for(j = 0 ; j < filter_by.length ; j++)
			if(filter_by[j][0] == "cb" || filter[filter_by[j][2]].containsArray([String(products[i][filter_by[j][2]]), products[i][filter_by[j][3]]]))
				continue
			else
				filter[filter_by[j][2]].push([products[i][filter_by[j][2]], products[i][filter_by[j][3]]])

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
		cardToDiv(card, products[i][names[0]]);
		
	}
	for(i = 0 ; i < filter_by.length ; i++)
	{
		div = document.createElement("div");
		div.style.width = "200px";
		div.style.display = "inline-block";
		div.innerText = filter_by[i][1];
		if(filter_by[i][0] == "cb")
		{
			
			cb = document.createElement("input");
			cb.type = "checkbox";
			cb.id = filter_by[i][2];
			cb.addEventListener("change", updateItems);
			cb.setAttribute("index", i);
			div.appendChild(cb);
			document.getElementById('sort-panel').appendChild(div);
			continue;
		}
		select = document.createElement("select");
		select.id = filter_by[i][2];
		select.classList.add("a");
		select.appendChild(document.createElement("option"));
		select.addEventListener("change", updateItems);
		select.setAttribute("index", i);
		for(e = 0 ; e < filter[filter_by[i][2]].length ; e++)
		{
			option = document.createElement("option");
			option.value = filter[filter_by[i][2]][e][0];
			option.innerText = filter[filter_by[i][2]][e][1];
			select.appendChild(option);
		}
		div.appendChild(select);
		document.getElementById('sort-panel').appendChild(div);
	}
	function updateItems()
	{
		sortPanel = document.getElementById('sort-panel');
		filtered_products = products;
		selects = sortPanel.getElementsByTagName('select');
		for(i = 0 ; i < selects.length ; i++)
		{
			if(selects[i].value!="")
			{
				index = selects[i].attributes.index.value;
				filtered_products = filtered_products.filter(function(e){
					return e[filter_by[index][2]] == selects[i].value;
				});
			}
		}
		checkboxes = sortPanel.getElementsByTagName('input');
		for(i = 0 ; i < checkboxes.length ; i++)
		{
			console.log(checkboxes[i].value)
			if(checkboxes[i].checked)
			{
				index = selects[i].attributes.index.value;
				filtered_products = filtered_products.filter(function(e){
					return e[filter_by[index][2]] == 1;
				});
			}
		}
		for(i = 0 ; i < container.childNodes.length ; i++)
		{
			console.log("---");
			display = false;
			for(j = 0 ; j < filtered_products.length ; j++)
			{
				if(container.childNodes[i].attributes['product-id'].value == filtered_products[j][names[0]])
					{display = true;break;}
			}
			if(display)container.childNodes[i].style.display = "flex";
			else container.childNodes[i].style.display = "none";
		}
		console.log(filtered_products);
	}
</script>