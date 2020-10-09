


/*
Добавление и удаление пользователя с друзей по технологии AJAX

1. Вывести вывод всех контактов в отдельный файл - готово
2. JS - добавить событие на кнопку добавить/удалить в друзья
3. JS - отправить запрос на сервер
4. Если запрос выполнен успешно, вывести контакты
*/

// функция добавления в друзья
function addFriend(element) {
	// переменная списка контактов <ul id="friends-list">
	var friendsList = document.querySelector('#friends-list');
	var link = element.dataset.link;
	// console.dir(link);
	//Создать объект для отправки http запроса
	var ajax = new XMLHttpRequest();
		// открываем ссылку,передавая  GET-запрос и саму ссылку
		ajax.open('GET', link, false);
		// отсылаем запрос
		ajax.send();
	// console.dir(ajax);
	// меняем контент в блоке friends-list
	friendsList.innerHTML = ajax.response;

}

//функция удаления из друзей
function deleteFriend(element) {
	var friendsList = document.querySelector('#friends-list');
	    link = element.dataset.link;
	    ajax = new XMLHttpRequest();
	    ajax.open('GET', link, false);
	    ajax.send();
	    friendsList.innerHTML = ajax.response;

}

// //функция отправки сообщений
// var messagesForm = document.querySelector('#messages__form');
// console.dir(messagesForm);
// messagesForm.onsubmit = function(e) {
// 	e.preventDefault();
// 	var komu = messagesForm.querySelector('input[name="user_id_2"]');
// 	var ot = messagesForm.querySelector('input[name="user_id"]');
// 	var text = messagesForm.querySelector('textarea[name="text"]');
// 	var photo = messagesForm.querySelector('input[name="photo"]');
// 	console.dir(text);
// 	console.dir(photo);

// 	var info = 'send=1' +
// 					'&user_id_2=' +  komu.value +
// 					'&user_id=' + ot.value +
// 					'&text=' + text.value +
// 					'&photo=' + photo.value;
					
// 	var ajax = new XMLHttpRequest();				
// 		ajax.open('POST', messagesForm.action, false);
// 		ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
// 		ajax.send(info);
// 		console.dir(ajax);
// 	var messageList = document.querySelector('#message-list');
// 		messageList.innerHTML = ajax.response;
		
// }




//функция поиска пользывателей на главной странице
var search = document.querySelector('#search');
// console.dir(search);
search.onclick = function(e) {
	e.preventDefault();
	var  searchText =  search.querySelector('input[name="search-text"]');
	var	 info = 'search-text=' +  searchText.value;

	var ajax = new XMLHttpRequest();
		ajax.open('POST', search.action, false );
		ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
		ajax.send(info);
		console.dir(ajax);
	var listUser = document.querySelector('#list');
		listUser.innerHTML = ajax.response;		
}


//функция поиска пользователей среди друзей в контактах
var searchFriend = document.querySelector('#search-friend');
searchFriend.onclick =function(e) {
	e.preventDefault();

	var searchTextModal = searchFriend.querySelector('input[name="search-text-modal"]');
	var	infoM = 'search-text-modal=' + searchTextModal.value;

	var ajax = new XMLHttpRequest();
	    ajax.open('POST', searchFriend.action, false);
	    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
	    ajax.send(infoM);
	    // console.dir(infoM);
	var friendsList = document.querySelector('#friends-list');
		friendsList.innerHTML = ajax.response;   
}

//замена фото у личного пользователя

// function messagePhotoLink() {
// 	console.log(this);
// 	var fullImage = document.querySelector('#full-image');
// 		overlay = document.querySelector('#overlay');
// 		messagePhotoLink = document.querySelector('#message-photo-link img');
// 	console.log(messagePhotoLink);	
// 		overlay.style.display = 'block';
// 		fullImage.style.display = 'block';
// 	var src = messagePhotoLink.getAttribute('src');	
// 		alert(src);
// 		var message = '<?php echo base64_encode($message["photo"]); ?>';
// 		fullImage.append('<img src="' +  src.message + '">');
// }		


// var changeUserNameForm = document.querySelector('#change-user-name-form');
// 	changeUserNameForm.onsubmit = function(e) {
// 		e.preventDefault();
// console.dir(changeUserNameForm);
// 		var userName = changeUserNameForm.querySelector('input[name="name"]')
// 		var	infoUs = 'send_btn=1' +
// 					'&name=' + userName.value;
// 		var ajax =  new XMLHttpRequest();
// 			ajax.open('POST', changeUserNameForm.action, false);
// 			ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
// 			ajax.send(infoUs);
// 			console.dir(ajax);
// 		var changeUserName = document.querySelector('#change-user-name');
// 			changeUserName.innerHTML = ajax.response;				
// 	}