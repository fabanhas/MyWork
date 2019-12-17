@include(engine_view('header'))
<h2 class="head breadcrumb">Home / Minha conta <br><span>Minha Conta</span></h2>
<section class="container account">
  @accountHeader()
  @accountBody()
</section>
@include(engine_view('footer'))