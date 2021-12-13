<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="<?= asset('admin/dist/css/style.index.min.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="main-wrapper">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background: #3e5569; no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="<?= asset('images/logo.jpeg') ?>" alt="logo" width="300px" /></span>
                        </br>
                        </br>
                        <h5 class="font-medium mb-3">Area Restrita</h5>
                    </div>

                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3" method="POST" id="loginform" action="{{ route('fazer-login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="login" class="form-control form-control-lg" placeholder="Login de usuário" aria-label="Login de usuário" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="senha" class="form-control form-control-lg" placeholder="Sua senha" aria-label="Sua senha" aria-describedby="basic-addon1">
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-3">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Entrar</button>
                                    </div>
                                </div>
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
    <script>
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>
</html>