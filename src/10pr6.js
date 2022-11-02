const form = document.querySelector("form");
eField = form.querySelector(".email"),
eInput = eField.querySelector("input"),
pField = form.querySelector(".password"),
pInput = pField.querySelector("input");
form.onsubmit = (e)=>{ //событие при отправки формы
  e.preventDefault(); //предотвращение отправки формы
  //если адрес электронной почты и пароль пустые, добавьте в него класс встряхивания, иначе вызовите указанную функцию
  (eInput.value == "") ? eField.classList.add("shake", "error") : checkEmail();
  (pInput.value == "") ? pField.classList.add("shake", "error") : checkPass();
  setTimeout(()=>{ //удаляем класс встряхивания через 500 мсек
    eField.classList.remove("shake");
    pField.classList.remove("shake");
  }, 500);
  /*eInput.onkeyup = ()=>{checkEmail();*/} //вызов функции checkEmail при вводе электронной почты
  pInput.onkeyup = ()=>{checkPass();} //вызов функции checkPassword при вводе пароля
  /*function checkEmail(){ //функция checkEmail 
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; //шаблон для проверки электронной почты, регулярка
    if(!eInput.value.match(pattern)){ //если шаблон не совпадает, добавьте ошибку и удалите допустимый класс
      eField.classList.add( "error");
      eField.classList.remove("valid");
      let errorTxt = eField.querySelector(".error-txt");
      //если значение адреса электронной почты не пустое, то 
      //введите действительный адрес электронной почты, иначе "Электронный адрес не может быть пустым"
      (eInput.value != "") ? errorTxt.innerText = "Enter email" : errorTxt.innerText = "Email cannot be empty";
    }else{ //если образец совпадает, то удаляем ошибку и добавляем допустимый класс
      eField.classList.remove("error");
      eField.classList.add("valid");
    }
  }*/
  function checkPass(){ 
    if(pInput.value == ""){ //если проход пуст, добавить ошибку и удаляем действительный класс
      pField.classList.add("error");
      pField.classList.remove("valid");
    }else{ //если проход не пуст, то удаляем ошибку и добавляем допустимый класс
      pField.classList.remove("error");
      pField.classList.add("valid");
    }
  }
  //если eField и pField не содержат класс ошибки, это означает, что пользователь правильно заполнил данные
  if(!eField.classList.contains("error") && !pField.classList.contains("error")){
    window.location.href = form.getAttribute("action"); //перенаправляем пользователя на указанный URL, 
    //который находится внутри атрибута действия тега формы
}
}