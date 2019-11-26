
function addItem() {
    var txt_item = document.getElementById('txt_item').value;  

    $.ajax({
        data: { "txt_item" : txt_item},
        type: "POST",
        dataType: "html",
        url: "../todo/addItem.php",
    })
    .done(function( data, textStatus, jqXHR ) {
    
      $('.js-items').append("<input type='checkbox' >" +  txt_item);
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    }); 
}
