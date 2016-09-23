<?php

class EventsController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    // for view all products
    public function index(){
        $this->set('events', $this->Event->find('all', array(
                'order'=>array('Event.id'=>'desc')
            )
        ));
    }

    //when people click on name of any products, this will show them all information
    //of that product
    public function view($id=null){
        if(!$id){
            throw new NotFoundException(__('Invalid product'));
        }

        $event = $this->Event->findById($id);
        if(!$event) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->set('event', $event);
    }

    /**
     * function add to add more Food
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Flash->success(__('Your event has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your event.'));
        }
    }


    /**
     * function edit
     */
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid event'));
        }

        $event = $this->Event->findById($id);
        if (!$event) {
            throw new NotFoundException(__('Invalid event'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Event->id = $id;
            if ($this->Event->save($this->request->data)) {
                $this->Flash->success(__('Your event has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your event.'));
        }

        if (!$this->request->data) {
            $this->request->data = $event;
        }
    }


    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Event->delete($id)) {
            $this->Flash->success(
                __('The event with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The event with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }


    /**
     * function beforefilter allow user do some action without logging in
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','edit', 'delete');
    }
}



?>