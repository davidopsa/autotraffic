<?php

namespace App\Controllers;
use App\Models\tasksModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('tasks/index');
    }

    public function nuevaTask()
    {
        return view('tasks/nuevaTask');
    }

    public function addTask()
    {
        $tasks = new tasksModel();
        $title = $this->request->getVar('title');
        $desc = $this->request->getVar('desc');

        $data = [
            'title' => $title,
            'description' => $desc,
            'completed' => 0,
            'created_at' => date('Y-m-d')
        ];

        $newTask = $tasks->addTask($data);
        return json_encode($newTask);
    }

    public function allTasks()
    {
        return view('tasks/tasks');
    }

    public function getTasks()
    {
        $tasks = new tasksModel();
        $allTasks = $tasks->get();
        return json_encode($allTasks);
    }

    public function deleteTask()
    {
        $tasks = new tasksModel();
        $id = $this->request->getVar('id');
        $eliminarTask = $tasks->delete($id);
        return '1';
    }

    public function updateTask()
    {
        $tasks = new tasksModel();
        $id = $this->request->getVar('id');
        $title = $this->request->getVar('title');
        $description = $this->request->getVar('description');
        $completed = $this->request->getVar('completed');

        $data = [
            //'id' => $id,
            'title' =>$title,
            'description' =>$description,
            'completed' =>$completed,
            'updated_at' =>date('Y-m-d'),
        ];

        $updated = $tasks->updateTask($id, $data);

        return json_encode($updated);
    }
}
