<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Extended Model Class
 *
 * Provides a number of useful functions to generate model specific queries.
 * Takes inspiration from CakePHP's implementation of Model and keeps the function
 * names pretty same.
 *
 * A list of functions would be:
 *
 * - loadTable
 * - find
 * - findAll
 * - findCount
 * - field
 * - generateList
 * - generateSingleArray
 * - getAffectedRows
 * - getID
 * - getInsertID
 * - getNumRows
 * - insert
 * - read
 * - save
 * - remove
 * - query
 * - lastQuery
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Md Emran Hasan (phpfour@gmail.com)
 * @link		http://phpfour.com
 */
class MY_Model extends CI_Model
{

	/**
	 * Value of the primary key ID of the record that this model is currently pointing to
	 *
	 * @var unknown_type
	 * @access public
	 */
	var $id = null;

	/**
	 * Container for the data that this model gets from persistent storage (the database).
	 *
	 * @var array
	 * @access public
	 */
	var $data = array();

	/**
 	 * The name of the associate table name of the Model object
 	 * @var string
 	 * @access public
 	 */
	var $_table;

	/**
	 * The name of the ID field for this Model.
	 *
	 * @var string
	 * @access public
	 */
	var $primaryKey = 'id';

	/**
	 * Container for the fields of the table that this model gets from persistent storage (the database).
	 *
	 * @var array
	 * @access public
	 */
	var $fields = array();

	/**
	 * The last inserted ID of the data that this model created
	 *
	 * @var int
	 * @access private
	 */
	var $__insertID = null;

	/**
	 * The number of records returned by the last query
	 *
	 * @access private
	 * @var int
	 */
	var $__numRows = null;

	/**
	 * The number of records affected by the last query
	 *
	 * @access private
	 * @var int
	 */
	var $__affectedRows = null;

	/**
	 * Tells the model whether to return results in array or not
	 *
	 * @var string
	 * @access public
	 */
	var $returnArray = TRUE;

	/**
	 * Prints helpful debug messages if asked
	 *
	 * @var string
	 * @access public
	 */
	var $debug = FALSE;

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function Model()
	{
		parent::Model();
		log_message('debug', "Extended Model Class Initialized");
	}

	/**
	 * Load the associated database table.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @access public
	 */

	function loadTable($table, $fields = array())
	{
		if ($this->debug) log_message('debug', "Loading model table: $table");

		$this->_table  = $table;
		$this->fields = (!empty($fields)) ? $fields : $this->db->list_fields($table);

		if ($this->debug)
		{
			log_message('debug', "Successfully Loaded model table: $table");
		}
	}

	/**
	 * Returns a resultset array with specified fields from database matching given conditions.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return query result either in array or in object based on model config
	 * @access public
	 */

	function findAll($conditions = NULL, $fields = '*', $order = NULL, $start = 0, $limit = NULL)
	{
		if ($conditions != NULL)
		{
			if(is_array($conditions))
			{
				$this->db->where($conditions);
			}
			else
			{
				$this->db->where($conditions, NULL, FALSE);
			}
		}

		if ($fields != NULL)
		{
			$this->db->select($fields);
		}

		if ($order != NULL)
		{
			$this->db->order_by($order);
		}

		if ($limit != NULL)
		{
			$this->db->limit($limit, $start);
		}

		$query = $this->db->get($this->_table);
		$this->__numRows = $query->num_rows();

		return ($this->returnArray) ? $query->result_array() : $query->result();
	}

	/**
	 * Return a single row as a resultset array with specified fields from database matching given conditions.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return single row either in array or in object based on model config
	 * @access public
	 */

	function find($conditions = NULL, $fields = '*', $order = NULL)
	{
		$data = $this->findAll($conditions, $fields, $order, 0, 1);

		if ($data)
		{
			return $data[0];
		}
		else
		{
			return false;
		}
	}

	/**
	 * Returns contents of a field in a query matching given conditions.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return string the value of the field specified of the first row
	 * @access public
	 */

	function field($conditions = null, $name, $fields = '*', $order = NULL)
	{
		$data = $this->findAll($conditions, $fields, $order, 0, 1);

		if ($data)
		{
			$row = $data[0];

			if (isset($row[$name]))
			{
				return $row[$name];
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}

	}

	/**
	 * Returns number of rows matching given SQL condition.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return integer the number of records returned by the condition
	 * @access public
	 */

	function findCount($conditions = null)
	{
		$data = $this->findAll($conditions, 'COUNT(*) AS count', null, 0, 1);

		if ($data)
		{
			return $data[0]['count'];
		}
		else
		{
			return false;
		}
	}

	/**
	 * Returns a key value pair array from database matching given conditions.
	 *
	 * Example use: generateList(null, '', 0. 10, 'id', 'username');
	 * Returns: array('10' => 'emran', '11' => 'hasan')
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array a list of key val ue pairs given criteria
	 * @access public
	 */

	function generateList($conditions = null, $order = 'id ASC', $start = 0, $limit = NULL, $key = null, $value = null)
	{
		$data = $this->findAll($conditions, "$key, $value", $order, $start, $limit);

		if ($data)
		{
			foreach ($data as $row)
			{
				$keys[] = ($this->returnArray) ? $row[$key] : $row->$key;
				$vals[] = ($this->returnArray) ? $row[$value] : $row->$value;
			}

			if (!empty($keys) && !empty($vals))
			{
				$return = array_combine($keys, $vals);
				return $return;
			}
		}
		else
		{
			return false;
		}
	}

	/**
	 * Returns an array of the values of a specific column from database matching given conditions.
	 *
	 * Example use: generateSingleArray(null, 'name');
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array a list of key value pairs given criteria
	 * @access public
	 */

	function generateSingleArray($conditions = null, $field = null, $order = 'id ASC', $start = 0, $limit = NULL)
	{
		$data = $this->findAll($conditions, "$field", $order, $start, $limit);

		if ($data)
		{
			foreach ($data as $row)
			{
				$arr[] = ($this->returnArray) ? $row[$field] : $row->$field;
			}

			return $arr;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Initializes the model for writing a new record.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return boolean True
	 * @access public
	 */

	function create()
	{
		$this->id = false;
		unset ($this->data);

		$this->data = array();
		return true;
	}

	/**
	 * Returns a list of fields from the database and saves in the model
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array Array of database fields
	 * @access public
	 */

	function read($id = null, $fields = null)
	{
		if ($id != null)
		{
			$this->id = $id;
		}

		$id = $this->id;

		if ($this->id !== null && $this->id !== false)
		{
			$this->data = $this->find($this->primaryKey . ' = ' . $id, $fields);
			return $this->data;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Inserts a new record in the database.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return boolean success
	 * @access public
	 */

	function insert($data = null)
	{
		if ($data == null)
		{
			return FALSE;
		}

		$this->data = $data;
		$this->data['create_date'] = date("Y-m-d H:i:s");

		foreach ($this->data as $key => $value)
		{
			if (array_search($key, $this->fields) === FALSE)
			{
				unset($this->data[$key]);
			}
		}

		$this->db->insert($this->_table, $this->data);

		$this->__insertID = $this->db->insert_id();
		return $this->__insertID;
	}

	/**
	 * Saves model data to the database.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return boolean success
	 * @access public
	 */

	function save($data = null, $id = null)
	{
		if ($data)
		{
			$this->data = $data;
		}

		foreach ($this->data as $key => $value)
		{
			if (array_search($key, $this->fields) === FALSE)
			{
				unset($this->data[$key]);
			}
		}

		if ($id != null)
		{
			$this->id = $id;
		}

		$id = $this->id;

		if ($this->id !== null && $this->id !== false)
		{
			$this->db->where($this->primaryKey, $id);
			$this->db->update($this->_table, $this->data);

			$this->__affectedRows = $this->db->affected_rows();
			return $this->id;
		}
		else
		{
			$this->db->insert($this->_table, $this->data);

			$this->__insertID = $this->db->insert_id();
			return $this->__insertID;
		}
	}

	/**
	 * Removes record for given id. If no id is given, the current id is used. Returns true on success.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return boolean True on success
	 * @access public
	 */

	function remove($id = null)
	{
		if ($id != null)
		{
			$this->id = $id;
		}

		$id = $this->id;

		if ($this->id !== null && $this->id !== false)
		{
			if ($this->db->delete($this->_table, array($this->primaryKey => $id)))
			{
				$this->id = null;
				$this->data = array();

				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	/**
	 * Returns a resultset for given SQL statement. Generic SQL queries should be made with this method.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array Resultset
	 * @access public
	 */

	function query($sql)
	{
		return $this->db->query($sql);
	}

	/**
	 * Returns the last query that was run (the query string, not the result).
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return string SQL statement
	 * @access public
	 */

	function lastQuery()
	{
		return $this->db->last_query();
	}

	/**
	 * This function simplifies the process of writing database inserts. It returns a correctly formatted SQL insert string.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return string SQL statement
	 * @access public
	 */

	function insertString($data)
	{
		return $this->db->insert_string($this->_table, $data);
	}

	/**
	 * Returns the current record's ID.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return integer The ID of the current record
	 * @access public
	 */

	function getID()
	{
		return $this->id;
	}

	/**
	 * Returns the ID of the last record this Model inserted.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return int
	 * @access public
	 */

	function getInsertID()
	{
		return $this->__insertID;
	}

	/**
	 * Returns the number of rows returned from the last query.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return int
	 * @access public
	 */

	function getNumRows()
	{
		return $this->__numRows;
	}

	/**
	 * Returns the number of rows affected by the last query
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return int
	 * @access public
	 */

	function getAffectedRows()
	{
		return $this->__affectedRows;
	}

}
// END Model Class