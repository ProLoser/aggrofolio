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
						if ($log['Log']['model'] == 'MediaItem') {
							echo '<p>' . $this->Html->image('/uploads/thumb-' . $log['MediaItem']['attachment_file_name']) . '</p>';
						} elseif (!empty($log[$log['Log']['model']]['MediaItem'])) {
							echo '<p>';
							foreach ($log[$log['Log']['model']]['MediaItem'] as $item) {
								echo $this->Html->image('/uploads/thumb-' . $item['attachment_file_name']);
							}
							echo '</p>';
						}
					?>
				</div>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
	</ul>
</div>