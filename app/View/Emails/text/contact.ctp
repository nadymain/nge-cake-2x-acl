<?php echo sprintf(

"%s: %s
%s: %s

%s:
%s

----------------------------
%s %s",

__d('contact', 'name'), h($name),
__d('contact', 'email'), h($email),
__d('contact', 'message'), h($message),
__d('contact', 'sent from'), Router::url('/', true)

);