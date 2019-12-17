   
<?php include 'header.php'; ?>
   
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-duvidas" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class="numero">1)</span>
                    Qual a vantagem de comprar mais de uma revista?
                    <i class="seta fas fa-angle-down"></i>
                </button>
            </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                Resposta
            </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-duvidas collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span class="numero">2)</span>
                    Como faço para presentear alguem com uma assinatura?
                    <i class="seta fas fa-angle-down"></i>
                </button>
            </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                resposta
            </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>