<?php
/*
*  This class for main container of website
*/


class Index
{

public function Select($connection,$table,$data,$all = "*",$PK = array(),$where = array(),$forenkeyTable = array()){
	
 $query = 'SELECT ';
 
 $col    = [];
 
 $lables = [];
 
 foreach($data as $key => $val){
    $col[]    = $key;
    $lables[] = $val; 	
	
	}
 
 	
 $forenTable = [];
 
 foreach($forenkeyTable as $forenkey => $forenVal){
    $i = 0;
	foreach($forenVal as $ky => $Val){
       $forenTable[$forenkey][$i] = $Val; 
           $i++;
	}
	
}//end of get relation table.
 //print_r($forenTable);
 
 if($all == '*')
    $query .= ' * FROM '.$table;
 else{
  	   $c = 0;
    while($c < count($col)){
		
		if($c+1 < count($col))
		    $query .= $col[$c].',';
		else
			$query .= $col[$c];
		
		$c++;
	}
	
	$query .= ' FROM '.$table;
 }
 
 if(count($where) > 0){
	
	foreach($where as $key => $val)
	    $query .= ' '.$key.' '.$val;
 }
 
 $string ='<div align="center" id="delete_'.$table.'"></div>
           <table class="table"><thead><tr><th>رقم</th>';
    
	$x = 0;
	while($x < count($lables)){
		$string .= '<th>'.$lables[$x].'</th>';
		$x++;
	}
	
 if(count($PK) > 0)
	 $string .= '<th style="text-align:center" colspan="2">التحكم</th>';
 
	
 
 $string .= '</tr></thead><tbody>';
  
 
 $Obj = mysqli_query($connection,$query);
 
 $check = false;

 
 $i = 1;
   
 while($row = mysqli_fetch_array($Obj)){
	  $check = true;
	  
	  $string .= '<tr class = "row'.$table.$row[$PK[0]].'"><td>'.$i.'</td>'; 
    
	   $c = 0;
	
	while($c < count($col)){
	 
	 
	 
	    if(array_key_exists($col[$c],$forenTable)){
	        $OBJ = Mysqli_Query($connection,"SELECT * FROM ".$forenTable[$col[$c]][0]." WHERE ".$col[$c]." = '".$row[$col[$c]]."'")or die(mysqli_error($connection));
			
			$Row2 = mysqli_fetch_array($OBJ);
			
	            $string .= '<td class = "'.$col[$c].$row[$PK[0]].'" style="text-align:right">'.$Row2[$forenTable[$col[$c]][1]].'</td>';			
			
	   }else
		   $string .= '<td class = "'.$col[$c].$row[$PK[0]].'" style="text-align:right">'.$row[$col[$c]].'</td>';
	  
	   $c++;
	}
       if(count($PK) > 0){ 
	     //data-backdrop="static" 
		$string .='
            <td align="center" class="upd_field_'.$table.$row[$PK[0]].'">
				<a href="#" id="'.$row[$PK[0]].'" title="تعديل السجل" class="update btn btn-warning" 
							                data-toggle="modal" data-target="#my'.$table.$row[$PK[0]].'">
					<i class="icon icon-pencil"></i>
				</a>
			</td>   
			<td align="center" class="del_field_'.$table.$row[$PK[0]].'">
				<a href="#" label="'.$table.'+'.$PK[0].'" onclick="return deleteTab(this);" id="'.$row[$PK[0]].'" title="حذف السجل" class="delete btn btn-danger">
				   <i class="icon icon-trash"></i>
				</a>
			      <!-- Modal -->
              <div class="modal fade" id="my'.$table.$row[$PK[0]].'"  data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel'.$row[$PK[0]].'">
                <div class="modal-dialog" role="document">
                  
                  <div class="modal-content">
                  <form class="update_'.$table.'_form"  method="post" onsubmit="return false;" action="">
                   
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 style="color:#000;" class="modal-title" id="myModalLabe'.$row[$PK[0]].'">تعديل سجل </h4>
                    </div>
					
                    <div class="modal-body">
                      
                     <div align="center" id="update_'.$table.$row[$PK[0]].'"></div>';
     $j = 0;
	 $fields ='';
	 while($j < count($col)){
		 
		  if(array_key_exists($col[$j],$forenTable)){
	        $OBJ = Mysqli_Query($connection,"SELECT * FROM ".$forenTable[$col[$j]][0]." WHERE ".$col[$j]." = '".$row[$col[$j]]."'")or die(mysqli_error($connection));
			
			$Row = mysqli_fetch_array($OBJ);
			
	 $string .= ' <div class="form-group">
                       <label for="'.$col[$j].$row[$PK[0]].'">'.$lables[$j].'</label>
                         <select class="form-control span4"  name="'.$col[$j].$row[$PK[0]].'" id="'.$col[$j].$row[$PK[0]].'">
						 <option value="'.$row[$col[$j]].'">'.$Row[$forenTable[$col[$j]][1]].'</option>';
						 
		$OBJ = Mysqli_Query($connection,'SELECT * FROM '.$forenTable[$col[$j]][0].'')or die(mysqli_error($connection));
		
	    while($Row = mysqli_fetch_array($OBJ))
            $string .= ' <option value="'.$Row[$col[$j]].'">'.$Row[$forenTable[$col[$j]][1]].'</option>';
						         			
	$string .= '</div></select>';	
	   
	   }else
	 $string .= ' <div class="form-group">
                       <label for="'.$col[$j].$row[$PK[0]].'">'.$lables[$j].'</label>
                         <input class="form-control span4" type="text" value="'.$row[$col[$j]].'" name="'.$col[$j].$row[$PK[0]].'" id="'.$col[$j].$row[$PK[0]].'">
				 </div>';
	 	
		if($j+1 < count($col))
		    $fields.= $col[$j].'+';
        else
			$fields.= $col[$j];		
     $j++;
	} 
                    $string .= '
					</div>

                    <div class="modal-footer">
                      <input label="'.$table.'+'.$PK[0].'+'.$fields.'" type="button" id ="'.$row[$PK[0]].'" onclick="updateTab(this);" class="sub_'.$table.$row[$PK[0]].' btn btn-primary" value="حفظ">
                      <button type="button" class="btn btn-default " data-dismiss="modal">الغاء</button>
                      
					</div>
                    </form>
                  </div><!-- end modal-content-->
               </div><!-- modal-dialog-->
              </div><!-- end of modle -->
								
				
		</td>';
		
		}
		
		$string .= '</tr>';
		
     $i++;
   }
$string .= '</tbody></table>';
    
	if($check){
		echo $string;
		return true;
		
	}else{
		return false;
	}
	
  }//end of function view control table;

public function download($connect){

?>
<div style="text-align:center">
			<div class="span12"><h4 id="lorem">الاقسام</h4></div></div>
<div class = "span12">
<?php

$this->Select($connect,"depts",array("dept_name" =>'اسم القسم'
							  ),"*",array('dept_id')
							  );

?>
</div>
<?php
	
}//end of display.

public function year_view($connect){

?>
<div style="text-align:center">
			<div class="span4"><h4 id="lorem">السنوات</h4></div></div>
<div class = "span4">
<?php

$this->Select($connect,"study_years",array("year_name" =>'اسم السنة'
							  ),"*",array('year_id')
							  );

?>
</div>
</section>
<?php
	
}//end of display.

public function teach_view($connect){

?>
<div style="text-align:center">
			<div class="span4"><h4 id="lorem">الاساتذة</h4></div></div>
<div class = "span16">
<?php

$this->Select($connect,"users",array("user_name" =>'الاسم',
                                              "password" =>'كلمة المرور',
											  "address" =>'العنوان',
											  "email" =>'البريد الالكتروني',
											  "dept_id" =>'القسم',
											  "phone" =>'الهاتف',
											  "u_date" =>'تاريخ الاضافة',
							  ),"*",array('user_id'),array(),
							  array('dept_id'=>array('depts','dept_name'))
							  );

?>
</div>
</section>
<?php
	
}//end of display.

public function stu_view($connect){

?>
<div style="text-align:center">
			<div class="span4"><h4 id="lorem">الطلاب</h4></div></div>
<div class = "span16">
<?php

$this->Select($connect,"users",array( "user_name"=>"الاسم",
                                             "password"=>"كلمة المرور",
											  "address" =>"العنوان",
											  "email" =>"البريد الالكتروني",
											  "dept_id" =>"القسم",
											  "phone" =>'الهاتف',
											  "un_id" =>'الرقم الجامعي',
											  "u_date" =>'تاريخ الاضافة'			 		
							  ),"*",array('user_id'),array(),
							  array('dept_id'=>array('depts','dept_name'))
							  );

?>
</div>
</section>
<?php
	
}//end of display.

public function subject_view($connect){

?>
<div style="text-align:center">
			<div class="span4"><h4 id="lorem">المواد</h4></div></div>
<div class = "span4">
<?php

$this->Select($connect,"subject",array("sub_name" =>'الاسم'
							  ),"*",array('sub_id')
							  );

?>
</div>
</section>
<?php
	
}//end of display.


public function ViewBook($connection,$table,$data,$all = "*",$PK = array(),$where = array(),$forenkeyTable = array()){
	
 $query = 'SELECT ';
 
 $col    = [];
 
 $lables = [];
 
 
 foreach($data as $key => $val){
    $col[]    = $key;
    $lables[] = $val; 	
	
	}
	
 $forenTable = [];
 
 foreach($forenkeyTable as $forenkey => $forenVal){
    $i = 0;
	foreach($forenVal as $ky => $Val){
       $forenTable[$forenkey][$i] = $Val; 
           $i++;
	}
	
}//end of get relation table.
 //print_r($forenTable);
 
 if($all == '*')
    $query .= ' * FROM '.$table;
 else{
  	   $c = 0;
    while($c < count($col)){
		
		if($c+1 < count($col))
		    $query .= $col[$c].',';
		else
			$query .= $col[$c];
		
		$c++;
	}
	
	$query .= ' FROM '.$table;
 }
 
 if(count($where) > 0){
	
	foreach($where as $key => $val)
	    $query .= ' '.$key.' '.$val;
 }
 
 $string ='<div align="center" id="delete_'.$table.'"></div>
           <table class="table"><thead><tr><th>رقم</th>';
    
	$x = 0;
	while($x < count($lables)){
		$string .= '<th>'.$lables[$x].'</th>';
		$x++;
	}
	
 if(count($PK) > 0)
	 $string .= '<th>تحميل</th>';
 
	
 
 $string .= '</tr></thead><tbody>';
  
 
 $Obj = Mysqli_Query($connection,$query);
 
 $check = false;

 
 $i = 1;
   
 while($row = mysqli_fetch_array($Obj)){
	  $check = true;
	  
	  $string .= '<tr class = "row'.$table.$row[$PK[0]].'"><td>'.$i.'</td>'; 
    
	   $c = 0;
	
	while($c < count($col)){
	
	    if(array_key_exists($col[$c],$forenTable)){
	        $OBJ = Mysqli_Query($connection,"SELECT * FROM ".$forenTable[$col[$c]][0]." WHERE ".$col[$c]." = '".$row[$col[$c]]."'")or die(mysqli_error($connection));
			
			$Row = mysqli_fetch_array($OBJ);
			
	            $string .= '<td class = "'.$col[$c].$row[$PK[0]].'" style="text-align:right">'.$Row[$forenTable[$col[$c]][1]].'</td>';			
			
	   }else
		   $string .= '<td class = "'.$col[$c].$row[$PK[0]].'" style="text-align:right">'.$row[$col[$c]].'</td>';
	      	   
	   $c++;
	}
       if(count($PK) > 0){ 
	      
		$string .='
			<td class="del_field_'.$table.$row[$PK[0]].'">
				<a href="./file/'.$row['sourcePath'].'" label="'.$table.'+'.$PK[0].'" " id="'.$row[$PK[0]].'" title="إضغط للتحميل" class="btn btn-success">
				   <i class="icon icon-download"></i>
				</a></td>';
		
		}
		
		$string .= '</tr>';
		
     $i++;
   }
$string .= '</tbody></table>';
    
	if($check){
		echo $string;
		return true;
		
	}else{
		return false;
	}
	
  }//end of function view control table;

 }//end of class
?>
