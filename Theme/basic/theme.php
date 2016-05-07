<!doctype html>
<?php
/*
All Emoncms code is released under the GNU Affero General Public License.
See COPYRIGHT.txt and LICENSE.txt.

---------------------------------------------------------------------
Emoncms - open source energy visualisation
Part of the OpenEnergyMonitor project:
http://openenergymonitor.org
*/
global $ltime,$path,$fullwidth,$menucollapses,$emoncms_version,$theme,$favicon,$loadfromCND;
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emoncms - <?php echo $route->controller.' '.$route->action.' '.$route->subaction; ?></title>

    <?php include 'favicons.php'; ?>

    <link href="<?php echo $path; ?>Lib/bootstrap-datetimepicker-v4/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo $path; ?>Theme/<?php echo $theme; ?>/emon.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.11.3.min.js"></script>

    <?php if($loadfromCND == true): ?>
        <!-- Load CSS files from CND -->

        <!-- Default bootstrap css pathing check-->
        <?php if($session['theme']=="default"): ?>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
        <?php else: ?>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/<?php echo($session['theme'])?>/bootstrap.min.css'>
        <?php endif; ?>

    <?php else: ?>
        <!-- Load CSS files from Local server-->
        <link rel='stylesheet' href='<?php echo($path)?>Lib/bootstrap/css/<?php echo($session['theme'])?>/bootstrap.min.css'>
    <?php endif; ?>
</head>
<body>
<div id="wrap">
    <div id="nav-bar" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">

            <?php if (!isset($runmenu)) $runmenu = '';
            echo $mainmenu.$runmenu;
            ?>

            <?php
            if ($menucollapses) {

                ?><?php
            }
            ?>
        </div>
    </div>

    <?php if (isset($submenu) && ($submenu)) { ?>
        <div id="submenu">
            <div class="container">
                <?php echo $submenu; ?>
            </div>
        </div>
    <?php } ?>

    <?php
    if ($fullwidth && $route->controller=="dashboard") {
        ?>
        <div class="container">
            <?php echo $content; ?>
        </div>
    <?php } else if ($fullwidth) { ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container">
            <?php echo $content; ?>
        </div>
    <?php } ?>

    <div style="clear:both; height:60px;"></div>
</div>

<div id="footer">
    <?php echo _('Powered by '); ?>
    <a href="http://openenergymonitor.org">openenergymonitor.org</a>
    <span> | <?php echo $emoncms_version; ?></span>
</div>
<script type="text/javascript" src="<?php echo $path; ?>Lib/bootstrap/js/bootstrap.js"></script>
</body>
</html>
