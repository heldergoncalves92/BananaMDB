<title>Autocomplete with CodeIgniter & jQuery</title>
<link href="http://localhost/BananaMDB/css/ui-lightness/jquery-ui-1.8.16.custom.css" media="screen" type="text/stylesheet" rel="stylesheet">
 
 
 
<form>
     
    <label for="search"><cufon class="cufon cufon-canvas" alt="Search" style="width: 40px; height: 14px;"><canvas width="46" height="14" style="width: 46px; height: 14px; top: 0px; left: -1px;"></canvas><cufontext>Search</cufontext></cufon></label>
    <input type="text" id="search">
    <input type="hidden" value="<? echo base_url()?>" id="hiddenurl">
    <input type="submit" value="Submit">
</form>
 
 
 
<script src="http://localhost/BananaMDB/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="http://localhost/BananaMDB/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="http://localhost/BananaMDB/js/autocomplete.js" type="text/javascript"></script>