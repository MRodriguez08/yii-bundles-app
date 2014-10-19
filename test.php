<?php
$fileContent = file_get_contents("css/amelia.min.css");
echo str_replace("\n","",$fileContent);