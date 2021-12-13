@extends('Admin.master.master')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Plataforma Digital</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{ route('atividades') }}">Atividades</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Alterar Ativiade</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Alterar Ativiade</h3>
                        <hr>
                        <form name="formAlterarAtiviade" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idAtividade" value="<?=$atividade->idAtividade?>">
                            <div class="row">
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="tipoAtividade">
                                            Tipo Atividade* <b>
                                                (O tipo cadastrado é: <?php 
                                                                        switch ($atividade->tipoAtividade) {
                                                                            case 'desenvolvimento':
                                                                                echo "Desenvolvimento";
                                                                                break;
                                                                            case 'atendimento':
                                                                                echo "Atendimento";
                                                                                break;
                                                                            case 'manutencao':
                                                                                echo "Manuteção";
                                                                                break;
                                                                            case 'manutencaoUrgente':
                                                                                echo "Manuteção urgente";
                                                                                break;
                                                                            default:
                                                                                # code...
                                                                                break;
                                                                        } ?>)
                                            </b>
                                        </label>
                                        <select id="tipoAtividade" name="tipoAtividade" class="select2 form-control" onchange="adicionarMinimoCaracteres();" required="">
                                            <option value="" selected="">Selecione...</option>
                                            <option value="desenvolvimento">Desenvolvimento</option>
                                            <option value="atendimento">Atendimento</option>
                                            <option value="manutencao">Manutenção</option>
                                            <option value="manutencaoUrgente">Manutenção urgente</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="titulo">Título*</label>
                                        <input type="text" name="titulo"id="titulo" class="form-control" value="<?=$atividade->titulo?>" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label" for="descricao">Descrição*</label>
                                    <fieldset class="form-group">
                                        <textarea style="padding: 10px;" id="descricao" name="descricao" cols="48" rows="3" placeholder="Insira a sua descrição." required=""><?=$atividade->descricao?></textarea>
                                    </fieldset>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="float: left;">Alterar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= asset('admin/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= asset('admin/assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
<script src="<?= asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('admin/dist/js/app.min.js') ?>"></script>
<script>
    $(function() {
        "use strict";
        $("#main-wrapper").AdminSettings({
            Theme: false, // this can be true or false ( true means dark and false means light ),
            Layout: 'vertical',
            LogoBg: 'skin5', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6 
            NavbarBg: 'skin5', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
            SidebarType: 'mini-sidebar', // You can change it full / mini-sidebar / iconbar / overlay
            SidebarColor: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
            SidebarPosition: false, // it can be true / false ( true means Fixed and false means absolute )
            HeaderPosition: false, // it can be true / false ( true means Fixed and false means absolute )
            BoxedLayout: false, // it can be true / false ( true means Boxed and false means Fluid ) 
        });
    });
</script>

<script src="<?= asset('admin/dist/js/app-style-switcher.js') ?>"></script>
<script src="<?= asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') ?>"></script>
<script src="<?= asset('admin/assets/extra-libs/sparkline/sparkline.js') ?>"></script>
<script src="<?= asset('admin/dist/js/waves.js') ?>"></script>
<script src="<?= asset('admin/dist/js/sidebarmenu.js') ?>"></script>
<script src="<?= asset('admin/dist/js/custom.min.js') ?>"></script>
<script src="<?= asset('admin/assets/libs/chartist/dist/chartist.min.js') ?>"></script>
<script src="<?= asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
<script src="<?= asset('admin/assets/extra-libs/c3/d3.min.js') ?>"></script>
<script src="<?= asset('admin/assets/extra-libs/c3/c3.min.js') ?>"></script>
<script src="<?= asset('admin/assets/libs/chart.js/dist/Chart.min.js') ?>"></script>
<script src="<?= asset('admin/dist/js/pages/dashboards/dashboard1.js') ?>"></script>
<script src="<?= asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('admin/dist/js/pages/datatable/datatable-basic.init.js') ?>"></script>
<script>
function adicionarMinimoCaracteres() {
    let selectEspecialista = document.getElementById('tipoAtividade');
    let textDescricao = document.getElementById('descricao');

    if(selectEspecialista.value == "atendimento") {
        textDescricao.setAttribute("minlength", 50);
    } else if(selectEspecialista.value == "manutencaoUrgente") {
        textDescricao.setAttribute("minlength", 50);
    } else {
        textDescricao.removeAttribute("minlength");
    }
}

 $(function() {
     $('form[name="formAlterarAtiviade"]').submit(function(event) {
         event.preventDefault();

         $.ajax({
             url: "{{ route('fazer-alteracao-atividade') }}",
             type: "post",
             data: $(this).serialize(),
             dataType: 'json',
             success: function( response ) {
                 alert('Atividade atualizada com sucesso!');
                 window.location.href = "{{ route('atividades' ) }}";
             }
        })
        .fail(function(jqXHR){
            if (jqXHR.responseJSON.message == 'Atividade não encontrada!') {
                alert(jqXHR.responseJSON.message)
            } else if (jqXHR.responseJSON.message == 'Passou do horário para manutenções urgente!') {
                alert(jqXHR.responseJSON.message)
            } else if (jqXHR.responseJSON.message == 'Ocorreu um erro no cadastro!') {
                alert(jqXHR.responseJSON.message)
            } else {
                alert('Ocorreu um erro cadastro!\n\n' + jqXHR.responseJSON.message);
            }
        });
     })
 });
</script>
@endsection