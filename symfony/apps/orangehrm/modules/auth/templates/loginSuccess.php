<div class="container-fluid justify-content-center">
	<h1 id="logo">Emploitic</h1>
	<div class="row justify-content-center">
		<div class="panel">
			<h4><?php echo __('LOGIN Panel'); ?></h4>
            <?php if (!empty($message)) : ?>
            <div class="alert alert-warning" role="alert">
                <?php echo __($message); ?>
            </div>
            <?php endif; ?>
			<form id="frmLogin" method="post" action="<?php echo url_for('auth/validateCredentials'); ?>">
                <input type="hidden" name="actionID"/>
                <input type="hidden" name="hdnUserTimeZoneOffset" id="hdnUserTimeZoneOffset" value="0" />
                <?php echo $form->renderHiddenFields(); // rendering csrf_token ?>
                <div class="form-group">
                    <label for="txtUsername"><?php echo __('Username'); ?></label>
                    <input name="txtUsername" id="txtUsername" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtPassword"><?php echo __('Password'); ?></label>
                    <input name="txtPassword" id="txtPassword" class="form-control" autocomplete="off" type="password">
                </div>
                <div class="checkbox">
					<label for="remember">
                        <input type="checkbox" class="from-check-input" id="remember" />
                        Se souvenir de moi</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><?php echo __('LOGIN'); ?></button>
			</form>
			<div class="row justify-content-center">
                <a id="forgotPasswordLink" href="<?php echo url_for('auth/requestPasswordResetCode'); ?>"><?php echo __('Forgot your password?'); ?></a>
			</div>
		</div>
	</div>
</div>