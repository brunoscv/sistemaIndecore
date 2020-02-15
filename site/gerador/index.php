<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Gerador</title>
        <link media="screen" type="text/css" rel="stylesheet" href="css/estilo.css" />    
    </head>
    <body>
        <h1>Gerador</h1>
        <div id="main">
            <form action="listaTabelas.php" method="post">
                <h3>Banco de Dados</h3>
                <p>Digite os dados de acesso ao banco de dados</p>
                <div class="line">
                    <b>Hostname:</b><br />
                    <input type="text" name="hostname" />
                </div>
                <div class="line">
                    <b>Username:</b><br />
                    <input type="text" name="username" />
                </div>
                <div class="line">
                    <b>Password:</b><br />
                    <input type="text" name="password" />
                </div>
                <div class="line">
                    <b>Banco de Dados:</b><br />
                    <input type="text" name="database" /> <input type="submit" value="Conectar!" />
                </div>
            </form>
        </div>
    </body>
</html>
