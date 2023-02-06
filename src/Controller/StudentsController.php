<?php
declare (strict_types = 1);

namespace App\Controller;

class StudentsController extends AppController
{
    public function index()
    {
        $this->paginate = ['contain' => ['Majors']];
        $students = $this->paginate($this->Students);
        $this->set(compact('students'));
    }

    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Majors'],
        ]);

        $this->set(compact('student'));
    }

    public function add()
    {
        $student = $this->Students->newEmptyEntity();
        $majors = $this->Students->Majors->find('list', ['limit' => 200])->all();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData(), ['validate' => 'store']);

            $fileobject = $this->request->getData('file');
            $uploadPath = WWW_ROOT . 'img/';
            $fileName = uniqid() . '-' . $fileobject->getClientFilename();
            if ($fileName) {
                $fileobject->moveTo($uploadPath . $fileName);
                $student->image = $fileName;
            }

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student', 'majors'));
    }

    public function edit($id = null)
    {
        $student = $this->Students->get($id);
        $majors = $this->Students->Majors->find('list', ['limit' => 200])->all();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData(), ['validate' => 'update']);
            $fileobject = $this->request->getData('file');
            $uploadPath = WWW_ROOT . 'img/';
            $fileName = uniqid() . '-' . $fileobject->getClientFilename();
            if ($fileobject->getClientFilename()) {
                unlink($uploadPath . $student->image);
                $fileobject->moveTo($uploadPath . $fileName);
                $student->image = $fileName;
            } else {
                $student->image = $student->image;
            }

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student', 'majors'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        $uploadPath = WWW_ROOT . 'img/';
        unlink($uploadPath . $student->image);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
