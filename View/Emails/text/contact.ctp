== <?php echo $contact['Contact']['subject']?> == 

<?php echo $contact['Contact']['name']; ?> | <?php echo $contact['Contact']['email']; ?> | <?php echo $contact['Contact']['phone']; ?> 
 
<?php echo $this->Text->autoLink($contact['Contact']['message']); ?>