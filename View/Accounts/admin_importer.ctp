<style>
#sidebar {
	display: none;
}
section#main {
	width: 100%;
}
.timeline header {
	position: fixed;
	top: 0;
	left: 0;
	background: white;
	width: 100%;
	text-align: center;
}
.timeline header ul {
	overflow: hidden;
	list-style: none;
	margin: 10px 0;
	padding: 0;
}
.timeline header li {
	float: left;
	width: 25%;
	margin: 0;
	padding: 0;
}
div.timeline {
	overflow: hidden;
	height: 1000px;
}
div.timeline ul {
	width: 25%;
	height: 100%;
	float: left;
	margin: 10px 0;
	padding: 0;
}
div.timeline li {
	margin: 5px 20px;
}
.modal {
	position: fixed;
	top: 50%;
	left: 50%;
	width: 500px;
	height: 400px;
	margin-left: -260px;
	margin-top: -210px;
	background: white;
	border-radius: 10px;
	padding: 10px;
	box-shadow: 0 0 10px rgba(0,0,0,.5);
	text-align: center;
}
.modal ul {
	margin: 0;
	padding: 0;
}
.modal li {
	display: inline-block;
	margin: 10px;
}
.modal a {
	background: no-repeat 50% 0;
	display: inline-block;
	padding-top: 40px;
	vertical-align: top;
	min-width: 32px;
}
.modal h3 {
	box-shadow:  0 0px 15px -4px rgba(0, 0, 0, .5);
	padding: 5px;
}
.modal div {
	overflow: auto;
	height: 330px;
	padding: 10px 0;
}
<?php $base = Router::url('/img/accounts/');?>
/** ICONS **/
.modal .aim a { background-image: url(<?= $base?>aim.png); }
.modal .android a { background-image: url(<?= $base?>android.png); }
.modal .aol a { background-image: url(<?= $base?>aol.png); }
.modal .apple a { background-image: url(<?= $base?>apple.png); }
.modal .asana a { background-image: url(<?= $base?>asana.png); }
.modal .basecamp a { background-image: url(<?= $base?>basecamp.png); }
.modal .behance a { background-image: url(<?= $base?>behance.png); }
.modal .blogger a { background-image: url(<?= $base?>blogger.png); }
.modal .codaset a { background-image: url(<?= $base?>codaset.png); }
.modal .delicious a { background-image: url(<?= $base?>delicious.png); }
.modal .deviantart a { background-image: url(<?= $base?>deviantart.png); }
.modal .digg a { background-image: url(<?= $base?>digg.png); }
.modal .dribbble a { background-image: url(<?= $base?>dribbble.png); }
.modal .evernote a { background-image: url(<?= $base?>evernote.png); }
.modal .facebook a { background-image: url(<?= $base?>facebook.png); }
.modal .flickr a { background-image: url(<?= $base?>flickr-1.png); }
.modal .foursquare a { background-image: url(<?= $base?>foursquare.png); }
.modal .github a { background-image: url(<?= $base?>github.png); }
.modal .gmail a { background-image: url(<?= $base?>gmail.png); }
.modal .google a { background-image: url(<?= $base?>google.png); }
.modal .googlebuzz a { background-image: url(<?= $base?>googlebuzz.png); }
.modal .gtalk a { background-image: url(<?= $base?>gtalk.png); }
.modal .jsfiddle a { background-image: url(<?= $base?>jsfiddle.png); }
.modal .instagram a { background-image: url(<?= $base?>instagram.png); }
.modal .lastfm a { background-image: url(<?= $base?>lastfm.png); }
.modal .linkedin a { background-image: url(<?= $base?>linkedin.png); }
.modal .pandora a { background-image: url(<?= $base?>pandora.png); }
.modal .photobucket a { background-image: url(<?= $base?>photobucket.png); }
.modal .picasa a { background-image: url(<?= $base?>picasa.png); }
.modal .rss a { background-image: url(<?= $base?>rss.png); }
.modal .skype a { background-image: url(<?= $base?>skype.png); }
.modal .spotify a { background-image: url(<?= $base?>spotify.png); }
.modal .stumbleupon a { background-image: url(<?= $base?>stumbleupon.png); }
.modal .twitter a { background-image: url(<?= $base?>twitter.png); }
.modal .tumblr a { background-image: url(<?= $base?>tumblr.png); }
.modal .vimeo a { background-image: url(<?= $base?>vimeo.png); }
.modal .wordpress a { background-image: url(<?= $base?>wordpress.png); }
.modal .yahoo a { background-image: url(<?= $base?>yahoo.png); }
.modal .yelp a { background-image: url(<?= $base?>yelp.png); }
.modal .youtube a { background-image: url(<?= $base?>youtube.png); }
</style>
<header class="timeline">
	<h2>Sections</h2>
	<ul>
		<li>Experience</li>
		<li>Projects</li>
		<li>Media</li>
		<li>Posts</li>
	</ul>
</header>
<?php if (!empty($account)): ?>
<div class="modal">
	<h2>Scan Account</h2>
	<div>
		<?php echo $this->Form->create('Account'); ?>
			<?php echo $this->Form->input('Account.published', array('label' => 'Auto-Publish New Content')); ?>
			<?php debug($account); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
<?php endif ?>
<div class="modal">
	<h2>Select an Account</h2>
	<div>
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
			<li class="forrst"><?php echo $this->Html->link('Forrst', array('action' => 'connect', 'forrst')); ?></li>
		</ul>

		<h3>Bookmarks</h3>
		<ul>
			<li class="jsfiddle"><?php echo $this->Html->link('JsFiddle', array('action' => 'connect', 'jsfiddle')); ?></li>
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
</div>
<div class="timeline">
	<ul id="experience">
	<?php foreach ($schools as $id => $school): ?>
		<li><?php echo $school; ?></li>
	<?php endforeach ?>
	<?php foreach ($works as $id => $work): ?>
		<li><?php echo $work; ?></li>
	<?php endforeach ?>
	</ul>
	<ul id="projects">
	<?php foreach ($projects as $id => $project): ?>
		<li><?php echo $project; ?></li>
	<?php endforeach ?>
	</ul>
	<ul id="media">
	<?php foreach ($mediaItems as $id => $item): ?>
		<li><?php echo $item; ?></li>
	<?php endforeach ?>
	</ul>
	<ul id="posts">
	<?php foreach ($posts as $id => $post): ?>
		<li><?php echo $post; ?></li>
	<?php endforeach ?>
	</ul>
</div>