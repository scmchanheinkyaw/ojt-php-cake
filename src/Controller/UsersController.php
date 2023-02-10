<?php
declare (strict_types = 1);

namespace App\Controller;

class UsersController extends AppController
{
    public function login()
    {
        if ($this->Auth->user('id')) {
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            $check_user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $check_user = $this->Users->patchEntity($check_user, $this->request->getData(), ['validate' => 'login']);
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);

                    $this->Flash->success(__('The user login has been saved.'));

                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Username and password is incorrect'));
                }
            }
            $this->set(compact('check_user'));
        }
    }

    public function register()
    {
        if ($this->Auth->user('id')) {
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'register']);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user registration has been saved.'));

                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
                $this->Flash->error(__('The user registration could not be saved. Please, try again.'));
            }
            $this->set(compact('user'));
        }
    }

    public function logout()
    {
        $this->Auth->logout();
        $this->Flash->success(__('Logout Success! Please Login Again.'));

        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
