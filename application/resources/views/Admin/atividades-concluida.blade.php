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
                            <li class="breadcrumb-item active" aria-current="page">Atividades Conclúidas</li>
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
                            <h4 class="card-title">Atividades Conclúidas</h4>
                            <hr>
                            </br>
                            </br>
                            </br>
                            <table id="lang_opt" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tipo Atividade</th>
                                        <th>Título</th>
                                        <th>Descrição</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($atividades != null) {  ?>
                                    @foreach($atividades as $atividade)
                                    <tr>
                                        <td>
                                            <?php 
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
                                            }
                                            ?>
                                        </td>
                                        <td>{{ $atividade->titulo }}</td>
                                        <td>{{ $atividade->descricao }}</td>
                                        <td>{{ $atividade->status }}</td>
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
@endsection