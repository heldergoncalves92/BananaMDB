<html>
    <head>
        <title>Autocomplete with CodeIgniter & jQuery</title>
        <link href="<?=base_url()?>css/ui-lightness/jquery-ui-1.8.16.custom.css" media="screen" type="text/stylesheet" rel="stylesheet"/>
    </head>
    <body>
        
        <form>
            
            <label for="search" >Search</label>
            <input type="text" id="search"/>
            <input type="hidden" value="<?=base_url()?>" id="hiddenurl"/>
            <input type="submit" value="Submit"/>
        </form>
        
        
        
        <script src="<?=base_url()?>js/jquery-1.6.2.min.js" type="text/javascript" ></script>
        <script src="<?=base_url()?>js/jquery-ui-1.8.16.custom.min.js" type="text/javascript" ></script>
        <script src="<?=base_url()?>js/autocomplete.js" type="text/javascript" ></script>
    </body>
</html>