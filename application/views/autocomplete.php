<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Autocomplete example</title>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript">// <![CDATA[

function lookup(inputString) {
    if(inputString.length == 0) {
        $('#suggestions').hide();
    } else {
        $.post("http://localhost/BananaMDB/autocomplete/autocomplete/", {queryString: ""+inputString+""}, function(data){
            if(data.length > 0) {
                $('#suggestions').show();
                $('#autoSuggestionsList').html(data);
            }
        });
    }
}

function fill(thisValue) {
    $('#id_input').val(thisValue);
    setTimeout("$('#suggestions').hide();", 200);
}   


// ]]></script>


</head>
<body>
<input name="name" id="id_input" type="text">

<div id="suggestions">
    <!-- <img src="http://localhost/BananaMDB/img/upArrow.png"> -->
    <div class="autoSuggestionsList_l" id="autoSuggestionsList">    
    </div>
</div>
</body>
</html>