<?php
$languages = [
    "es" => include "aplicacion/vistas/partes/language/es.php",
    "en" => include "aplicacion/vistas/partes/language/en.php"
];
$language_session = $_SESSION["language"];
?>
<script>
    const translations = <?php echo json_encode($languages); ?>;
    const lang = sessionStorage.getItem("lang");
    
        // const urlActual = window.location.href;
    
        // const partes = urlActual.split('/');
    
        // const modulo = partes[partes.length - 1];

    const finances = document.getElementById("finances");
    const administration = document.getElementById("administration");
    const logout = document.getElementById("logout");
    const agenda = document.getElementById("agenda");
    const settings = document.getElementById("settings");
    function change_language() {

        finances.textContent = translations[lang]["finances"];
        administration.textContent = translations[lang]["administration"];
        logout.textContent = translations[lang]["logout"];
        agenda.textContent = translations[lang]["agenda"];
        settings.textContent = translations[lang]["settings"];

    }
    document.addEventListener("DOMContentLoaded", change_language);
</script>