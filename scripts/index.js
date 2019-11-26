
function addItem() {
    var txt_item = document.getElementById('txt_item').value;  
    console.log(txt_item);
    $.ajax({
        data: { "txt_item" : txt_item},
        type: "POST",
        dataType: "html",
        url: "../todo/addItem.php",
    })
    .done(function( data, textStatus, jqXHR ) {
       console.log(data);
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    }); 
}
