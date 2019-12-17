$(document).ready(function() {
    $('.comprar').on('click', function(e) {
      let btn = $(this)
          opcao = btn.closest('.produto--sobre-container'),
          images = [],
          form = opcao.find('form')
      
      $.each(form, function(index, item) {
        if( $(form).find('input[type=file]')[0].files.length > 0 ) {
          $.ajax({
            url: '/ecommerce/ve/artes/records/28',
            method: 'POST',
            data: new FormData(item),
            cache: false,
            processData: false,
            contentType: false,
            headers: {
              Accept: "application/json",
              Authorization: 'Bearer ' + OauthService.getToken()
            },
            success: (data) => {
              images.push(data.data.id)
              
              $.post(
                '/checkout/cart/properties', {
                  extra_fields: [
                    { slug: 'observacoes', value: btn.prev().val() !== null ? btn.prev().val() : '' },
                    { slug: 'imagens', value: images.join(', ') },
                    { slug: 'sobre', value: opcao.attr('id') }
                  ]
                }, 'json'
              )
            }
          })
        }
      }) // each
    }) // click
  }) // ready