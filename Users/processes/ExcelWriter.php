<?php
 class ExcelWriter{
/*	if($excel==false){
	echo $excel->error;
	}*/
//Step 2. Now time to fetch data from mysql database. Before fetch data, call excel header having columns as values of array.

// this will create heading of each column in excel file
 
	public function rev_reports(){
		$myArr=array("SUBJECT","REVIEW","DATE");

		$excel->writeLine($myArr);
// now fetch data from database table, there is a new line create each time loop runs
		$qry=mysql_query("select rev_sub,rev_mess,date from review");

		if($qry!=false){
			$i=1;
			while($res=mysql_fetch_array($qry)) {
				$myArr=array($i,$res['rev_sub'],$res['rev_mess'],$res['date']);
				$excel->writeLine($myArr);
				$i++;

 }
}
	}
}
?>