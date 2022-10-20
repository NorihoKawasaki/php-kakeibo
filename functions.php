<?php
//サニタイジング防止
function h($value) {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

