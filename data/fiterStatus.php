<?php
    if($status == 'NIET voldaan') {
    echo '
    <option selected value="NIET voldaan">NIET voldaan</option> 
    <option value="voldaan">voldaan</option>
    ';
    } else {
    echo '
    <option value="NIET voldaan">NIET voldaan</option> 
    <option selected value="voldaan">voldaan</option>
    ';
    };
?>