<?php
// 组合模式

interface Component
{
    public function render();
}

class Composite implements Component
{

    protected array $composites = [];

    public function add(Component $component)
    {
        $this->composites[] = $component;
    }

    public function remove(Component $component)
    {
        $position = 0;
        foreach ($this->composites as $composite) {
            if ($composite === $component) {
                array_splice($this->composites, $position, 1);
            }
            $position++;
        }
    }

    public function getChildren(int $key): Component
    {
        return $this->composites[$key];
    }

    public function render()
    {
        foreach ($this->composites as $composite) {
            $composite->render();
        }
    }
}

class LeafA implements Component
{

    public function render()
    {
        echo 'leaf a render', PHP_EOL;
    }
}

class LeafB implements Component
{
    public function render()
    {
        echo 'leaf b render', PHP_EOL;
    }
}

$leafA = new LeafA();
$leafB = new LeafB();
$composite = new Composite();
$composite->add($leafA);
$composite->add($leafB);
$composite->render();

$composite->remove($leafA);
$composite->render();

$composite->getChildren(0)->render();