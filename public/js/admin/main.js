
const amount = document.querySelector('.amount');
const range = document.querySelector('.range-amount');

if( amount && range){
	amount.oninput = function(){
		
		updateInput(amount.value, range);
	}
	range.oninput = function(){

		updateInput(range.value, amount);
	}


	function updateInput(val, el) {
	  el.value=val; 
	}
}

var changeDataController = document.querySelector('.change-controller');
var staticList = document.querySelector('.static-list');
var changeForm = document.querySelector('.change-form');


if( changeDataController){
	console.log(changeDataController);
	changeDataController.onclick = function(e){
		e.preventDefault();
		console.log(staticList);
		staticList.classList.toggle('d-none');
		changeForm.classList.toggle('d-none');

	}
}