<script>
$(document).ready(function(){
	i = 0;
	$(".add-related").click(function(){
		content = '<fieldset>\
			<?php echo str_replace("\n", "\\\n", $this->Form->input('PostRelationship.@@.foreign_model', array(
				'label' => '<a href="#" class="icon-remove"></a> Related Section', 'class' => 'model', 'empty' => '-- Select One --'))) ?>\
			<?php echo str_replace("\n", "\\\n", $this->Form->input('PostRelationship.@@.foreign_key', array(
				'label' => 'Related Item', 'type' => 'select'))) ?>\
		</fieldset>';
		content = content.replace(/@@/g, i);
		$(".related").append(content).find("fieldset").slideDown(300);
		i++;
		return false;
	});
	$(".related .icon-remove").live("click", function(){
		$(this).closest("fieldset").remove();
		return false;
	});
	$(".related .model").live("change", function(){
		$this = $(this);
		$.getJSON('<?php echo $this->Html->url(array('action' => 'related'))?>/' + $(this).val() + '.json', function(data) {
			var items = [];
			items.push('<option value="">-- Select One --</option>');
			$.each(data['items'], function(key, val) {
				items.push('<option value="' + key + '">' + val + '</option>');
			});
			$this.closest('div').next('div').find('select').html(items.join(''));
		});
	});
});
</script>