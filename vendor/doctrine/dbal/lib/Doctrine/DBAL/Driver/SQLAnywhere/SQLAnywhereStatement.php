<?php
 namespace Doctrine\DBAL\Driver\SQLAnywhere; use IteratorAggregate; use PDO; use Doctrine\DBAL\Driver\Statement; class SQLAnywhereStatement implements IteratorAggregate, Statement { private $conn; private $defaultFetchClass = '\stdClass'; private $defaultFetchClassCtorArgs = array(); private $defaultFetchMode = PDO::FETCH_BOTH; private $result; private $stmt; public function __construct($conn, $sql) { if ( ! is_resource($conn)) { throw new SQLAnywhereException('Invalid SQL Anywhere connection resource: ' . $conn); } $this->conn = $conn; $this->stmt = sasql_prepare($conn, $sql); if ( ! is_resource($this->stmt)) { throw SQLAnywhereException::fromSQLAnywhereError($conn); } } public function bindParam($column, &$variable, $type = null, $length = null) { switch ($type) { case PDO::PARAM_INT: case PDO::PARAM_BOOL: $type = 'i'; break; case PDO::PARAM_LOB: $type = 'b'; break; case PDO::PARAM_NULL: case PDO::PARAM_STR: $type = 's'; break; default: throw new SQLAnywhereException('Unknown type: ' . $type); } if ( ! sasql_stmt_bind_param_ex($this->stmt, $column - 1, $variable, $type, $variable === null)) { throw SQLAnywhereException::fromSQLAnywhereError($this->conn, $this->stmt); } return true; } public function bindValue($param, $value, $type = null) { return $this->bindParam($param, $value, $type); } public function closeCursor() { if (!sasql_stmt_reset($this->stmt)) { throw SQLAnywhereException::fromSQLAnywhereError($this->conn, $this->stmt); } return true; } public function columnCount() { return sasql_stmt_field_count($this->stmt); } public function errorCode() { return sasql_stmt_errno($this->stmt); } public function errorInfo() { return sasql_stmt_error($this->stmt); } public function execute($params = null) { if (is_array($params)) { $hasZeroIndex = array_key_exists(0, $params); foreach ($params as $key => $val) { $key = ($hasZeroIndex && is_numeric($key)) ? $key + 1 : $key; $this->bindValue($key, $val); } } if ( ! sasql_stmt_execute($this->stmt)) { throw SQLAnywhereException::fromSQLAnywhereError($this->conn, $this->stmt); } $this->result = sasql_stmt_result_metadata($this->stmt); return true; } public function fetch($fetchMode = null) { if ( ! is_resource($this->result)) { return false; } $fetchMode = $fetchMode ?: $this->defaultFetchMode; switch ($fetchMode) { case PDO::FETCH_ASSOC: return sasql_fetch_assoc($this->result); case PDO::FETCH_BOTH: return sasql_fetch_array($this->result, SASQL_BOTH); case PDO::FETCH_CLASS: $className = $this->defaultFetchClass; $ctorArgs = $this->defaultFetchClassCtorArgs; if (func_num_args() >= 2) { $args = func_get_args(); $className = $args[1]; $ctorArgs = isset($args[2]) ? $args[2] : array(); } $result = sasql_fetch_object($this->result); if ($result instanceof \stdClass) { $result = $this->castObject($result, $className, $ctorArgs); } return $result; case PDO::FETCH_NUM: return sasql_fetch_row($this->result); case PDO::FETCH_OBJ: return sasql_fetch_object($this->result); default: throw new SQLAnywhereException('Fetch mode is not supported: ' . $fetchMode); } } public function fetchAll($fetchMode = null) { $rows = array(); switch ($fetchMode) { case PDO::FETCH_CLASS: while ($row = call_user_func_array(array($this, 'fetch'), func_get_args())) { $rows[] = $row; } break; case PDO::FETCH_COLUMN: while ($row = $this->fetchColumn()) { $rows[] = $row; } break; default: while ($row = $this->fetch($fetchMode)) { $rows[] = $row; } } return $rows; } public function fetchColumn($columnIndex = 0) { $row = $this->fetch(PDO::FETCH_NUM); if (false === $row) { return false; } return isset($row[$columnIndex]) ? $row[$columnIndex] : null; } public function getIterator() { return new \ArrayIterator($this->fetchAll()); } public function rowCount() { return sasql_stmt_affected_rows($this->stmt); } public function setFetchMode($fetchMode, $arg2 = null, $arg3 = null) { $this->defaultFetchMode = $fetchMode; $this->defaultFetchClass = $arg2 ? $arg2 : $this->defaultFetchClass; $this->defaultFetchClassCtorArgs = $arg3 ? (array) $arg3 : $this->defaultFetchClassCtorArgs; } private function castObject(\stdClass $sourceObject, $destinationClass, array $ctorArgs = array()) { if ( ! is_string($destinationClass)) { if ( ! is_object($destinationClass)) { throw new SQLAnywhereException(sprintf( 'Destination class has to be of type string or object, %s given.', gettype($destinationClass) )); } } else { $destinationClass = new \ReflectionClass($destinationClass); $destinationClass = $destinationClass->newInstanceArgs($ctorArgs); } $sourceReflection = new \ReflectionObject($sourceObject); $destinationClassReflection = new \ReflectionObject($destinationClass); foreach ($sourceReflection->getProperties() as $sourceProperty) { $sourceProperty->setAccessible(true); $name = $sourceProperty->getName(); $value = $sourceProperty->getValue($sourceObject); if ($destinationClassReflection->hasProperty($name)) { $destinationProperty = $destinationClassReflection->getProperty($name); $destinationProperty->setAccessible(true); $destinationProperty->setValue($destinationClass, $value); } else { $destinationClass->$name = $value; } } return $destinationClass; } } 