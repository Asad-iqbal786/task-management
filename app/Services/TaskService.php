<?php

namespace App\Services;

use App\Interfaces\TaskInterface;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function all()
    {
        return $this->taskRepository->getAllTasks();
    }

    public function find($id)
    {
        return $this->taskRepository->getTaskById($id);
    }
     public function findTaskByUserId($user_id)
    {
        return $this->taskRepository->getTaskByUserId($user_id);
    }

    public function store(array $data)
    {
        return $this->taskRepository->createTask($data);
    }

    public function update($id, array $data)
    {
        return $this->taskRepository->updateTask($id, $data);
    }

    public function delete($id)
    {
        return $this->taskRepository->deleteTask($id);
    }
}
