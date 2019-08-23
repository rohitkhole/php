<!-- Demo model of Class, Object , Constructor, dynamic Getter and dynamic Setter in php-->
<?php
   class Student {

      //setting default value to the variable of constructor, it's useful when no value is provided.
      public function __construct($PRN, $name='xyz', $mo_no='000', $email='xyz@gmail.com', $addrs='abc', $year='FY', $photo='xyz.jpg') {
        $this->PRN = $PRN;
        $this->name = $name;
        $this->mo_no = $mo_no;
        $this->email = $email;
        $this->passwd = $email; // creating initial password same as email.
        $this->addrs = $addrs;
        $this->year = $year;
        $this->photo = $photo;
      }

      //creating dynamic Setter.
      function __set($name, $value){
          if(method_exists($this, $name)){
            $this->$name($value);
          }
          else{
            // Getter/Setter not defined so set as property of object.
            $this->$name = $value;
          }
      }

      //creating dynamic Getter.
      function __get($name){
        if(method_exists($this, $name)){
          return $this->$name();
        }
        elseif(property_exists($this,$name)){
          // Getter/Setter not defined so return property if it exists.
          return $this->$name;
        }
        return null;
      }
  }
  $n = "1111111111";
  // creating object with Constructor.
  $s1 = new Student("4434231","My name ", $n);
  // setting value using dynamic constructor.
  // put (data_member, "value")
  $s1->__set("year", "SY");
  // "demo" is not data member of class still it creats setter for that
  //this is how the getter/setter is created.
  //it's useful when any object wants extra propery than other objects    .
  $s1->__set("demo", "Trying to make Setter for non data Member of Class");
  // printing values using object.
  echo $s1->__get("demo");
  echo $s1->__get("name");
  echo $s1->__get("email");

?>

