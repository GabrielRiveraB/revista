<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Magazines Controller
 *
 * @property \App\Model\Table\MagazinesTable $Magazines
 *
 * @method \App\Model\Entity\Magazine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MagazinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $magazines = $this->paginate($this->Magazines);

        $this->set(compact('magazines'));
    }

    /**
     * View method
     *
     * @param string|null $id Magazine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $magazine = $this->Magazines->get($id, [
            'contain' => ['Notes']
        ]);

        $this->set('magazine', $magazine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $magazine = $this->Magazines->newEntity();
        if ($this->request->is('post')) {
            $magazine = $this->Magazines->patchEntity($magazine, $this->request->getData());
            if ($this->Magazines->save($magazine)) {
                $this->Flash->success(__('The magazine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            debug($magazine->errors());
            $this->Flash->error(__('The magazine could not be saved. Please, try again.'));
        }

        $this->loadModel('Notes');
        $notes = $this->Notes->find('all', [
            'contain' => [],
            'fields'=>['id','name','date','url']
        ]);

        $notes = $this->paginate($this->Notes);
        
        //debug($note->toarray());


        $lastmag = $this->Magazines->find('all',['fields'=>'numero'])->last();
        $this->set(compact(['magazine','lastmag','notes']));
    } 

    /**
     * Edit method
     *
     * @param string|null $id Magazine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $magazine = $this->Magazines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $magazine = $this->Magazines->patchEntity($magazine, $this->request->getData());
            if ($this->Magazines->save($magazine)) {
                $this->Flash->success(__('The magazine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The magazine could not be saved. Please, try again.'));
        }
        $this->set(compact('magazine'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Magazine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $magazine = $this->Magazines->get($id);
        if ($this->Magazines->delete($magazine)) {
            $this->Flash->success(__('The magazine has been deleted.'));
        } else {
            $this->Flash->error(__('The magazine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Magazine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function prueba()
    {
    }

}
