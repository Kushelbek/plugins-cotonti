<!-- BEGIN: MAIN -->
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex nofollow">
		<meta http-equiv="refresh" content="{PHP.cfg.plugin.golink.golink_timer};url={PHP.cat_url}">

                <style>
                        #golinkwrap {
                        	max-width: 1100px;
                        	min-width: 240px;
                        	width: 80%;
                        	margin: 0 auto;
                        	text-align: center;
                        }
                        
                        #golinkwrap div.warning.italic {
                        	text-align: left;
                        }
                        
                        #golinkwrap div.warning.italic img {
                        	float: left;
                        	padding: 10px;
                        	margin-right: 10px;
                        	background: #fff;
                        	box-shadow: 0 0 1px #222;
                        }
                        
                        #timer {
                            color: #f00;
                            font-size: 18px;
                        }
                </style>
	</head>
	<body onload="gotimer();">
		<br>
		<div id="golinkwrap">
			<h1>
				{PHP.L.golink_comeback}
			</h1>
			<p>
				{PHP.L.golink_redirect_time_text}
			</p>
			<div class="warning italic">
				<img src="{PHP.cfg.plugins_dir}/golink/tpl/gotimer.gif" alt="">
				{PHP.L.golink_warning}
				<div class="clr"></div>
			</div>
			<p class="textcenter">
				<a href="{PHP._SERVER.HTTP_REFERER}">{PHP.L.golink_not_go}</a>
			</p>
		</div>
	<script>			
        var second={PHP.cfg.plugin.golink.golink_timer};
        function gotimer()
        {
          if(second<=9){second="0" + second;}
          if(document.getElementById){timer.innerHTML=second;}
          if(second==00){return false;}
          second--;
          setTimeout("gotimer()", 1000);
        }
	</script>
                
	</body>

</html>
<!-- END: MAIN -->