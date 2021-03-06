<?php
    if($_SESSION['main'] !=='addS'){
        $student = $conS->ActionGetOneStudent($_SESSION['studentId']);
    }
    if($_SESSION['main'] =='showS'   &&  $_SESSION['mainEdit'] == 'EditS'){
        $arrayOfCourses = $conC->ActionGetCourses();
    }
 ?>

<form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <?php if($_SESSION['main'] =='showS' && $_SESSION['mainEdit'] == ''){?>
            <div class="d-flex">
                <div class="mr-auto p-2"><strong><?php echo $student->getName()?></strong></div>
                <input  name="idOfStudent" style="display:none" type="number" value="<?php echo $student->getId()?>">
                <button class="p-2 btn btn-secondary" type="submit" name="editStudent">Edit</button>
            </div>
            <hr>


        <?php if ($_SESSION['hasErrors'] == true) { 
            $arreyOfErrors = $conS->getErrors()?>
                <ul class="list-group">

                    <?php foreach ($arreyOfErrors as $error) { ?>
                    <li class="list-group-item list-group-item-danger"><strong><?php echo $error; ?></strong> </li>
                    <?php } ?>

                </ul>
            
        <?php } ?>

        <?php }?>
        <?php if($_SESSION['main'] =='addS' || $_SESSION['mainEdit'] =='EditS'){?>
            <?php if($_SESSION['main'] =='showS'){?>
                <input name="idOfStudentForEdit" style="display:none" type="number" value="<?php echo $student->getId()?>">
            <?php }?>
            <button class="mb-5 float-left btn btn-secondary" type="submit" name="SaveStudent">Save</button>
        <?php }?>
    </div> 

    <div class="form-group">
        <?php if($_SESSION['mainEdit'] == 'EditS'){?>
            <input  name="idOfStudent" style="display:none" type="number" value="<?php echo $student->getId()?>">
            <button class="float-right btn btn-secondary" type="submit" name="DeleteStudent" onclick='valid()'>Delete</button>
        <?php }?>
    </div> 

    <?php if($_SESSION['main'] =='addS' ){ ?>
        <br>
        <br>
            <h3 class="text-center">Add Student</h3>
            <div class="form-group">Name
                <input class="form-control" type="text" name="NameStudent">
            </div>
            <div class="form-group">Phone
                <input class="form-control" type="number" name="PhoneStudent">
            </div>
            <div class="form-group">Email
                <input class="form-control" type="text" name="EmailStudent">
            </div>
            <div>
                <input name="AddimageStudent" type="file" >
            </div>
            <?php }elseif($_SESSION['main'] =='showS' &&  $_SESSION['mainEdit'] == ''){?>
        <div class="row">
        <div class="col-3"><img src="images/students/<?php  echo $student->getImage() ?>" alt="" height="100" width="152"></div>
        <div class="col-9">
            <div class=" form-group"><strong>Student:</strong>
                <input class="border-0" class="form-control" type="text" name="NameStudent" value="<?php  echo $student->getName() ?>">
             </div>
             <div class=" form-group"><strong>Phone:</strong>
                <input class="border-0" class="form-control" type="number" name="PhoneStudent" value="0<?php  echo $student->getPhone() ?>">
             </div>
             <div class=" form-group"><strong>Email:</strong>
                <input class="border-0" class="form-control" type="text" name="EmailStudent" value="<?php  echo $student->getEmail() ?>">
             </div>
        </div>     
        <?php }elseif($_SESSION['main'] =='showS'   &&  $_SESSION['mainEdit'] == 'EditS'){?> 
            <div class="form-group">
                <input  class="form-control" type="text" name="NameStudent" value="<?php  echo $student->getName()?>">
             </div>
             <div class="form-group">
                <input  class="form-control" type="number" name="PhoneStudent" value="0<?php  echo $student->getPhone()?>">
             </div>
             <div class="form-group">
                <input  class="form-control" type="text" name="EmailStudent" value="<?php  echo $student->getEmail()?>">
             </div>
             <div class="row">
                <div class="col-3">
                    <img src="images/students/<?php  echo $student->getImage() ?>" alt="" height="100" width="152">
                </div>
                <div class="col-5">
                    <input style="display:none" type="text" name="helperNameStudent" value="<?php  echo $student->getImage() ?>">
                    <input name="editImageStudent" type="file" >
                </div>
            </div>
        <?php }?>
        <?php if($_SESSION['main'] =='showS'   &&  $_SESSION['mainEdit'] == 'EditS' ){?> 

            <div class="row">
                <?php foreach($arrayOfCourses as $courses) {?>
                       <div class="col-6">
                        <input type="checkbox" name="selected[]" value="<?php echo $courses->getId()?>"
                            <?php foreach ($student->modelCourses as $courseS) { 
                                if ($courses->getId() == $courseS['course_id']) { 
                                    array_push($_SESSION['helperPrimery'], $courseS['course_id']);
                                    echo 'checked';
                                } }?>
                            > 
                        <label class="" for="<?php echo $courses->getName().'select' ?>"><?php echo $courses->getName() ?></label>
                    </div>
                <?php }?>
            </div>
            

    <?php }?>
    <?php if($_SESSION['main'] =='showS' &&$_SESSION['mainEdit'] == ''){?> 
        <div class="row">
                <?php foreach($arrayOfCourses as $courses) {?>
                       
                            <?php foreach ($student->modelCourses as $courseS) { 
                                if ($courses->getId() == $courseS['course_id']) { 
                                    echo '<div class="mt-1 col-6"><img src="images/courses/'.$courses->getImage().'" alt="" height="40" width="52">'.$courses->getName().'</div>';
                                } }?>
                             
                    
                <?php }?>
            </div>
    <?php }?>
    <?php if($_SESSION['main'] =='addS'){ ?>
        <div class="row">
            <?php foreach($arrayOfCourses as $courses) {?>
                <div class="col-3">
                    <input type="checkbox" name="selected[]" value="<?php echo $courses->getId()?>">
                    <label class="" for="<?php echo $courses->getName().'select' ?>"><?php echo $courses->getName() ?></label>
                </div>
            <?php }?>
        </div>
    <?php  }?>

</form>


                                    
                                