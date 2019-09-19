<?php

header("Content-Type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8' ?>";
if (isset($_POST['pseudo']) && isset($_POST['commentaire'])) {
    echo '<com>
        <ret>1</ret>
        <pseudo>'.$_POST['pseudo'].'</pseudo>
        <commentaire><![CDATA['.nl2br(htmlspecialchars($_POST['commentaire'], ENT_QUOTES, 'UTF-8')).']]></commentaire>
    </com>';
}
else {
    echo '<com>
        <ret>0</ret>
        <pseudo>no</pseudo>
        <commentaire>no no</commentaire>
    </com>';
}