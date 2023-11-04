  
  document.getElementById("btn__inisiar__secion").addEventListener("click",iniciarSecion)
  document.getElementById("btn__registrarse").addEventListener("click",register)
  

  var  contenedor__login__register = document.querySelector(".contenedor__login__register");
  var  formulario_login = document.querySelector(".formulario__login");
  var  formulario_register = document.querySelector(".formulario__register");

  var  caja__trasera_login = document.querySelector(".caja__trasera-login");
  var  caja__trasera_register = document.querySelector(".caja__trasera__register");
  
  function iniciarSecion () {
    formulario_register.style.display = "none"
    contenedor__login__register.style.left = "10px"
    formulario_login.style.display = "block"
    caja__trasera_register.style.opacity = "1"
    caja__trasera_login.style.opacity = "0" 
  }

  function register () {
    formulario_register.style.display = "block"
    contenedor__login__register.style.left = "418px"
    formulario_login.style.display = "none"
    caja__trasera_register.style.opacity = "0"
    caja__trasera_login.style.opacity = "1" 
  }
  