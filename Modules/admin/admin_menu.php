<?php

    $domain = "messages";
    bindtextdomain($domain, "Modules/admin/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

    $menu_dropdown_config[] = array('name'=> dgettext($domain, "Administration"), 'icon'=>'glyphicon glyphicon-tasks', 'path'=>"admin/view" , 'session'=>"admin", 'order' => 50 );
