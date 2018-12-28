<?php 
// /htdocs/wlib/html/pages/index
class Db{
    protected $pdo;
	public $data = array();
	
	public function pdo_connect(){
		try{
            $this->pdo = new PDO('mysql:host=192.168.1.18; port=3306;dbname=artlib; charset=utf8', 'user117', 'user1171357909');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
		
	}

	public function pdo_query($query){
	
		$this->pdo->beginTransaction();
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $this->pdo->commit();
		return $result;
	
	}
	
	
	
    public function __construct(){
       $this->pdo_connect();
	   $this->data = json_encode($this->pdo_query('
		   SELECT newinlib_itemcontent.id,newinlib_itemcontent.title,newinlib_itemcontent.content, newinlib_item.avatar_img_name 
		   FROM newinlib_itemcontent 
		   JOIN newinlib_item ON newinlib_itemcontent.item_id = newinlib_item.id
		   ORDER BY id DESC LIMIT 21
	   '));
   
    }
	
	
}
$con = new Db();



?>

