// autocomplet : this function will be executed every time we change the text
function autocompletadoEstudiante() {
    
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#campo').val();    
    if (keyword.length > min_length) { 
            $.ajax({
                    url: 'public/js/ajax/autocompletadoEstudiante.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data) {
                            $('#lista_dni').show();
                            $('#lista_dni').html(data);
                    }
            });
    } else {
            $('#lista_dni').hide();
    } 
}
function autocompletadoEstudianteNoEliminado() {
    
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#campo').val();    
    if (keyword.length > min_length) { 
            $.ajax({
                    url: 'public/js/ajax/autocompletadoEstudianteNoEliminado.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data) {
                            $('#lista_dni').show();
                            $('#lista_dni').html(data);
                    }
            });
    } else {
            $('#lista_dni').hide();
    } 
}
function autocompletadoEstudianteEliminado() {
    
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#campo').val();    
    if (keyword.length > min_length) { 
            $.ajax({
                    url: 'public/js/ajax/autocompletadoEstudianteEliminado.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data) {
                            $('#lista_dni').show();
                            $('#lista_dni').html(data);
                    }
            });
    } else {
            $('#lista_dni').hide();
    } 
}
function autocompletadoDocente() {
    
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#campo').val();

    if (keyword.length > min_length) {
            $.ajax({
                    url: 'public/js/ajax/autocompletadoDocente.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data) {
                            $('#lista_dni').show();
                            $('#lista_dni').html(data);
                    }
            });
    } else {
            $('#lista_dni').hide();
    }
}
function autocompletadoUsuario() {
    
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#campo').val();

    if (keyword.length > min_length) {
            $.ajax({
                    url: 'public/js/ajax/autocompletadoUsuario.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data) {
                            $('#lista_dni').show();
                            $('#lista_dni').html(data);
                    }
            });
    } else {
            $('#lista_dni').hide();
    }
}
// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#campo').val(item);
	// hide proposition list
	$('#lista_dni').hide();
}