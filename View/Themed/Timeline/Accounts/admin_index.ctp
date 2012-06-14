<h2>Select an Account </h2>
<div class="overflow">
	<?php if (!empty($accounts)): ?>
		<h3>Existing Accounts</h3>
		<ul>
			<?php foreach ($accounts as $account): ?>
				<li class="<?php echo $account['Account']['type']?>"><?php echo $this->Html->link($account['Account']['username'], array($account['Account']['id'])); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif ?>
	<h3>Experience</h3>
	<ul>
		<li class="linkedin"><?php echo $this->Html->link('LinkedIn', array('action' => 'connect', 'linkedin')); ?></li>
		<li class="facebook"><?php echo $this->Html->link('Facebook', array('action' => 'connect', 'facebook')); ?></li>
	</ul>

	<h3>Projects</h3>
	<ul>
		<li class="github"><?php echo $this->Html->link('Github', array('action' => 'connect', 'github')); ?></li>
		<li class="google"><?php echo $this->Html->link('Google Code', array('action' => 'connect', 'googlecode')); ?></li>
		<li class="basecamp"><?php echo $this->Html->link('BaseCamp', array('action' => 'connect', 'basecamp')); ?></li>
		<li class="asana"><?php echo $this->Html->link('Asana', array('action' => 'connect', 'asana')); ?></li>
	</ul>

	<h3>Media</h3>
	<ul>
		<li class="instagram"><?php echo $this->Html->link('Instagram', array('action' => 'connect', 'instagram')); ?></li>
		<li class="flickr"><?php echo $this->Html->link('Flickr', array('action' => 'connect', 'flickr')); ?></li>
		<li class="picasa"><?php echo $this->Html->link('Picasa', array('action' => 'connect', 'picasa')); ?></li>
		<li class="deviantart"><?php echo $this->Html->link('DeviantArt', array('action' => 'connect', 'deviantart')); ?></li>
		<li class="youtube"><?php echo $this->Html->link('YouTube', array('action' => 'connect', 'youtube')); ?></li>
		<li class="vimeo"><?php echo $this->Html->link('Vimeo', array('action' => 'connect', 'vimeo')); ?></li>
		<li class="behance"><?php echo $this->Html->link('Behance', array('action' => 'connect', 'behance')); ?></li>
		<li class="dribbble"><?php echo $this->Html->link('Dribble', array('action' => 'connect', 'dribbble')); ?></li>
		<li class="photobucket"><?php echo $this->Html->link('Photobucket', array('action' => 'connect', 'photobucket')); ?></li>
		<li class="forrst"><?php echo $this->Html->link('Forrst', array('action' => 'connect', 'forrst')); ?></li>
	</ul>

	<h3>Bookmarks</h3>
	<ul>
		<li class="jsfiddle"><?php echo $this->Html->link('JsFiddle', array('action' => 'noauth', 'jsfiddle')); ?></li>
		<li class="delicious"><?php echo $this->Html->link('Delicious', array('action' => 'connect', 'delicious')); ?></li>
		<li class="stackoverflow"><?php echo $this->Html->link('Stack Overflow', array('action' => 'connect', 'stackoverflow')); ?></li>
	</ul>

	<h3>Blogs</h3>
	<ul>
		<li class="rss"><?php echo $this->Html->link('RSS', array('action' => 'connect', 'rss')); ?></li>
		<li class="wordpress"><?php echo $this->Html->link('Wordpress', array('action' => 'connect', 'wordpress')); ?></li>
		<li class="blogger"><?php echo $this->Html->link('Blogger', array('action' => 'connect', 'blogger')); ?></li>
		<li class="tumblr"><?php echo $this->Html->link('Tumblr', array('action' => 'connect', 'tumblr')); ?></li>
	</ul>
</div>