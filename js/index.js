
function addItem() {
    var txt_item = document.getElementById('txt_item').value;
    var num;
    num++;
    $.ajax({
        data: { "txt_item" : txt_item},
        type: "POST",
        dataType: "html",
        url: "../todo/addItem.php",
    })
    .done(function( data, textStatus, jqXHR ) {

      $('.list-items').append(data);
    //   $(".todo-list").show('slow', "linear");
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    }); 
}


function deleteItem(e){
    var target = e.target || e.srcElement;
    var item =  target.parentElement.parentElement;
    var userId = item.getAttribute("userid");
    var iditem = item.getAttribute("iditem");
    var itemToDelete;
  

    $.ajax({
        data: { "iditem" : iditem},
        type: "POST",
        dataType: "html",
        url: "../todo/deleteItem.php",
    })
    .done(function( data, textStatus, jqXHR ) {
       $(".todo-list").each( function(element) {
           var a  = $(this).attr('iditem');
           var b = iditem;
            console.log(  a, b );
           if(  a == b ) {
               itemToDelete =  $(this);
           }
       } )
    //    itemToDelete.animate({ width: "0px" } , "slow", "linear", function() {
    //             itemToDelete.remove();
    //     } );

        itemToDelete.remove();
       


     
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    }); 

  
}