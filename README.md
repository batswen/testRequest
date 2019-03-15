# testRequest
A function that test urls for specific commands

# Purpose
prüft alle angegebenen Befehle in $_REQUEST und fügt sie $_SESSION['command'] hinzu\
tests all given commands in $_REQUEST and adds them to $_SESSION['command']\

# Eaxmple
test with: `(localhost/)test.php?dontrender=true&debug=1`\
result: `200 OK (internal: $_SESSION['command'] = ['dontrender' => true, 'debug' => 1];)`\
call: `(localhost/)test.php`\
result: `result: No command given (test.php)\nDebug: "Array ( [debug] => 1 [dontrender] => true ) "`\

# License
WTFPL
