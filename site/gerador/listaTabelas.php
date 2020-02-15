<?php
    include("inc/functions.php");    
    $conn = @mysql_connect($_POST['hostname'],$_POST['username'],$_POST['password'],true) or die (mysql_error());
    if( $conn ){
        if( !mysql_select_db($_POST['database'],$conn) )
            $ERR[] = 'Ocorreu um erro ao selecionar o banco de dados'.mysql_error();
        
        session_start();
        $_SESSION['dadosBanco'] = $_POST;
        
        $query = 'SHOW TABLES';
        $result = mysql_query($query);
        while( $table = mysql_fetch_array($result,MYSQL_NUM) ){
            $listaTabelas[ $table[0] ] = $table[0];
        }
        
        $query = "SELECT n.id, (select m.descricao from menu as m where m.id = n.menu_id) as pai, n.descricao FROM menu as n ORDER BY n.menu_id ASC, n.ordem ASC";
        $result = mysql_query($query);
        while( $menu = mysql_fetch_array($result,MYSQL_ASSOC) ){
            $listaMenu[ $menu['id'] ] = ( !empty($menu['pai']) ) ? $menu['pai'] . ' -&gt ' . $menu['descricao'] : $menu['descricao'] ;
        }
    } else {
        $ERR[] = 'Ocorreu um erro ao tentar conectar com o banco de dados';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Gerador</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link media="screen" type="text/css" rel="stylesheet" href="css/estilo.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    </head>
    <body>
        <h1>Gerador</h1>
        <div id="main">
        <?php if( isset($ERR) ): ?>
            <ul>
            <?php foreach($ERR as $e): ?>
                <li><?php echo $e; ?></li>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <form method="post" action="gerarFormulario.php" onsubmit="ajaxForm($(this),$('#result'));return false;">
                <div id="result"></div>
                <div class="line">
                    Tabela: <select name="tabela" onchange="loadAjax( 'listaCampos.php?tabela='+this.value,$('#campos') );"><option value="">Selecione uma Tabela</option><?php echo makeOptions($listaTabelas); ?></select>
                </div>
                <div class="line" id="menuLine">
                    Menu: <select name="menu" onchange="loadAjax( 'listaMenu.php?menu='+this.value,$('#menu') );"><option>Selecione uma Menu</option><?php echo makeOptions($listaMenu); ?><option value="">Adicionar Menu</option></select><span id="menu"></span>
                </div>
                <div class="line" id="campos">
                </div>
            </form>
        <?php endif; ?>
        </div>
    </body>
</html>
