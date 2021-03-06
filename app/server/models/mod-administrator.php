<?php  
include_once 'model.php';
include_once 'app/server/bl/bl-administrators.php';
require_once 'app/server/bl/bl-roles.php';


    class ModelAdministrator  implements IModel
    {
        private $id;        
        private $role_id;     
        private $name;  
        private $phone;        
        private $email;   
        private $Username;  
        private $Image;       
        private $pwd;  
        private $roleModel;
        
        function __construct($arr) {

                if(!empty($arr['id'])){
                    $this->id = $arr['id'];
                } 

                $this->role_id = $arr['role_id'];

                $this->name = $arr['name'];

                $this->phone = $arr['phone']; 

                $this->email = $arr['email']; 

                $this->Username = $arr['Username']; 

                $this->Image = $arr['Image']; 

                $this->pwd = $arr['pwd']; 

            
        }

        //get

        public function getId() {
            return $this->id;
        }

        public function getRole_id() {
            return $this->role_id;
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

        public function getUsername() {
            return $this->Username;
        }

        public function getImage() {
            return $this->Image;
        }

        public function getPwd() {
            return $this->pwd;
        }

        //set


        public function setRole_id($role_id) {
            $this->role_id =$role_id;
        }

        public function setName($name) {
            $this->name =$name;
        }

        public function setPhone($phone) {
            $this->phone =$phone;
        }

        public function setEmail($email) {
            $this->email =$email;
        }

        public function setUsername($Username) {
            $this->Username =$Username;
        }

        public function setImage($Image) {
            $this->Image =$Image;
        }

        public function setPwd($pwd) {
            $this->pwd =$pwd;
        }

        // Lazy load
        function getRoleModel() {
            if (empty($this->roleModel)) {
                $rbl = new BusinessLogicRoles;
                $this->roleModel = $rbl->getOne($this->role_id);
            }
            return $this->roleModel;
        }


    }
?>