<?php
$_SESSION['prod'] = 0;
$horas = $_POST["horas"];
$potencia = $_POST["potencia"];
$name = $_POST["aparelho"];

$consumo_m = ($horas * ($potencia / 1000)) * 30;

$dados = [
    "Consumo_Mensal" => $consumo_m
    "Eletroeletrônico" => $name,
];

$file = fopen("teste_funcionamento.txt", "a");

fwrite($file, "O aparelho adicionado consome o total de: ".$name);
fwrite($file, " - Consumo Mensal, em kW/h: ");

session_start();

$_SESSION['prod'] += $consumo_m;

echo "O consumo mensal de energia total dos equipamentos adicionados é de: ", $_SESSION['prod'] ," kW/h";

fwrite($file, " - Consumo Final é de:".$_SESSION['prod']."\n");

fclose($file);
$_SESSION['prod'] = 0;


?>
