//модальное окно контактов

var btnOpenContact = document.querySelector('#open-contact');
	btnOpenContact.onclick = function() {
		var contactsModal = document.querySelector('#contacts-modal');
			overlay = document.querySelector('#overlay');
			contactsModal.style.display = 'block';
			overlay.style.display = 'block';
			contactsModal.style.transition = 'all 2s';
			contactsModal.style.top = contactsModal.offsetTop + 460 + 'px';
	}

var btnContactsModalClose =document.querySelector('#contacts-modal .close');
	btnContactsModalClose.onclick = function() {
	var contactsModal = document.querySelector('#contacts-modal');
		overlay = document.querySelector('#overlay');
		contactsModal.style.transition = 'all 2s';
		contactsModal.style.top = contactsModal.offsetTop - 460 + 'px';
	setTimeout(function() {
		contactsModal.style.display = 'none';
		overlay.style.display = 'none';
	}, 1200);	
			
	}


var myUserContactBtn = document.querySelector('#my-user-contact');
	myUserContactBtn.onclick = function() {
		var contactsModal = document.querySelector('#contacts-modal');
			modalMyUser = document.querySelector('#modal-my-user');
			overlay = document.querySelector('#overlay');
			contactsModal.style.display = 'block';
			overlay.style.display = 'block';
			modalMyUser.style.transition = 'all 1s';
			modalMyUser.style.left = modalMyUser.offsetLeft - 340 + 'px';
			contactsModal.style.transition = 'all 2s';
			contactsModal.style.top = contactsModal.offsetTop + 460 + 'px';
		setTimeout(function() {
			modalMyUser.style.display = 'none';
		}, 900);			
	}

var backBtn = document.querySelector('#back-btn');
	backBtn.onclick = function() {
		var contactsModal = document.querySelector('#contacts-modal');
			modalMyUser = document.querySelector('#modal-my-user');
			contactsModal.style.transition = 'all 2s';
			contactsModal.style.top = contactsModal.offsetTop - 460 + 'px';
		setTimeout(function() {
			contactsModal.style.display = 'none';
		}, 1200);
			modalMyUser.style.display = 'block';
			modalMyUser.style.transition = 'all 1s';
			modalMyUser.style.left = modalMyUser.offsetLeft + 340 + 'px';		
	}


//модальное окно удалить и переслать сообщение
function messagesModal(element) {
 	console.dir(element);
 	var messageId = element.dataset.id;
 	var modalMessage = document.querySelector('#modal-message');
 	var messageIdInput = document.querySelector('#messageId');
 		messageIdInput.value = messageId;
		overlay = document.querySelector('#overlay');
		modalMessage.style.transition = 'all 2s';
		modalMessage.style.display = 'block';
		overlay.style.display = 'block';

}
	
var messageCloseBtn	= document.querySelector('#modal-message .message-close-btn');
	messageCloseBtn.onclick = function() {
		var modalMessage = document.querySelector('#modal-message');
			overlay = document.querySelector('#overlay');
			modalMessage.style.transition = 'all 2s';
			modalMessage.style.display = 'none';
			overlay.style.display = 'none';
			
	}


//модальное окно контактов modal-user

var userContactBtn = document.querySelector('#user-contact');
	userContactBtn.onclick = function () {
		var modalUser = document.querySelector('#modal-user');
			messagesList = document.querySelector('.messages-list');
			// modalUser.style.transition = 'all 0.5s';
			modalUser.style.display = 'block';
			// modalUser.style.left = modalUser.offsetLeft - 58 + 'px';
			// messagesList.style.transition = 'all 0.6s';
			messagesList.style.width = '536px';		
			
	}


var modalUserCloseBtn	= document.querySelector('#modal-user .close');
	modalUserCloseBtn.onclick = function() {
		var modalUser = document.querySelector('#modal-user');
			messagesList = document.querySelector('.messages-list');
			// messagesList.style.transition = 'all 0.3s';
			messagesList.style.width = '100%';
			// modalUser.style.transition = 'all 0.5s';
			// modalUser.style.left = modalUser.offsetLeft + 58 + 'px';
		
			modalUser.style.display = 'none';
						
	}

//модальное окно данных зарегистрированного пользователя

var myUserBtn = document.querySelector('#my-user-btn');
	myUserBtn.onclick = function() {
		var modalMyUser = document.querySelector('#modal-my-user');
			overlay = document.querySelector('#overlay');
			modalMyUser.style.display = 'block';
			overlay.style.display ='block';
			modalMyUser.style.transition = 'all 1s';
			modalMyUser.style.left = modalMyUser.offsetLeft + 340 + 'px';
	}

var modalMyUserClose = document.querySelector('#modal-my-user .close');
	modalMyUserClose.onclick = function() {
		var modalMyUser = document.querySelector('#modal-my-user');
			overlay = document.querySelector('#overlay');
			modalMyUser.style.transition = 'all 1s';
			modalMyUser.style.left = modalMyUser.offsetLeft - 340 + 'px';
		setTimeout(function() {
			modalMyUser.style.display = 'none';
			overlay.style.display ='none';
		}, 900);		
	}


//модальное окно изменить профиль

var modalMyUserChangeBtn = document.querySelector('#modal-my-user-change');
	modalMyUserChangeBtn.onclick = function() {
		var modalMyProfile = document.querySelector('#modal-my-profile');
		var modalMyUser = document.querySelector('#modal-my-user');
			modalMyUser.style.transition = 'all 1s';
			modalMyUser.style.left = modalMyUser.offsetLeft - 340 + 'px';
		    modalMyUser.style.display = 'none';
		    modalMyProfile.style.display = 'block';
		    modalMyProfile.style.transition = 'all 1s';
		    modalMyProfile.style.left = modalMyProfile.offsetLeft + 340 + 'px';

	}

var modalMyProfileClose = document.querySelector('#modal-my-profile .close');
	modalMyProfileClose.onclick = function() {
		var modalMyProfile = document.querySelector('#modal-my-profile');
		    overlay = document.querySelector('#overlay');
		    modalMyProfile.style.transition = 'all 1s';
		    modalMyProfile.style.left = modalMyProfile.offsetLeft - 340 + 'px';
		setTimeout(function() {
			modalMyProfile.style.display = 'none';
			overlay.style.display ='none';
		}, 900);		    

	}	

var modalMyProfileCloseBack = document.querySelector('#modal-my-profile .close-back');
	modalMyProfileCloseBack.onclick = function() {
		var modalMyProfile = document.querySelector('#modal-my-profile');
			modalMyUser = document.querySelector('#modal-my-user');
		    modalMyProfile.style.transition = 'all 1s';
		    modalMyProfile.style.left = modalMyProfile.offsetLeft - 340 + 'px';
		setTimeout(function() {
			modalMyProfile.style.display = 'none';
		}, 400);
		setTimeout(function() {
			modalMyUser.style.transition = 'all 1s';
			modalMyUser.style.display = 'block';
			modalMyUser.style.left = modalMyUser.offsetLeft + 340 + 'px';
			
		}, 300);
			

	}	

//модальное окно изменнения имени в профиле

var modalMyProfileNameBtn = document.querySelector('#modal-my-profile-name');
	
	modalMyProfileNameBtn.onclick = function() {
		var changeMyName = document.querySelector('#change-my-name');
			changeMyName.style.display = 'block';		
	}

var myProfileNameExit = document.querySelector('#my-profile-name-exit');
	 myProfileNameExit.onclick = function() {
	 	var changeMyName = document.querySelector('#change-my-name');
			changeMyName.style.display = 'none';	
	 }	


//модальное окно изменнения email в профиле

var modalMyProfileEmailBtn = document.querySelector('#modal-my-profile-email');
	modalMyProfileEmailBtn.onclick = function() {
		var changeMyEmail = document.querySelector('#change-my-email');
			changeMyEmail.style.display = 'block';	
			
	}

var myProfileEmailExit = document.querySelector('#my-profile-email-exit');
	 myProfileEmailExit.onclick = function() {
	 	var changeMyEmail = document.querySelector('#change-my-email');
			changeMyEmail.style.display = 'none';	
	 }	


//модальное окно изменнения email в профиле

var modalMyProfilePhoneBtn = document.querySelector('#modal-my-profile-phone');
	modalMyProfilePhoneBtn.onclick = function() {
		var changeMyPhone = document.querySelector('#change-my-phone');
			changeMyPhone.style.display = 'block';		
	}

var myProfilePhoneExit = document.querySelector('#my-profile-phone-exit');
	 myProfilePhoneExit.onclick = function() {
	 	var changeMyPhone = document.querySelector('#change-my-phone');
			changeMyPhone.style.display = 'none';	
	 }

//модальное окно изменнения пароля в профиле 

var modalMyProfilePasswordBtn = document.querySelector('#modal-my-profile-password');
	modalMyProfilePasswordBtn.onclick = function() {
		var changeMyPassword = document.querySelector('#change-my-password');
			changeMyPassword.style.display = 'block';		
	}

var myProfilePasswordExit = document.querySelector('#my-profile-password-exit');
	 myProfilePasswordExit.onclick = function() {
	 	var changeMyPassword = document.querySelector('#change-my-password');
			changeMyPassword.style.display = 'none';	
	 }	


//модальное окно замены фото в профиле

var fileInputBtn = document.querySelector('#input-btn');
	fileInputBtn.onclick = function() {
		var changeMyPhoto = document.querySelector('#change-my-photo');
			changeMyPhoto.style.display = 'block';		
	}

var myProfilePhotoExit = document.querySelector('#my-profile-photo-exit');
	 myProfilePhotoExit.onclick = function() {
	 	var changeMyPhoto = document.querySelector('#change-my-photo');
			changeMyPhoto.style.display = 'none';	
	 }

//модальное окно замены контакта пользователя

var modalUserChangeBtn = document.querySelector('#modal-user-change');
	modalUserChangeBtn.onclick = function() {
		var changeUserName = document.querySelector('#change-user-name');
			overlay = document.querySelector('#overlay');
			changeUserName.style.display = 'block';	
			overlay.style.display = 'block';	
	}

var usProfileNameExit = document.querySelector('#us-profile-name-exit');
// console.dir(usProfileNameExit );
	usProfileNameExit.onclick = function() {
	 	var changeUserName = document.querySelector('#change-user-name');
	 		overlay = document.querySelector('#overlay');
			changeUserName.style.display = 'none';
			overlay.style.display = 'none';	
	 }

//модальное окно удаления контакта пользователя

var modalUserDeleteBtn = document.querySelector('#modal-user-delete-btn');
	modalUserDeleteBtn.onclick = function() {
		var deleteUserName = document.querySelector('#delete-user-name');
			overlay = document.querySelector('#overlay');
			deleteUserName.style.display = 'block';	
			overlay.style.display = 'block';	
	}

var userDeleteBtn = document.querySelector('#user-delete-btn');
		userDeleteBtn.onclick = function() {	
		var deleteUserName = document.querySelector('#delete-user-name');
			overlay = document.querySelector('#overlay');
			deleteUserName.style.display = 'block';	
			overlay.style.display = 'block';	
	}

var deleteProfileNameExit = document.querySelector('#delete-profile-name-exit');
// console.dir(deleteProfileNameExit );
	deleteProfileNameExit.onclick = function() {
	 	var deleteUserName = document.querySelector('#delete-user-name');
	 		overlay = document.querySelector('#overlay');
			deleteUserName.style.display = 'none';
			overlay.style.display = 'none';	
	 }



   
function messagesOverlay(element) {
	alert("hi");

}    