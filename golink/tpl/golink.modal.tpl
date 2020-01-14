<!-- BEGIN: MAIN -->
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex nofollow">
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
                </style>
	</head>
	<body>
		<div id="golinkwrap">
			<div>
				<h1>
					{PHP.L.golink_go_info}
				</h1>
				<div class="warning italic">
					<img src="{PHP.cfg.plugins_dir}/golink/tpl/gotimer.gif" alt="">
                     {PHP.L.golink_warning}
					<div class="clr"></div>
				</div>
				         <p>
 
						<a href="{PHP._SERVER.HTTP_REFERER}">{PHP.L.golink_not_go}</a>
						<a href="{PHP.cat_url}">{PHP.L.golink_go}</a>
					</p>
				<p>
					{PHP.L.golink_comeback}
				</p>
			</div>
		</div>
	</body>

</html>
<!-- END: MAIN -->