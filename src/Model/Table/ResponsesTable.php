<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Responses Model
 *
 * @property \App\Model\Table\RequestsTable|\Cake\ORM\Association\HasMany $Requests
 *
 * @method \App\Model\Entity\Response get($primaryKey, $options = [])
 * @method \App\Model\Entity\Response newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Response[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Response|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Response saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Response patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Response[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Response findOrCreate($search, callable $callback = null, $options = [])
 */
class ResponsesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('responses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Requests', [
            'foreignKey' => 'response_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('message')
            ->maxLength('message', 255)
            ->allowEmptyString('message');

        $validator
            ->integer('x1')
            ->allowEmptyString('x1');

        $validator
            ->integer('x2')
            ->allowEmptyString('x2');

        return $validator;
    }
}
