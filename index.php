<!doctype html>
<html>
<head>
	<title>Rich Text Editor</title>
	<link href="./lib/css/style.css" rel="stylesheet" />
	<link href="./lib/css/font-awesome.css" rel="stylesheet" />
	<!-- <link href="./lib/css/bootstrap-colorpicker.css" rel="stylesheet" /> -->
	<link rel="stylesheet" href="./lib/css/colorpicker.css" type="text/css" />
</head>
<body onload="initDoc();">
	<form name="compForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="if(validateMode()){this.myDoc.value=oDoc.innerHTML;return true;}return false;">
		<input type="hidden" name="myDoc">
			<div id="toolbar">
				<div class="fore-wrapper">
					<div id="fore-palette"><i class='fa fa-font' style='color:#C96;'></i></div>
				</div>
				<div class="back-wrapper">
					<div id="back-palette"><i class='fa fa-font' style='background:#C96;'></i></div>
				</div>
	
				<!-- <div class="fore-wrapper"><i class='fa fa-font' style='color:#C96;'></i>
					<div class="fore-palette">
					</div>
				</div>
				<div class="back-wrapper"><i class='fa fa-font' style='background:#C96;'></i>
					<div class="back-palette">
					</div>
				</div> -->
				<div class="format-wrapper">Formatting
					<div class="heading-palette">
					</div>
				</div>
		</div>
		<div id="toolBar2">
			<a class="intLink" title="Undo" onclick="formatDoc('undo');" href="#"><i class='fa fa-undo'></i></a>
			<a class="intLink" title="Redo" onclick="formatDoc('redo');" href="#"><i class='fa fa-repeat'></i></a>
			<a class="intLink" title="Bold" onclick="formatDoc('bold');" href="#"><i class='fa fa-bold'></i></a>
			<a class="intLink" title="Italic" onclick="formatDoc('italic');" href="#"><i class='fa fa-italic'></i></a>
			<a class="intLink" title="Underline" onclick="formatDoc('underline');" href="#"><i class='fa fa-underline'></i></a>
			<a class="intLink" title="Strike Through" onclick="formatDoc('strikeThrough');" href="#"><i class='fa fa-strikethrough'></i></a>
			<a class="intLink" title="Left align" onclick="formatDoc('justifyleft');" href="#"><i class='fa fa-align-left'></i></a>
			<a class="intLink" title="Center align" onclick="formatDoc('justifycenter');" href="#"><i class='fa fa-align-center'></i></a>
			<a class="intLink" title="Right align" onclick="formatDoc('justifyright');" href="#"><i class='fa fa-align-right'></i></a>
			<a class="intLink" title="Justify" onclick="formatDoc('justifyFull');" href="#"><i class='fa fa-align-justify'></i></a>
			<a class="intLink" title="Subscript" onclick="formatDoc('subscript');" href="#"><i class='fa fa-subscript'></i></a>
			<a class="intLink" title="Superscript" onclick="formatDoc('superscript');" href="#"><i class='fa fa-superscript'></i></a>
			<a class="intLink" title="Numbered list" onclick="formatDoc('insertorderedlist');" href="#"><i class='fa fa-list-ol'></i></a>
			<a class="intLink" title="Dotted list" onclick="formatDoc('insertunorderedlist');" href="#"><i class='fa fa-list-ul'></i></a>
			<a class="intLink" title="Add indentation" onclick="formatDoc('indent');"href="#"><i class='fa fa-indent'></i></a>
			<a class="intLink" title="Delete indentation" onclick="formatDoc('outdent');" href="#"><i class='fa fa-outdent'></i></a>
			<a class="intLink" title="Hyperlink" onclick="var sLnk=prompt('Write the URL here','http:\/\/');if(sLnk&&sLnk!=''&&sLnk!='http://'){formatDoc('createlink',sLnk)}" href="#"><i class='fa fa-link'></i></a>
			<a class="intLink" title="Unlink" onclick="formatDoc('unlink');" href="#"><i class='fa fa-unlink'></i></a>
			<p id="editMode" class="intLink" title="Show HTML">
				<label for="switchBox">
					<input type="checkbox" name="switchMode" id="switchBox" onchange="setDocMode(this.checked);" /><i class="fa fa-code" aria-hidden="true"></i>
				</label>
			</p>
		</div>
		<div id="textBox" contenteditable="true"><b>Lorem ipsum</b></div>
		<!-- <p id="editMode"><input type="checkbox" name="switchMode" id="switchBox" onchange="setDocMode(this.checked);" /> <label for="switchBox">Show HTML</label></p> -->
		<p><input type="submit" name="add" value="Add" /></p>
</form>
<!-- <form name="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<p><input type="submit" name="submit" value="Show Result" /></p>
</form> -->
<!-- footer JS -->
<script type="text/javascript" src="./lib/js/jquery.min.js"></script>
<script type="text/javascript" src="./lib/js/custom-editor.js"></script>
<!-- <script type="text/javascript" src="./lib/js/bootstrap-colorpicker.js"></script> -->
<script type="text/javascript" src="./lib/js/colorpicker.js"></script>
</body>
</html>
<?php
	$con = mysqli_connect('localhost','root','','demo_editor_db') or die('Cannot established connection');
	
	if(isset($_POST['add']))
	{
		$insert = "insert into demo_content (description) values('".$_POST['myDoc']."')";

		$result = mysqli_query($con,$insert);
		$sql = "select * from demo_content order by id desc limit 1";
		$result = mysqli_query($con,$sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			echo "<table border='1' cellspacing='6' cellpadding='3'>";
			echo "<tr><th>Description</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<td>".$row["description"]."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
	}
	else
	{
		/* $sql = "select * from demo_content order by id desc limit 1";
		$result = mysqli_query($con,$sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			echo "<table border='1' cellspacing='6' cellpadding='3'>";
			echo "<tr><th>Description</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<td>".$row["description"]."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		} */
	}
?>