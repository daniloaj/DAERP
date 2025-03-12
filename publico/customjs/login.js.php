<?php
$languages = [
    "es" => include "aplicacion/vistas/partes/language/es.php",
    "en" => include "aplicacion/vistas/partes/language/en.php"
];
?>
<script>
    // Definir los idiomas en JavaScript
    const translations = <?php echo json_encode($languages); ?>;

    // Seleccionar elementos
    const languageSelect = document.querySelector("#language");
    const userLabel = document.querySelector("#user");
    const passLabel = document.querySelector("#pass");
    const loginButton = document.querySelector("#login_b");
    const forgot_pass = document.querySelector("#forgot_pass");
    // Función para cambiar el idioma
    function change_language() {
        const lang = languageSelect.value; // Obtener el idioma seleccionado

        // Actualizar los textos en la página
        userLabel.textContent = translations[lang]["user"];
        passLabel.textContent = translations[lang]["pass"];
        loginButton.textContent = translations[lang]["login"];
        forgot_pass.textContent = translations[lang]["forgot_pass"];
    }

    // Agregar evento para cambiar el idioma dinámicamente
    languageSelect.addEventListener("change", change_language);
    document.addEventListener("DOMContentLoaded", change_language);

</script>