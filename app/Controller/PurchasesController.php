<?php
App::uses('AppController', 'Controller');
/**
 * Purchases Controller
 *
 * @property Purchase $Purchase
 * @property PaginatorComponent $Paginator
 */
class PurchasesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Purchase->recursive = 0;
		$this->set('purchases', $this->Paginator->paginate());

        $this->set('purchases',$this->Purchase->find('all', array(
                'order'=>array('Purchase.id'=>'desc')
            )
        ));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Purchase->exists($id)) {
			throw new NotFoundException(__('Invalid purchase'));
		}
		$options = array('conditions' => array('Purchase.' . $this->Purchase->primaryKey => $id));
		$this->set('purchase', $this->Purchase->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Purchase->create();

            /**
             * calculate membership_point
             */
            if(!empty($this->request->data['Purchase']['price'])) {
                //get input price from user
                $price = $this->request->data['Purchase']['price'];

                //calculate membership point = price * 10%
                $membership_point = ($price * 10) / 100;

                $this->request->data['Purchase']['membership_point'] = $membership_point;
            }

            /**
             * get user_id form phone number
             */
            if(!empty($this->request->data['Purchase']['phone_number'])){
                $phone_number = $this->request->data['Purchase']['phone_number'];

                //find user_id by user.phone_number
                $this->loadModel('User');
                $user_id = $this->User->find('first', array('conditions' => array('phone_number' => $phone_number), 'fields' => 'id'));
                $this->request->data['Purchase']['user_id'] = $user_id['User']['id'];
            }


			if ($this->Purchase->save($this->request->data)) {
				$this->Flash->success(__('The purchase has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase could not be saved. Please, try again.'));
			}
		}
		$foods = $this->Purchase->Food->find('list');
		$users = $this->Purchase->User->find('list');
		$this->set(compact('foods', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Purchase->exists($id)) {
			throw new NotFoundException(__('Invalid purchase'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Purchase->save($this->request->data)) {
				$this->Flash->success(__('The purchase has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Purchase.' . $this->Purchase->primaryKey => $id));
			$this->request->data = $this->Purchase->find('first', $options);
		}
		$foods = $this->Purchase->Food->find('list');
		$users = $this->Purchase->User->find('list');
		$this->set(compact('foods', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Purchase->id = $id;
		if (!$this->Purchase->exists()) {
			throw new NotFoundException(__('Invalid purchase'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Purchase->delete()) {
			$this->Flash->success(__('The purchase has been deleted.'));
		} else {
			$this->Flash->error(__('The purchase could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
