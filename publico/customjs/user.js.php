<?php
$languages = [
    "es" => include "aplicacion/vistas/partes/language/es.php",
    "en" => include "aplicacion/vistas/partes/language/en.php"
];
$language_session = $_SESSION["language"];
?>
<script>
    const translations = <?php echo json_encode($languages); ?>;
    const lang = <?php echo json_encode($language_session) ?>.toString();

    function change_language() {

        const edit_tooltip = document.querySelectorAll(".edit_tooltip");
        edit_tooltip.forEach(function(element) {
            element.textContent = translations[lang]["edit"];
        });

        const delete_tooltip = document.querySelectorAll(".delete_tooltip");
        delete_tooltip.forEach(function(element) {
            element.textContent = translations[lang]["delete"];
        });

        const mail_tooltip = document.querySelectorAll(".mail_tooltip");
        mail_tooltip.forEach(function(element) {
            element.textContent = translations[lang]["send_mail"];
        });

        const reset_tooltip = document.querySelectorAll(".reset_tooltip");
        reset_tooltip.forEach(function(element) {
            element.textContent = translations[lang]["reset_pass"];
        });

    }
</script>