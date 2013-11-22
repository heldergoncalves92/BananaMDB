<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Autocomplete example</title>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript">// <![CDATA[
$(document).ready(function () {
    $(function () {
        $("#autocomplete").autocomplete({
            source: function (request, response) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/autocomplete/suggestions",
                    data: {
                        term: $("#forwardEmail").val()
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data != null) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.subEmail + ', ' + item.listName,
                                    value: item.subEmail,
                                    subEmail: item.subEmail,
                                    subId: item.subId,
                                    subName: item.subName,
                                    listName: item.listName,
                                    listId: item.listId
                                }
                            }))
                        } else $(".ui-autocomplete").css({
                            "display": "none"
                        });
                    },
                    error: function (data) {
                        alert('Error: ' + data.errorThrown);
                    }
                })
            },
            delay: 1000,
            minLength: 1,
            select: function (event, ui) {
                $("#forwardEmail").val(ui.item.subEmail);
                $("#forwardName").val(ui.item.subName);
                $("select[name='forwardMessageListId']").find("option[value='" + ui.item.listId + "']").attr("selected", true);
                return false;
            }
        }).data("autocomplete")._renderItem = function (ul, item) {
            return $("
	<li></li>

").data("item.autocomplete", item).append("<a>" + item.label + "</a>").appendTo(ul);
        };
    });
});
});
// ]]></script>


</head>
<body>
Text: <input type="text" id="autocomplete" />
</body>
</html>