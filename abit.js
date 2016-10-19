document.ready;
//получаем id
$('.remove').on('click', function(){
    $('#removeModal').attr('rel', $(this).closest('tr').attr('rel'));
});
    //реализуем механизм удаления
    $('.delete').on('click', function(){
       var id = $('#removeModal').attr('rel');
        var handler = function(Request){
            $('#removeModal').modal('hide');
        var data = JSON.parse(Request.responseText);
        if (data['error']){
            alert(data['text']);
        }
        else{
            $('tr[rel = "' + id + '"]').remove();
              showNotify('SoGood!', 'success');
        }
    }
        SendRequest('post', 'ajax.php', 'type=remove&id=' + id, handler)
    });
		/**
			Функция посылки запроса к файлу на сервере
			method  - тип запроса: GET или POST
			path    - путь к файлу
			args    - аргументы вида a=1&b=2&c=3...
			handler - функция-обработчик ответа от сервера
		*/
		function SendRequest(method, path, args, handler) {
			//Создаём запрос
			var Request = CreateRequest();
			//Проверяем существование запроса на текущем уровне
			if (!Request) {
				return false;
			}
            //Назначаем пользовательский обработчик
			Request.onreadystatechange = function() {
				//Если обмен данными завершен
				if (Request.readyState == 4) {
					if (Request.status == 200) {
						//Передаем управление обработчику пользователя
						handler(Request);
					}
					else {
						//Оповещаем пользователя о произошедшей ошибке
					}
				}
				else {
					console.warn(Request.readyState);
				}
			
			}
			//Проверяем, если требуется сделать GET-запрос
			if (method.toLowerCase() == "get" && args.length > 0) {
				path += "?" + args;
			}
			//Инициализируем соединение
			Request.open(method, path, true);
			if (method.toLowerCase() == "post") {
				//Если это POST-запрос, то устанавливаем заголовок
				Request.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=utf-8");
				//Посылаем запрос
				Request.send(args);
			}
			else {
				//Если это GET-запрос, то посылаем нул-запрос
				Request.send(null);
			}
		}

/**
			Функция создает новый объект типа XMLHttpRequest
		*/
		function CreateRequest() {
			var Request = false;
			if (window.XMLHttpRequest) {
				//Gecko-совместимые браузеры, Safari, Konqueror
				Request = new XMLHttpRequest();
			}
			else if (window.ActiveXObject) {
				//Internet explorer
				try {
					Request = new ActiveXObject("Microsoft.XMLHTTP");
				}    
				catch (CatchException) {
					Request = new ActiveXObject("Msxml2.XMLHTTP");
				}
			}
			if (!Request) {
				alert("Невозможно создать XMLHttpRequest");
			}
			return Request;
		}

function showNotify(text, type){
    $.notify({
        message: text
    },{
        type: type,
        placement: {
            from: "top",
            align: "center",   
        },
    });
}