$('#btn-modal').on('click', function(){
    $('#overlay').fadeIn();
    $('#modal').fadeIn();
  });

  $('#overlay').on('click', function(){
    $('#overlay').fadeOut();
    $('#modal').fadeOut();
  });