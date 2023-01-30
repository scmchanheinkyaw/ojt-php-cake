<?php
declare (strict_types = 1);

use Migrations\AbstractMigration;

class Major extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $majorTable = $this->table('majors');
        $majorTable->addColumn('name', 'string');
        $majorTable->create();
    }
}
