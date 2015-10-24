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
	var card = cards[x];
	var cardTitle = cards[x].attributes.getNamedItem('cardTitle').value;
	var cardCover = cards[x].attributes.getNamedItem('cardCover').value;
	var cardAction = cards[x].attributes.getNamedItem('cardAction').value;
	var cardActionHref = cards[x].attributes.getNamedItem('cardActionHref').value;
	console.log(cardTitle, cardCover, cardAction, cardActionHref);
	
	var divBody = document.createElement("div");
	
}