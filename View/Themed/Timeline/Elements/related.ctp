<script>
$(document).ready(function(){
	i = 0;
	$(".add-related").click(function(){
		content = '<fieldset>\
			<a href="#" class="cancel">Cancel</a>\
			<?php echo str_replace("\n", "\\\n", $this->Form->input('PostRelationship.@@.foreign_model', array(
				'label' => 'Related Section', 'class' => 'model', 'empty' => '-- Select One --', 'div' => array('class' => 'input half select')
			))) ?>\
			<?php echo str_replace("\n", "\\\n", $this->Form->input('PostRelationship.@@.foreign_key', array(
				'label' => 'Related Item', 'type' => 'select', 'div' => array('class' => 'input half select')
			))) ?>\
		</fieldset>';
		content = content.replace(/@@/g, i);
		$(".related").append(content).find("fieldset").slideDown(300);
		i++;
		return false;
	});
	$(".related .cancel").live("click", function(){
		$(this).closest("fieldset").slideUp(300, function(){
			$(this).remove();
		});
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

<div class="related"></div>