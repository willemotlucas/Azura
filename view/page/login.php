<section id="login">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-6 col-lg-offset-3">
	            <div class="login-panel panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title">Connexion à votre espace d'administration</h3>
	                </div>
	                <div class="panel-body">
	                    <form role="form" method="POST">
	                        <fieldset>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="Login" name="login" type="login" autofocus>
	                            </div>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
	                            </div>
	                            <div class="checkbox">
	                                <label>
	                                    <input name="remember" type="checkbox" value="Remember Me">Se souvenir de moi
	                                </label>
	                            </div>
	                            <!-- Change this to a button or input when using this as a form -->
	                        	<button class="btn btn-lg btn-success btn-block" type="submit" formaction="/Azura/admin/login">Se connecter</button>
	                        </fieldset>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>