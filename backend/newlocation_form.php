<?php

$form = 
    "<form class=\"targetForm\" action=\"/backend/newlocation_create.php\">
        <label> Location UUID </label>
        <input type=\"text\" id=\"uuid\" name=\"uuid\" value=\"" . uuid() ."\" readonly><br>

        <label> Location Name </label>
        <input type=\"text\" id=\"name\" name=\"name\" placeholder=\"Name\" required><br>

        <label> Location City </label>
        <input type=\"text\" id=\"city\" name=\"city\" placeholder=\"City\" required><br>

        <label> Location Street </label>
        <input type=\"text\" id=\"street\" name=\"street\" placeholder=\"Street\" required><br>

        <label> Location Street Number </label>
        <input type=\"text\" id=\"streetNumber\" name=\"streetNumber\" placeholder=\"Street number\" required><br>

        <label> Location ZIP/Postal Code </label>
        <input type=\"text\" id=\"postal\" name=\"postal\" placeholder=\"ZIP/Postal code\" required><br>

        <label> Location Country</label>
        <input type=\"text\" id=\"country\" name=\"country\" placeholder=\"Country\" required value=\"NL\" readonly><br>

        <label> Location Description </label>
        <input type=\"text\" id=\"description\" name=\"description\" placeholder=\"Description\"><br>

        <div class=\"buttonHolder\">
            <input type=\"submit\" id=\"submit\" value=\"Submit\">
        </div>
    </form>";

echo $form;

function uuid(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
?>