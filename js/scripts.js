//выбираем в переменую ссылку в шапке "Контакты"
var btnOpenContacts = document.querySelector("#open-contacts");
//выбираем в переменую форму с контактами
var contactsModal = document.querySelector("#contacts-modal");
//выбираем в переменую кнопку закрыть форму Контакты
var btnCloseContact = document.querySelector(".close_contacts");

// Событие окрыть окно  контактов
btnOpenContacts.onclick = function () {
    contactsModal.style.display = "block";
};
btnCloseContact.onclick = function closeModalContacts() {
    contactsModal.style.display = "none";
};

//Функция добавление ссылки добавления и удаления друзей с помощью AJAX запроса

function addAjaxResponse (element) {
    var viewLink = element.dataset.link;
    var friendList = document.querySelector("#friend-list");
    var ajax = new XMLHttpRequest();
    ajax.open("GET", viewLink, false);
    ajax.send();
    friendList.innerHTML = ajax.response;
  
}
// Функция добавления сообщений с помощью AJAX

var form = document.querySelector('#form');
console.dir(form);
form.onsubmit = function(e) {
    e.preventDefault();
var komu = form.querySelector("input[name='user_id_komu']");
var otKogo = form.querySelector("input[name='user_id_ot_kogo']");
var text = form.querySelector( "textarea");

 var data = "&send_sms=1" + "&user_id_komu=" + komu.value + "&user_id_ot_kogo=" +  otKogo.value + "&text=" + text.value;

 var ajax = new XMLHttpRequest();
 ajax.open("POST", form.action , false);
 ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    
 ajax.send(data);
var listMessages = document.querySelector("#list-message");
listMessages.innerHTML = ajax.response;
console.dir(ajax);
form.text.value = "";
};

