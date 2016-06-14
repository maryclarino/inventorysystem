<?php
/* @var $this yii\web\View */
$this->title = 'Inventory System';
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<html>
<head>
	<script>
		$(document).ready(function(){
			$('#addinventory').appendTo("body");
			$('#addsales').appendTo("body");
			
		}
	</script>
</head>
<body>
	<div class="site-index">
		<button type = "submit" title = "Add Inventory" class ="btn btn-lg btn-primary" data-toggle ="modal" data-target = "#addinventory">  <span style ="font-size:1.5em;" class="glyphicon glyphicon-plus"></span> </button>
		<br>
		<br>
		<button type = "submit" title = "Add Quantity" class ="btn btn-lg btn-primary" data-toggle ="modal" data-target = "#addquantity">  <span style ="font-size:1.5em;" class="glyphicon glyphicon-list-alt"></span> </button>
		
		<br>
		<br>
		<?php
		
		
		$form= ActiveForm::begin([
				'id'=>'form',
				'method'=>'get',
				'action'=>Url::to(['site/getmonthinventory'])
				]);
				
				
				echo '<input style ="float:left;"type="month" name="month_inventory">&nbsp;';
				
				echo '<button type="submit" class="btn btn-primary" style="height:35px;width:35px;"><span style="margin-left:-5px;font-size:1.5em;" class="glyphicon glyphicon-ok"></span></button>';
				ActiveForm::end();
				
				echo '<button title = "View Inventory" class ="btn btn-lg btn-primary" data-toggle ="modal" data-target = "#viewinventory">  <span style ="font-size:1.5em;" class="glyphicon glyphicon-sunglasses"></span> </button>';
		
		?>
		
		
		<br>
		<br>
		<!--<button type = "submit" title = "Delete Inventory" class ="btn btn-lg btn-primary" data-toggle ="modal" data-target = "#deleteinventory">  <span style ="font-size:1.5em;" class="glyphicon glyphicon-trash"></span> </button>
		<br>
		<br>-->
		<button type = "submit" title = "Add Sales" class ="btn btn-lg btn-success" data-toggle ="modal" data-target = "#addsales">  <span style ="font-size:1.5em;" class="glyphicon glyphicon-ruble"></span> </button>
		<br>
		<br>
		
		<?php
		$form= ActiveForm::begin([
				'id'=>'form',
				'method'=>'get',
				'action'=>Url::to(['site/getmonthsales'])
				]);
				
				echo '<input type="month" name="month_sales">&nbsp;';
				
				echo '<button type="submit" class="btn btn-success" style="height:35px;width:35px;"><span style="margin-left:-5px;font-size:1.5em;" class="glyphicon glyphicon-ok"></span></button>';
				ActiveForm::end();
		
		?>
		
		
		
		<button type = "submit" title = "View Sales" class ="btn btn-lg btn-success" data-toggle ="modal" data-target = "#viewsales">  <span style ="font-size:1.5em;" class="glyphicon glyphicon-sunglasses"></span> </button>
		<br>
		<br>
	
		<!--<button type = "submit" title = "Delete Sales" class ="btn btn-lg btn-success" data-toggle ="modal" data-target = "#deletesales">  <span style ="font-size:1.5em;" class="glyphicon glyphicon-trash"></span> </button>-->
		<br>
		<br>
		
		
	</div>
	
	<!-- Modal FOR ADD INVENTORY -->
	  <div class="modal fade" id="addinventory" role="dialog"">
		<div class="modal-dialog">
		  <div class="modal-content" style="width:500px;">
			<div class="modal-header"  style="height:50px;">
			  <b> ADD INVENTORY </b>
			  <button type="button" class="btn btn-default" style="margin-top:-30px;margin-left:430px;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
			
			</div>
			
			<div class="modal-body" >
			<?php $form2= ActiveForm::begin([
				'id'=>'form',
				'method'=>'get',
				'action'=>Url::to(['site/addinventory'])
				
			])?>
				<!--date-->
				<input type ="date" class = "form-control" name ="date" placeholder ="Product Name"></input>
				<br>
				<!--product name-->
				<input type ="text" class = "form-control" name ="product_name" placeholder ="Product Name"></input>
				<br>
				<!--product desc-->
				<textarea rows ="2" class = "form-control" name ="product_desc" placeholder ="Product Description"></textarea>
				<br>
				<!--quantity-->
				<input type ="number" class = "form-control" name ="quantity" placeholder ="Quantity"></input>
				<br>
				<!--Original Price-->
				<input type ="text" class = "form-control" name ="orig_price" placeholder ="Orginal Price"></input>
				<br>
				<!--Selling Price-->
				<input type ="text" class = "form-control" name ="sell_price" placeholder ="Selling Price"></input>
				<br>
				<button type = "submit" title = "Add Inventory" class ="btn btn-primary" >  <span style ="font-size:1.5em;" class="glyphicon glyphicon-plus"></span> </button>
			<?php ActiveForm::end() ?>	
				
			</div>
			
		 </div>
		  </div>
	</div>
	<!-- END Modal FOR INVENTORY-->
	
	<!-- Modal FOR ADD QUANTITY -->
	  <div class="modal fade" id="addquantity" role="dialog"">
		<div class="modal-dialog">
		  <div class="modal-content" style="width:300px;">
			<div class="modal-header"  style="height:50px;">
			  <b> ADD QUANTITY </b>
			  <button type="button" class="btn btn-default" style="margin-top:-30px;margin-left:220px;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
			
			</div>
			<div class="modal-body" >
			
			<?php $form= ActiveForm::begin([
				'id'=>'form',
				'method'=>'get',
				'action'=>Url::to(['site/addquantity'])
				])?>
				
				<!--product name-->
				<select class = "form-control" name ="product_name">
					<?php 
						$cnt=0;
						while($cnt!=count($inventory)){
							echo '<option value="'.$inventory[$cnt].'">'.$inventory[$cnt].'</option>';
							$cnt++;
						}
					
					?>
				
				</select>
				<br>
				<!--quantity-->
				<input type ="number" class = "form-control" name ="quantity" placeholder ="Quantity"></input>
				<br>
				
				<button type = "submit" title = "Add Quantity" class ="btn btn-primary" >  <span style ="font-size:1.5em;" class="glyphicon glyphicon-list-alt"></span> </button>
				
				
				
			<?php ActiveForm::end() ?>	
			</div>
			
		  </div>
		  </div>
	</div>
	<!-- END Modal FOR QUANTITY-->
	
	<!-- Modal FOR ADD SALES -->
	  <div class="modal fade" id="addsales" role="dialog"">
		<div class="modal-dialog">
		  <div class="modal-content" style="width:300px;">
			<div class="modal-header"  style="height:50px;">
			  <b>ADD SALES</b>
			  
			  <button type="button" class="btn btn-default" style="margin-top:-30px;margin-left:220px;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
			
			</div>
			<div class="modal-body" >
			
			<?php $form= ActiveForm::begin([
				'id'=>'form',
				'method'=>'get',
				'action'=>Url::to(['site/addsales'])
				])?>
				
				<input type ="date" class = "form-control" name ="date" placeholder ="Product Name"></input>
				<br>
			
				<!--product name-->
				<select class = "form-control" name ="product_name">
					<?php 
						$cnt=0;
						while($cnt!=count($inventory)){
							echo '<option value="'.$inventory[$cnt].'">'.$inventory[$cnt].'</option>';
							$cnt++;
						}
					
					?>
				
				</select>
				<br>
				<!--quantity-->
				<input type ="number" class = "form-control" name ="quantity" placeholder ="Quantity"></input>
				<br>
				<!--Selling Price-->
				<input type ="text" class = "form-control" name ="sell_price" placeholder ="Selling Price"></input>
				<br>
				<button type = "submit" title = "Add Sales" class ="btn btn-success" >  <span style ="font-size:1.5em;" class="glyphicon glyphicon-ruble"></span> </button>
				
				
				
			<?php ActiveForm::end() ?>	
			</div>
			
		  </div>
		  </div>
	</div>
	<!-- END Modal FOR SALES-->
	
	<!-- Modal FOR DELETE INVENTORY 
	  <div class="modal fade" id="deleteinventory" role="dialog"">
		<div class="modal-dialog">
		  <div class="modal-content" style="width:700px;">
			<div class="modal-header"  style="height:50px;">
			  
			  <button type="button" class="btn btn-default" style="margin-left:630px;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
			
			</div>
			
			<div class="modal-body" >
			
				<?php 
				/*$form= ActiveForm::begin([
				'id'=>'form',
				'method'=>'get',
				'action'=>Url::to(['site/deleteinventory'])
				]);
				
				$cnt =0;
				echo '<b>DATE | PRODUCT NAME | QUANTITY | SELL PRICE</b><br><br>';
				while($cnt!= count($data_sales)){
				
					echo "<input type = 'checkbox' name ='del_inv[]' value =".$cnt.">";
					echo $data_sales[$cnt]['date'].' | ';
					echo $data_sales[$cnt]['product_name'].' | ';
					echo $data_sales[$cnt]['quantity'].' | ';
					echo $data_sales[$cnt]['sell_price'].' <br>';
					echo '</input>';
					$cnt++;
				}
				
				echo '<button type = "submit" title = "Delete Inventory" class ="btn btn-primary" >  <span style ="font-size:1.5em;" class="glyphicon glyphicon-trash"></span> </button>';
				*/?>
			</div>
			
		  </div>
		  </div>
	</div>
	 END Modal FOR DELETE INVENTORY-->
	
	<!-- Modal FOR DELETE SALES 
	  <div class="modal fade" id="deletesales" role="dialog"">
		<div class="modal-dialog">
		  <div class="modal-content" style="width:700px;">
			<div class="modal-header"  style="height:50px;">
			  
			  <button type="button" class="btn btn-default" style="margin-left:630px;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
			
			</div>
			
			<div class="modal-body" >
				<?php 
				/*$cnt =0;
				echo '<b>DATE | PRODUCT NAME | QUANTITY | SELL PRICE</b><br><br>';
				while($cnt!= count($data_sales)){
					echo '<input type = "checkbox" name ="del_sales">';
					echo $data_sales[$cnt]['date'].' | ';
					echo $data_sales[$cnt]['product_name'].' | ';
					echo $data_sales[$cnt]['quantity'].' | ';
					echo $data_sales[$cnt]['sell_price'].' <br>';
					echo '</input>';
					$cnt++;
				}
				*/
				?>
			</div>
			
		  </div>
		  </div>
	</div>
	 END Modal FOR SALES-->
	
	<!-- Modal FOR VIEW INVENTORY-->
	  <div class="modal fade" id="viewinventory" role="dialog" data-backdrop="static">
		<div class="modal-dialog">
		  <div class="modal-content" style="width:700px;">
			<div class="modal-header"  style="height:50px;">
			  <b>VIEW INVENTORY</b>
			  <button type="button" class="btn btn-default" style="margin-top:-30px;margin-left:630px;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
			
			</div>
			
			<div class="modal-body" >

			
				<?php 
				
				
				$cnt =0;
				echo '<b>DATE | PRODUCT NAME | PRODUCT DESCRIPTION | QUANTITY | ORIG PRICE | SELL PRICE</b><br><br>';
				while($cnt!= count($data_inventory)){
					$date = $data_inventory[$cnt]['date'];
					$datepart = split('-',$date);
					$datepart_orig = split('-',$month_inventory);
					if(($datepart[0]==$datepart_orig[0] &&$datepart[1]==$datepart_orig[1])|| $month_inventory == ''){
					echo $data_inventory[$cnt]['date'].' | ';
					echo $data_inventory[$cnt]['product_name'].' | ';
					echo $data_inventory[$cnt]['product_desc'].' | ';
					echo $data_inventory[$cnt]['quantity'].' | ';
					echo $data_inventory[$cnt]['orig_price'].' | ';
					echo $data_inventory[$cnt]['sell_price'].' <br>';
					}
					$cnt++;
				}
				
				?>
			</div>
			
		  </div>
		  </div>
	</div>
	<!-- END Modal FOR VIEW INVENTORY-->
	
	<!-- Modal FOR VIEW SALES-->
	  <div class="modal fade" id="viewsales" role="dialog"">
		<div class="modal-dialog">
		  <div class="modal-content" style="width:500px;">
			<div class="modal-header"  style="height:50px;">
			  <b>VIEW SALES</b>
			  <button type="button" class="btn btn-default" style="margin-top:-30px;margin-left:430px;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
			
			</div>
			
			<div class="modal-body" >
				<?php 
				$cnt =0;
				$cnt2=0;
				$profit = array();
				$income = array();
				$expense = array();
				while($cnt2!=count($data_inventory)){
					$profit[$data_inventory[$cnt2]['product_name']] = 0;
					$income[$data_inventory[$cnt2]['product_name']] = 0;
					$expense[$data_inventory[$cnt2]['product_name']] = 0;
					
					$cnt2++;
				}
				
				
				echo '<b>DATE | PRODUCT NAME | QUANTITY | SELL PRICE</b><br><br>';
				
				while($cnt!= count($data_sales)){
					$date = $data_sales[$cnt]['date'];
					$datepart = split('-',$date);
					$datepart_orig = split('-',$month_sales);									//date chosen by the user
					if(($datepart[0]==$datepart_orig[0] && $datepart[1]==$datepart_orig[1]) || $month_sales==''){
						
						$cnt2=0;
						while($cnt2!=count($data_inventory)){
							if($data_inventory[$cnt2]['product_name'] == $data_sales[$cnt]['product_name']){
								$expense[$data_inventory[$cnt2]['product_name']] = $expense[$data_inventory[$cnt2]['product_name']]+(int)$data_inventory[$cnt2]['orig_price'];
								$income[$data_inventory[$cnt2]['product_name']] = $income[$data_inventory[$cnt2]['product_name']]+((int)$data_sales[$cnt]['quantity']*(int)$data_sales[$cnt]['sell_price']);
							}
							$cnt2++;
						}
					
						echo $data_sales[$cnt]['date'].' | ';
						echo $data_sales[$cnt]['product_name'].' | ';
						echo $data_sales[$cnt]['quantity'].' | ';
						echo $data_sales[$cnt]['sell_price'].' <br>';
					}
					$cnt++;
				}
					
				echo '<br><b>MONTLY REPORT: '.($month_sales).' </b>';
				$total_profit = 0;
				$total_income = 0;
				$total_expense = 0;
				$cnt2=0;
				echo '<br><br><i><b>INCOME BREAKDOWN:</b></i><br>';
				while($cnt2!=count($data_inventory)){
					echo ($data_inventory[$cnt2]['product_name']).'='.($income[$data_inventory[$cnt2]['product_name']]).'<br>';
					$total_income = $income[$data_inventory[$cnt2]['product_name']] + $total_income;
					$cnt2++;
				}
				echo '<b>TOTAL INCOME: '.$total_income.'</b>';
			
				$cnt2=0;
				echo '<br><br><i><b>EXPENSE BREAKDOWN:</b></i><br>';
				while($cnt2!=count($data_inventory)){
					echo ($data_inventory[$cnt2]['product_name']).'='.($expense[$data_inventory[$cnt2]['product_name']]).'<br>';
					$total_expense = $expense[$data_inventory[$cnt2]['product_name']] + $total_expense;
					$cnt2++;
				}
				echo '<b>TOTAL EXPENSE: '.$total_expense.'</b>';
				
				$cnt2=0;
				$profit = 0;
				echo '<br><br><i><b>PROFIT BREAKDOWN:</b></i><br>';
				while($cnt2!=count($data_inventory)){
					echo ($data_inventory[$cnt2]['product_name']).'='.((int)$income[$data_inventory[$cnt2]['product_name']]-(int)$expense[$data_inventory[$cnt2]['product_name']]).'<br>';
					$cnt2++;
				}
				echo '<b>TOTAL PROFIT: '.($total_income-$total_expense).'</b>';
				
				
				?>
			</div>
			
		  </div>
		  </div>
	</div>
	<!-- END Modal FOR SALES-->
	
</body>
</html>
