
function addItem() {
    var txt_item = document.getElementById('txt_item').value;
    var num = parseInt( $(".js-items").children().last().attr("iditem") );  
    num++;
    $.ajax({
        data: { "txt_item" : txt_item},
        type: "POST",
        dataType: "html",
        url: "../todo/addItem.php",
    })
    .done(function( data, textStatus, jqXHR ) {
    
      $('.js-items').append("<input type='checkbox'  iditem=" + num + " >" +  txt_item);
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    }); 
}
