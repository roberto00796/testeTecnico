<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste T&eacute;cnico</title>
        <?php include_once 'library/library.php'; ?>
        <script src="js/teste.js" type="text/javascript"></script> 
    </head>
    <body>
        <div class="container" style="padding-top: 20px">
            <form id="form" name="form" method="get" >
                <div class="panel panel-default">
                    <div class="panel-heading text-bold"><h4><b>Teste T&eacute;cnico</b></h4></div>
                    <div class="panel-body"> 
                        <div class="col-sm-12">
                            <div class="alert alert-info">
                                <b>Digite um n&uacute;mero inteiro postivo para retornar o somat&oacute;rio de todos os valores inteiros divis&iacute;veis por 3 ou 5 inferiores a ele.</b>
                            </div>
                        </div>
                        <div class="form-group">  
                            <div class="col-sm-12">
                                <b><label for="numero" class="form-label">Digite um n&uacute;mero:</label></b>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="APENAS N&Uacute;MEROS">
                            </div>
                        </div>
                        <div class="form-group">  
                            <div class="col-sm-12" style="padding-top:10px;">
                                <button class="btn btn-primary" type="submit">Executar</button>
                            </div>
                        </div>
                        <?php
                        if ($_GET) {
                            $n = $_GET['numero'];
                            $soma = 0;
                            for ($i = 1; $i < $n; $i++) {
                                if (($i % 3) == 0 || ($i % 5 == 0)) {
                                    $arrayNumeros[] = $i;
                                    $soma += $i;
                                }
                            }
                            if(empty($n)){
                                $alert = "danger";
                                $msg = "Nenhum n&uacute;mero foi digitado";
                            }
                            else if (!preg_match('/^[1-9][0-9]*$/', $n)) {
                                $alert = "danger";
                                $msg = "O valor n&atilde;o &eacute; válido";
                            }

                            else if (!empty($arrayNumeros)) {
                                $alert = "success";
                                $numeros = implode(",", $arrayNumeros);
                                $msg = "Os n&uacute;meros inferiores &agrave; {$n} divis&iacute;veis por 3 ou 5 s&atilde;o: " . $numeros . ".<BR>";
                                $msg .= "O resultado do somat&oacute;rio dos n&uacute;meros &eacute;: {$soma}";
                            } else {
                                $alert = "danger";
                                $msg = "O n&uacute;mero {$n} n&atilde;o possu&iacute; n&uacute;meros divis&iacute;veis por 3 ou 5 antes dele.";
                            }
                            ?>
                            <div class="form-group"> 
                                <div class="col-sm-12" style="padding-top:10px;">
                                    <div class="alert alert-<?= $alert; ?>">
                                        <b><label  class="form-label"><?= $msg; ?></label></b>
                                    </div> 
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
