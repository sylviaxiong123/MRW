<?php
	
	function single_edit($tbl,$col,$id) {

		$result = getSingle($tbl, $col, $id);
		$getResult = mysqli_fetch_array($result);

		echo "<form action=\"phpscripts/edit.php\" method=\"post\">";
		echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
		echo "<input hidden name=\"col\" value=\"{$col}\">";
		echo "<input hidden name=\"id\" value=\"{$id}\">";
		for($i=0; $i<mysqli_num_fields($result); $i++) {

			$dataType = mysqli_fetch_field_direct($result,$i);
			$fieldName = $dataType->name;
			//echo $fieldName."<br>";
			$fieldType = $dataType->type;
			//echo $fieldType."<br>";
			if($fieldName != $col) {
				echo "<label>{$fieldName}</label><br>";
				if($fieldType != 252){
					echo "<input type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"><br><br>";
				}else{
					echo "<textarea name=\"$fieldName\">{$getResult[$i]}</textarea><br><br>";
				}
			}
		}
		echo "<input type=\"submit\" value=\"Save Content\">";
        echo "</form>";



	}


?> 