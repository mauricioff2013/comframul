    <aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo(Yii::$app->user->identity->nombre);?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!--form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form-->
        <!-- /.search form -->

<?php 

$itemsRecuperaciones = array();
$itemsCreditos = array();
$itemsAtencionAlAfiliado= array();
$itemsGerenciaGeneral = array();
$itemsCaja = array();
$itemsAdministracion = array();
$itemsAuditoria = array();
$itemsOperaciones = array();
$itemsContabilidad = array();
$itemsTecnologiaEInformacion = array();
$itemsCumplimiento = array();
$itemsTalentoHumano = array();

$Recuperaciones=false;
$Creditos=False;
$AtencionAlAfiliado=false;   
$GerenciaGeneral=false; 
$Caja=false;
$Administracion=false;   
$Operaciones=false;  
$Auditoria=false;    
$Contabilidad=false; 
$TecnologiaEInformacion=false;   
$Cumplimiento =false;
$TalentoHumano=false;

foreach((Yii::$app->db->createCommand('select * from public."menu"
where  idmenu in (
select idmenu from public."permisos"
where idpermiso in (
select idpermiso from public."UsuariosHasPermisos"
where idusuario='.Yii::$app->user->getId().'))')->queryAll()) as $menu){

switch (  $menu['idmenu']  ) {
    case 1:
        $Recuperaciones =true;

foreach((Yii::$app->db->createCommand('  select * from public."permisos"
    where idmenu=1 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso->descripcion, 'url' => $permiso->action];
array_unshift($itemsRecuperaciones, $items);

}


        break;
        case 2:
        $Creditos    =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=2 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsCreditos, $items);

}
        break;
        case 3:
        $AtencionAlAfiliado=true;
foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=3 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsAtencionAlAfiliado , $items);

}
        break;
        case 4:
        $GerenciaGeneral =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=4 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsGerenciaGeneral, $items);

}
        break;
        case 5:
        $Caja    =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=5 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsCaja, $items);

}
        break;
        case 6:
        $Administracion =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=6 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsAdministracion, $items);

}
        break;
        case 7:
        $Operaciones =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=7 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsOperaciones, $items);

}
        break;
            case 8:
        $Auditoria      =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=8 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsAuditoria, $items);

}
        break;
        case 9:
        $Contabilidad    =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=9 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsContabilidad, $items);

}
        break;
        case 10:
        $TecnologiaEInformacion =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=10 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsTecnologiaEInformacion, $items);

}       

        break;
        case 11:
        $Cumplimiento       =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=11 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsCumplimiento, $items);

}
        break;
        case 12:
        $TalentoHumano =true;
        foreach((Yii::$app->db->createCommand('select * from public."permisos"
    where idmenu=12 and idpermiso in (
    select idpermiso from public."UsuariosHasPermisos"
    where idusuario='.Yii::$app->user->getId().')')->queryAll()) as $permiso){
$items  = ['label' => $permiso['descripcion'], 'url' => [$permiso['action']]];
array_unshift($itemsTalentoHumano, $items);

}
        break;
           
    default:
        # code...
        break;
}

}




//foreach(Yii::$app->user->identity->permisos as $permiso):
//$item = ['label' => $permiso->descripcion, 'url' => [$permiso['action']]];
//array_unshift($report_items, $item);
//endforeach;
?>



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [ 'label' => 'Menu Principal', 'options' => ['class' => 'header']],
                    
                 ['visible' => $Creditos,'label' => 'Creditos', 'icon' => 'file-code-o', 'url' => ['#'],'items' => $itemsCreditos,],
                      ['visible' => $Recuperaciones ,'label' => 'Recuperaciones', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsRecuperaciones],
                       ['visible' => $AtencionAlAfiliado    ,'label' => 'Atencion al Afiliado', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsAtencionAlAfiliado],
                        ['visible' => $Caja ,'label' => 'Caja', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsCaja],
                         ['visible' => $Operaciones ,'label' => 'Operaciones', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsOperaciones],
                          ['visible' => $Administracion ,'label' => 'Administracion', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsAdministracion],
                           ['visible' => $Contabilidad  ,'label' => 'Contabilidad', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsContabilidad],
                            ['visible' => $Auditoria    ,'label' => 'Auditoria', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsAuditoria],
                             ['visible' => $Cumplimiento,'label' => 'Cumplimiento', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsCumplimiento],
                             ['visible' => $TalentoHumano,'label' => 'TalentoHumano', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsTalentoHumano],
                              ['visible' => $TecnologiaEInformacion,'label' => 'Tecnologia e Informacion', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsTecnologiaEInformacion],
                               ['visible' => $GerenciaGeneral   ,'label' => 'Gerencia General', 'icon' => 'file-code-o', 'url' => ['#'],'items'=>$itemsGerenciaGeneral],
               
                    
                    ['label' => 'Same tools', 'icon' => 'share', 'url' => '#',
                             'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['#'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => $itemsCreditos   ,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
