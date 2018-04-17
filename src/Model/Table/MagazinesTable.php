<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Magazines Model
 *
 * @property \App\Model\Table\NotesTable|\Cake\ORM\Association\HasMany $Notes
 *
 * @method \App\Model\Entity\Magazine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Magazine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Magazine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Magazine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Magazine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Magazine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Magazine findOrCreate($search, callable $callback = null, $options = [])
 */
class MagazinesTable extends Table
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

        $this->setTable('magazines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Notes', [
            'foreignKey' => 'magazine_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('numero')
            ->allowEmpty('numero');

        return $validator;
    }
}
