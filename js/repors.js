$( document ).ready(function() {

    let ctx = document.getElementById('myChart').getContext('2d');
    let complete = parseInt( $('.completed').attr("completed"));
    let todo = parseInt($('.todo').attr("todo"));
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['to do', 'done'],
            datasets: [{
                label: '# of Votes',
                data: [todo , complete],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
         
        }
    });
      

   
    


});


function deleteItem(e){
    var target = e.target;
    var item =  target.parentElement.parentElement;
    var iditem = item.getAttribute("iditem");
    var itemToDelete;
  
   console.log(target.parentElement.parentElement);
    $.ajax({
        data: { "iditem" : iditem},
        type: "POST",
        dataType: "html",
        url: "../todo/reportes.php",
    })
    .done(function( data, textStatus, jqXHR ) {
        console.log(data);
       $(".todo-list").each( function(element) {
           var a  = $(this).attr('iditem');
           var b = iditem;
            console.log(  a, b );
           if(  a == b ) {
               itemToDelete =  $(this);
               
        // itemToDelete.remove();
           }
       })

        itemToDelete.animate({ width: "0px" } , "slow", "linear", function() {
                itemToDelete.remove();
         } );
     
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    }); 

  
}