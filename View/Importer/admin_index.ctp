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

/** ICONS **/
.modal .aim a { background-image: url(../img/accounts/aim.png); }
.modal .android a { background-image: url(../img/accounts/android.png); }
.modal .aol a { background-image: url(../img/accounts/aol.png); }
.modal .apple a { background-image: url(../img/accounts/apple.png); }
.modal .behance a { background-image: url(../img/accounts/behance.png); }
.modal .blogger a { background-image: url(../img/accounts/blogger.png); }
.modal .codaset a { background-image: url(../img/accounts/codaset.png); }
.modal .delicious a { background-image: url(../img/accounts/delicious.png); }
.modal .deviantart a { background-image: url(../img/accounts/deviantart.png); }
.modal .digg a { background-image: url(../img/accounts/digg.png); }
.modal .dribbble a { background-image: url(../img/accounts/dribbble.png); }
.modal .evernote a { background-image: url(../img/accounts/evernote.png); }
.modal .facebook a { background-image: url(../img/accounts/facebook.png); }
.modal .flickr a { background-image: url(../img/accounts/flickr-1.png); }
.modal .foursquare a { background-image: url(../img/accounts/foursquare.png); }
.modal .github a { background-image: url(../img/accounts/github.png); }
.modal .gmail a { background-image: url(../img/accounts/gmail.png); }
.modal .google a { background-image: url(../img/accounts/google.png); }
.modal .googlebuzz a { background-image: url(../img/accounts/googlebuzz.png); }
.modal .gtalk a { background-image: url(../img/accounts/gtalk.png); }
.modal .jsfiddle a { background-image: url(../img/accounts/jsfiddle.png); }
.modal .instagram a { background-image: url(../img/accounts/instagram.png); }
.modal .lastfm a { background-image: url(../img/accounts/lastfm.png); }
.modal .linkedin a { background-image: url(../img/accounts/linkedin.png); }
.modal .pandora a { background-image: url(../img/accounts/pandora.png); }
.modal .photobucket a { background-image: url(../img/accounts/photobucket.png); }
.modal .picasa a { background-image: url(../img/accounts/picasa.png); }
.modal .skype a { background-image: url(../img/accounts/skype.png); }
.modal .spotify a { background-image: url(../img/accounts/spotify.png); }
.modal .stumbleupon a { background-image: url(../img/accounts/stumbleupon.png); }
.modal .twitter a { background-image: url(../img/accounts/twitter.png); }
.modal .vimeo a { background-image: url(../img/accounts/vimeo.png); }
.modal .wordpress a { background-image: url(../img/accounts/wordpress.png); }
.modal .yahoo a { background-image: url(../img/accounts/yahoo.png); }
.modal .yelp a { background-image: url(../img/accounts/yelp.png); }
.modal .youtube a { background-image: url(../img/accounts/youtube.png); }
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
<div class="modal">
	<h2>Select an Account</h2>
	<div>
		<h3>Projects</h3>
		<ul>
			<li class="github"><?php echo $this->Html->link('Github', array('action' => 'add', 'github')); ?></li>
			<li class="google"><?php echo $this->Html->link('Google Code', array('action' => 'add', 'googlecode')); ?></li>
			<li class="basecamp"><?php echo $this->Html->link('BaseCamp', array('action' => 'add', 'basecamp')); ?></li>
			<li class="asana"><?php echo $this->Html->link('Asana', array('action' => 'add', 'asana')); ?></li>
		</ul>
	
		<h3>Media</h3>
		<ul>
			<li class="instagram"><?php echo $this->Html->link('Instagram', array('action' => 'add', 'instagram')); ?></li>
			<li class="flickr"><?php echo $this->Html->link('Flickr', array('action' => 'add', 'flickr')); ?></li>
			<li class="deviantart"><?php echo $this->Html->link('DeviantArt', array('action' => 'add', 'deviantart')); ?></li>
			<li class="youtube"><?php echo $this->Html->link('YouTube', array('action' => 'add', 'youtube')); ?></li>
			<li class="vimeo"><?php echo $this->Html->link('Vimeo', array('action' => 'add', 'vimeo')); ?></li>
			<li class="behance"><?php echo $this->Html->link('Behance', array('action' => 'add', 'behance')); ?></li>
		</ul>

		<h3>Bookmarks</h3>
		<ul>
			<li class="jsfiddle"><?php echo $this->Html->link('JsFiddle', array('action' => 'add', 'jsfiddle')); ?></li>
			<li class="delicious"><?php echo $this->Html->link('Delicious', array('action' => 'add', 'delicious')); ?></li>
		</ul>
	
		<h3>Blogs</h3>
		<ul>
			<li class="wordpress"><?php echo $this->Html->link('RSS', array('action' => 'add', 'rss')); ?></li>
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