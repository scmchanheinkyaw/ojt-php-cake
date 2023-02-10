<div class="row">
<div class="column-responsive column-100">
        <div class="students form content">
<?php
echo $this->Html->css('style');
$myTemplates = [
    'error' => '<div class="text-danger">{{content}}</div>',
];
$this->Form->setTemplates($myTemplates);
?>
            <?=$this->Form->create($user, ['type' => 'post'])?>
            <fieldset>
                <legend><?=__('Please Register')?></legend>
<?php
echo $this->Form->control('name');
echo $this->Form->control('email');
echo $this->Form->control('phone');
echo $this->Form->control('password');
?>
            </fieldset>
            <?=$this->Form->button(__('Submit'))?>
            <?=$this->Form->end()?>
        </div>
    </div>
</div>
