$('.plano a').click(function() {
    $('.option').hide()
  
    if( $(this).hasClass('personalizado') ) {
      $('.option-personalizado').show()
    } else {
      $('.option-default form').attr('data-id', $(this).attr('data-id'))
      $('.option-default').show()
    }
  
    MicroModal.show('plano-personalizado')
  })
  
  // Altera o valor no modal de acordo com o plano personalizado escolhido
  $('#plano-personalizado #qtd-criancas').on('change', function() {
    let valor = $(this).find('option:selected').attr('data-val')
    let valSplit = valor.indexOf(',') > -1 ? valor.split(',') : false
    if( valSplit ) {
      $('#plano-personalizado .price').html('<sup>R$</sup> ' + valSplit[0] + '<sup>,' + valSplit[1] + '</sup>')
    } else {
      $('#plano-personalizado .price').html('<sup>R$</sup> ' + valor + '<sup>,00</sup>')
    }
  })
  
  // Adiciona o plano no carrinho
  $(document).ready(function() {
    $('#plano-personalizado form').submit(function(e) {
      e.preventDefault();
      let form = $(this)
      let faixas = []
      
      form.find('select[name=faixa-etaria] option:selected').each((index, item) => {
        faixas.push({
          slug: 'crianca_0' + (index + 1),
          value: $(item).text()
        })
      })
  
      addPlan(form.attr('data-id'), faixas)
    })
  })
  
  // Adiciona o número de selects de acordo com a quantidade de crianças
  $('#qtd-criancas').on('change', function() {
    $('.option-personalizado').find('form').attr('data-id', $(this).find('option:selected').val())
    $('.child').remove()
    let qtd = parseInt( $(this).find('option:selected').text().match(/\d+/)[0] )
  
    for(let i = 0; i < qtd - 1; i++) {
      $('.parent').clone().addClass('child').removeClass('parent').appendTo('.faixa-etaria')
    }
  
    $('.faixa-etaria').css('display', 'flex')
  })
  
  // Adiciona plano no carrinho
  function addPlan(id, faixas) {
    $.get({
      url: window.location.origin + '/checkout/cart/plan/add/' + id,
      success: () => {
        iziToast.success({
          title: 'Plano adicionado com sucesso!',
          timeout: 3000
        })
  
        setFaixaEtaria(faixas)
      }
    }).fail((data) => {
      iziToast.error({
        title: 'Erro ao adicionar plano',
        timeout: 3000
      })
    })
  }
  
  // Adiciona a faixa etária na entidade de vendas
  function setFaixaEtaria(faixas) {
    let url = '/checkout/cart/properties'
    $.post(url, {
      extra_fields: faixas
    }).done(() => {
      window.location.href = window.location.origin + '/checkout'
    }).fail(() => {
      iziToast.error({
        title: 'Erro ao adicionar as faixas etárias',
        timeout: 3000
      })
    })
  }