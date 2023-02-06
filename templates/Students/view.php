<div class="row">
    <div class="column-responsive column-100">
        <div class="students view content">
            <h3><?=$student->name?></h3>
            <table>
                <tr>
                    <th><?=__('Name')?></th>
                    <td><?=$student->name?></td>
                </tr>
                <tr>
                    <th><?=__('Major')?></th>
                    <td><?=$student->major->name?></td>
                </tr>
                <tr>
                    <th><?=__('Email')?></th>
                    <td><?=$student->email?></td>
                </tr>
                <tr>
                    <th><?=__('Id')?></th>
                    <td><?=$student->id?></td>
                </tr>
                <tr>
                    <th><?=__('Phone')?></th>
                    <td><?=$student->phone?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
