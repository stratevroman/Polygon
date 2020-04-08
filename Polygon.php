<?php

include_once "Exceptions/Exceptions.php";

class Polygon
{
    private $points = [];

    public function __construct(Array $points=null) {
        if(isset($points)){
            foreach ($points as $point) {
                $this->addPoint($point[0],$point[1]);
            }
        }
    }

    public function addPoint(int $x = null, int $y = null)
    {
        if ((! isset($x) || ! isset($y))) {
            throw new FewArgumentsExceptions();
        };

        $this->points[] = [$x, $y];
    }

    public function getAllPoints()
    {
        return $this->points;
    }

    public function getPointByIndex(int $index)
    {
        if (! $this->existsPointIndex($index)) {
            throw new UnknownPointSpecifiedException();
        }

        return $this->points[$index];
    }

    public function getPerimeter()
    {
        if (count($this->points) < 3) {
            throw new FewPointsForPerimeterException();
        }

        $perimeter = 0;

        for ($i = 0; $i < count($this->points) - 1; $i++) {
            $perimeter += $this->getDistance($i, $i + 1);
        };

        $perimeter += $this->getDistance(0, count($this->points) - 1);

        return $perimeter;
    }

    public function getDistance(int $start_index = null, int $end_index = null)
    {
        return $this->getSquareForPoints(
            $this->getPointByIndex($start_index),
            $this->getPointByIndex($end_index)
        );
    }

    protected function getSquareForPoints(array $start_point, array $end_point): float
    {
        return sqrt((float) (
            pow(($end_point[0] - $start_point[0]), 2) +
            pow(($end_point[1] - $start_point[1]), 2)
        ));
    }

    protected function existsPointIndex(int $index): bool
    {
        return isset($this->points[$index]);
    }
}

set_exception_handler(function (Exception $exception) {
    echo $exception->getMessage(), "\n";
});
$points = [
    [0,1],
    [12,2],
    [13,99]
];
$polygon = new Polygon($points);
echo $polygon->getPerimeter();

