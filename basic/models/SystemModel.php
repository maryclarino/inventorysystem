<?php 
	//MODEL FOR SAVE TEMPLATE FUNCTION
	
	namespace app\models;
	use yii\base\Model;
	use yii\db\Query;
	use Yii;
	use yii\db\Command;
	use yii\db\Connection;
class systemmodel extends Model{
	public function add_inventory($array){
		$connection = new \yii\db\Connection([
		 'dsn' => 'pgsql:host=localhost;port=5432;dbname=system',
		'username' => 'postgres',
		'password' => 'admin',
		]);
		$connection->open();
		$connection->createCommand()->insert('inventory', $array)->execute();							//insert in inventory table
	}
	
	public function ret_data(){
		$connection = new \yii\db\Connection([
		 'dsn' => 'pgsql:host=localhost;port=5432;dbname=system',
		'username' => 'postgres',
		'password' => 'admin',
		]);
		$connection->open();
		return $connection->createCommand('SELECT product_name from inventory')->queryColumn();			//retrieve to see current products
		
	}
	
	public function add_quantity($array){
		$connection = new \yii\db\Connection([
		 'dsn' => 'pgsql:host=localhost;port=5432;dbname=system',
		'username' => 'postgres',
		'password' => 'admin',
		]);
		$connection->open();
		
		$connection->createCommand()->update('inventory', array('quantity'=>new \yii\db\Expression('quantity+'.$array['quantity'].''),), 'product_name=:product_name',array(':product_name'=>$array['product_name']))->execute();
	}
	
	public function add_sales($array){
		$connection = new \yii\db\Connection([
		 'dsn' => 'pgsql:host=localhost;port=5432;dbname=system',
		'username' => 'postgres',
		'password' => 'admin',
		]);
		$connection->open();
		$connection->createCommand()->insert('transaction', $array)->execute();							//insert in transaction table
		
		
		$connection->createCommand()->update('inventory', array('quantity'=>new \yii\db\Expression('quantity-'.$array['quantity'].''),), 'product_name=:product_name',array(':product_name'=>$array['product_name']))->execute();
	
				
	}
	public function view_inventory(){
		$connection = new \yii\db\Connection([
		 'dsn' => 'pgsql:host=localhost;port=5432;dbname=system',
		'username' => 'postgres',
		'password' => 'admin',
		]);
		$connection->open();
		$command = $connection->createCommand('SELECT * from inventory ORDER by date desc');
		return $command->queryAll();			//retrieve to 
	}
	
	public function view_sales(){
		$connection = new \yii\db\Connection([
		 'dsn' => 'pgsql:host=localhost;port=5432;dbname=system',
		'username' => 'postgres',
		'password' => 'admin',
		]);
		$connection->open();
		$command = $connection->createCommand('SELECT * from transaction ORDER by date desc');
		return $command->queryAll();
		
	}
	
	
	
	public function delete_inventory(){
	}
	public function deleter_sales(){
	}
	
}