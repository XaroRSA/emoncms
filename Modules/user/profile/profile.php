<?php

/*
    All Emoncms code is released under the GNU Affero General Public License.
    See COPYRIGHT.txt and LICENSE.txt.

    ---------------------------------------------------------------------
    Emoncms - open source energy visualisation
    Part of the OpenEnergyMonitor project:
    http://openenergymonitor.org
*/

// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');

    global $path;

    $languages = get_available_languages();
    $languages_name = languagecode_to_name($languages);
    //languages order by language name
    $languages_new = array();
    foreach ($languages_name as $key=>$lang){
       $languages_new[$key]=$languages[$key];        
    }
    $languages= array_values($languages_new); 
    $languages_name= array_values($languages_name);

    
function languagecode_to_name($langs) {
    static $lang_names = null;
    if ($lang_names === null) {
        $json_data = file_get_contents(__DIR__.'/language_country.json');
        $lang_names = json_decode($json_data, true);
    }
    foreach ($langs as $key=>$val){
      $lang[$key]=$lang_names[$val];
    }
   asort($lang);
   return $lang;
}

?>

<script type="text/javascript" src="<?php echo $path; ?>Modules/user/profile/md5.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/user/profile/qrcode.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/user/profile/clipboard.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/user/user.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/listjs/list.js"></script>

<div class="row">
    <div class="col-md-4">
        <h3><?php echo _('My account'); ?></h3>

        <div id="account">
            <div class="account-item">
                <span class="muted"><?php echo _('Username'); ?></span>
                <span id="username-view"><br><span class="username"></span> <a id="edit-username" style="float:right"><?php echo _('Edit'); ?></a></span>
                <div id="edit-username-form" class="input-group" style="display:none">
                    <input class="col-md-2" type="text" style="width:150px">
                    <button class="btn" type="button"><?php echo _('Save'); ?></button>
                </div>
                <div id="change-username-error" class="alert alert-error" style="display:none; width:170px"></div>
            </div>
            <div class="account-item">
                <span class="muted"><?php echo _('Email'); ?></span>
                <span id="email-view"><br><span class="email"></span> <a id="edit-email" style="float:right"><?php echo _('Edit'); ?></a></span>
				
                <div id="edit-email-form" class="input-group" style="display:none">
                    <input class="col-md-2" type="text" style="width:150px">
                    <button class="btn" type="button"><?php echo _('Save'); ?></button>
                </div>
				
                <div id="change-email-error" class="alert alert-error" style="display:none; width:170px"></div>
            </div>

            <div class="account-item">
                <a id="changedetails"><?php echo _('Change Password'); ?></a>
            </div>  

			<div class="account-item">
                <span class="muted"><?php echo _('Theme'); ?></span>
                <span id="theme-view"><br><span class="theme"></span> <a id="edit-theme" style="float:right"><?php echo _('Edit'); ?></a></span>
                
				<div id="edit-theme-form" class="input-group" style="display:none">
                    <select id="edit-theme-select" class="form-control" style="width:150px">
					</select>
                    <button class="btn" type="button"><?php echo _('Save'); ?></button>
                </div>
				
                <div id="change-theme-error" class="alert alert-error" style="display:none; width:170px"></div>
            </div>
			
        </div>

        <div id="change-password-form" style="display:none">
            <div class="account-item">
                <span class="muted"><?php echo _('Current password'); ?></span>
                <br><input id="oldpassword" type="password" />
            </div>
            <div class="account-item">
                <span class="muted"><?php echo _('New password'); ?></span>
                <br><input id="newpassword" type="password" />
            </div>
            <div class="account-item">
                <span class="muted"><?php echo _('Repeat new password'); ?></span>
                <br><input id="repeatnewpassword" type="password" />
            </div>
            <div id="change-password-error" class="alert alert-error" style="display:none; width:170px"></div>
            <input id="change-password-submit" type="submit" class="btn btn-primary" value="<?php echo _('Save'); ?>" />
            <input id="change-password-cancel" type="submit" class="btn" value="<?php echo _('Cancel'); ?>" />
        </div>
        
        <br>
        <div id="account">
        <div class="account-item">
            <span class="muted"><?php echo _('Write API Key'); ?></span> <button class="btn btn-info" id="copyapiwritebtn">Copy API Key</button>
            <!--<a id="newapikeywrite" >new</a>-->
            <span class="writeapikey" id="copyapiwrite"></span>
        </div>
        <div class="account-item">
            <span class="muted"><?php echo _('Read API Key'); ?></span> <button class="btn btn-info" id="copyapireadbtn">Copy API Key</button>
            <!--<a id="newapikeyread" >new</a>-->
            <span class="readapikey" id="copyapiread"></span>
            <span id="msg"></span>
        </div>
        <div class="account-item">
            <span class="muted"><?php echo _('App Integration QR Code'); ?></span>
            <div id="qr_apikey"></div>
            <br>
	        <span class="muted">Scan this QR code from the <a href="https://play.google.com/store/apps/details?id=org.emoncms.myapps&utm_source=global_co&utm_medium=prtnr&utm_content=Mar2515&utm_campaign=PartBadge&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1">
	            Android App</a> for simplified setup, or scan using a barcode scanner on a mobile device to directly view your Emoncms MyElectric.</span>
	        <br><br>
	        <div style="width:150px"><a href="https://play.google.com/store/apps/details?id=org.emoncms.myapps&utm_source=global_co&utm_medium=prtnr&utm_content=Mar2515&utm_campaign=PartBadge&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1">
	            <img alt="Get it on Google Play" src="https://play.google.com/intl/en_us/badges/images/generic/en-play-badge.png" /></a></div>
        </div>
        </div>
    </div>

    <div class="col-md-8">
        <h3><?php echo _('My Profile'); ?></h3>
        <div id="table"></div>
    </div>
</div>

<script>

    var path = "<?php echo $path; ?>";
    var lang = <?php echo json_encode($languages); ?>;
    var lang_name = <?php echo json_encode($languages_name); ?>;
    var themes = <?php echo json_encode($themes); ?>;

    list.data = user.get();

    $(".writeapikey").html(list.data.apikey_write);
    $(".readapikey").html(list.data.apikey_read);

    //QR COde Generation
    var urlCleaned = window.location.href.replace("user/view" ,"");
    var qrcode = new QRCode(document.getElementById("qr_apikey"), {
        text: urlCleaned + "app?readkey=" + list.data.apikey_read  + "#myelectric",
        width: 192,
        height: 192,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    }); //Re-designed on-board QR generation using javascript
    
    // Need to add an are you sure modal before enabling this.
    // $("#newapikeyread").click(function(){user.newapikeyread()});
    // $("#newapikeywrite").click(function(){user.newapikeywrite()});
    
    // Clipboard code
    document.getElementById("copyapiwritebtn").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyapiwrite"), "msg");
    });
    document.getElementById("copyapireadbtn").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyapiread"), "msg");
    });
    
    var currentlanguage = list.data.language;

    list.fields = {
        'gravatar':{'title':"<?php echo _('Gravatar'); ?>", 'type':'gravatar'},
        'name':{'title':"<?php echo _('Name'); ?>", 'type':'text'},
        'location':{'title':"<?php echo _('Location'); ?>", 'type':'text'},
        'timezone':{'title':"<?php echo _('Timezone'); ?>", 'type':'timezone'},
        'language':{'title':"<?php echo _('Language'); ?>", 'type':'language', 'options':lang, 'label':lang_name},
        'bio':{'title':"<?php echo _('Bio'); ?>", 'type':'text'}
    }
    
    $.ajax({ url: path+"user/gettimezones.json", dataType: 'json', async: true, success: function(result) {
        list.timezones = result;
    }});
    
    list.init();

    $("#table").bind("onSave", function(e){
        user.set(list.data);

        // refresh the page if the language has been changed.
        if (list.data.language!=currentlanguage) window.location.href = path+"user/view";
    });

    //------------------------------------------------------
    // Username
    //------------------------------------------------------
    $(".username").html(list.data['username']);
    $("#input-username").val(list.data['username']);

    $("#edit-username").click(function(){
        $("#username-view").hide();
        $("#edit-username-form").show();
        $("#edit-username-form input").val(list.data.username);
    });

    $("#edit-username-form button").click(function(){

        var username = $("#edit-username-form input").val();

        if (username!=list.data.username)
        {
            $.ajax({
                url: path+"user/changeusername.json",
                data: "&username="+username,
                dataType: 'json',
                success: function(result)
                {
                    if (result.success)
                    {
                        $("#username-view").show();
                        $("#edit-username-form").hide();
                        list.data.username = username;
                        $(".username").html(list.data.username);
                        $("#change-username-error").hide();
                    }
                    else
                    {
                        $("#change-username-error").html(result.message).show();
                    }
                }
            });
        }
        else
        {
            $("#username-view").show();
            $("#edit-username-form").hide();
            $("#change-username-error").hide();
        }
    });

    //------------------------------------------------------
    // Email
    //------------------------------------------------------
    $(".email").html(list.data['email']);
    $("#input-email").val(list.data['email']);

    $("#edit-email").click(function(){
        $("#email-view").hide();
        $("#edit-email-form").show();
        $("#edit-email-form input").val(list.data.email);
    });

    $("#edit-email-form button").click(function(){

        var email = $("#edit-email-form input").val();

        if (email!=list.data.email)
        {
            $.ajax({
                url: path+"user/changeemail.json",
                data: "&email="+email,
                dataType: 'json',
                success: function(result)
                {
                    if (result.success)
                    {
                        $("#email-view").show();
                        $("#edit-email-form").hide();
                        list.data.email = email;
                        $(".email").html(list.data.email);
                        $("#change-email-error").hide();
                    }
                    else
                    {
                        $("#change-email-error").html(result.message).show();
                    }
                }
            });
        }
        else
        {
            $("#email-view").show();
            $("#edit-email-form").hide();
            $("#change-email-error").hide();
        }
    });

    //------------------------------------------------------
    // Password
    //------------------------------------------------------
    $("#changedetails").click(function(){
        $("#changedetails").hide();
        $("#change-password-form").show();
    });

    $("#change-password-submit").click(function(){

        var oldpassword = $("#oldpassword").val();
        var newpassword = $("#newpassword").val();
        var repeatnewpassword = $("#repeatnewpassword").val();

        if (newpassword != repeatnewpassword)
        {
            $("#change-password-error").html("<?php echo _('Passwords do not match'); ?>").show();
        }
        else
        {
            $.ajax({
                url: path+"user/changepassword.json",
                data: "old="+oldpassword+"&new="+newpassword,
                dataType: 'json',
                success: function(result)
                {
                    if (result.success)
                    {
                        $("#oldpassword").val('');
                        $("#newpassword").val('');
                        $("#repeatnewpassword").val('');
                        $("#change-password-error").hide();

                        $("#change-password-form").hide();
                        $("#changedetails").show();
                    }
                    else
                    {
                        $("#change-password-error").html(result.message).show();
                    }
                }
            });
        }
    });

    $("#change-password-cancel").click(function(){
        $("#oldpassword").val('');
        $("#newpassword").val('');
        $("#repeatnewpassword").val('');
        $("#change-password-error").hide();

        $("#change-password-form").hide();
        $("#changedetails").show();
    });

	//------------------------------------------------------
    // Theme
    //------------------------------------------------------
	$(".theme").html(list.data['theme']);
	
	//loads dropdown with themes TODO OPTIMIZE!!
	$.each(themes, function(val, text) {
		if (text===list.data['theme']){
			$('#edit-theme-select').append( $('<option selected></option>').val(val).html(text) )
		}
		else{
			$('#edit-theme-select').append( $('<option></option>').val(val).html(text) )
		}
     });	
	//$("#input-username").val(list.data['usernametheme
	$("#edit-theme").click(function(){
        $("#theme-view").hide();
		
        $("#edit-theme-form").show();
    });
	
	    $("#edit-theme-form button").click(function(){
		
        var selectedtheme = $("#edit-theme-select option:selected").text();
		if (selectedtheme!=list.data.theme)
        {
            $.ajax({
                url: path+"user/changetheme.json",
                data: "&theme="+selectedtheme,
                dataType: 'json',
                success: function(result)
                {
                    if (result.success)
                    {
                        $("#theme-view").show();
                        $("#edit-theme-form").hide();
                        list.data.theme = selectedtheme;
                        $(".theme").html(list.data.theme);
                        $("#change-theme-error").hide();
						location.reload();
                    }
                    else
                    {
                        $("#change-theme-error").html(result.message).show();
                    }
                }
            });
        }
        else
        {
            $("#theme-view").show();
            $("#edit-theme-form").hide();
            $("#change-theme-error").hide();
        }

    });
</script>
