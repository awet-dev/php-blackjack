<?php
class People {
    public $name;
    public $birth_day;
    protected $place;
    private $user_name;

    function __construct ($name, $birth_day, $place) {
        $this->name = $name;
        $this->birth_day = $birth_day;
        $this->place = $place;
        echo "my name is $this->name and i am born in $this->birth_day and i am living in $this->place";
    }

    function say_hello($user_name) {
        $this->user_name = $user_name;
        echo "nice to meet you ms. $this->user_name";
    }

    function __destruct() {
        // TODO: Implement __destruct() method.
        echo "<br> good by ms. $this->user_name ";
    }

}
$alex = new People(Awet, "01/Jan/1992", "Kortrijk");
$alex->say_hello(John);
echo "<br> it works";
