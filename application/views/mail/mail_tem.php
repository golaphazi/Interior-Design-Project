<!DOCTYPE html>
<html>
    <head>
        <title>Email Template</title>
    </head>
    <body style="margin: 0;padding: 0;font-family: 'Oxygen', 'Helvetica Neue', 'Arial', 'sans-serif' !important; background:#fff !important;">
		<?php
		//$design_name = 'Home design template';
		?>
        <table style="width:100%;border: none;border-spacing: 0; margin: 0; padding: 0; background:#fff !important; margin-top:10px;">
            <tbody>

                <tr style="width: 100%;height: 80px;border:none;border-bottom: 1px solid #e0d7d7;">
                    <td style="border: none;vertical-align: middle;">
                        <div style="width: 100%;text-align: center; float: left;"><a href="http://underbygging.no/geilo-laft/"><img src="http://underbygging.no/geilo-laft/wp-content/uploads/2018/05/Logo.png" alt="Logo" width="100" height="50"></a></div>
                       
                    </td>
                </tr>

                <tr>
                    <td style="border: none;vertical-align: middle;padding: 35px 0 15px 0;">
                        <div style="font-size:32px;font-weight:700;color: #4d4d4d;text-align: center;">Vellykket designet ... !</div>
                    </td>
                </tr>

                <tr>
                    <td style="border: none;vertical-align: middle;">
                        <div style="font-size:14px;text-align:center;font-weight:normal;color: #777777;line-height: 21px;">
                            Nedenfor finner du detaljert informasjon om design
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="border: none;vertical-align: middle;">
            <center>
                <div style="width:100%;max-width:440px;font-weight:normal;font-size: 14px;line-height: 21px;color: #777777;text-align: left;border: 1px solid #e5e5e5; border-radius: 5px;padding: 12px 15px 15px;margin-top: 10px;margin-left: auto;margin-right: auto; display: inline-block;">
                   <span style="font-size: 20px;font-weight: 700;padding: 5px 0; color: #333; line-height: 3em;text-decoration: underline;"> Designdetaljer: </span><br />
                   <span style="font-size: 14px;font-weight: 600;color:#333; line-height: 2em;">Designnavn: <?= $design_name;?> </span> <br />
				   <?php
				    $checkEdit = $this->db->query("SELECT type.MODEL_NAME, type.MODEL_ID, item.ITEMS_NAME, item.ITEM_PRICE FROM design_partten AS par INNER JOIN model_type AS type ON par.MODEL_ID = type.MODEL_ID INNER JOIN model_items AS item ON par.ITEMS_ID = item.ITEMS_ID WHERE par.DESIGN_ID = '".$ipda."' AND par.DESIGN_STATUS = 'Active'");
					$result = $checkEdit->result_array();
					if(is_array($result) AND sizeof($result) > 0){
						foreach($result AS $subResut){
						?>
						<p>
							<span style="font-size: 14px;color:#333; line-height: 2em;"><strong><?= $subResut['MODEL_NAME'];?> - </strong> <?= $subResut['ITEMS_NAME'];?> :</span> 
							<span style="font-size: 12px;font-weight: 400;color:#333; line-height: 2em;"> <?= number_format($subResut['ITEM_PRICE']);?> kr.</span> <br />
						</p>
					<?php	
						}						
					}
					?>	
				  <span style="font-size: 16px;font-weight: 600;color:#333; line-height: 2em;">Totale Mengden : <?= number_format($total_amount);?> kr.</span> <br />
                </div>
            </center>
        </td>
    </tr>




<tr>
    <td style="border: none;vertical-align: middle; ">
<center>
    <div style="width: 100%; min-width:440px; margin-top:20px; display: inline-block;padding: 12px 15px 15px;font-size: 14px;color: #4d4d4d; border-top: 1px solid #e0d7d7;">
        Geilo Laft AS, <br/>
		Sandbrekketoppen 30, N-5224 Nesttun<br/>
		linn@geilolaft.no<br/>
		+47 950 80 118<br/>

    </div>
</center>
</td>
</tr>

</tbody>
</table>


</body>
</html>