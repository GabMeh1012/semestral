<?php
// Devuelve el dibujo (imagen) que corresponde a un producto según su descripción.
// Usa stripos(), que busca un texto dentro de otro sin importar mayúsculas.
function icono($descripcion) {
    if (stripos($descripcion, 'refri') !== false)  return 'img/refrigeradora.svg';
    if (stripos($descripcion, 'lavad') !== false)  return 'img/lavadora.svg';
    if (stripos($descripcion, 'micro') !== false)  return 'img/microondas.svg';
    if (stripos($descripcion, 'tele') !== false
        || stripos($descripcion, 'tv') !== false)  return 'img/televisor.svg';
    if (stripos($descripcion, 'aire') !== false)   return 'img/aire.svg';
    return 'img/generico.svg';
}
?>
