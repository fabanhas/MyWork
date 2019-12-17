$(document).ready(function() {
    $('.hamb-icon').on('click', function() {
      $(this).toggleClass('open')
    })
  });
  
  // ---------- BETALABS
  // Login
  CanopusEventCenter.addListener('ServerDataLoader.Loaded', function (data) {
      if (typeof data.client !== undefined) {
          var estaLogado = data.client !== null;
          estaLogado ? $('.logado').show() : $('.logado').hide();
      !estaLogado ? $('.nao-logado').show() : $('.nao-logado').hide();
      
      $('.login').text(data.client.name1)
      $('.checkout .badge').text(data.cart.quantity);
      $('.checkout strong').text('R$ ' + data.cart.total.toFixed(2).replace('.', ','));
      }
  });
  