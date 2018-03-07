<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="profile-user-info profile-user-info-striped">

<?php
echo '<div class="profile-info-row">';
echo '<div class="profile-info-name">';
echo "<?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:";
echo '</div>';
echo '<div class="profile-info-value">';
echo '<span style="display: inline;">';
echo "\t<?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}), array('view', 'id'=>\$data->{$this->tableSchema->primaryKey})); ?>\n\t</span>\n\n";
echo '</div>';
echo '</div>';
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if($column->isPrimaryKey)
		continue;
	if(++$count==7)
		echo "\t<?php /*\n";
		echo '<div class="profile-info-row">';
		echo '<div class="profile-info-name">';
		echo "<?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:";
		echo '</div>';
		echo '<div class="profile-info-value">';
		echo '<span style="display: inline;">';
		echo "\t<?php echo CHtml::encode(\$data->{$column->name}); ?>\n\t</span>\n\n";
		echo '</div>';
		echo '</div>';
}
if($count>=7)
	echo "\t*/ ?>\n";
?>

</div>