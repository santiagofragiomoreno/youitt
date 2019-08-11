<?php
namespace common\components\helper;
use Yii;
class HelperLib
{
    public static function getDsnAttribute($name, $dsn)
    {
        if (preg_match('/' . $name . '=([^;]*)/', $dsn, $match)) {
            return $match[1];
        } else {
            return null;
        }
    }
    
    
    public static function getDbName()
    {
        $db = Yii::$app->getDb();
        $dbName = self::getDsnAttribute('dbname', $db->dsn);
        
        return $dbName;
    }
    
    
    public static function arrayToInFilter($array, $param = null){
        if($array != null && is_array($array) && count($array) >0){
            $first = true;
            
            $filter = '';
            
            foreach ($array as $item){
                $value = null;
                
                if($param != null && isset($item[$param])){
                    $value = $item[$param];
                }else{
                    $value = $item;
                }
                
                if($first){
                    $filter .= $value;
                    $first = false;
                }else{
                    $filter .= ','.$value;
                }
            }
            
            return $filter;
        }
        
        return null;
    }
    
    public static function arrayToInFilterUnique($array, $param){
        if($array != null && is_array($array) && count($array) >0){
            
            $valuesarr = array();
            
            foreach ($array as $item){
                $value = null;
                
                if($param != null && isset($item[$param])){
                    $valuesarr[]= $item[$param];
                }
            }
            
            $valuesarrunique = array_unique($valuesarr);
            
            $first = true;
            
            $filter = '';
            
            foreach ($valuesarrunique as $item){
                $value = null;
                
                if($first){
                    $filter .= '"'.$item.'"';
                    $first = false;
                }else{
                    $filter .= ',"'.$item.'"';
                }
            }
            
            return $filter;
        }
        
        return null;
    }
    
    
}