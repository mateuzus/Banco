<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
        <?php
        require_once 'ContaBanco.php';
        $p1 = new ContaBanco();
        $p2 = new ContaBanco();
        
        $p1 ->abrirConta("CC");
        $p1 ->setDono("Jubileu");
        $p1 ->setNumConta(1111);
        $p2 ->abrirConta("CP");
        $p2 ->setDono("Creuza");
        $p2 ->setNumConta(2222);
        
        $p1 -> depositar(650);
        $p2 -> depositar(500);
        
        $p1 ->sacar(700);
        
       $p1 ->fecharConta();
        
        
        
        
        
        
        
        print_r($p1);
        print_r($p2);
         
        
        
        
        ?>
</pre>
    </body>
</html>
