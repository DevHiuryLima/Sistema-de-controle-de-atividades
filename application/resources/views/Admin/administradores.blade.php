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
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Administradores</li>
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
                        <div class="table-responsive">
                            <h4 class="card-title">Administradores</h4>
                            <a href="{{ route('cadastro-administrador') }}">
                                <button type="button" class="btn waves-effect waves-light btn-warning">Novo Administrador</button>
                            </a>
                            </br>
                            </br>
                            </br>
                            <table id="lang_opt" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Login</th>
                                        <th width="10%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($administradores != null) {  ?>
                                    @foreach($administradores as $administrador)
                                    <tr>
                                        <td>{{ $administrador->nome }}</td>
                                        <td>{{ $administrador->login }}</td>
                                        <td>
                                            <a class="fancybox fancybox.ajax" href="alterar-administrador/<?=$administrador->idAdmin?>">
                                                <button type="button" class="btn btn-success mesmo-tamanho" title="Alterar Cadastro">
                                                    <i class="mdi mdi-tooltip-edit"></i>
                                                </button>
                                            </a>
                                            <button data-id="<?=$administrador->idAdmin?>"
                                                    data-backdrop="static" data-keyboard="false"
                                                    data-toggle="modal" data-target="#modalExcluir"

                                                    type="button" class="btn btn-danger mesmo-tamanho"
                                                    title="Excluir Cadastro">
                                                <i class="mdi mdi-window-close"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <?php } else { ?>
                                    <tr class="odd">
                                        <td valign="top" colspan="20" class="dataTables_empty">Nenhum registro encontrado</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #414755; color: #FFF">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                    </div>
                    <div class="modal-body">
                        <input id="idAdmin" name="idAdmin" hidden>
                        <div class="alert alert-danger text-center" role="alert">
                            Deseja realmente excluir ?
                        </div>
                        <button id="excluir" type="submit" class="btn shadow btn-success">Excluir</button>
                    </div>
                    <div class="modal-footer">
                        <button id="btnFehcarModalDesativar" type="button" class="btn btn-danger shadow" data-dismiss="modal">Fechar
                        </button>
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
    //Excluir-------------------------------------------------
    $('#modalExcluir').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var modal = $(this);

        var id = button.data('id');
        modal.find('#idAdmin').val(id);

        $('#excluir').on('click',function() {
            $.ajax({
                url: 'remove-administrador/'+id,
                type: 'GET',
                success: function (resposta) {
                    if(resposta == "Removido com sucesso!") {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            })
        })
    });
    //Excluir-------------------------------------------------
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
@endsection