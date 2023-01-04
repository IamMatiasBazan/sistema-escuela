function mostrarPassword() { 
    let eye = document.getElementById('eye')

    if(eye.type == 'password') {
      eye.type = 'text'
    } else {
      eye.type = 'password'
    }
}