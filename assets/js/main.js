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

for(var x = 0; x < cardsLen; x++){
	var card = cards[0];
	var cardTitle = cards[0].attributes.getNamedItem('cardTitle').value;
	var cardCover = cards[0].attributes.getNamedItem('cardCover').value;
	var cardAction = cards[0].attributes.getNamedItem('cardAction').value;
	var cardActionHref = cards[0].attributes.getNamedItem('cardActionHref').value;
	console.log(cardTitle, cardCover, cardAction, cardActionHref);
	
	var divBody = document.createElement("div");
	divBody.classList.add("mdl-card", "mdl-shadow--2dp");
	
	var divTitleParent = document.createElement("div");
	divTitleParent.classList.add('mdl-card__title', 'mdl-card--expand');
	if(cardCover == "" || typeof(cardCover) == 'undefined')
		divTitleParent.style.background = "url('https://fanart.tv/fanart/music/c7423e0c-ab3e-4ab4-be10-cdff5a9d3062/cdart/fire-of-unknown-origin-52dc4a58c114f.png') top no-repeat #FFF";
	else
		divTitleParent.style.background = "url('"+cardCover+"') top no-repeat #FFF";
	divTitleParent.style.backgroundSize = "100%";
	
	var h2Title = document.createElement('h2');
	h2Title.innerHTML = cardTitle;
	h2Title.classList.add('mdl-card__title-text');
	//divTitleParent.appendChild(h2Title);
	
	var divActions = document.createElement('div');
	divActions.classList.add('mdl-card__actions');
	
	var aLink = document.createElement("a");
	aLink.classList.add('mdl-button', 'mdl-button--colored', 'mdl-js-button', 'mdl-js-ripple-effect');
	aLink.innerText = cardAction;
	aLink.href = cardActionHref;
	divActions.appendChild(h2Title);
	divActions.appendChild(aLink);
	
	var divCardMenu = document.createElement("div");
	divCardMenu.classList.add('mdl-card__menu');
	
	var buttonMenu = document.createElement('button');
	buttonMenu.classList.add('mdl-button', 'mdl-button--icon', 'mdl-js-button', 'mdl-js-ripple-effect');
	
	var iIcon = document.createElement("i");
	iIcon.classList.add("material-icons");
	iIcon.innerText = "share";
	buttonMenu.appendChild(iIcon);
	divCardMenu.appendChild(buttonMenu);
	
	divBody.appendChild(divTitleParent);
	divBody.appendChild(divActions);
	divBody.appendChild(divCardMenu);
	
	card.parentNode.insertBefore(divBody, card);
	card.parentNode.removeChild(card);
}