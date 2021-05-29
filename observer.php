<?php

// 观察者模式

class DeleteUserSubject implements \SplSubject
{

    protected SplObjectStorage $observers;


    protected $data;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function process()
    {
        $this->data = new class {
            public string $name = 'wu';

            public function delete()
            {
                echo '用户 ', $this->name, ' 被删除', PHP_EOL;
            }
        };

        $this->data->delete();

        echo '开始通知关联处理：', PHP_EOL;
        $this->notify();
    }

    public function getName()
    {
        return $this->data->name;
    }
}

class UserLogDeleteObserver implements \SplObserver
{

    protected SplSubject $subject;

    public function update(SplSubject $subject)
    {
        $this->subject = clone $subject;
        $this->deleteUserLog();
    }

    public function deleteUserLog()
    {
        echo '删除用户', $this->subject->getName(),' 的日志', PHP_EOL;
    }
}

$subject = new DeleteUserSubject();
$subject->attach(new UserLogDeleteObserver());
$subject->process();