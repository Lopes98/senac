<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Resultado</title>

        <link rel="stylesheet" href="style.css" />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
        <h1>Resultado</h1>
        <?php
            $peso = $_GET["peso"];
            $altura = $_GET["altura"];

            function calculaIMC($peso, $altura) {  
                $arredondaMetros = round($altura,2);
                $alturaCerta = $arredondaMetros * $arredondaMetros;

                $imc = $peso / $alturaCerta;
                $classificacoes = [
                    'Magreza' => ['min' => 0 , 'max' => 18.4],
                    'Saudável' => ['min' => 18.51, 'max' => 24.9],
                    'Sobrepeso' => ['min' => 25, 'max' => 29.9],
                    'Obesidade Grau I' => ['min' => 30, 'max'=> 34.9],
                    'Obesidade Grau II' => ['min' => 35, 'max'=> 39.9],
                    'Obesidade Grau III' => ['min' => 40, 'max' => PHP_FLOAT_MAX]
                ];

                foreach ($classificacoes as $categoria =>$intervalo){
                    if($imc >= $intervalo['min'] && $imc <= $intervalo['max']){
                        return $categoria;
                    }
                }

                return 'Categoria não encontrada';
            }

            $imc = $peso / ($altura * $altura);

            echo '<p>
                    Atenção, seu IMC é <strong>', round($imc,2), '</strong>, e você está classificado como <strong>', calculaIMC($peso, $altura),
                '</strong>.</p>';
        ?>
        <button>
            <a href="./index.html">Voltar para a calculadora</a>
        </button>
    </body>
</html>
