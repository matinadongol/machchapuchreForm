<?php
abstract class Model{
    public $conn = null;
    private $stmt = null;
    private $sql = null;
    private $table = null;

    function __construct(){
        try{
            $this->conn = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME.';', DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->stmt = $this->conn->prepare('SET NAMES utf8');
            $this->stmt->execute();
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function table($_table){
        $this->table = $_table;
    }

    final protected function select($args = array(), $is_die = false){
        try{
            $this->sql = "SELECT";

            if (isset($args['fields'])){
                if(is_array($args['fields'])){
                    $this->sql .= implode(", ", $args['fields']);
                } else {
                    $this->sql .= $args['fields']; //if it is string
                }
            } else {
                $this->sql .= " * "; //if there is no any fields then * is appended
            }

            $this->sql .= "FROM ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); // if there is no table in the database
            }

            $this->sql .= $this->table; //append table name

            if(isset($args['where']) && !empty($args['where'])){ //for where condition
                if(is_array($args['where'])){
                    $temp = array();
                    foreach($args['where'] as $column_name => $value){
                        $str = $column_name." = :" .$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= " WHERE ".implode(' AND ', $temp);
                } else {
                    $this->sql = " WHERE ".$this->args;  
                }
            }

            if($is_die){
                debugger($args);
                debugger($this->sql, true);
            }
            
            $this->stmt = $this->conn->prepare($this->sql);

            //value bind
            if(isset($args['where']) && is_array($args['where']) && !empty($args['where'])){
                foreach($args['where'] as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if($param){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $this->stmt->execute();

            $data = $this->stmt->fetchAll(PDO::FETCH_OBJ);

            // debugger($args);
            // debugger($this->sql, true);

            return $data;
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }


    final protected function insertFirstSection($firstSectionData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($firstSectionData) && !empty($firstSectionData)){
                if(is_array($firstSectionData)){
                    $temp = array();
                    foreach($firstSectionData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $firstSectionData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($firstSectionData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($firstSectionData)){
                foreach($firstSectionData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $firstSectionID;
            $firstSectionID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertBeneficialOwner($beneficialOwnerData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($beneficialOwnerData) && !empty($beneficialOwnerData)){
                if(is_array($beneficialOwnerData)){
                    $temp = array();
                    foreach($beneficialOwnerData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $beneficialOwnerData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($beneficialOwnerData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($beneficialOwnerData)){
                foreach($beneficialOwnerData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $beneficialOwnerID;
            $beneficialOwnerID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertCorrespondenceAddress($correspondenceAddressData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($correspondenceAddressData) && !empty($correspondenceAddressData)){
                if(is_array($correspondenceAddressData)){
                    $temp = array();
                    foreach($correspondenceAddressData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $correspondenceAddressData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($correspondenceAddressData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($correspondenceAddressData)){
                foreach($correspondenceAddressData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $correspondenceAddressID;
            $correspondenceAddressID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertPermanentAddress($permanentAddressData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($permanentAddressData) && !empty($permanentAddressData)){
                if(is_array($permanentAddressData)){
                    $temp = array();
                    foreach($permanentAddressData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $permanentAddressData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($permanentAddressData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($permanentAddressData)){
                foreach($permanentAddressData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $permanentAddressID;
            $permanentAddressID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertCertificateDetails($certificateDetailsData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($certificateDetailsData) && !empty($certificateDetailsData)){
                if(is_array($certificateDetailsData)){
                    $temp = array();
                    foreach($certificateDetailsData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $certificateDetailsData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($certificateDetailsData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($certificateDetailsData)){
                foreach($certificateDetailsData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $certificateDetailsID;
            $certificateDetailsID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertBankDetails($bankDetailsData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($bankDetailsData) && !empty($bankDetailsData)){
                if(is_array($bankDetailsData)){
                    $temp = array();
                    foreach($bankDetailsData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $bankDetailsData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($bankDetailsData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($bankDetailsData)){
                foreach($bankDetailsData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $bankDetailsID;
            $bankDetailsID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertOccupationDetails($occupationDetailsData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($occupationDetailsData) && !empty($occupationDetailsData)){
                if(is_array($occupationDetailsData)){
                    $temp = array();
                    foreach($occupationDetailsData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $occupationDetailsData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($occupationDetailsData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($occupationDetailsData)){
                foreach($occupationDetailsData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $occupationDetailsID;
            $occupationDetailsID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertNomineeDetails($nomineeDetailsData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($nomineeDetailsData) && !empty($nomineeDetailsData)){
                if(is_array($nomineeDetailsData)){
                    $temp = array();
                    foreach($nomineeDetailsData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $nomineeDetailsData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($nomineeDetailsData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($nomineeDetailsData)){
                foreach($nomineeDetailsData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $nomineeDetailsID;
            $nomineeDetailsID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertGuardianDetails($guardianDetailsData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($guardianDetailsData) && !empty($guardianDetailsData)){
                if(is_array($guardianDetailsData)){
                    $temp = array();
                    foreach($guardianDetailsData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $guardianDetailsData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($guardianDetailsData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($guardianDetailsData)){
                foreach($guardianDetailsData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $guardianDetailsID;
            $guardianDetailsID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertOtherDocuments($otherDocumentsData = array(), $is_die = false){
        try{
            $this->sql = "INSERT INTO ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($otherDocumentsData) && !empty($otherDocumentsData)){
                if(is_array($otherDocumentsData)){
                    $temp = array();
                    foreach($otherDocumentsData as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $otherDocumentsData;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if($is_die){
                debugger($this->sql);
                debugger($otherDocumentsData, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            if(is_array($otherDocumentsData)){
                foreach($otherDocumentsData as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();
            global $otherDocumentsDataID;
            $otherDocumentsDataID = $this->conn->lastInsertId();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function insertForm(){
        try{
            global $firstSectionID;
            global $beneficialOwnerID;
            global $correspondenceAddressID;
            global $permanentAddressID;
            global $certificateDetailsID;
            global $bankDetailsID;
            global $occupationDetailsID;
            global $nomineeDetailsID;
            global $guardianDetailsID;
            global $otherDocumentsDataID;
            $this->sql = "INSERT INTO form (firstSection, beneficialOwner, correspondenceAddress, permanentAddress, certificateDetails, bankDetails, occupationDetails, nomineeDetails, guardianDetails, otherDocuments) values ($firstSectionID, $beneficialOwnerID, $correspondenceAddressID, $permanentAddressID, $certificateDetailsID, $bankDetailsID, $occupationDetailsID, $nomineeDetailsID, $guardianDetailsID, $otherDocumentsDataID); ";

            $this->stmt = $this->conn->prepare($this->sql);

            $success=$this->stmt->execute();

            if($success){
                return $this->conn->lastInsertId(); //returns last row id 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function delete($args = array(), $is_die = false){
        try{
            $this->sql = "DELETE FROM ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); // if there is no table in the database
            }

            $this->sql .= $this->table; //append table name

            if(isset($args['where']) && !empty($args['where'])){ //for where condition
                if(is_array($args['where'])){
                    $temp = array();
                    foreach($args['where'] as $column_name => $value){
                        $str = $column_name." = :" .$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= " WHERE ".implode(' AND ', $temp);
                } else {
                    $this->sql = " WHERE ".$this->args;  
                }
            }

            if($is_die){
                debugger($args);
                debugger($this->sql, true);
            }
            
            $this->stmt = $this->conn->prepare($this->sql);

            //value bind
            if(isset($args['where']) && is_array($args['where']) && !empty($args['where'])){
                foreach($args['where'] as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if($param){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $data = $this->stmt->execute(); // in delete this returns either true or false

            //debugger($args);
            //debugger($this->sql, true);

            return $data;
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }

    final protected function update($data = array(), $attr = NULL,  $is_die = false){
        try{
            $this->sql = "UPDATE ";

            if(!isset($this->table) || $this->table == NULL){
                throw new Exception("Table Not Set"); 
            }

            $this->sql .= $this->table." SET "; 

            if(isset($data) && !empty($data)){
                if(is_array($data)){
                    $temp = array();
                    foreach($data as $column_name => $value){
                        $str = $column_name." = :".$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= $data;
                }
            } else {
                throw new Exception("Data not set.");
            }

            if(isset($attr['where']) && !empty($attr['where'])){ //for where condition
                if(is_array($attr['where'])){
                    $temp = array();
                    foreach($attr['where'] as $column_name => $value){
                        $str = $column_name." = :" .$column_name;
                        $temp[] = $str;
                    }
                    $this->sql .= " WHERE ".implode(' AND ', $temp);
                } else {
                    $this->sql .= " WHERE ".$attr['where'];  
                }
            }

            if($is_die){
                debugger($this->sql);
                debugger($attr);
                debugger($data, true);
            }

            $this->stmt = $this->conn->prepare($this->sql);

            //value bind of data
            if(is_array($data)){
                foreach($data as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if(isset($param)){
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            //value bind of where
            if(isset($attr['where']) && is_array($attr['where']) && !empty($attr['where'])){
                foreach($attr['where'] as $column_name => $value){
                    if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                    } else if(is_bool($value)){
                        $param = PDO::PARAM_BOOL;
                    } else if(is_int($value)){
                        $param = PDO::PARAM_INT;
                    } else {
                        $param = PDO::PARAM_STR;
                    }

                    if($param){//isset chaina
                        $this->stmt->bindValue(":".$column_name, $value, $param);
                    }
                }
            }

            $success=$this->stmt->execute();

            if($success){
                return true; 
            } else {
                return false;
            }
        } catch(PDOException $e){
            error_log('PDO, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        } catch(Exception $e){
            error_log('General, ['.date('Y-m-d H:i:s').']: '.$e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT']. 'error/error.log');
            return false;
        }
    }
}
?>