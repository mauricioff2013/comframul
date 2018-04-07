<?php

return [
    'class' => 'yii\db\Connection',
    'driverName' => 'sybase',

    'schemaMap' => [ 
       'sybase' =>\websightnl\yii2\sybase\Schema::className(),
       'defaultSchema' => '"dba"'],  
       'dsn' => 'odbc:sisc',

];
