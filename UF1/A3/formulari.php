<?php
//min 1:18:20 https://www.youtube.com/watch?v=V6oUxZLWMzg&list=PLUznOARP_ddV78gyS28Rrgo8MjrCPI4Ea&index=7
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Benbingut".$_REQUEST["myradio"];
    
} else {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Exemple de formulari</title>
    
    </head>
    
    <body>
    
    <div style="margin: 30px 10%;">
    <h3>My form</h3>
    <form enctype="multipart/form-data" action="formulari.php" method="post" id="myform" name="myform">
    
        <label>Text</label> <input type="text" value="" size="30" maxlength="100" name="mytext" id="" /><br /><br />
    
        <input type="radio" name="myradio" value="1" /> First radio
        <input type="radio" checked="checked" name="myradio" value="2" /> Second radio<br /><br />
    
        <input type="checkbox" name="mycheckbox[]" value="1" /> First checkbox
        <input type="checkbox" checked="checked" name="mycheckbox[]" value="2" /> Second checkbox<br /><br />
    
        <label>Select ... </label>
        <select name="myselect" id="">
            <optgroup label="group 1">
                <option value="1" selected="selected">item one</option>
            </optgroup>
            <optgroup label="group 2" >
                <option value="2">item two</option>
            </optgroup>
        </select><br /><br />
    
        <textarea name="mytextarea" id="" rows="3" cols="30">
    Text area
        </textarea> <br /><br />
    
        <button id="mysubmit" type="submit">Submit</button><br /><br />
    
    </form>
    </div>
    
    </body>
    </html>

<?php
}
?>
