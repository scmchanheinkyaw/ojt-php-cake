<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $student
 */
?>
<div class="row">
<div class="column-responsive column-100">
        <div class="students form content">
            <?=$this->Form->create($student, ['type' => 'file'])?>
            <fieldset>
                <legend><?=__('Add Student')?></legend>
<?php
echo @$this->Form->control('file', ['type' => 'file', 'label' => 'Student Photo']);
echo $this->Form->control('name');
echo $this->Form->control('email');
echo $this->Form->control('phone');
?>
            </fieldset>
            <?=$this->Form->button(__('Submit'))?>
            <?=$this->Form->end()?>
        </div>
    </div>
</div>
