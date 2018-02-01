<form>

<?php
 echo '<table id="mytable" class="table .table-striped">';
echo '<th>MODULE NAME</th><th>REVIEW SUBJECT</th><th>REVIEW</th><th>DATE MADE </th>';

foreach($spot_rev AS $res ){


echo
 '<tr><td>'.$res['m_name'].'</td><td>'.$res['author'].'</td><td>'.$res['rev_sub'].'</td><td>'.$res['rev_mess'].'</td><td>'.$res['date'].'</td></tr>';
 
}
echo '</table>';

?>
</form>