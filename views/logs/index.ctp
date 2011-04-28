<?php $this->Plate->start('nav')?>
<h3>Navigation</h3>
<ul>
	<li><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Media', array('controller' => 'media_items', 'action' => 'index')); ?></li>
</ul>
<?php $this->Plate->stop()?>
<div class="log">
	<h2><?php __('Aggropholio Activity Feed'); ?></h2>
	<ul>
	<?php foreach ($logs as $log) : ?>
		<li>
			<span style="<?php echo $this->Log->stylize($log['Log']['model'])?>"><?php echo Inflector::humanize(Inflector::underscore($log['Log']['model']))?></span>
			<?php echo $this->Html->link($log['Log']['title'], array('controller' => Inflector::tableize($log['Log']['model']), 'action' => 'view', $log['Log']['model_id'])); ?>
			was <?php echo $actions[$log['Log']['action']]?> <?php echo $this->Time->timeAgoInWords($log['Log']['created']); ?>
		</li>
	<?php endforeach; ?>
	</ul>
</div>