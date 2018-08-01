setInterval(
  function () {
    $('#ajax').load('store.php');
  }
  , 2000); // refresh every 2000 milliseconds

function envoiMessage(event,form) {
  // N'envoie pas le formulaire
  // Préviens le comportement normal du formulaire
  event.preventDefault();

  console.log($(form).serialize());
  $(form).find('#btnEnvoyerChat').text('En cours..');

  $.post({
    url: $(form).attr('action'),
    data: $(form).serialize(),
    success: function(error){
      if (error) {
        alert(error);
      }
    
    }
  })
}

  
