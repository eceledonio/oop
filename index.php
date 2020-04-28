<?php

class Person{
    protected $firstName;
    protected $lastName;
    protected $nickName;
    protected $changedNickName = 0;
    protected $fechaNacimiento;
    

    public function __construct ($firstName, $lastName, $fechaNacimiento)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setNickName($nickName)
    {
       if ($this->changedNickName > 2 ) 
       {
            throw new Exception("No puede cambiar el nickname mas de 2 veces");
        }
        $this->nickName = $nickName;
        $this->changedNickName++;
        
        if (strlen($nickName)<=2)
        {
            throw new Exception ("El nickname debe tener mas de 2 caracteres");
        }

        if ($nickName==$this->firstName or $nickName==$this->lastName)
        {
            throw new Exception ("El nickname no puede ser igual a tu nombre o tu apellido");
        }
   
    }

    public function getNickname()
    {
        return $this->nickName;
    }

    function fullName ()
    {
        return $this->firstName. ' ' .$this->lastName;
    }

    public function getBirthDay()
    {
        return $this->fechaNacimiento;
    }

    public function getAge()
    {
        $fechaNacimiento = new Datetime($this->fechaNacimiento);
        $toDay = new Datetime();
        $age = $toDay->diff($fechaNacimiento);
        return $this->fullName(). ' tu fecha de nacimiento es '. $this->fechaNacimiento.  ' y tienes ' .$age->y. ' años. ';
    }    
}

    $person1 = new Person ('Enmanuel', 'Celedonio','15-09-1991' );

    $person1->setNickName('Enma');

    echo $person1->getAge();


    //exit($person1->getNickname());
    //echo $person1->fullName();
