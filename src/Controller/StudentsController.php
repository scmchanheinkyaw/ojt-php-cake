<?php
declare (strict_types = 1);

namespace App\Controller;

class StudentsController extends AppController
{
    public function index()
    {
        $students = $this->paginate($this->Students);

        $this->set(compact('students'));
    }

    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('student'));
    }

    public function add()
    {
        $student = $this->Students->newEmptyEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData(), ['validate' => 'store']);

            $fileobject = $this->request->getData('file');
            $uploadPath = WWW_ROOT . 'img/';
            $fileName = $fileobject->getClientFilename();
            $destination = $uploadPath . $fileName;
            if ($fileName) {
                $fileobject->moveTo($destination);
                $student->image = $fileName;
            }

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student'));
    }

    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $student = $this->Students->patchEntity($student, $this->request->getData(), ['validate' => 'update']);

            $fileobject = $this->request->getData('file');
            if ($fileobject) {
                $uploadPath = WWW_ROOT . 'img/';
                $fileName = uniqid() . $fileobject->getClientFilename();
                $destination = $uploadPath . $fileName;
                if ($fileName) {
                    $fileobject->moveTo($destination);
                    $student->image = $fileName;
                }
            }

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
