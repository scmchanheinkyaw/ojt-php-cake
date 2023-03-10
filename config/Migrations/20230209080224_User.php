<?php
declare (strict_types = 1);

use Migrations\AbstractMigration;

class User extends AbstractMigration
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
        $studentTable = $this->table('users');
        $studentTable->addColumn('name', 'string');
        $studentTable->addColumn('email', 'string');
        $studentTable->addColumn('phone', 'string');
        $studentTable->addColumn('password', 'string');
        $studentTable->create();
    }
}
