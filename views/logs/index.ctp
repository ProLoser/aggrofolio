<div class="log">
	<h2><?php __('Aggropholio Activity Feed'); ?></h2>
	<ul>
	<?php foreach ($logs as $log) : ?>
		<li>
			<span style="<?php echo $this->Log->stylize($log['Log']['model'])?>"><?php echo Inflector::humanize(Inflector::underscore($log['Log']['model']))?></span>
			<?php echo $this->Html->link($log['Log']['title'], array('controller' => Inflector::tableize($log['Log']['model']), 'action' => 'view', $log['Log']['model_id'])); ?>
			was <?php echo $actions[$log['Log']['action']]?> <?php echo $this->Time->timeAgoInWords($log['Log']['created']); ?>
			<?php if (!empty($log['MediaItem']['attachment_file_name']) || !empty($log[$log['Log']['model']]['description'])): ?>
				<div>
					<?php echo $log[$log['Log']['model']]['description']?>
					<?php
						if ($log['Log']['model'] == 'MediaItem')
					 		$file = $log['MediaItem'];
						if ($log['Log']['model'] == 'Project' && !empty($log['Project']['MediaItem']))
							$file = $log['Project']['MediaItem'][0];
						if (isset($file))
							echo $this->Html->image('/uploads/thumb-' . $file['attachment_file_name'])
					?>
				</div>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
	</ul>
</div>