<?php

class Database extends PDO
{
	public $pdo;
	public $result;
	public $totalRow;
	public $DiplayErrorsEndUser = false;
	public $dbErrorMsg;
	private $error = array();
	private $tables = array();
	private $final;
	public $queryString;


	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
		parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		parent::query('SET CHARACTER SET utf8');
		parent::query('SET NAMES utf8');
	}

	//get result data
	/*
	* see query / select function usage
	*/
	public function result()
	{
		return $this->result;
	}

	public function error()
	{
		return $this->error;
	}

	//get result data
	/*
	* see query / select function usage
	*/
	public function total()
	{
		return $this->totalRow;
	}

	public function showQuery($query, $params)
	{

		$keys = array();
		$values = array();

		# build a regular expression for each parameter
		foreach ($params as $key => $value) {
			if (is_string($key)) {
				$keys[] = '/:' . $key . '/';
			} else {
				$keys[] = '/[?]/';
			}

			if (is_numeric($value)) {
				$values[] = intval($value);
			} else {
				$values[] = '"' . $value . '"';
			}
		}

		$query = preg_replace($keys, $values, $query, 1, $count);
		return $query;
	}

	//safe execution
	public function safe_execution($dataArray, $qryStr, $tableName = "")
	{

		$this->beginTransaction();
		try {

			$qry = $this->prepare($qryStr);

			foreach ($dataArray as $key => $value) {

				if (is_int($value)) {
					$param = \PDO::PARAM_INT;
				} elseif (is_bool($value)) {
					$param = \PDO::PARAM_BOOL;
				} elseif (is_null($value)) {
					$param = \PDO::PARAM_NULL;
				} elseif (is_string($value)) {
					$param = \PDO::PARAM_STR;
				} else {
					$param = \PDO::PARAM_STR;
				}
				if ($param) {

					$qry->bindValue(":" . $key . "", $value, $param);
				}
			}

			$qry->execute();
			$lastInsertId = $this->lastInsertId();
			$affectedRow = $qry->rowCount();
			$this->commit();
			// affected row
			
			

			$response = array(
				"affectedRow" => $affectedRow,
				// last inseretd id
				"lastInsertedId" => $lastInsertId,
				"message_type" => 1,	   
				"error" => false,
				"message" => 'Operación realizada con éxito'
			);
			return $response;
		} catch (PDOException $e) {

			$this->rollBack();
			if ($this->DiplayErrorsEndUser == true) {

				echo $this->dbErrorMsg . $e->getMessage();
				exit();
			} else {

				$this->error[] = $e->getMessage();
				$response = array(
					"affectedRow" => 0,
					"message_type" => $e->getCode(),
					"error" => true,
					"message" => 'Código: ' . $e->getCode() . ' Mensaje: ' . $e->getMessage() . ' Parametros: [' . implode(',', $dataArray) . ']',
					"query" => $this->showQuery($qryStr, $dataArray)
				);
				return $response;
			}
		}
	}

	//direct query
	/*
	* $db = new db();
	* $db->connect($config);
	* $db->query('SELECT * FROM users WHERE id = 1');
	* $db->select($qryArray);
	* $db->result();
	*/
	public function query($queryString, $method = PDO::FETCH_OBJ)
	{

		try {
			//query
			$qry = $this->prepare($queryString);
			$qry->execute();
			$qry->setFetchMode($method);

			//stroring data arrary into $result
			$this->result = $qry->fetchAll();

			// total row count
			$this->totalRow = $qry->rowCount();
		} catch (PDOException $e) {
			if ($this->DiplayErrorsEndUser == true) {

				echo $this->dbErrorMsg . $e->getMessage();
				exit();
			} else {

				$this->error[] = $e->getMessage();
				return false;
			}
		}
	}

	//fetch data query
	/*
	* $db = new db();
	* $db->connect($config);
	* $qryArray = array( 'tbl_name' => 'users', 'field' => array('email', 'nickname'), 'method' => PDO::FETCH_OBJ, 'condition' => ' WHERE id = 1', 'limit' => '0,30', 'orderby' => 'created_at' );
	* $db->select($qryArray);
	* $db->result();
	*/
	public function select($qryArray)
	{

		//preparing fields
		$fetchFields = (isset($qryArray['field']) && count($qryArray['field']) > 0) ? implode(', ', $qryArray['field']) : '*';

		//preparing query string
		$qryStr = 'SELECT ' . $fetchFields . ' FROM ' . $qryArray['tbl_name'] . ' ';
		$qryStr .= (isset($qryArray['groupby']) && $qryArray['groupby'] != NULL) ? ' GROUP BY ' . $qryArray['groupby'] : '';
		$qryStr .= (isset($qryArray['condition']) && $qryArray['condition'] != NULL) ? $qryArray['condition'] : '';
		$qryStr .= (isset($qryArray['orderby']) && $qryArray['orderby'] != NULL) ? ' ORDER BY ' . $qryArray['orderby'] : '';
		$qryStr .= (isset($qryArray['limit']) && $qryArray['limit'] != NULL) ? ' LIMIT ' . $qryArray['limit'] : '';

		try {
			$this->queryString = $qryStr;

			$qry = $this->prepare($qryStr);
			$qry->execute();

			//define method
			if (isset($qryArray['method']) && $qryArray['method'] != NULL) $qry->setFetchMode($qryArray['method']);

			//stroring data arrary into $result
			$this->result = $qry->fetchAll();

			// total row count
			$this->totalRow = $qry->rowCount();

			Session::remove('query');

			$dataQuery = array("table" => $qryArray['tbl_name'], "query" => $qryStr);

			Session::set('query', $dataQuery);
		} catch (PDOException $e) {
			if ($this->DiplayErrorsEndUser == true) {

				echo $this->dbErrorMsg . $e->getMessage();
				exit();
			} else {

				$this->error[] = $e->getMessage();
				return false;
			}
		}
	}


	//insert query
	/*
	* syntax connection->insert(table name, insert data array, duplicated field checking array)
	* $inserted = $db->insert('users', array('email'=>'c@yahoo.com', 'nickname'=> 'Mr. C', 'password' => '159159'), array('email'));
	* print_r($inserted);
	*/
	public function insert($tableName, $dataArray = array(), $unique = array())
	{

		$dataArray['tabla'] = $tableName;

		$fields = array();
		$executeArray = array();
		$columns = array();
		//$columns = $this->Columns("SELECT * FROM ".$tableName." LIMIT 1;");
		$columns = $this->columnNames($tableName);

		ksort($dataArray);

		foreach ($dataArray as $key => $val) {

			if (in_array(str_replace($tableName . "_", '', $key), $columns) && !empty($val) != null) {

				$data[str_replace($tableName . "_", '', $key)] = $val;
			}
		}


		//populating field array
		foreach ($data as $key => $val) {

			$fields[] = $key;
			$executeArray[':' . $key] = $val;
			$rawFieldsStr[] = ':' . $key;
		}


		//generating field string
		$fields_str = implode(',', $fields);
		$rawFieldsStr = implode(',', $rawFieldsStr);

		//die(json_encode($data));


		// checking wheather same value exists or not
		if (count($unique) > 0) {
			$condition = array();
			foreach ($unique as $fieldName) {
				$condition[] = $fieldName . " = '" . $data[$fieldName] . "' ";
			}
			$cQryStr = "SELECT " . $unique[0] . " FROM " . $tableName . " WHERE " . implode('AND ', $condition) . ';';

			$cQry = $this->query($cQryStr);

			//checking duplicate
			if ($this->totalRow > 0) $duplicate = true;
			else $duplicate = false;
		}

		$affectedRow = 0;
		$lastInsertedId = 0;

		//processing insertsion while there is no duplicated value
		if (!$duplicate) {
			$qryStr = 'INSERT INTO ' . $tableName . ' (' . $fields_str . ') VALUES (' . $rawFieldsStr . ')';
			//die (json_encode($qryStr));
			try {
				//query
				$affectedRow = $this->safe_execution($data, $qryStr, $tableName);

				// last inseretd id
				$lastInsertedId = $this->lastInsertId();
			} catch (PDOException $e) {
				if ($this->DiplayErrorsEndUser == true) {

					echo $this->dbErrorMsg . $e->getMessage();
					exit();
				} else {

					$this->error[] = $e->getMessage();
					return false;
				}
			}
		} else {


			return array(
				"affectedRow" => 0,
				"message_type" => 23000,
				"error" => true,
				"message" => 'Error de llave duplicada: Campo: ' . $unique[0] . ' Valor: [' . $data[$unique[0]] . ']' . ' Ya se encuentra registrado en el sistema',
				"duplicate" => $duplicate
			);
		}

		// returning insert log

		return array(
			"affectedRow" => $affectedRow['affectedRow'],
			"insertedId" => $affectedRow['lastInsertedId'],
			"message_type" => $affectedRow['message_type'],
			"error" => $affectedRow['error'],
			"query" => $affectedRow['query'],
			"message" => $affectedRow['message'],
			"redirect" => $dataArray['id'],
			"lastId" => $affectedRow['lastInsertedId'],
			"duplicate" => $duplicate

		);
	}


	//update query
	/*
	* update(tableName, updatedDataArray, whereArray, duplicateCheckingArray);
	* $updated = $db->update('users', array('nickname'=> 'Hadi', 'email'=> 'hadicse@gmail.com'), array('id'=>1, 'nickname'=>'Habib Hadi'), array('email'));
	* print_r($updated);
	*/
	public function update($tableName, $dataArray = array(), $where, $unique = array())
	{
		$fields = array();
		$executeArray = array();
		$columns = array();
		//$columns = $this->Columns("SELECT * FROM ".$tableName." LIMIT 1;");
		$columns = $this->columnNames($tableName);

		ksort($dataArray);

		foreach ($dataArray as $key => $val) {

			if (in_array(str_replace($tableName . "_", '', $key), $columns) && !empty($val) != null) {

				$data[str_replace($tableName . "_", '', $key)] = $val;
			}
		}



		//populating field array
		foreach ($data as $key => $val) {

			$fields[] = $key . ' = :' . $key;
			$executeArray[':' . $key] = $val;
			$rawFieldsStr[] = ':' . $key;
		}

		//return $executeArray;
		//generating field string
		$fields_str = implode(',', $fields);



		// checking wheather same value exists or not
		if (count($unique) > 0) {
			$condition = array();
			foreach ($unique as $fieldName) {
				$condition[] = $fieldName . " = '" . $dataArray[$fieldName] . "' ";
			}
			$cQryStr = "SELECT " . $unique[0] . " FROM " . $tableName . " WHERE " . implode('AND ', $condition);

			$cQry = $this->query($cQryStr);

			//checking duplicate
			if ($cQry->rowCount() > 0) $duplicate = true;
			else $duplicate = false;
		} else $duplicate = false;

		$affectedRow = 0;
		$lastInsertedId = 0;

		//processing query while there is no duplicated value
		if (!$duplicate && ($where != NULL || (is_array($where) && count($where) > 0))) {

			if (is_array($where)) {
				$affectedTo = array();
				foreach ($where as $key => $val) {
					$affectedTo[] = $key . " = '" . $val . "'";
				}
				$whereCond = ' WHERE ' . implode(" AND ", $affectedTo);
			} else {
				$whereCond = ' WHERE ' . $where;
			}


			$qryStr = 'UPDATE ' . $tableName . ' SET ' . $fields_str . $whereCond . ';';

			//die($qryStr);
			try {
				//query
				$affectedRow = $this->safe_execution($data, $qryStr, $tableName);
			} catch (PDOException $e) {
				if ($this->DiplayErrorsEndUser == true) {

					echo $this->dbErrorMsg . $e->getMessage();
					exit();
				} else {

					return $this->error[] = $e->getMessage();
					//return false;

				}
			}
		}

		return array(
			"affectedRow" => $affectedRow['affectedRow'],
			"message_type" => $affectedRow['message_type'],
			"error" => $affectedRow['error'],
			"query" => $affectedRow['query'],
			"message" => $affectedRow['message'],
			"redirect" => $dataArray['id'],
			"duplicate" => $duplicate
		);
	}


	//delete query
	/*
	* $d = $db->delete('users', array('id'=>1));
	* print_r($d);
	*/
	public function delete($tableName, $where)
	{

		$affectedRow = 0;
		if ($where != NULL || (is_array($where) && count($where)) > 0) {
			if (is_array($where)) {
				$affectedTo = array();
				foreach ($where as $key => $val) {
					$affectedTo[] = $key . " = '" . $val . "'";
				}
				$whereCond = ' WHERE ' . implode(" AND ", $affectedTo);
			} else {
				$whereCond = ' WHERE ' . $where;
			}
			$qryStr = 'DELETE FROM ' . $tableName . ' ' . $whereCond;

			try {
				//query
				$affectedRow = $this->safe_execution($where, $qryStr);
			} catch (PDOException $e) {
				if ($this->DiplayErrorsEndUser == true) {
					echo $this->dbErrorMsg . $e->getMessage();
					exit();
				} else {
					$this->error[] = $e->getMessage();
					return false;
				}
			}
		}

		return array('affectedRow' => $affectedRow['affectedRow']);
	}

	## functions of backup
	/**
	 *
	 * Call this function to get the database backup
	 * @example $db->backup();
	 */
	public function backup()
	{

		if (count($this->error) > 0) {
			return array('error' => true, 'msg' => $this->error);
		}
		$this->final = 'CREATE DATABASE ' . $this->dbName . ";\n\n";
		$this->getTables();
		$this->generateBackup();

		return array('error' => false, 'msg' => $this->final);
	}
	/**
	 *
	 * Generate backup string
	 * @uses Private use
	 */
	private function generateBackup()
	{
		foreach ($this->tables as $tbl) {
			$this->final .= '--CREATING TABLE ' . $tbl['name'] . "\n";
			$this->final .= $tbl['create'] . ";\n\n";
			$this->final .= '--INSERTING DATA INTO ' . $tbl['name'] . "\n";
			$this->final .= $tbl['data'] . "\n\n\n";
		}
		$this->final .= '-- THE END' . "\n\n";
	}
	/**
	 *
	 * Get the list of tables
	 * @uses Private use
	 */
	private function getTables()
	{
		try {
			$this->query('SHOW TABLES', PDO::FETCH_NUM);
			$tbs = $this->result;

			$i = 0;
			foreach ($tbs as $table) {
				$this->tables[$i]['name'] = $table[0];
				$this->tables[$i]['create'] = $this->getColumns($table[0]);
				$this->tables[$i]['data'] = $this->getData($table[0]);
				$i++;
			}
			unset($tbs);
			unset($i);
			return true;
		} catch (PDOException $e) {
			if ($this->DiplayErrorsEndUser == true) {
				echo $this->dbErrorMsg . $e->getMessage();
				exit();
			} else {
				$this->error[] = $e->getMessage();
				return false;
			}
		}
	}
	/**
	 *
	 * Get the list of Columns
	 * @uses Private use
	 */
	private function getColumns($tableName)
	{
		try {
			$this->query('SHOW CREATE TABLE ' . $tableName, PDO::FETCH_BOTH);
			$q = $this->result;
			$q[0][1] = preg_replace("/AUTO_INCREMENT=[\w]*./", '', $q[0][1]);
			return $q[0][1];
		} catch (PDOException $e) {
			if ($this->DiplayErrorsEndUser == true) {
				echo $this->dbErrorMsg . $e->getMessage();
				exit();
			} else {
				$this->error[] = $e->getMessage();
				return false;
			}
		}
	}
	/**
	 *
	 * Get the insert data of tables
	 * @uses Private use
	 */
	private function getData($tableName)
	{
		try {
			$this->query('SELECT * FROM ' . $tableName, PDO::FETCH_NUM);
			$q = $this->result;
			$data = '';
			foreach ($q as $pieces) {
				foreach ($pieces as &$value) {
					$value = htmlentities(addslashes($value));
				}
				$data .= 'INSERT INTO ' . $tableName . ' VALUES (\'' . implode('\',\'', $pieces) . '\');' . "\n";
			}
			return $data;
		} catch (PDOException $e) {

			if ($this->DiplayErrorsEndUser == true) {
				echo $this->dbErrorMsg . $e->getMessage();
				exit();
			} else {
				$this->error[] = $e->getMessage();
				return false;
			}
		}
	}
	## End functions of Backup
	private function Columns($query, $params = null)
	{
		try {

			$this->query($query, PDO::FETCH_ASSOC);
			$Columns = $this->result;
			$column = null;

			foreach ($Columns as $key => $cells) {
				$column[0] = array($key);
			}


			$ColsNames = array_keys($Columns[0]);
			asort($ColsNames);

			$ColsNames = array_values($ColsNames);

			return $ColsNames;
		} catch (PDOException $e) {

			if ($this->DiplayErrorsEndUser == true) {
				echo $this->dbErrorMsg . $e->getMessage();
				exit();
			} else {
				$this->error[] = $e->getMessage();
				return false;
			}
		}
	}

	private function columnNames($tableName,  $method = PDO::FETCH_ASSOC)
	{
		try {

			$this->query('DESCRIBE ' . $tableName . '', $method);
			$ColsNames = $this->result;

			foreach ($ColsNames as $key => $value) {
				$ColumnNames[] = $value['Field'];
			}
			sort($ColumnNames);
			return $ColumnNames;
		} catch (PDOException $e) {

			if ($this->DiplayErrorsEndUser == true) {
				echo $this->dbErrorMsg . $e->getMessage();
				exit();
			} else {
				$this->error[] = $e->getMessage();
				return false;
			}
		}
	}
}
