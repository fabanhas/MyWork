$(document).ready(function() {
    numeral.locale('pt-br')
  
    // Atualiza valor total quando marcar um acabamento ( checkbox )
    $(document).on('change', '.ui-accordion-content form input', function() {
      let currentPrice = numeral( $('.valor-atual').text() )
      let varPrice = numeral( $(this).siblings('.acabamento-price.active').text() )
  
      if( $(this).is(':checked') ) {
        currentPrice.add(varPrice.value())
        $('.valor-atual').text('R$ ' + currentPrice.value().toFixed(2).replace('.', ',') )
      } else {
        currentPrice.subtract(varPrice.value())
        $('.valor-atual').text('R$ ' + currentPrice.value().toFixed(2).replace('.', ',') )
      }
    })
  
    // Atualiza valor total de acordo com o input radio selecionado (Seção sobre a arte)
    let radios = []
    $(document).on('change', '.valor-acrescentado input', function() {
      let currentPrice = numeral( $('.valor-atual').text() )
      let varPrice = numeral( $('.valor-acrescentado input:checked').next().attr('data-price') )
      
      if(radios == "") {
        radios.push(varPrice.value())
        currentPrice.add(varPrice.value())
        $('.valor-atual').text('R$ ' + currentPrice.value().toFixed(2).replace('.', ','))
      } else {
        currentPrice.subtract(radios[radios.length-1])
        radios.push(varPrice.value())
        currentPrice.add(varPrice.value())
        $('.valor-atual').text('R$ ' + currentPrice.value().toFixed(2).replace('.', ','))
      }
    })
  
    // Remove valores iguais do select quantidade
    var seen = {};
    $('#quantidade option').each(function() {
      var txt = $(this).text();
      if (seen[txt])
        $(this).remove();
      else
        seen[txt] = true;
    });
  
    // Reseta os inputs checkados
    setTimeout(function() {
      $('input:checkbox').prop('checked', false)
    }, 1500)
  
    $(document).on('change', '#quantidade', function() {
      changeVariationValues($(this).find('option:selected'))
    })
  
    // Atualiza o valor total e valores dos acabamentos
    // Esconde acabamentos caso não tenha quantidade compatível
    let changeVariationValues = option => {
      var totalAcabamentosValue = numeral(0)
      let newVariationValue = numeral( option.attr('data-price').replace('.', ',') )
      let variationQty = numeral( option.text() )
  
      $('.comprar').attr('id', option.val())
      $('.valor-atual').attr('data-init', newVariationValue.value())
      $('.valor-atual').text('R$ ' + newVariationValue.value().toFixed(2).replace('.', ','))
      $('.comprar').attr('id', option.find('option:selected').val())
      $('.acabamento-price').removeClass('active');
  
      let variationVal
      let waitingBeta = setInterval(function() {
        if( $('.ui-accordion-content form div').length > 0 ) {
          // Loop de acabamentos
          $('.ui-accordion-content form div').each((index, item) => {
            $(item).find('.acabamento-price').each((index, variacao) => {
              let min = numeral( $(variacao).attr('data-qtd-min') )
              let max = numeral( $(variacao).attr('data-qtd-max') )
  
              if( min.value() <= variationQty.value() && variationQty.value() <= max.value() ) {
                let unidade = numeral( $(variacao).attr('data-unity') )
                $(variacao).text( unidade.multiply( variationQty.value() ).value().toFixed(2).replace('.', ',') )
                $(variacao).addClass('active')
              }
            })
      
            if( $(item).find('.acabamento-price.active').length !== 0 ) {
              $(item).attr('style', 'display: flex;')
              $(item).find('input').val( $(item).find('.acabamento-price.active').attr('data-val') )
              variationVal = numeral( $(item).find('.acabamento-price.active').text() )
      
              if( $(item).find('input').is(':checked') ) {
                totalAcabamentosValue.add( variationVal.value() )
              }
            } else {
              $(item).hide()
            }
          })
  
          clearInterval(waitingBeta)
  
          $('.valor-atual').text('R$ ' + totalAcabamentosValue.add(newVariationValue.value()).value().toFixed(2).replace('.', ','))
        }
  
        let allDivs = $('.ui-accordion-content form > div').length
        $('.ui-accordion-content form > div[style="display: none;"]').length == allDivs ? $('#acabamentos').hide() : $('#acabamentos').show()
  
        
      }, 200)
    }
  
    // Adiciona grupos de componentização selecionados e produto no carrinho
    $('.comprar').on('click', function(e) {
      if($('[name=tabs]:checked').length == 0) {
        iziToast.error({
          title: 'É necessário selecionar uma das opções abaixo',
          timeout: 5000
        })
  
        $('html, body').animate({ scrollTop: $('.produto--sobre').offset().top })
        
        return false
      }
  
      numeral.defaultFormat('R$ 0,00')
      e.preventDefault()
      let btn = $(this)
      let grupos = []
      let url = window.location.origin + '/checkout/cart/item/add/' + btn.attr('id') + '?quantity=1'
  
      $('.ui-accordion-content form input:checked').each( (index, item) => {
        if( $(item).siblings('.acabamento-price.active').length !== 0 ) {
          grupos.push({
            componentization_group_id: $(item).parent().attr('data-group'),
            component_id: $(item).val(),
            quantity: parseInt( $('#quantidade option:selected').text() )
          })
        }
      })
  
      let sobreArte = getSobreArte()
      sobreArte ? grupos.push(sobreArte) : false
  
      $.get(url, 
        { components: grupos }
      ).done(function() {
        iziToast.success({
          title: 'Produto adicionado!',
          timeout: 3000
        })
  
        let oldTotal = numeral( $('.total').text() )
        let currentProductTotal = numeral( $('.valor-atual').text() )
        oldTotal.add(currentProductTotal.value())
        $('.total').html('R$ ' + oldTotal.value().toFixed(2).replace('.', ',') )
  
        window.location = window.location.origin + '/checkout'
        
      }).fail((err) => {
        if( err ) {
          iziToast.error({
            title: 'Ocorreu um erro ao adicionar o produto',
            timeout: 3000
          })
        }
      })
    })
  
    // Retorna objeto com os componentes(sobre a arte) para serem adicionados
    let getSobreArte = function() {
      let input = $('[name=valor-acrescentado]:checked')
      let sobreArte = {}
      if( input.length > 0 ) {
        return {
          componentization_group_id: $('.valor-acrescentado').attr('data-id'),
          component_id: input.val(),
          quantity: 1
        }
      }
  
      return null
    }
  
    // Desmarca checkbox quando mudar a opção Sobre a arte
    $('input[name=tabs]').on('change', function() {
      if( $(this).attr('id') == 'arte-personalizada' ) {
        $('input[name=valor-acrescentado]').each((index, input) => {
          $(input).is(':checked') ? $(input).prop('checked', false) : false
        })
      }
    })
  
    let defaultOption = $('#quantidade option:selected')
    changeVariationValues(defaultOption)
  })