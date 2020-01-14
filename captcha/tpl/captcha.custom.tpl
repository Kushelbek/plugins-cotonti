<!-- BEGIN: MAIN -->
<!-- IF {PHP.ccaptcha_verifyed} != 1 -->
<div style="display:block;max-width:{PHP.cfg.plugin.captcha.capw}px;padding: 1rem;margin: 1rem auto;background:#f5f5f5;box-shadow: 0 0 1px #b9b9b9;cursor:pointer;text-align:center;word-wrap:break-word">
	{FILE "{PHP.cfg.plugins_dir}/captcha/tpl/captcha.warnings.tpl"}

	<form method="post">
		<figure>{CAPTCHA_IMG}
			<figcaption>
				<small>{PHP.L.captcha_refresh}</small>
			</figcaption>
			{CAPTCHA_INPUT}
		</figure>
		<br><p>{CAPTCHA_SUBMIT}</p>
	</form>

</div>
<!-- ENDIF -->
<!-- END: MAIN -->
