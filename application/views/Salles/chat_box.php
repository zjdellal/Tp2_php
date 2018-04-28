
<head>
	<link rel="stylesheet" type="text/css" href=<?=base_url("css/style_chat_box.css" )?>/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<h2>Chat Messages</h2>

<div class="container">
	<img src="" alt="Avatar" style="width:100%;">
	<p>Hello. How are you today?</p>
	<span class="time-right"><?= date(DATE_RFC822, now('America/Toronto'));?></span>
</div>

<div class="container darker">
	<img src="" alt="Avatar" class="right" style="width:100%;">
	<p>Hey! I'm fine. Thanks for asking!</p>
	<span class="time-left">11:01</span>
</div>

<div class="container">
	<img src="" alt="Avatar" style="width:100%;">
	<p>Sweet! So, what do you wanna do today?</p>
	<span class="time-right">11:02</span>
</div>

<div class="container darker">
	<img src="" alt="Avatar" style="width:100%;">
	<p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
	<span class="time-left">11:05</span>
</div>


