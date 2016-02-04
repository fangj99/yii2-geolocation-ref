<?php
namespace geolocation\components;

use Yii;
use yii\db\ActiveRecord;
use yii\base\ErrorException;

use geolocation\GeoLocation;

class CommonRecord extends ActiveRecord
{
    public static function getDb() {
//        return Yii::$app->db_common;
        $instance = GeoLocation::getInstance();
        if($instance === NULL) {
            throw new ErrorException('You should use this class through yii2-geolocation module.');
        } elseif(!$instance->db) {
            $db = 'db';
        } else {
            $db = $instance->db;
        }
        return Yii::$app->get($db);
    }
}
