@extends(engine_view('base'))
@section('conteudo')
@section('title', $pagina->model->description)
    <section class="inst">
        <div class="container">
            <hr>
            <p class="d-none d-md-flex">{{ $pagina->model->description }} <span class="ml-md-auto">home / institucional / {{ $pagina->model->description }}</span></p>
                <div class="row mt-5">
                    <div class="col-xl-3">
                        <aside data-aos="fade-up">
                            <ul>
                                <h4>INSTITUCIONAL</h4>
                                <li><a href="/quem-somos" class="active">quem somos</a></li>
                                <li><a href="/seguranca">segurança</a></li>
                                <li><a href="/politica-de-privacidade">política de privacidade</a></li>
                                <li><a href="/termos-e-condicoes">termos e condições</a></li>
                                <li><a href="/contato">contato</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-9" data-aos="fade-down">
                        <h2>{{ $pagina->model->description }}</h2>
                        <p>{!! $pagina->model->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection