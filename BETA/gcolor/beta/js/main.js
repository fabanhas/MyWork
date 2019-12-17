function getData() {
    fetch(window.location.href, {
      headers: {
        'Accept'           : 'application/json',
        'Content-Type'     : 'application/json',
        'X-Requested-With' : 'XMLHttpRequest'
      }
    }).then(response => response.json())
  }
  
  $(document).ready(function() {
    $('.hamb-icon').on('click', function() {
      $(this).toggleClass('open')
      $('.menu-mobile').toggleClass('open')
      $('body').toggleClass('fixed')
    })
  
    $('.menu-mobile .menu .has-submenu').on('click', function() {
      $(this).toggleClass('open')
    })
  
    let w = $(window)
    w.scroll(() => {
      if( w.scrollTop() > 300 ) {
        $('.header .bottom').addClass('fix')
      } else {
        $('.header .bottom').removeClass('fix')
      }
    })
  
    // Produto
    $('.produto--sobre-wrap, .orcamento--dados').on('change', 'input[type=file]', function(data) {
      $(this).next().attr('data-content', data.target.files[0].name)
    })
  
    $('.add-input').on('click', function() {
      const label = $(this).prev().find('label')
      const last_num = label.length > 0 ? label.attr('for').split('imagem')[1] : 0
      if(last_num == 2) {
        $('.add-input').remove()
        return false
      }
      $(this).before(`
        <div class="upload">
          <form>  
            <input name="arte" id="anexo_${parseInt(last_num) + 1}" type="file">
            <label for="anexo_${parseInt(last_num) + 1}" data-content="Nenhum arquivo selecionado">Escolher arquivo</label>
            <i class="fas fa-times"></i>
          </form>
        </div>
      `)
    })
  
    $('.upload--files').on('click', '.upload .fa-times', function() {
      // console.log($(this))
      $(this).parent().remove()
    })
  
    // ---------- BETALABS
  
    // Login
    CanopusEventCenter.addListener('ServerDataLoader.Loaded', function (data) {
      if (typeof data.client !== undefined) {
        var estaLogado = data.client !== null;
        if (estaLogado) {
          $('.nao-logado').hide()
          $('.logado').show()
        } else {
          $('.logado').hide()
          $('.nao-logado').show()
        }
      }
      if (typeof data.cart !== undefined) {
        $('.total').html("R$ " + data.cart.total.toFixed(2).replace('.', ','))
      }
    });
  
    CanopusEventCenter.addListener('Checkout.Preview.Building', function(e) { e.preventDefault() })
  });
  