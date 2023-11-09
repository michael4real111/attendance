<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db =$conn;
        }

        public function insert ($fname, $lname, $address ,$contact, $dob, $parish, $email, $occupation){
            try {
                $sql = "INSERT INTO applicants (firstname,lastname,address,contactnumber,dateofbirth,parish_id,email,occupation_id) 
                VALUES (:fname, :lname,:address,:contact, :dob, :parish, :email, :occupation)";
                $stmt = $this-> db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':address',$address);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':parish',$parish);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':occupation',$occupation);

                $stmt ->execute();
                return true;

            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
            }
        } 
        public function edit ($id, $fname, $lname, $address ,$contact, $dob, $parish, $email, $occupation){
            try {
                $sql = "UPDATE applicants SET firstname =:fname, lastname = :lname, address = :address, contactnumber = :contact, 
                dateofbirth = :dob, parish_id = :parish, email = :email, occupation_id = :occupation WHERE applicant_id = :applicantid";
                $stmt = $this-> db->prepare($sql);

                $stmt->bindparam(':applicantid',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':address',$address);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':parish',$parish);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':occupation',$occupation);

                $stmt ->execute();
                return true;

            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getApplicants(){
            try{
            $sql = "SELECT * FROM `applicants` a inner join occupations o on a.occupation_id = o.occupation_id";
            $result = $this->db->query($sql);
            return $result;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;           
        }
        }
        public function getApplicantsDetails($id){
            try{
            $sql = "select a.applicant_id, a.firstname, a.lastname, a.address, a.contactnumber, a.dateofbirth, p.parish_name, a.email, o.occupation_name 
            from applicants a inner join occupations o on a.occupation_id = o.occupation_id  inner join parish p on a.parish_id = p.parish_id where applicant_id = :applicantid";
            $stmt =$this->db->prepare($sql);
            $stmt->bindparam(':applicantid', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
        }
        }

        public function deleteApplicant($id){
            try{            
                    $sql = "delete from applicants where applicant_id =:applicantid";
                    $stmt =$this->db->prepare($sql);
                    $stmt->bindparam(':applicantid', $id);
                    $stmt->execute();
                    return true;
                } catch (PDOExeption $e) {
                    echo $e->getMessage();
                    return false;
                }
            }

        public function getOccupations(){
            try{
            $sql = "SELECT * FROM `occupations`";
            $result = $this->db->query($sql);
            return $result;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
        }
        }
        public function getParish(){
            try{
            $sql = "SELECT * FROM `parish`";
            $result = $this->db->query($sql);
            return $result;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
        }
        }
     
    }

?>