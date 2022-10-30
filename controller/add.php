<?php

class Film implements Page
{
    function createFilm()
    {
        $newFilm = new Film();
    }

    public function methodName(
        Film $arg1,
        string $arg2,
        array $arg3
    ) {
        // method body
        
    }
}

if ($isAppropriate1) {
    // if body
} elseif ($isAppropriate2) {
    // elseif body
} else {
    // else body;
}


if (
    $isAppropriate1 ||
    $isAppropriate2
) {
    // if body
} elseif (
    $isAppropriate3 ||
    $isAppropriate4
) {
    // elseif body
}

switch ($variable) {
    case 0:
        // case body
        break;
    case 1:
        // case body
        // no break
    case 2:
    default:
        //case body
        break;
}

while ($expr) {
    // structure body
}

do {
    // structure body;
} while ($expr);

do {
    // structure body;
} while (
    $isAppropriate1
    && $isAppropriate2
);

for ($i = 0; $i < 10; $i++) {
    // for body
}

foreach ($iterable as $key => $value) {
    // foreach body
}

function functionName()
{

}   

$variable1 = 'yo';

//single line commnts

/* multiline
comment
*/