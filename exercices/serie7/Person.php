<?php

class Person {
    private $firstName;
    private $lastName;
    private $age;
    private $email;

    public function __construct($firstName, $lastName, $age, $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->email = $email;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
        // équivalent : return "{$this->firstName} {$this->lastName}";
    }

    public function isAdult() {
        return $this->age >= 18;
    }

    public function getEmailDomain() {
        $parts = explode('@', $this->email);

        if (count($parts) == 2) {
            return $parts[1];
        }

        return '';
    }

}

$pers1 = new Person('Jean', 'Moreau', 17, 'jean.moreau@gmail.com');
$pers2 = new Person('Jeremy', 'Knox', 20, 'jeremy.knox');

echo "Full Name : " . $pers1->getFullName() . "<br>";
echo "Is Adult : " . ($pers1->isAdult() ? "Yes" : "No") . "<br>";
echo "Email : " . $pers1->getEmail() . "<br>";
echo "Email Domain : " . (empty($pers1->getEmailDomain()) ? 'Invalid' : $pers1->getEmailDomain()) . "<br>";

echo "Full Name : " . $pers2->getFullName() . "<br>";
echo "Is Adult : " . ($pers2->isAdult() ? "Yes" : "No") . "<br>";
echo "Email : " . $pers2->getEmail() . "<br>";
echo "Email Domain : " . (empty($pers2->getEmailDomain()) ? 'Invalid' : $pers2->getEmailDomain()) . "<br>";
