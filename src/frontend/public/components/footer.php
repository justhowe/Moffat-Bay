<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function generate_footer(): string {

    // heredocs
    $html_template = <<<HTML
<div>
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #c2c5e558;
            padding: 10px;
            text-align: center;
        }
    </style>
    <div class="footer" id="footer">
        <p>© 2023 Moffat Bay Lodge</p>
    </div>
    <script>
        window.addEventListener("load", addStyle());

        function addStyle() {
            var footer = document.getElementById("footer");
            var height_of_footer = footer.clientHeight;

            console.log(height_of_footer);
            footer.style.height = height_of_footer;
            document.body.style.paddingBottom = height_of_footer + "px";
        }
    </script>
</div>
HTML;
    return $html_template;
}