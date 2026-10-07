<?php
$user = $_POST['usuario'];
$password = $_POST['password'];

$cuentas = [
    "user01" => "passwd01",
    "user02" => "passwd02",
    "user03" => "passwd03"
];
$arrayuser = array_keys($cuentas);
$arraypassword = array_values($cuentas);

$encontrao = false;
for ($i = 0; $i < count($cuentas); $i++) {
    $contadornombres = $arrayuser[$i];
    $contadorpassword = $arraypassword[$i];

    if (
        ($contadornombres == $user) &&
        ($contadorpassword == $password)
    ) {
        $encontrao = true;
    }
}

if ($encontrao == true) {
    echo "Bienvenido " . $user;
} else {
    echo "<a href='01.html'> volver </a>";
    echo "Error tu ele tonto";
}

?>