<?php
class Employee
{
    public $name;
    protected $salary;
    private $bonus;

    public function setValues($name, $salary, $bonus)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->bonus = $bonus;
    }

    public function printAllValues()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Salary: " . $this->salary . "<br>";
        echo "Bonus: " . $this->bonus . "<br>";
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getBonus()
    {
        return $this->bonus;
    }
}

$employee = new Employee();
$employee->setValues("Mohammed", 5000, 1000);
$employee->printAllValues();

echo "Direct name access: " . $employee->name . "<br>";

echo "Salary: " . $employee->getSalary() . "<br>";
echo "Bonus: " . $employee->getBonus() . "<br>";
?>