<div class="card-header">
        <h4 class="card-title">Login</h4>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-5">
                <form role="form"  method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="login" >Login</label>
                        <input type="text" name="login" id="login" class="form-control" placeholder="login" value="<?= is_set('login')?>" >
                    </div>
                    <div class="form-group">
                        <label for="password" >Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit"  name="submit" id="btn-login" class="btn btn-fill btn-lg " value="Acceder">
                    </div>
                </form>
            </div>
						<div class="col-md-5">

                <?php
                if (isset($_POST['submit'])){
                    $login = clearInput($_POST['login']);//clearInput es una función que limpia variables que entran desde inputs
                    $password = clearInput($_POST['password']);
                    $errors = [];
                    if ($login== null || $login==""){
                        $errors[]='login obligatorio para acceder';
                    }
                    if ($password== null || $password==""){
                        $errors[] = 'Contraseña obligatoria para acceder';
                    }
                    if (!$umanager->user_existe($login,$password)){
                        $errors[] = 'Login o Contraseña incorectos ';
                    }

                    $user = $umanager->getByLogin($login);
                    if (empty($errors)){
                        $cmanager = new CarritoManager();
                        $_SESSION['user'] = $user->getNumvend();
                        $carrito = $cmanager->getCarrito($user);//devolvemos el carrito del usuario
                        if (!empty($carrito)){//si no es vacio assignamos la session a nuestro carrito
                            $_SESSION['carrito'] = $carrito;
                        }else{
                            $_SESSION['carrito'] = [];// careamos la session vacia
                        }
                       redirect('home');
                    }else ?>
												<div class="alert alert-danger error">
												<ul>
                    <?php foreach($errors as $error):?>
												<li><?= $error; ?></li>
                    <?php endforeach;?>
										</ul>
										</div>
                    <?php
                }
                ?>

						</div>
        </div>
    </div>
</div>
