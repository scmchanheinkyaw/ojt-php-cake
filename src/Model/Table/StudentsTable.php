<?php
declare (strict_types = 1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @method \App\Model\Entity\Student newEmptyEntity()
 * @method \App\Model\Entity\Student newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StudentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('students');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Majors', [
            'foreignKey' => 'major_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationStore(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name')
            ->notEmptyString('name');

        $validator
            ->integer('major_id')
            ->requirePresence('major_id')
            ->notEmptyString('major_id');

        $validator
            ->email('email')
            ->requirePresence('email')
            ->notEmptyString('email');

        $validator
            ->integer('phone')
            ->requirePresence('phone')
            ->notEmptyString('phone');

        $validator
            ->allowEmptyFile('file')
            ->notEmptyString('file')
            ->add('file', [
                'mimeType' => [
                    'rule' => ['mimeType', ['image/jpg', 'image/png', 'image/jpeg']],
                    'message' => 'Please upload only jpg,jpeg and png.',

                ],
                'filesize' => [
                    'rule' => ['filesize', '<=', '1MB'],
                    'message' => 'Image file size must be less than 1MB.',
                ],
            ]);

        return $validator;
    }

    public function validationUpdate(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email')
            ->notEmptyString('email');

        $validator
            ->integer('phone')
            ->requirePresence('phone')
            ->notEmptyString('phone');

        $validator
            ->integer('major_id')
            ->requirePresence('major_id')
            ->notEmptyString('major_id');

        $validator
            ->allowEmptyFile('file')
            ->add('file', [
                'mimeType' => [
                    'rule' => ['mimeType', ['image/jpg', 'image/png', 'image/jpeg']],
                    'message' => 'Please upload only jpg,jpeg and png.',

                ],
                'filesize' => [
                    'rule' => ['filesize', '<=', '1MB'],
                    'message' => 'Image file size must be less than 1MB.',
                ],
            ]);

        return $validator;
    }
}
