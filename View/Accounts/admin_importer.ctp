<h1>
	Sections
	<?php echo $this->Html->link('<i class="icon-refresh icon-white"></i> Import', array('action' => 'index'), array('id' => 'import', 'class' => 'ajax btn btn-primary', 'escape' => false)); ?>
</h1>
<?php echo $this->Form->create('Account'); ?>
	<header class="timeline">

		<?php if (!empty($this->request->data)): ?>
			 Imported <?php echo $this->Form->value('Account.type');?> - <?php echo $this->Form->value('Account.username');?>
			<?php echo $this->Form->submit('Save Changes', array('div' => false));?>
		<?php endif ?>

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
			<li>
				<h3>
					Experience
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'resume_employers', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Projects
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'projects', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Albums
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'albums', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Media
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'media_items', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Posts
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'posts', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
		</ul>
	</header>

	<div class="timeline">
		<h3 ng-cloak class="well center ng-cloak" ng-show="empty(data.works) && empty(data.schools) && empty(data.albums) && empty(data.mediaItems) && empty(data.posts)">Click the <?php echo $this->Html->link('<i class="icon-refresh icon-white"></i> Import', array('action' => 'index'), array('id' => 'import', 'class' => 'ajax btn btn-primary', 'escape' => false)); ?> button to get started.</h3>
		<ul id="experience">
			<li ng-repeat="(i, work) in data.works">
				<a ng-click="toggle('ResumeEmployer', work.ResumeEmployer.id)" ng-show="resumeBuilder" class="icon-arrow-left" ng-class="{'icon-arrow-left':!resume['ResumeEmployer'][work.ResumeEmployer.id],'icon-arrow-right':resume['ResumeEmployer'][work.ResumeEmployer.id]}" href="" style="display: none; " data-original-title="Toggle from Resume"></a>
				<a href="/admin/resume_employers/delete/{{work.ResumeEmployer.id}}" class="icon-trash" onclick="return confirm('Are you sure you want to delete this?');" data-original-title="Delete"></a>
				<a href="/admin/resume_employers/edit/{{work.ResumeEmployer.id}}" class="ajax icon-pencil" data-original-title="Edit"></a>
				<a href="/admin/accounts/move/{{work.ResumeEmployer.id}}" class="icon-resize-vertical" data-original-title="Move"></a>
				<a ng-hide="work.ResumeEmployer.published" href="/admin/resume_employers/publish/{{work.ResumeEmployer.id}}" class="icon-eye-close" data-original-title="Publish"></a>
				<a ng-show="work.ResumeEmployer.published" href="/admin/resume_employers/publish/{{work.ResumeEmployer.id}}" class="icon-eye-open" data-original-title="Un-Publish"></a>
				{{work.ResumeEmployer.name}}
			</li>
			<li ng-repeat="(i, school) in data.schools">
				<a ng-click="toggle('ResumeSchool', school.ResumeSchool.id)" ng-show="resumeBuilder" class="icon-arrow-left" ng-class="{'icon-arrow-left':!resume['ResumeSchool'][school.ResumeSchool.id],'icon-arrow-right':resume['ResumeSchool'][school.ResumeSchool.id]}" href="" style="display: none; " data-original-title="Toggle from Resume"></a>
				<a href="/admin/resume_schools/delete/{{school.ResumeSchool.id}}" class="icon-trash" onclick="return confirm('Are you sure you want to delete this?');" data-original-title="Delete"></a>
				<a href="/admin/resume_schools/edit/{{school.ResumeSchool.id}}" class="ajax icon-pencil" data-original-title="Edit"></a>
				<a href="/admin/accounts/move/{{school.ResumeSchool.id}}" class="icon-resize-vertical" data-original-title="Move"></a>
				<a ng-hide="school.ResumeSchool.published" href="/admin/resume_schools/publish/{{school.ResumeSchool.id}}" class="icon-eye-close" data-original-title="Publish"></a>
				<a ng-show="school.ResumeSchool.published" href="/admin/resume_schools/publish/{{school.ResumeSchool.id}}" class="icon-eye-open" data-original-title="Un-Publish"></a>
				{{school.ResumeSchool.name}}
			</li>
		</ul>
		<ul id="projects">
			<li ng-repeat="(i, project) in data.projects">
				<a ng-click="toggle('Project', project.Project.id)" ng-show="resumeBuilder" class="icon-arrow-left" ng-class="{'icon-arrow-left':!resume['Project'][project.Project.id],'icon-arrow-right':resume['Project'][project.Project.id]}" href="" style="display: none; " data-original-title="Toggle from Resume"></a>
				<a href="/admin/projects/delete/{{project.Project.id}}" class="icon-trash" onclick="return confirm('Are you sure you want to delete this?');" data-original-title="Delete"></a>
				<a href="/admin/projects/edit/{{project.Project.id}}" class="ajax icon-pencil" data-original-title="Edit"></a>
				<a href="/admin/accounts/move/{{project.Project.id}}" class="icon-resize-vertical" data-original-title="Move"></a>
				<a ng-hide="project.Project.published" href="/admin/projects/publish/{{project.Project.id}}" class="icon-eye-close" data-original-title="Publish"></a>
				<a ng-show="project.Project.published" href="/admin/projects/publish/{{project.Project.id}}" class="icon-eye-open" data-original-title="Un-Publish"></a>
				{{project.Project.name}}
			</li>
		</ul>

		<ul id="albums">
			<li ng-repeat="(i, album) in data.albums">
				<a ng-click="toggle('Album', album.Album.id)" ng-show="resumeBuilder" class="icon-arrow-left" ng-class="{'icon-arrow-left':!resume['Album'][album.Album.id],'icon-arrow-right':resume['Album'][album.Album.id]}" href="" style="display: none; " data-original-title="Toggle from Resume"></a>
				<a href="/admin/albums/delete/{{album.Album.id}}" class="icon-trash" onclick="return confirm('Are you sure you want to delete this?');" data-original-title="Delete"></a>
				<a href="/admin/albums/edit/{{album.Album.id}}" class="ajax icon-pencil" data-original-title="Edit"></a>
				<a href="/admin/accounts/move/{{album.Album.id}}" class="icon-resize-vertical" data-original-title="Move"></a>
				<a ng-hide="album.Album.published" href="/admin/albums/publish/{{album.Album.id}}" class="icon-eye-close" data-original-title="Publish"></a>
				<a ng-show="album.Album.published" href="/admin/albums/publish/{{album.Album.id}}" class="icon-eye-open" data-original-title="Un-Publish"></a>
				{{album.Album.name}}
			</li>
		</ul>

		<ul id="media">
			<li ng-repeat="(i, mediaItem) in data.mediaItems">
				<a ng-click="toggle('MediaItem', mediaItem.id)" ng-show="resumeBuilder" class="icon-arrow-left" ng-class="{'icon-arrow-left':!resume['MediaItem'][mediaItem.MediaItem.id],'icon-arrow-right':resume['MediaItem'][mediaItem.MediaItem.id]}" href="" style="display: none; " data-original-title="Toggle from Resume"></a>
				<a href="/admin/media_items/delete/{{mediaItem.MediaItem.id}}" class="icon-trash" onclick="return confirm('Are you sure you want to delete this?');" data-original-title="Delete"></a>
				<a href="/admin/media_items/edit/{{mediaItem.MediaItem.id}}" class="ajax icon-pencil" data-original-title="Edit"></a>
				<a href="/admin/accounts/move/{{mediaItem.MediaItem.id}}" class="icon-resize-vertical" data-original-title="Move"></a>
				<a ng-hide="mediaItem.MediaItem.published" href="/admin/media_items/publish/{{mediaItem.MediaItem.id}}" class="icon-eye-close" data-original-title="Publish"></a>
				<a ng-show="mediaItem.MediaItem.published" href="/admin/media_items/publish/{{mediaItem.MediaItem.id}}" class="icon-eye-open" data-original-title="Un-Publish"></a>
				{{mediaItem.MediaItem.name}}
			</li>
		</ul>

		<ul id="posts">
			<li ng-repeat="(i, post) in data.posts">
				<a ng-click="toggle('Post', post.Post.id)" ng-show="resumeBuilder" class="icon-arrow-left" ng-class="{'icon-arrow-left':!resume['Post'][post.Post.id],'icon-arrow-right':resume['Project'][post.Post.id]}" href="" style="display: none; " data-original-title="Toggle from Resume"></a>
				<a href="/admin/posts/delete/{{post.Post.id}}" class="icon-trash" onclick="return confirm('Are you sure you want to delete this?');" data-original-title="Delete"></a>
				<a href="/admin/posts/edit/{{post.Post.id}}" class="ajax icon-pencil" data-original-title="Edit"></a>
				<a href="/admin/accounts/move/{{post.Post.id}}" class="icon-resize-vertical" data-original-title="Move"></a>
				<a ng-hide="post.Post.published" href="/admin/posts/publish/{{post.Post.id}}" class="icon-eye-close" data-original-title="Publish"></a>
				<a ng-show="post.Post.published" href="/admin/posts/publish/{{post.Post.id}}" class="icon-eye-open" data-original-title="Un-Publish"></a>
				{{post.Post.subject}}
			</li>
		</ul>
	</div>
<?php echo $this->Form->end(); ?>