<?php
App::uses('AppController', 'Controller');
/**
 * Ingredients Controller
 *
 * @property Ingredient $Ingredient
 * @property PaginatorComponent $Paginator
 */
class IngredientsController extends AppController {

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
		$this->Ingredient->recursive = 0;
		$this->set('ingredients', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ingredient->exists($id)) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		$options = array('conditions' => array('Ingredient.' . $this->Ingredient->primaryKey => $id));
		$this->set('ingredient', $this->Ingredient->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ingredient->create();
			if ($this->Ingredient->save($this->request->data)) {
				$this->Flash->success(__('The ingredient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ingredient->exists($id)) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ingredient->save($this->request->data)) {
				$this->Flash->success(__('The ingredient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ingredient.' . $this->Ingredient->primaryKey => $id));
			$this->request->data = $this->Ingredient->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ingredient->delete()) {
			$this->Flash->success(__('The ingredient has been deleted.'));
		} else {
			$this->Flash->error(__('The ingredient could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 *@return check if the action is authorized by recent user
	 */
	public function isAuthorized($user)
	{
		// All registered users can access these action
		if (isset($user) && $user['role'] == 'Staff') {
			if (in_array($this->action, array('add', 'view', 'index', 'edit', 'delete'))) {
				return true;
			}

			return parent::isAuthorized($user);
		}
	}
}
