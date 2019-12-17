@include(engine_view('header'))
<section class="py-5 my-5 account">
  <div class="container">
    <h1 class="text-purple text-center">
      @if(request()->path() == '/account/profile')
        Minha conta
      @else
        Meus pedidos
      @endif
    </h1>
    <p class="breadcrumb text-center"><a href="/">home</a> / <a>institucional</a> / <span class="current">quem somos</span></p>

    @accountHeader()
    @accountBody()
  </div>
</section>
@push('scripts')
<script>
  setTimeout(function() {
    $('account-subscriptions-list .row.mb-md > span a').attr('href', '/#planos')
    $('account-sidebar > .card > .card-header').addClass('line-blue')
    $('account-sidebar > .card > .card-header').text('Minha conta')
  }, 500)
</script>
@endpush
@include(engine_view('footer'))