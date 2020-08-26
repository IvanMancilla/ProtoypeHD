function checkLetra(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-zñÑ ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function checkNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9 ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}