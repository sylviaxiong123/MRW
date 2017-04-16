(function(){
	
"use strict";
console.log("footer js here");

	var form = document.querySelector('#form'),
	post = document.querySelector('#post'),
	clear = document.querySelector('#clear');

	function emptyStorage(e)
	{
		localStorage.clear();
	}

	function fillStorage()
	{
		localStorage.setItem('todoList', form.innerHTML);
	}

	function loadToDo()
	{
		if(window.localStorage)
		{
			if(localStorage.getItem('todoList'))
			{
				form.innerHTML = localStorage.getItem('todoList');
			}
		}
		else
		{
			console.log('Please update you\'re browser');
		}
	}

	clear.addEventListener('click', emptyStorage, false);
	post.addEventListener('click', fillStorage, false);

	loadToDo();

})();