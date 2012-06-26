<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo __('Moderate Comments'); ?>
	</h3>
</div>
<div class="modal-body">
	<?php foreach ($comments as $i => $comment): ?>
			<h3>
				<?php echo $this->Html->link('', array('action' => 'delete', $comment['Comment']['id']), array('escape' => false, 'class' => 'icon-trash', 'title' => __('Remove')), sprintf(__('Are you sure you want to delete # %s?'), $comment['Comment']['id'])); ?>
				<?php echo $comment['Comment']['subject']; ?>
			</h3>
			<pre><?php echo $comment['Comment']['body']; ?></pre>
	<?php endforeach; ?>
</div>
<div class="modal-footer">
	<?php $page = (isset($this->params['named']['page'])) ? $this->params['named']['page'] : 1; ?>
	<ul class="pager">
		<?php if ($page > 1): ?>
			<li class="previous"><?php echo $this->Html->link('&larr; Older', array('page' => $page-1),array('escape' => false, 'class' => 'ajax'));?></li>
		<?php else: ?>
			<li class="previous disabled"><a>&larr; Older</a></li>
		<?php endif; ?>
		<li class="disabled"><a><?php echo $this->Paginator->current();?></a></li>
		<li class="next"><?php echo $this->Html->link('Newer &rarr;', array('page' => $page+1),array('escape' => false, 'class' => 'ajax'));?></li>
	</ul>
</div>