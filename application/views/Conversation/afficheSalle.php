<?= form_open(base_url('index.php/Conversation/ajouteMessage')); ?>
<h2>Chat - <?= $nomSalle ?></h2>
<input type="hidden" name="salle" value="<?=$nomSalle?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/StyleChat.css') ?>"/>

<?php foreach ($messages as $message): ?>
	<div class="container">
		<img src=<?= base_url('assets/images/avatar_1.png') ?>>
		<h2><?= form_label($message['utilisateur'], 'nom_utilisateur') ?></h2>
		<div class="msg_div_lecture">
			<p><?= $message['message'] ?></p>
		</div>
		<span class="time-right"><?= $message['heure'] ?></span>
	</div>
<?php endforeach; ?>
<!--
<div class="container darker">
	<img src=<?= base_url('assets/images/avatar_f.png') ?>   class="right">
	<h2> <?= form_label('user', 'nom_utilisateur') ?></h2>
	<div class="msg_div_ecrire">
		<p>Hey! I'm fine. Thanks for asking!</p>
	</div>
	<span class="time-left"><?= date(DATE_RFC822, now('America/Toronto')); ?></span>
</div>
!-->


<div class="espace_chat">

	<?php echo form_fieldset('Chater'); ?>

	<?php
	$user = array(
		'type' => 'text',
		'name' => 'nom_user',
		'placeholder' => 'votre pseudo svp ',
		'value' => set_value('nom_user')
	);
	echo form_error('nom_user') .
		'<br/>';
	echo form_input($user);
	$message_chat = array(
		'type' => 'textarea',
		'id' => 'message',
		'name' => 'message',
		'cols' => '40',
		'rows' => '4',
		'placeholder' => '   Chater ici  .....',
		'value'=> set_value('message')

	);

	echo form_error('message') .'<br/>';
	echo form_textarea($message_chat);
	echo form_submit('Chater', 'chater');
	echo form_fieldset_close();


	echo form_close();


	?>

</div>
