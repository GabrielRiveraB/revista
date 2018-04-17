<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Note Entity
 *
 * @property int $id
 * @property string $name
 * @property string $subtitle
 * @property string $content
 * @property \Cake\I18n\FrozenDate $date
 * @property string $bullets
 * @property int $magazine_id
 * @property string $url
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Magazine $magazine
 */
class Note extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'subtitle' => true,
        'content' => true,
        'date' => true,
        'bullets' => true,
        'magazine_id' => true,
        'url' => true,
        'created' => true,
        'modified' => true,
        'magazine' => true
    ];
}
