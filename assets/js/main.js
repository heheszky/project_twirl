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
	<button id="id-card-'+x+'" class="mdl-button mdl-js-button mdl-button--icon moreBtn">\
	<i class="material-icons">more_vert</i></button>\
	<ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect" for="id-card-'+x+'">\
		<li class="mdl-menu__item">Dodaj do koszyka</li>\
		<li class="mdl-menu__item" onclick="window.location = \''+cardActionHref+'\'">Pokaż więcej informacji</li>\
		<li class="mdl-menu__item" onclick="window.location = \'https://www.google.pl/webhp#q='+cardTitle+'\'">Szukaj w Google</li>\
		<li class="mdl-menu__item" onclick="window.location = \'https://pl.wikipedia.org/wiki/Specjalna:Szukaj/'+cardTitle+'\'">Szukaj na Wikipedii</li>\
	</ul>';
	h2Title.innerHTML = cardTitle;
	h2Title.classList.add('mdl-card__title-text');
	
	var divActions = document.createElement('div');
	divActions.classList.add('mdl-card__actions');
	
	divActions.appendChild(h2Title);
	divActions.innerHTML += htmlCODE;
	
	divBody.appendChild(aCover);
	divBody.appendChild(divActions);
	
	card.parentNode.insertBefore(divBody, card);
	card.parentNode.removeChild(card);
}


function scrollTableToLeft(){
	var e = document.getElementsByClassName('tableScrollButtonLeft')[0].previousElementSibling;
	scrollTable(e.scrollLeft, e.scrollLeft-200, 500,-1);
}
function scrollTableToRight(){
	var e = document.getElementsByClassName('tableScrollButtonLeft')[0].previousElementSibling;
	scrollTable(e.scrollLeft, e.scrollLeft+200, 500,1);
}
function scrollTable(posFrom, posTo, duration, dir){
	if (duration <= 0) return;
	var difference = posTo - posFrom;
	var perTick = dir*easeIn(difference / duration * 10);
	setTimeout(function() {
		var e = document.getElementsByClassName('tableScrollButtonLeft')[0].previousElementSibling;
        e.scrollLeft = e.scrollLeft + perTick;
        if (e.scrollLeft === posTo) return;
        scrollTable(e.scrollLeft, posTo, duration - 10, dir);
    }, 10);
}
if(document.getElementsByClassName('tableScrollButtonLeft')[0] != null){
	document.getElementsByClassName('tableScrollButtonLeft')[0].addEventListener('click', scrollTableToLeft)
	document.getElementsByClassName('tableScrollButtonRight')[0].addEventListener('click', scrollTableToRight)
}

function easeIn(t) { return t*t; }


if(document.getElementsByClassName('obfuscator')[0] != null){
	document.getElementsByClassName('obfuscator')[0].addEventListener('click',function(){
		var popups = document.getElementsByClassName('popupAlert');
		for(var x = 0; x < popups.length; x++){
			popups[x].classList.remove('show');
		}
		this.classList.remove('show');
	})
}
function showPopupAdd(popType){
	var pop;
	switch(popType){
		case 0:
			pop = document.getElementById('popupWydawnictwo');
			break;
		case 1:
			pop = document.getElementById('popupAutorKsiazki');
			break;
	}
	var obf = document.getElementsByClassName('obfuscator')[0]
	obf.classList.add('show');
	pop.classList.add('show');
	
	var main = document.getElementsByTagName('main')[0];
	pop.style.top = main.scrollTop + 10 + "px";
}

//zamiana <select> na ładny div z animacjami
var selects = document.getElementsByTagName('select');
			
for(var y = 0; y < selects.length; y++){
	var item = selects[y];
	var options = item.children;
	var divSelect = document.createElement('div');
	var divSelectBody = document.createElement('div');
	divSelectBody.style.top = '0px';
	divSelect.classList.add('materialDropdown');
	for(var x = 0; x < options.length; x++){
		if(x == 0) item.value = options[0].value;
		var divOption = document.createElement('div');
		divOption.innerText = options[x].innerText;
		divOption.setAttribute("value", options[x].value);
		divOption.setAttribute("data-index", x);
		divOption.addEventListener('click', optionClick);
		divSelectBody.appendChild(divOption);
	}
	divSelect.setAttribute("data-id", item.getAttribute('id'));
	divSelect.appendChild(divSelectBody);
	item.parentNode.insertBefore(divSelect, item);
}

function optionClick(){
	var parent = this.parentNode;
	var root = parent.parentNode;
	var height = parent.offsetHeight;
	var width = parent.offsetWidth;
	if(root.classList.contains('expanded')){
		root.classList.remove('expanded');
		root.nextElementSibling.value = this.getAttribute('value');
		var pos = this.getAttribute('data-index') * 28;
		parent.style.top = -pos + "px";
		parent.style.clip = 'rect('+pos+'px, '+(width+10)+'px, '+(pos+28)+'px, 0px)';
	}else{
		root.classList.add('expanded');
		parent.style.clip = 'rect(-10px, '+(width+10)+'px, '+(height+10)+'px, -10px)';
	}
}