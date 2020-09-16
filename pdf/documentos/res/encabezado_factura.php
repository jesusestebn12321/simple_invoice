<?php 
	if ($con){
?>
    <table cellspacing="0" style="width: 100%;">
        <tr>

           <td style="width: 25%; color: #444444;">
                <img style="width: 50%;" src="../../img/logo.jpg" alt="Logo">
                <br>
                <br>
                <span style="color: #34495e;font-size:10px;"><?php echo "R.U.C. 0916593338001";?></span>
				<br> 
				<span style="color: #34495e;font-size:10px;"><?php echo "AUT. S.R.L.:1126391281";?></span>
				<br> 
				<span style="color: #34495e;font-size:8px;"><?php echo "'OBLIGADO A LEVAR CONTABILIDAD'";?></span>
            </td>
			<td style="width: 50%; color: #34495e;font-size:10px;text-align:center">
                <span style="color: #34495e;font-size:18px;font-weight:bold"><?php echo "VAZQUEZ VAZQUEZ EFRAIN SANTIAGO";?></span>
                <br>
                <span style="color: #34495e;font-size:16px;font-weight:bold"><?php echo "CENTRO FERRETERO 'BACILIO'";?></span>
				<br>
				<span style="color: #34495e;font-size:12px;"><?php echo "FERRETERIA EN GENERAL-VENTAS POR MAYOR Y MENOR";?></span>
				<br> 
				Teléfono: <?php echo "24975159 * Cel: 0990151449";?>
				<br>
				Email: <?php echo "bacichato@hotmail.com";?>
				<br>
                <?php echo "Guayaquil-Ecuador";?>
				<br> 
				<span style="width: 25%; color: #34495e;font-size:8px;text-align:right;"><?php echo "DOCUMENTO CATEGORIZADO: NO";?></span>
				<br> 
				<span style="width: 25%; color: #34495e;font-size:8px;text-align:right;"><?php echo "FECHA DE AUT. 10/03/2020";?></span>
            </td>
			<td style="width: 25%;text-align:right">
			FACTURA Nº<br>
			001-001-<?php echo $numero_factura;?>
			
		

			</td>
			
        </tr>
    </table>
	<?php }?>	