function senddata() {
	var formData = new FormData(document.forms.lkform)
	console.dir(formData) // что там отправляем то?
	var xhr = new XMLHttpRequest() //создаем объект
	xhr.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			//проверяем ответ на ошибки
			// если норм то выводим
			document.getElementById('result_output').innerHTML = this.responseText
		} else {
			// если нет сообщаем об ошибке
			document.getElementById('result_output').innerHTML = 'Error'
		}
	}
	xhr.open('POST', '/') // post запрос на конкретный контроллер
	xhr.send(formData) //отпраляем данные
}
