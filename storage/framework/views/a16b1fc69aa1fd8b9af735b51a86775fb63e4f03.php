<script type="text/javascript">
<<<<<<< HEAD
    $(document).ready(function () {
        $('.ui.checkbox').checkbox();
    });
    function onSubmit(token) {
        document.getElementById("recaptcha-response").value = token;
    }
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="ui buttons fluid">
    <a href="<?php echo e(url('social/login/facebook')); ?>" target="_blank" id="facebookButton" class="ui facebook icon button">
        <i class="facebook icon"></i>
        Facebook
    </a>

    <a href="<?php echo e(url('social/login/google')); ?>" target="_blank" id="googleButton" class="ui icon google plus button">
        <i class="google plus icon"></i>
        Google+
    </a>
</div>

<button id="guestAccount" class="ui basic fluid button">
    <i class="user icon"></i> Login zonder account
</button>

<div class="ui horizontal divider">
    of
</div>

<div class="field">
    <label>E-mail</label>
    <input type="text" name="email" id="email_old" onchange="myFunction('email')">
    <input type="hidden" name="recaptcha-response" id="recaptcha-response">
</div>

<div class="field">
    <label>Wachtwoord <a href="#" class="ui recover password basic primary button">Wachtwoord vergeten?</a></label>
    <input type="password" id="pass_old" onchange="myFunction('pass')">
    <input type="hidden" name="password" id="pass_new">
</div>
<div class="field">
    <?php if($flag==1): ?>
        <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_SITEKEY')); ?>" data-callback='onSubmit'></div>
        <div style="float: right;"></div>
    <?php else: ?>
        <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_SITEKEY')); ?>" data-callback='onSubmit' style="display:none;"></div>
        <div style="float: right;"></div>
    <?php endif; ?>

    <div style="float: left; width: 200px;">
        <div class="ui checkbox">
            <input type="checkbox" tabindex="0" value="1" name="remember" class="hidden">
            <label>Onthoud mij</label>
        </div>
    </div>
    <a href="#" id="registerButton3" data-redirect="">Nog geen lid?</a>
=======
    $(document).ready(function() {
        $('.ui.checkbox').checkbox();
    });
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="ui buttons fluid">
	<a href="<?php echo e(url('social/login/facebook')); ?>" target="_blank" id="facebookButton" class="ui facebook icon button">
		<i class="facebook icon"></i>
		Facebook
	</a>

	<a href="<?php echo e(url('social/login/google')); ?>" target="_blank" id="googleButton" class="ui icon google plus button">
		<i class="google plus icon"></i>
		Google+
	</a>
</div>

<button id="guestAccount" class="ui basic fluid button">
	<i class="user icon"></i> Login zonder account
</button>

<div class="ui horizontal divider">
	of
</div>

<div class="field">
	<label>E-mail</label>
	<input type="text" name="email" id="email_old" onchange="myFunction('email')">

</div>

<div class="field">
	<label>Wachtwoord <a href="#" class="ui recover password basic primary button">Wachtwoord vergeten?</a></label>
	<input type="password" id="pass_old" onchange="myFunction('pass')">
	<input type="hidden" name="password" id="pass_new">
</div>
 <div class="field">
 <?php 
 //$flag=0;
 ?>
<?php if($flag==1): ?>
         <div class="g-recaptcha" data-sitekey="<?php echo e(getenv('CAPTCHA_FRONT')); ?>" ></div><div style="float: right;"></div>
     <?php else: ?>
         <div class="g-recaptcha" data-sitekey="<?php echo e(getenv('CAPTCHA_FRONT')); ?>" style="display:none;"></div><div style="float: right;"></div>

                 <?php endif; ?>

	<div style="float: left; width: 200px;">
		<div class="ui checkbox">
			<input type="checkbox" tabindex="0" value="1" name="remember" class="hidden">
			<label>Onthoud mij</label>
		</div>
	</div>
	<a href="#" id="registerButton3" data-redirect="">Nog geen lid?</a>
>>>>>>> e20a69d79303e58f20bd1154ee512f7d322bb657
</div>

<?php echo e(csrf_field()); ?>

