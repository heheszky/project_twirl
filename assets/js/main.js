function toggleDrawer(){
	if(document.getElementById("drawer").classList.contains('is-visible'))
		document.getElementById("drawer").classList.remove('is-visible');
	else
		document.getElementById("drawer").classList.add('is-visible');
}
document.getElementsByClassName("mdl-layout__drawer-button")[0].addEventListener('click', toggleDrawer);
document.getElementsByClassName('mdl-layout__obfuscator')[0].addEventListener('click', function(){document.getElementById("drawer").classList.remove('is-visible')});

var cards = document.getElementsByTagName("card");
var cardsLen = cards.length;

//<card>
for(var x = 0; x < cardsLen; x++){
	var card = cards[0];
	var cardTitle = cards[0].attributes.getNamedItem('cardTitle').value;
	var cardCover = cards[0].attributes.getNamedItem('cardCover').value;
	var cardType = cards[0].attributes.getNamedItem('cardType').value;
	var cardActionHref = cards[0].attributes.getNamedItem('cardActionHref').value;
	
	var divBody = document.createElement("div");
	divBody.classList.add("mdl-card");
	
	var aCover = document.createElement('a');
	aCover.href = cardActionHref;
	
	var divTitleParent = document.createElement("div");
	divTitleParent.classList.add('mdl-card__title', 'mdl-card--expand');
	if(cardCover == "" || typeof(cardCover) == 'undefined'){
		switch(cardType){
			case "0":
				divTitleParent.style.background = "url(/assets/img/books.png) 50% 50% / 75% no-repeat rgb(255, 255, 255)";
				break
			case "1":
				divTitleParent.style.background = "url(/assets/img/film.png) 50% 50% / auto no-repeat rgb(255, 255, 255)";
				break;
			case "2":
				divTitleParent.style.background = "url(/assets/img/music_album.png) 50% 50% / 75% no-repeat rgb(255, 255, 255)";
				break;
		}
		
	}else{
		divTitleParent.style.background = "url('"+cardCover+"') top no-repeat #FFF";
		divTitleParent.style.backgroundSize = "100%";
	}
	aCover.appendChild(divTitleParent);
	
	var h2Title = document.createElement('h2');
	var htmlCODE = '\
	<button id="id-card-'+x+'" class="mdl-button mdl-js-button mdl-button--icon">\
	<i class="material-icons">more_vert</i></button>\
	<ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect" for="id-card-'+x+'">\
		<li class="mdl-menu__item">Dodaj do koszyka</li>\
		<li class="mdl-menu__item" onclick="window.location = \''+cardActionHref+'\'">Pokaż więcej informacji</li>\
		<li class="mdl-menu__item" onclick="window.location = \'https://www.google.pl/webhp#q='+cardTitle+'\'">Szukaj w Google</li>\
		<li class="mdl-menu__item" onclick="window.location = \'https://pl.wikipedia.org/wiki/Specjalna:Szukaj/'+cardTitle+'\'">Szukaj na Wikipedii</li>\
	</ul>';
	h2Title.innerHTML = cardTitle + htmlCODE;
	h2Title.classList.add('mdl-card__title-text');
	
	var divActions = document.createElement('div');
	divActions.classList.add('mdl-card__actions');
	
	divActions.appendChild(h2Title);
	
	divBody.appendChild(aCover);
	divBody.appendChild(divActions);
	
	card.parentNode.insertBefore(divBody, card);
	card.parentNode.removeChild(card);
}