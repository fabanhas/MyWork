<div class="canopus-cart-container d-flex justify-content-between flex-column">
    <div class="canopus-cart-modal-top">
        <div class="canopus-cart-modal-title d-flex justify-content-start">
            <span class="title">Meu Carrinho</span> <div class="carrinho-qtd-content d-flex align-items-end">(<em class="carrinho-qtd"></em>)</div>
        </div>
        @foreach($cart->collection as $item)
        <div class="canopus-cart-items">
          <ul>
            <li>
              <div class="canopus-cart-item-image">
                <img src="{{ thumb($item->model->images->first()->source, 50, 0) }}">
              </div>
              <div class="canopus-cart-item-name-qtd">
                <div class="canopus-cart-item-info">
                  <h4>{{$item->name}}</h4>
                </div>
                <div class="canopus-cart-item-qtdModal d-flex align-items-center" id="{{$item->id}}">
                  <div class="quantidade-modal-item">
                    <div style="position: relative;">
                      <button class="btn-more-qtd-modal"><i class="fas fa-plus"></i></button>
                      <input type="text" value="{{$item->qty}}" name="quantity-modal-input" maxlength="4" class="quantity-modal-input ">
                      <button class="btn-less-qtd-modal"><i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <p>R$ {{ number_format($item->price, 2, ',', '.') }}</p>
                </div>
                <button class="remove-item"><i class="fas fa-times"></i></button>
              </div>
            </li>
          </ul>
        </div>
        @endforeach
    </div>
    <div class="canopus-cart-modal-bottom">
        <div class="modal-subtotal modal-preview-bottom-item d-flex justify-content-between  align-items-center">
            <em>SUBTOTAL</em>
            <span class="carrinho-subtotal"></span>
        </div>
        <div class="frete-wrapper modal-subtotal modal-preview-bottom-item">
            <div class="frete-preview-input">
                <div id="calcular-frete" class="frete-calcular" calcular-frete>
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="">
                            <input type="text" name="inputCEPModal" id="inputCEPModal" value="" tabindex="1" placeholder="Digite o CEP" data-cep class="cep textbox form-control" />
                        </div>
                        <div class="">
                            <button id="calcular-ftre-btn-modal" class="btn-frt" onclick="freteModal()">Calcular <i class="fas fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-frete-preview">
                <ul></ul>
            </div>
        </div>
        <div class="canopus-cart-resume">
        <a href="/checkout/payment" class="canopus-cart-goto-checkout">
            <span>
            <span>IR PARA O PAGAMENTO</span>
            <span class="icon-cart"></span>
            <span class="carrinho-qtd"></span>
            </span>
        </a>
        </div>
    </div>
</div>
<style>
  .canopus-cart-item-qtdModal {
      width: 80% !important;
      float: right;
  }
  input.quantity-modal-input {
      width: 38px;
      height: 44px;
      border: 0;
      border-radius: 3px;
      text-align: center;
      color: #333;
  }
  .btn-more-qtd-modal .fas, .btn-less-qtd-modal .fas{
      margin: 0 auto;
      font-size: 10px;
  }
  .remove-item {
      border: 0px;
      color: #A6A6A6;
      background: transparent;
      position: absolute;
      top: 10px;
      left: 90%;
      font-size: 20px;
      cursor:pointer;
  }
  .canopus-cart-modal-title{
      padding: 20px 40px 20px 20px;
  }
  .canopus-cart-modal-title span.title {
      font-size: 30px;
      font-weight: lighter;
      color: #000000;
  }
  .canopus-cart-modal-title .carrinho-qtd-content {
      padding-bottom: 9px;
      margin-left: 6px;
      font-size: 16px;
      color: #8C8C8C;
  }
  .canopus-cart-modal-title .carrinho-qtd-content em{
      font-style:normal;
  }
  .btn-more-qtd-modal, .btn-less-qtd-modal {
      background: #FFFFFF;
      border: 2px solid #BFBFBF;
      color: #BFBFBF;
      border-radius: 20px;
      width: 25px;
      height: 25px;
      line-height: 1pt;
      padding: 0px;
      cursor: pointer;
  }
  .btn-more-qtd-modal{
  }
  .btn-less-qtd-modal{
  }
  .canopus-cart-item-qtdModal p{
      display: inline-block;
      color: #262626;
      font-size: 20px;
      margin: 0px;
      margin-left: 20px;
      font-weight: 500;
  }
  .modal-preview-bottom-item {
      background-color: #F2F2F2;
      padding: 20px 40px 20px 20px;
      border-bottom: 1px solid #D9D9D9;
  }
  .modal-preview-bottom-item em{
      font-size: 16px;
      font-style:normal;
  }
  .modal-preview-bottom-item span{
      font-weight: 500;
      font-size: 21px;
  }
  .quantidade-modal-item{
      display: inline-block;
      width: 100px;
      text-align: center;
  }
  input#inputCEPModal {
      color: black!important;
      height: auto;
      width: 100%;
      border: 0px;
      padding: 8px;
      font-size: 14px;
      margin-left: 0px;
  }
  button#calcular-ftre-btn-modal {
      background: none!important;
      border: none!important;
      color: #7B5EA2;
      cursor: pointer;
  }
  .container-frete-preview li {
      list-style: none;
      color: #262626;
      font-size: 14px;
      background: #FFFFFF;
      width: 100%;
      padding: 10px;
      display: block;
      margin: 0 auto;
      margin-top: 15px;
      position:relative;
  }
  .container-frete-preview li .fa {
      margin-right: .5rem
  }
  .container-frete-preview ul {
      padding: 0;
      padding-left: 0px;
  }

  .checkout-cart-preview .canopus-cart-goto-checkout > span {
    width: 100%;
    display: inline-block;
    background: #7B5EA2;
    color: white;
    text-align: center;
    font-weight: 500;
    padding: 15px;
    font-size: 19px;
    text-transform: uppercase
  }
  .checkout-cart-preview {
    overflow: hidden;
    max-height: 100%
  }

  .checkout-cart-preview .canopus-cart-container {
    height: 100%;
    margin: 0 !important;
  }

  .checkout-cart-preview .tingle-modal-box__content {
    max-height: 100%
  }

  span.tingle-modal__closeIcon.btn:active {
    box-shadow: none !important
  }
  .canopus-cart-modal-top{
    height: 90vh !important;
    overflow: auto;
  }
  button.tingle-modal__close.btn {
    position: relative;
    color: #7B5EA2 !important;
    right: 0px !important;
    margin: 0px !important;
    padding: 0px !important;
    left: 0px !important;
    display: block;
    width: 100%;
    top: 0px;
    background: #FF8600;
    border-radius: 0;
    text-align: center;
    float: left;
  }

  span.tingle-modal__closeIcon.btn {
    color: white !important;
    font-family: 'Montserrat', sans-serif;
    width: 100%;
    display: inline-block;
    font-weight: 500;
    font-size: 15px;
    text-transform: uppercase
  }

  .checkout-cart-preview .canopus-cart-items {
    max-height: 555px;
    background: #FFFFFF;
    overflow-y: auto;
    margin-bottom: -1px;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    margin-top: 0px;
    overflow: hidden;
  }

  @media screen and (max-width: 600px) {
    .tingle-modal.checkout-cart-preview .tingle-modal-box {
      right: 0 !important;
    }
  }

  .tingle-modal-box .canopus-cart-modal-top {
    overflow: auto;
  }

  .checkout-cart-preview .canopus-cart-items ul {
    list-style: none;
    display: inline-block;
    width: 100%;
    padding: 0;
    margin: 0px;
  }

  .checkout-cart-preview .canopus-cart-items ul li {
    padding: 10px 30px;
    position: relative;
  }

  .checkout-cart-preview .canopus-cart-items ul li .canopus-cart-item-info,
  .checkout-cart-preview .canopus-cart-items ul li .canopus-cart-item-image {
    display: inline-block
  }

  .checkout-cart-preview .canopus-cart-items ul li .canopus-cart-item-info h4 {
    display: inline-block;
    font-weight: 100;
    width: 100%;
    font-size: 21px !important;
    color: #000000;
    margin-top: 0;
  }

  .checkout-cart-preview .canopus-cart-items ul li .canopus-cart-item-info p {
    display: inline-block;
    /* width:100%; */
    font-size: 18px;
  }

  .checkout-cart-preview .canopus-cart-title h3 {
    display: inline-block;
    width: 100%;
    text-align: center;
    font-size: 25px;
    margin-top: 25px
  }

  .checkout-cart-preview .canopus-cart-title h3 .qtd-cart {
   
  }

  .checkout-cart-preview .canopus-cart-title .canopus-cart-close {
    position: absolute;
    top: 0;
    right: 0
  }

  .checkout-cart-preview .canopus-cart-resume .canopus-cart-total {
    display: inline-block;
    width: 100%;
    text-align: center;
    font-size: 18px;
    padding: 15px 0
  }

  .checkout-cart-preview .tingle-modal-box__content {
    width: 100%;
    background: white;
    height: 100vh;
    position: absolute;
    right: 0;
    overflow-x: hidden
  }

  .checkout-cart-preview .canopus-cart-resume {
    width: 100%;
    position: relative;
    bottom: 0;
    margin: 0;
  }

  .checkout-cart-preview .canopus-cart-title>h3>span {
    color: #C62100 !important;
    text-transform: uppercase;
    margin-top: 10px !important;
    padding-top: 10px !important;
    font-weight: 600;
    font-size: 19px
  }

  .checkout-cart-preview .tingle-modal__close {
    width: 50px !important;
    height: 50px !important;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 1000;
    padding: 0;
    width: 5rem;
    height: 5rem;
    border: none;
    background-color: transparent;
    color: #f0f0f0;
    font-size: 6rem;
    font-family: monospace;
    line-height: 1;
    cursor: pointer;
    transition: color .3s ease;
  }

  span.tingle-modal__closeIcon {
    color: #A6A6A6 !important;
    display: block;
    width: 50px;
    height: 50px;
    position: absolute;
    top: -18px;
    right: 15px;
  }

  span.canopus-cart-item-qtd {
      color: #b3b3b3;
      font-weight: 600;
      margin-left: 10px
    }

    .checkout-cart-preview .canopus-cart-item-info h4 {
      font-size: 15px !important
    }

    .checkout-cart-preview .canopus-cart-item-info p {
      font-size: 16px !important;
      color: #7B5EA2;
      margin-bottom: 0
    }

    .checkout-cart-preview .canopus-cart-item-image {
      position: relative;
      text-align: center;
      width: 20%;
      float: left;
    }

    .checkout-cart-preview .canopus-cart-item-image img {
      max-width: 100%;
      text-align: center
    }

    .checkout-cart-preview .canopus-cart-item-qtd {
      position: relative;
      bottom: 0;
      right: 0;
      font-size: 13px;
      text-align: center;
    }

    .checkout-cart-preview .canopus-cart-item-info {
      margin-top: 0;
      margin-left: 0px;
    }

    .canopus-cart-item-info {
      padding-left: 0px;
      margin-top: -45px;
      width: 76% !important;
      float: left;
    }

  .tingle-modal.checkout-cart-preview .tingle-modal-box {
      width: 560px!important
  }

  @media (max-width: 991px) {
      .tingle-modal.checkout-cart-preview .tingle-modal-box {
          width:75%!important
      }
  }

  @media (max-width: 576px) {
      .tingle-modal.checkout-cart-preview .tingle-modal-box {
          width:100%!important
      }
  }

  @media screen and (max-width: 600px) {
    span.tingle-modal__closeIcon {
      right: unset;
    }

    .tingle-modal__close {
      left: unset !important;
    }
  }
</style>