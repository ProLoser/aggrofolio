<?php echo $this->Form->create('Account'); ?>
	<header class="timeline">
		<h2>
			Sections <a href="#" id="import">[Import]</a>
			<?php if (!empty($this->request->data)): ?>
			 - Imported <?php echo $this->Form->value('Account.type');?> - <?php echo $this->Form->value('Account.username');?>
			<?php endif ?>
		</h2>

		<?php if (!empty($this->request->data)): ?>
			<?php echo $this->Form->input('Account.id'); ?>
			<?php echo $this->Form->input('Account.published', array('label' => 'Auto-Publish New Content')); ?>
			<?php if (!empty($this->request->data['Resume'])):?>
				<h3>Save the new Resume details</h3>
				<?php echo $this->Form->input('Resume.id')?>
				<?php echo $this->Form->input('Resume.published')?>
				<?php echo $this->Form->input('Resume.purpose')?>
			<?php endif; ?>
		<?php endif ?>

		<ul>
			<li>Experience</li>
			<li>Projects</li>
			<li>Media</li>
			<li>Posts</li>
		</ul>
	</header>
	<div class="modal">
		<h2>Select an Account <a href="#" class="close">[X]</a></h2>
		<div>
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

		<?php if (!empty($this->request->data['ResumeSchool'])): ?>
			<?php foreach ($this->request->data['ResumeSchool'] as $i => $school):
				unset($schools[$school['id']]);
			?>
				<li>
					<?php echo $this->Form->input("ResumeSchool.$i.id");?>
					<?php echo $this->Form->input("ResumeSchool.$i.name"); ?>
					<?php echo $this->Form->input("ResumeSchool.$i.published"); ?>
					<?php echo $this->Html->link('[Edit]', array('controller' => 'resume_schools', 'action' => 'edit', $school['id']));?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($schools as $id => $school): ?>
			<li><?php echo $school; ?> <?php echo $this->Html->link('[Edit]', array('controller' => 'resume_schools','action' => 'edit',$id));?></li>
		<?php endforeach ?>

		<?php if (!empty($this->request->data['ResumeEmployer'])): ?>
			<?php foreach ($this->request->data['ResumeEmployer'] as $i => $work):
				unset($works[$work['id']]);
			?>
				<li>
					<?php echo $this->Form->input("ResumeEmployer.$i.id");?>
					<?php echo $this->Form->input("ResumeEmployer.$i.name"); ?>
					<?php echo $this->Form->input("ResumeEmployer.$i.published"); ?>
					<?php echo $this->Html->link('[Edit]', array('controller' => 'resume_employers', 'action' => 'edit', $work['id']));?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($works as $id => $work): ?>
			<li><?php echo $work; ?> <?php echo $this->Html->link('[Edit]', array('controller' => 'resume_employers','action' => 'edit',$id));?></li>
		<?php endforeach ?>

		</ul>
		<ul id="projects">

		<?php if (!empty($this->request->data['Project'])): ?>
			<?php foreach ($this->request->data['Project'] as $i => $project):
				unset($projects[$project['id']]);
			?>
				<li>
					<?php echo $this->Form->input("Project.$i.id");?>
					<?php echo $this->Form->input("Project.$i.name"); ?>
					<?php echo $this->Form->input("Project.$i.published"); ?>
					<?php echo $this->Html->link('[Edit]', array('controller' => 'projects', 'action' => 'edit', $project['id']));?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($projects as $id => $project): ?>
			<li><?php echo $project ?> <?php echo $this->Html->link('[Edit]', array('controller' => 'projects','action' => 'edit',$id));?></li>
		<?php endforeach ?>

		</ul>

		<ul id="albums">

		<?php if (!empty($this->request->data['Album'])): ?>
			<?php foreach ($this->request->data['Album'] as $i => $album):
				unset($album[$album['id']]);
			?>
				<li>
					<?php echo $this->Form->input("Album.$i.id");?>
					<?php echo $this->Form->input("Album.$i.name"); ?>
					<?php echo $this->Form->input("Album.$i.published"); ?>
					<?php echo $this->Html->link('[Scan]', array('controller' => 'media_items', 'action' => 'scan', $album['id'])); ?>
					<?php echo $this->Html->link('[Edit]', array('controller' => 'albums', 'action' => 'edit', $album['id']));?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($albums as $id => $album): ?>
			<li>
				<?php echo $album; ?>
				<?php echo $this->Html->link('[Scan]', array('controller' => 'media_items','action' => 'scan',$id));?>
				<?php echo $this->Html->link('[Edit]', array('controller' => 'albums','action' => 'edit',$id));?>
			</li>
		<?php endforeach ?>

		</ul>

		<ul id="media">

		<?php if (!empty($this->request->data['MediaItem'])): ?>
			<?php foreach ($this->request->data['MediaItem'] as $i => $item):
				unset($mediaItems[$item['id']]);
			?>
				<li>
					<?php echo $this->Form->input("MediaItem.$i.id");?>
					<?php echo $this->Form->input("MediaItem.$i.name"); ?>
					<?php echo $this->Form->input("MediaItem.$i.published"); ?>
					<?php echo $this->Html->link('[Edit]', array('controller' => 'media_items', 'action' => 'edit', $item['id']));?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($mediaItems as $id => $item): ?>
			<li><?php echo $item; ?> <?php echo $this->Html->link('[Edit]', array('controller' => 'media_items','action' => 'edit',$id));?></li>
		<?php endforeach ?>

		</ul>

		<ul id="posts">

		<?php if (!empty($this->request->data['Post'])): ?>
			<?php foreach ($this->request->data['Post'] as $i => $post):
				unset($posts[$post['id']]);
			?>
				<li>
					<?php echo $this->Form->input("Post.$i.id");?>
					<?php echo $this->Form->input("Post.$i.name"); ?>
					<?php echo $this->Form->input("Post.$i.published"); ?>
					<?php echo $this->Html->link('[Edit]', array('controller' => 'posts', 'action' => 'edit', $post['id']));?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($posts as $id => $post): ?>
			<li><?php echo $post; ?> <?php echo $this->Html->link('[Edit]', array('controller' => 'posts','action' => 'edit',$id));?></li>
		<?php endforeach ?>

		</ul>
	</div>
<?php echo $this->Form->end('Save Changes'); ?>
