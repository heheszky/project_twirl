function toggleDrawer(){
	if(document.getElementById("drawer").classList.contains('is-visible'))
		document.getElementById("drawer").classList.remove('is-visible');
	else
		document.getElementById("drawer").classList.add('is-visible');
}
document.getElementsByClassName("mdl-layout__drawer-button")[0].addEventListener('click', toggleDrawer);
document.getElementsByClassName('mdl-layout__obfuscator')[0].addEventListener('click', function(){document.getElementById("drawer").classList.remove('is-visible')});

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
		case 2:
			pop = document.getElementById('popupStudioFilmowe');
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
		if(root.nextElementSibling.onchange)
			root.nextElementSibling.onchange();
		parent.style.top = -pos + "px";
		parent.style.clip = 'rect('+pos+'px, '+(width+10)+'px, '+(pos+28)+'px, 0px)';
	}else{
		root.classList.add('expanded');
		parent.style.clip = 'rect(-10px, '+(width+10)+'px, '+(height+10)+'px, -10px)';
	}
}
function closeOption(e){
	e.classList.remove('expanded');
}
function clickInsideElement( e, className ) {
	var el = e.srcElement || e.target;
	if ( el.classList.contains(className) ) {
		return el;
	}else{
		while ( el = el.parentNode ) {
			if ( el.classList && el.classList.contains(className) ) {
				return el;
			}
		}
	}
	return false;
}
document.addEventListener('click', function(e){
	if(!clickInsideElement(e, 'materialDropdown')){
		var elements = document.getElementsByClassName('materialDropdown')
		for(var x = 0; x < elements.length; x++){
			if(elements[x].classList.contains('expanded'))
				closeOption(elements[x]);
		}
	}
});

// Dodawanie do koszyka
function addToCart(e)
{
	var productType = e.attributes.producttype.value;
	var itemID = e.attributes.itemid.value;
	console.log(productType);
	console.log(itemID);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
			response = xhttp.responseText;
			res = JSON.parse(response)
			var koszyk = document.getElementById('navKoszyk');
			koszyk.innerText = "Koszyk (" + res.length + ")";
		}
	}
	xhttp.open("GET", "/dodaj_do_koszyka/"+productType+"/"+itemID, true);
	xhttp.send();
}
function removeFromCart(e)
{
	var productType = e.attributes.producttype.value;
	var itemID = e.attributes.itemid.value;
	console.log(productType);
	console.log(itemID);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
			response = xhttp.responseText;
			res = JSON.parse(response)
			var koszyk = document.getElementById('navKoszyk');
			koszyk.innerText = "Koszyk (" + res.length + ")";
			window.location.reload();
		}
	}
	xhttp.open("GET", "/usun_z_koszyka/"+productType+"/"+itemID, true);
	xhttp.send();
}