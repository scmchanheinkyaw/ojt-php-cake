<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $students
 */
?>
<div class="students index content">
    <?=$this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'button float-right'])?>
    <h3><?=__('Students')?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Image</th>
                    <th>phone</th>
                    <th class="actions"><?=__('Actions')?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?=$student->id?></td>
                    <td><?=$student->name?></td>
                    <td><?=$student->email?></td>
                    <td><?=$this->Html->image($student->image, ['style' => 'width:100px; height:50px;'])?></td>
                    <td><?=$student->phone?></td>
                    <td class="actions">
                        <?=$this->Html->link(__('View'), ['action' => 'view', $student->id])?>
                        <?=$this->Html->link(__('Edit'), ['action' => 'edit', $student->id])?>
                        <?=$this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)])?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
