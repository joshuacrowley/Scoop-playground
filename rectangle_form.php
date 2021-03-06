<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Scoop 2.0</title>
    <link rel="stylesheet" href="grid.css" type="text/css" media="screen"></script>
    <link rel="stylesheet" href="screen.css" type="text/css" media="screen"></script>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	</head>
	
<body>	


<div class="container_6">
				
	<a href="index.php"><div id="header" class="grid_1"><p class="title">Home</p></div></a>	
	<div id="header-type" class="grid_5"><h2 id="text-box">Rectangle</h2></div>	
	
	<script type="text/javascript">
    $(function() {
        var newRowNum = 0;

        $('#addnew').click(function() {
            newRowNum++;
            var addRow = $(this).parent().parent();
            var newRow = addRow.clone();
            $('input', addRow).val('');
            $('td:first-child', newRow).html(newRowNum);
            $('td:last-child', newRow).html('<a href="" class="remove">Remove<\/a>');
            $('input', newRow).each(function() {
                var newID = 'article[' + newRowNum + '][' +  $(this).attr('id') + ']';
                $(this).attr('name', newID);
            });
            addRow.before(newRow);

            $('a.remove', newRow).click(function() {
                $(this).parent().parent().remove();
                return false;
            });

            return false;
        });
    });
 	</script>
 	
	<script type="text/javascript">
	$(document).ready(function(){
		$("#rectangle_form").submit( function () {    
		  $.post(
		   'rectangle_post.php',
			$(this).serialize(),
			function(data){
			  $("#results").html(data)
			}
		  );
		  if(this.rules.checked){
		  return;
		  }else{
		  return false}; 
		});   
	});
	</script>
	
	<div id="menu" class="grid_3">	
		<form name="rectangle_form" id="rectangle_form" action="rectangle_post.php" method="post">
		<table id="tabdata">
			<tbody>
				<tr>
					<td><a id="addnew" href="">Add</a></td>
					<td><input id="url" placeholder="url" name="article[0][url]" type="text" /></td>
					<td><input id="para" placeholder="paragraph" name="article[0][para]" type="text" /></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div id="panel">
		<input type="submit" value="Scoop!" id="publish"/>
		Export?<input type="checkbox" name="rules" />
		</div>
		</form>	
	</div>
		
	<div id="menu" class="grid_3">
		<div id="results"></div>
	</div>	
	
</div>	
</body>
</html>