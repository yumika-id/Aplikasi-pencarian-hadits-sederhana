<?php
$q=@$_GET["q"];
if($q==""){
	exit();
}
if(isset($_POST["limit"], $_POST["start"]))
{
$string = file_get_contents("https://api.yumika.id/hadits/?q=".urlencode($q)."&hal=".$_POST['start']."&key=0ac2e378c1e8a52157ea50ea41d998a6");


	//check "https://yumika.id/api-radio-online-indonesia/" for latest key
$result = json_decode($string, true);
$i=1;
echo "<div id='accordion'>";
foreach($result as $row)
 {
?>


<div class="card">
    <div class="card-header" id="heading<?php echo $i; ?>">
					<small><?php echo $row["perawiHadits"].' - '.$row["noHadists"]; ?></small>
					<p><?php echo $row["summaryArab"]; ?></p>
					<p><?php echo $row["summaryIndo"]; ?></p>
					
      <h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">Selengkapnya</button></h5>
    </div>
    <div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
      <div class="card-body">
					<p><?php echo $row["haditsArab"]; ?></p>
					<p><?php echo $row["haditsIndo"]; ?></p>
      </div>
    </div>
</div>
</div>

<?php
	$i++;
 }
 echo "</div>";
}
?>
