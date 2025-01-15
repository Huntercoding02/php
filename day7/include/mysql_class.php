<?PHP
require_once('var.db.php');

class mysql_class {
    var $connect;

    function Connect2Web(){
        $this->connect = mysqli_connect( WebIP, WebUser, Webpassword );
        @mysqli_query($this->connect,"set character_set_results=utf8mb4");
        @mysqli_query($this->connect,"set character_set_client=utf8mb4");
        @mysqli_query($this->connect,"set character_set_connection=utf8mb4");
    }
    function dbname($dbname){
        mysqli_select_db($this->connect,$dbname);
        if(mysqli_error($this->connect)!=""){
            echo mysqli_error($this->connect);
        }
    }

    function closedb(){
        @mysqli_close( $this->connect );
    }

    function select($sql){
        // $sql = "SELECT * FROM user_info WHERE status in('0','1') ORDER BY createtime DESC";
        $result = mysqli_query($this->connect,$sql);
        $array_result = array();
        if($result){
            while($row = mysqli_fetch_object($result)) {
                array_push($array_result, $row);
            }
            mysqli_free_result($result);
        }else{
            if(mysqli_error($this->connect)!=""){
                echo mysqli_error($this->connect);
            }
            return false;
        }
       return  $array_result;
    }


    function execute($sql){
        $result = mysqli_query($this->connect,$sql);
        if($result){
            return true;
        }else{
             if(mysqli_error($this->connect)!=""){
                // echo mysqli_error($this->connect);
            };
            return false;
        }
    }
    function escape_string($str){
        return mysqli_real_escape_string($this->connect,$str);
    }
    
}
?>