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
                                <a href="{{ route('administradores') }}">Administradores</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cadastro de Administrador</li>
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
                        <h3>Cadastro de Administrador</h3>
                        <hr>
                        <form name="formCadastroAdministrador" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="nome">Nome*</label>
                                        <input type="text" name="nome" placeholder="Nome" id="nome" class="form-control" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="login">Login*</label>
                                        <input type="text" name="login" id="login" placeholder="Login" class="form-control" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="senha">Senha*</label>
                                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="float: left;">Cadastrar</button>
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
 $(function() {
     $('form[name="formCadastroAdministrador"]').submit(function(event) {
         event.preventDefault();

         $.ajax({
             url: "{{ route('fazer-cadastro-administrador') }}",
             type: "post",
             data: $(this).serialize(),
             dataType: 'json',
             success: function( response ) {
                $('#nome').val("");
                 $('#login').val("");
                 $('#senha').val("");
                 alert('Administrador cadastrado com sucesso!');
             }
        })
        .fail(function(jqXHR){
            if (jqXHR.responseJSON.message == 'Esse Administrador já está cadastrado!') {
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