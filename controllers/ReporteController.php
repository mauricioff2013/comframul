<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;

class ReporteController extends Controller
{

public function get_formed_query($table,$query,$dbtype = "")
    {
        $query_ = $query =="" ?"Select * from $table":$query;

        if($dbtype == "core"){
            $result = Yii::$app->db2->createCommand($query_)->queryAll();
        } else {
            $result = Yii::$app->db->createCommand($query_)->queryAll();
        }        
        return $result;

    }


    public function actionDownloadReport($filename, $table, $query,$dbtype = "")
    {
        
        header("Content-disposition: attachment; charset=UTF-8; filename={$filename}");
        header("Content-type: text/csv");
        $result = $this->get_formed_query($table, $query,$dbtype);
        if (count($result) == 0) {
            return null;
        }
        $out = fopen('php://output', 'w');
        fputcsv($out, array_keys($result[0]));
        foreach ($result as $row) {
            fputcsv($out, array_values($row));
        }
        fclose($out);
    }


}
