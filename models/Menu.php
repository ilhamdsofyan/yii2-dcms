<?php

namespace docotel\dcms\models;

use Yii;
use docotel\dcms\components\Configs;
use yii\db\Query;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id Menu id(autoincrement)
 * @property string $name Menu name
 * @property integer $parent Menu parent
 * @property string $route Route for this menu
 * @property integer $order Menu order
 * @property string $data Extra information for this menu
 *
 * @property Menu $menuParent Menu parent
 * @property Menu[] $menus Menu children
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Menu extends \yii\db\ActiveRecord
{
    public $parent_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->menuTable;
    }

    /**
     * @inheritdoc
     */
    public static function getDb()
    {
        if (Configs::instance()->db !== null) {
            return Configs::instance()->db;
        } else {
            return parent::getDb();
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label','menu_type'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => Yii::t('rbac-dcms', 'ID'),
            'label' => Yii::t('rbac-dcms', 'Menu Name'),
            'description' => Yii::t('rbac-dcms', 'Description'),
            'menu_custom' => Yii::t('rbac-dcms', 'Is Custom'),
            'menu_type' => Yii::t('rbac-dcms', 'Menu Type (Category)'),
            'menu_parent' => Yii::t('rbac-dcms', 'Parent Menu'),
            'menu_order' => Yii::t('rbac-dcms', 'Menu Order'),
            'menu_url' => Yii::t('rbac-dcms', 'URL'),
            'class' => Yii::t('rbac-dcms', 'Class'),
            'status' => Yii::t('rbac-dcms', 'Status'),
        ];
    }

    public function getMenuGroups()
    {
        return $this->hasMany(MenuGroup::className(), ['menu_id' => 'menu_id']);
    }
}
