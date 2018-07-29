<?php

class DB
{
	
    public   $query = "";
    public $db = "";
    private $settings = array();
		var $mtStart;

	
    function __construct(){
        $this->settings['dbdatabase'] = DATABASE;
        $this->settings['dbpassword'] = PASSWORD;
        $this->settings['dbusername'] = USERNAME;
        $this->settings['dbhost'] = DATABASEHOST;

        $this->db = @mysql_connect($this->settings['dbhost'], $this->settings['dbusername'],
            $this->settings['dbpassword']);
        if (!$this->db)
            die($this->debug(true));

       
        $selectdb = @mysql_select_db($this->settings['dbdatabase']);
        if (!$selectdb)
            die($this->debug());

    } // end constructor


  
   
    function select( $query,  $maxRows = 0,  $pageNum = 0){
        $this->query = $query;

        // start limit if $maxRows is greater than 0
        if ($maxRows > 0){
            $startRow = $pageNum * $maxRows;
            $query = sprintf("%s LIMIT %d, %d", $query, $startRow, $maxRows);
        }

        //		echo $query;
        $result = mysql_query($query, $this->db);

        if ($this->error()){
            die($this->debug("","",$query));
		}
        $output = false;

        for ($n = 0; $n < mysql_num_rows($result); $n++){
            $row = mysql_fetch_assoc($result);
            $output[$n] = $row;
        }

        return $output;

    } // end select


    function misc($query){

        $this->query = $query;
        $result = mysql_query($query, $this->db);

        if ($this->error()){
            die($this->debug());
		}
		
        if ($result == true){

            return true;

        }else{

            return false;

        }

    }

    function numrows($query){
      
		$this->query = $query;
		$result = mysql_query($query, $this->db) or die($this->debug("","",$query)); 
		return mysql_num_rows($result);
		
    }


    function paginate($numRows,$maxRows, $pageNum = 0,  $pageVar = "page",  $class =  "txtLink"){
        global $appImagesUrl, $lang;
        $navigation = "";

        // get total pages
        $totalPages = ceil($numRows / $maxRows);

        // develop query string minus page vars
        $queryString = "";
        if (!empty($_SERVER['QUERY_STRING'])){
            $params = explode("&", $_SERVER['QUERY_STRING']);
            $newParams = array();
            foreach ($params as $param){
                if (stristr($param, $pageVar) == false){
                    array_push($newParams, $param);
                }
            }
            if (count($newParams) != 0){
                $queryString = "&" . htmlentities(implode("&", $newParams));
            }
        }

        // get current page
        $currentPage = $_SERVER['PHP_SELF'];

        // build page navigation
        if ($totalPages > 1){
            $navigation = ''; //'Total Pages '.$totalPages.$lang['misc']['pages'];

            $upper_limit = $pageNum + 3;
            $lower_limit = $pageNum - 3;

            if ($pageNum > 0){ // Show if not first page

                if (($pageNum - 2) > 0){
                    $first = sprintf("%s?" . $pageVar . "=%d%s", $currentPage, 0, $queryString);
                    $navigation .= "<a href='" . $first . "' class='" . $class . "'>&laquo;</a> ";
                }

                $prev = sprintf("%s?" . $pageVar . "=%d%s", $currentPage, max(0, $pageNum - 1),
                    $queryString);
                $navigation .= "<a href='" . $prev . "' class='" . $class . "'>&lt;</a> ";
            } // Show if not first page

            // get in between pages
            for ($i = 0; $i < $totalPages; $i++){

                $pageNo = $i + 1;

                if ($i == $pageNum){
                    $navigation .= "&nbsp;<strong>[" . $pageNo . "]</strong>&nbsp;";
                } elseif ($i !== $pageNum && $i < $upper_limit && $i > $lower_limit){
					
                    $noLink = sprintf("%s?" . $pageVar . "=%d%s", $currentPage, $i, $queryString);
                    $navigation .= "&nbsp;<a href='" . $noLink . "' class='" . $class . "'>" . $pageNo .
                        "</a>&nbsp;";
                } elseif (($i - $lower_limit) == 0){
                    $navigation .= "&hellip;";
                }
            }

            if (($pageNum + 1) < $totalPages){ // Show if not last page
			
                $next = sprintf("%s?" . $pageVar . "=%d%s", $currentPage, min($totalPages, $pageNum +
                    1), $queryString);
                $navigation .= "<a href='" . $next . "' class='" . $class . "'>&gt;</a> ";
                if (($pageNum + 3) < $totalPages){
					
                    $last = sprintf("%s?" . $pageVar . "=%d%s", $currentPage, $totalPages - 1, $queryString);
                    $navigation .= "<a href='" . $last . "' class='" . $class . "'>&raquo;</a>";
                }
            } // Show if not last page

        } // end if total pages is greater than one

        return $navigation;

    }

    function insert($tablename, $record){
		
        if (!is_array($record)){
            die($this->debug("array", "Insert", $tablename));
		}
		
        $count = 0;
        foreach ($record as $key => $val){
            if ($count == 0){
                $fields = "`" . $key . "`";
                $values = $val;
            }else{
                $fields .= ", " . "`" . $key . "`";
                $values .= ", " . $val;
            }
            $count++;
        }

       $query = "INSERT INTO " . $tablename . " (" . $fields . ") VALUES (" . $values .
            ")";

        $this->query = $query;
        mysql_query($query, $this->db);

        if ($this->error()){
            die($this->debug("","",$tablename));
		}
		
        if ($this->affected() > 0){
            return true;
		}else{
            return false;
		}

    } 


    function update($tablename,  $record, $where){
        
		if (!is_array($record)){
            die($this->debug("array", "Update", $tablename));
		}

        $count = 0;

        foreach ($record as $key => $val){
            if ($count == 0){
                $set = "`" . $key . "`" . "=" . $val;
			}else{
                $set .= ", " . "`" . $key . "`" . "= " . $val;
			}
            $count++;
        }

        $query = "UPDATE " . $tablename . " SET " . $set . " WHERE " . $where;
         //echo $query;
        //exit;
        $this->query = $query;
        mysql_query($query, $this->db);
        if ($this->error()){
            die($this->debug("","",$tablename));
		}
		
        if ($this->affected() > 0){
            return true;
		}else{
            return false;
		}

    } // end update
 
   	function delete( $tablename,  $where,  $limit = ""){
		
        $query = "DELETE from " . $tablename . " WHERE " . $where;
        if ($limit != ""){
            $query .= " LIMIT " . $limit;
		}
		
        $this->query = $query;
        mysql_query($query, $this->db);

        if ($this->error()){
            die($this->debug("","",$tablename));
		}

        if ($this->affected() > 0){
            return true;
        }else{
            return false;
        }

    } // end delete

    
    function mySQLSafe( $value,  $quote = "'"){

        // strip quotes if already in
			$value = get_magic_quotes_gpc() ? stripslashes($value) : $value;
			$value = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($value) : mysql_escape_string($value);
        

        // Stripslashes
        if (get_magic_quotes_gpc()){
            $value = stripslashes($value);
        }
        // Quote value
        if (version_compare(phpversion(), "4.3.0") == "-1"){
            $value = mysql_escape_string($value);
        } else{
            $value = mysql_real_escape_string($value);
        }
        $value = $quote . $value . $quote;

        return $value;
    }

	function GetSQLValueString($theValue, $theType='text', $theDefinedValue = "", $theNotDefinedValue = "") 
		{
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
			$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
			switch ($theType) {
				case "text":
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;    
				case "long":
				case "int":
					$theValue = ($theValue != "") ? $theValue : "NULL";
					break;
				case "double":
					$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
					break;
				case "date":
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;
				case "defined":
					$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
					break;
			}
			return $theValue;
		}
	

   
    function debug( $type = "",  $action = "",  $tablename = "") {
		
        switch ($type){
			
            case "connect":
                $message = "MySQL Error Occured";
                $result = mysql_errno() . ": " . mysql_error();
                $query = "";
                $output = "Could not connect to the database. Be sure to check that your database connection settings are correct and that the MySQL server in running.";
                break;


            case "array":
                $message = $action . " Error Occured";
                $result = "Could not update " . $tablename .
                    " as variable supplied must be an array.";
                $query = "";
                $output = "Sorry an error has occured accessing the database. Be sure to check that your database connection settings are correct and that the MySQL server in running.";

                break;


            default:
                if (mysql_errno($this->db)){
                    $message = "MySQL Error Occured";
                    $result = mysql_errno($this->db) . ": " . mysql_error($this->db);
                    $output = "Sorry an error has occured accessing the database. Be sure to check that your database connection settings are correct and that the MySQL server in running.";
                
				}else{
					
                    $message = "MySQL Query Executed Succesfully.";
                    $result = mysql_affected_rows($this->db) . " Rows Affected";
                    $output = "view logs for details";
                }

                $linebreaks = array("\n", "\r");
                if ($this->query != ""){
                    $query = "QUERY = " . str_replace($linebreaks, " ", $this->query);
				}else{
                    $query = "";
				}
				break;
        }

        $output = "<b style='font-family: Arial, Helvetica, sans-serif; color: #0B70CE;'>" .
            $message . "</b><br />\n<span style='font-family: Arial, Helvetica, sans-serif; color: #000000;'>" .
            $result . "</span><br />\n<p style='Courier New, Courier, mono; border: 1px dashed #666666; padding: 10px; color: #000000;'>" .
            $query . "</p>\n";
			//////
			$error=$this->mySQLSafe(mysql_error());
			$table=$this->mySQLSafe($tablename);	
			$err_num=$this->mySQLSafe(mysql_errno());
			$page=$this->mySQLSafe($_SERVER['PHP_SELF']);
                        $query = $this->mySQLSafe($query);
			
			$q = "insert into `db_error`(`error_num`,`error`,`table_name`,`date`,`page`) values($err_num,$error,$query,'".date("Y-m-d H:m:s")."',$page)";
			$this->query = $q;
			mysql_query($q, $this->db) or die (mysql_error());
			/////

        return '';//$output;
    }


 
    function error(){
        if (mysql_errno($this->db)){
            return true;
		}else{
            return false;
		}
    }

    function insertid(){
        return mysql_insert_id($this->db);
    }

    function affected(){
        return mysql_affected_rows($this->db);
    }

    function close() {// close conection

        mysql_close($this->db);
    }

   
    function maxID( $table,  $field) {
        $query = "SELECT
					Max(IFNULL($field,0)) as MaxID
				FROM $table";

        $result = mysql_query($query, $this->db);

        if ($this->error()){
            die($this->debug());
		}
        for ($n = 0; $n < mysql_num_rows($result); $n++){
			
            $row = mysql_fetch_assoc($result);
            $output[$n] = $row;
        }
        $output[0]["MaxID"] = $output[0]["MaxID"] + 1;
        return $output[0]["MaxID"];
    }

	function query( $query) {
		$this->mtStart    = $this->getMicroTime();
		$this->query = $query;
		$result = mysql_query($query, $this->db);
		if ($this->error())
			die($this->debug());
		
		if ($result == true) {
				return true;
		} else {
				return false;
		}
		
	}
	function customQuery(  $query){
		$this->query = $query;
		$result = mysql_query($query, $this->db);
		if ($this->error()) {
			die($this->debug());
		}
		return $result;
		
	}
	 function getExecTime(){
      return round(($this->getMicroTime() - $this->mtStart) * 1000) / 1000;
    }
	function getMicroTime()
    {
      list($msec, $sec) = explode(' ', microtime());
      return floor($sec / 1000) + $msec;
    }
} // end of db class


	
	function Sterilize ( $input,  $is_sql = false){
		$input = htmlentities($input, ENT_QUOTES);
		if(get_magic_quotes_gpc ()){
			$input = stripslashes ($input);
		}
		if ($is_sql){
			$input = mysql_real_escape_string ($input);
		}
		$input = strip_tags($input);
		$input = str_replace("
		", "\n", $input);
		return $input;
	}
 
?>