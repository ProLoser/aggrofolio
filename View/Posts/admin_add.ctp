<?php $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function(){
	$("#PostSubject").bind('change keyup',function(){
		if ($("#PostSlug").is(':disabled')) {
			content = $(this).val();
			$("#PostSlug").val(content.replace(/([^\w\d-]+)/g, "-"));
		}
	});
	$("#PostSlug").closest("div").click(function(){
		$(".PostSlug").removeClass("PostSlug").find("#PostSlug").removeAttr("disabled");
	});
	$("form").submit(function(){
		$("#PostSlug").removeAttr("disabled");
	})
});
<?php $this->Html->scriptEnd(); ?>
<style type="text/css">
.PostSlug, .PostSlug label, .PostSlug input {
cursor: pointer;
}
</style>
<header>
	<hgroup>
		<h1>Add Post</h1>
	</hgroup>
</header>
<article class="posts form">
	<header>
		<h3>Add Post</h3>
		<ul>
			<li><a href="#" class="add-related">Add Related</a></li>
		</ul>
	</header>
<?php echo $this->Form->create('Post');?>
	<fieldset>
	<?php
		echo $this->Form->input('Post.subject');
		echo $this->Form->input('Post.slug', array('disabled' => true, 'div' => array('class' => 'PostSlug input')));
		echo $this->Form->input('Post.body');
		echo $this->Form->input('Post.published');
		echo $this->Form->input('Post.post_category_id', array('empty' => '-- None --'));
	?>
	</fieldset>
	<?php echo $this->element('related'); ?>
	<footer>
		<ul>
			<li><a href="#" class="add-related">Add Related</a></li>
		</ul>
		<?php echo $this->Form->submit('Submit'); ?>
</footer>
<?php echo $this->Form->end();?>
</article>