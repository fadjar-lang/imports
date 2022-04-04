<!DOCTYPE html>
<html>
<head>
	<title>Summary Data VA</title>
	<?php
	include 'koneksi.php';
	?>
</head>
<body>
	
	<h2>Summary Data VA</h2>
         <center><a href="index.php" class="btn btn-warning btn-xs">Kembali</a></center>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
            <th rowspan="2">No.</th>
            <th colspan="3">Control No.</th>
			<th colspan="4"rowspan="2">Target Part No</th>
            <th rowspan="2">Part Name</th>
            <th colspan="4"rowspan="2">Parent Part No</th>
            <th rowspan="2">Parent Part Name</th>
            <th rowspan="2">Country</th>
            <th rowspan="2">Supplier</th>
            <th rowspan="2">Short Name</th>
            <th rowspan="2">MC Category</th>
            <th rowspan="2">VA Idea Timing</th>
            <th rowspan="2">Section ASH/HM Pur</th>
            <th colspan="2">Proposal Confirmed by</th>
            <th colspan="2">Base Cost</th>
            <th colspan="3">CR Effect for target part</th>
            <th rowspan="2">Investment</th>
            <th rowspan="2">Currency</th>
            <th rowspan="2">Theme Title</th>
            <th rowspan="2">Proposal Summary</th>
            <th rowspan="2">Basic For Propose</th>
            <th rowspan="2">Proposal Class</th>
            <th rowspan="2">Target Model</th>
            <th rowspan="2">Section HG</th>
            <th colspan="2">Judgement PIC</th>
            <th rowspan="2">Judgement</th>
            <th rowspan="2">Reason for Judgement</th>
        </tr>
        <tr>
            <th>Main No</th>
            <th>Control No</th>
            <th>Rev No</th>
            <th>LO Pur</th>
            <th>ASH/HM Pur</th>
            <th>Cost</th>
            <th>Date</th>
            <th>Before</th>
            <th>After</th>
            <th>CR Plan</th>
            <th>Pur</th>
            <th>HG</th>
            

           
        </tr>
            
		<?php
		include 'koneksi.php';
		$data = mysqli_query($con, "SELECT * FROM tbdata");
		if ($data === FALSE){
			die(mysqli_error());
		}
		while($d = mysqli_fetch_assoc($data)){
			?>
			<tr>
                <td><?=$d['id']; ?></td>
				<td><?=$d['mainno']; ?></td>				
				<td><?=$d['controlno']; ?></td>
				<td><?=$d['revno']; ?></td>
                <td><?=$d['targetpartno']; ?></td>
                <td><?=$d['partno']; ?></td>
                <td><?=$d['partnoo']; ?></td>
                <td><?=$d['partnooo']; ?></td>
                <td><?=$d['partname']; ?></td>
                <td><?=$d['ppn']; ?></td>
                <td><?=$d['ppno']; ?></td>
                <td><?=$d['ppnoo']; ?></td>
                <td><?=$d['ppnooo']; ?></td>
                <td><?=$d['parentname']; ?></td>
                <td><?=$d['country']; ?></td>
                <td><?=$d['supp']; ?></td>
                <td><?=$d['sn']; ?></td>
                <td><?=$d['mc']; ?></td>
                <td><?=$d['vai']; ?></td>
                <td><?=$d['secashpur']; ?></td>
                <td><?=$d['lopur']; ?></td>
                <td><?=$d['ashpur']; ?></td>
                <td><?=$d['cost']; ?></td>
                <td><?=$d['date']; ?></td>
                <td><?=$d['bfre']; ?></td>
                <td><?=$d['aftr']; ?></td>
                <td><?=$d['crplan']; ?></td>
                <td><?=$d['invstmnt']; ?></td>
                <td><?=$d['currency']; ?></td>
                <td><?=$d['theme_title']; ?></td>
                <td><?=$d['prop_summary']; ?></td>
                <td><?=$d['bfp']; ?></td>
                <td><?=$d['prop_class']; ?></td>
                <td><?=$d['target_model']; ?></td>
                <td><?=$d['section_hg']; ?></td>
                <td><?=$d['jud_pur']; ?></td>
                <td><?=$d['jud_hg']; ?></td>
                <td><?=$d['judgement']; ?></td>
                <td><?=$d['reason']; ?></td>
              
             

                
                
                
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>