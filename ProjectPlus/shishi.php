<!DOCTYPE html>
<html>
<head>
<title>test.html</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>  
$(document).ready(function() {  
  
var MaxInputs       = 8; //maximum input boxes allowed  
var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID  
var AddButton       = $("#AddMoreFileBox"); //Add button ID  
  
var x = InputsWrapper.length; //initlal text box count  
var FieldCount=1; //to keep track of text box added  
  
$(AddButton).click(function (e)  //on add input button click  
{  
        if(x <= MaxInputs) //max input box allowed  
        {  
            FieldCount++; //text box added increment  
            //add input box  
            $(InputsWrapper).append('<div><input type="text" name="mytext[]" id="field_'+ FieldCount +'" value="Text'+ FieldCount +'"/><a href="#" class="removeclass">×</a></div>');  
            x++; //text box increment  
        }  
return false;  
});  
  
$("body").on("click",".removeclass", function(e){ //user click on remove text  
        if( x > 1 ) {  
                $(this).parent('div').remove(); //remove text box  
                x--; //decrement textbox  
        }  
return false;  
})   
  
});  
</script>
</head>
<body>
<a href="#" id="AddMoreFileBox" class="btn btn-info">添加更多的input输入框</a></span></p>  
<div id="InputsWrapper">  
<div><input type="text" name="mytext[]" id="field_1" value="Text 1"/><a href="#" class="removeclass">×</a></div>  
</div> 
</table>
</form>
</body>
</html> 