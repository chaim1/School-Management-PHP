<?php  
include_once 'model.php';
include_once '../bl/bl-students.php';


    class ModelStudents  implements IModel
    {
        private $id;        
        private $name;     
        private $phone; 
        private $email; 
        private $image;        
        
        function __construct($arr) {

                if(!empty($arr['id'])){
                    $this->id = $arr['id'];
                } 

                $this->name = $arr['name'];

                $this->phone = $arr['phone']; 

                $this->email = $arr['email']; 

                $this->image = $arr['image']; 
            
        }

        //get

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getImage() {
            return $this->image;
        }

        //set

        

        public function setName($name) {
            $this->name =$name;
        }

        public function setPhone($phone) {
            $this->phone =$phone;
        }

        public function setEmail($email) {
            $this->email =$email;
        }

        public function setImage($image) {
            $this->image =$image;
        }


    }
?>