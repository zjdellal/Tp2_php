
<head>
	<link rel="stylesheet" type="text/css" href=<?=base_url('assets/css/StyleChat.css')?> />

</head>

<h2>Chat Messages</h2>
<div class="container">
	<img src=<?=base_url('assets//images/avatar_1')?>  >
	<h2><?=form_label('user', 'nom_utilisateur')?></h2>
	<div class="msg_div_lecture">
		<p>Hello. How are you today?</p>
	</div>
	<span class="time-right"><?= date(DATE_RFC822, now('America/Toronto'));?></span>
</div>

<div class="container darker">
	<img src=<?=base_url('assets//images/avatar_f')?>   class="right" >
	<h2> <?=form_label('user', 'nom_utilisateur')?></h2>
	<div class="msg_div_ecrire">
		<p>Hey! I'm fine. Thanks for asking!</p>
	</div>
	<span class="time-left"><?= date(DATE_RFC822, now('America/Toronto'));?></span>
</div>

<div class="espace_chat">
	<?=form_open(base_url('Conversation/ajouteMessage'));?>
	<?php echo form_fieldset('Chater');?>
 	<?php $message_chat = array(
			'type' => 'textarea',
			'id' => 'description',
			'name' => 'description',
			'cols'=>'40',
			'rows'=>'4',
			'placeholder' => '   Chater ici  .....',

		);
 	echo form_textarea($message_chat);
 	echo form_submit('Chater','chater');
 	echo form_fieldset_close();
 	echo form_close()?>


</div>

