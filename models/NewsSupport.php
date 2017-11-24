<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\news\models;

use Yii;
use yuncms\support\models\Support;
use yuncms\news\jobs\UpdateCounterJob;
use yuncms\support\models\SupportQuery;

/**
 * Class NewsSupport
 * @package yuncms\news\models
 */
class NewsSupport extends Support
{
    const TYPE = 'yuncms\news\models\News';

    /**
     * @return void
     */
    public function init()
    {
        $this->model_class = self::TYPE;
        parent::init();
    }

    /**
     * @return SupportQuery
     */
    public static function find()
    {
        return new SupportQuery(get_called_class(), ['model_class' => self::TYPE, 'tableName' => self::tableName()]);
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->model_class = self::TYPE;
        Yii::$app->queue->push(new UpdateCounterJob(['id' => $this->model_id, 'field' => 'supports', 'counter' => 1]));
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function afterDelete()
    {
        Yii::$app->queue->push(new UpdateCounterJob(['id' => $this->model_id, 'field' => 'supports', 'counter' => -1]));
        parent::afterDelete();
    }
}