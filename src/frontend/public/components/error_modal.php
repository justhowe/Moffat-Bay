<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function generate_error_modal_container(): string {
    if (isset($_SESSION['error_msg'])) {
        $error_msg = $_SESSION['error_msg'];
        $html_template = <<<HTML
<div>
    <style>
    .error-modal {
      font-family: var(--app-default);
      position: fixed;
      top: 20%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 10px 20px;
      background-color: #ff9999;
      border: 1px solid #ff9999;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      border-radius: 20px;
      opacity: 1;
      animation: fadeInOut 5s forwards;
    }
    
      @keyframes fadeInOut {
        to {
          opacity: 0;
        }
    }
    </style>
    <div class="error-modal">
        <p>$error_msg</p>
    </div>
</div>
HTML;
        unset($_SESSION['error_msg']);
    } else {
        $html_template = "";
    }
    return $html_template;
}