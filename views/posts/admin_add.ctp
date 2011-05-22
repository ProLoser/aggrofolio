<script type="text/javascript">
$(document).ready(function(){
	$("#PostSubject").bind('change keyup',function(){
		content = $(this).val();
		$("#PostSlug").val(content.replace(/([^\w\d-]+)/g, "-"));
	});
	$("#PostSlug").click(function(){
		alert();
		$(this).removeAttr('disabled');
	});
});
</script>
<style type="text/css">
#PostSlug {
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
		echo $this->Form->input('Post.slug', array('disabled' => true));
		echo $this->Form->input('Post.body');
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