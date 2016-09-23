<?php
App::uses('AppController', 'Controller');
/**
 * CalendarsFoods Controller
 *
 * @property CalendarsFood $CalendarsFood
 * @property PaginatorComponent $Paginator
 */
class CalendarsFoodsController extends AppController {

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
		$this->CalendarsFood->recursive = 0;
		$this->set('calendarsFoods', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CalendarsFood->exists($id)) {
			throw new NotFoundException(__('Invalid calendars food'));
		}
		$options = array('conditions' => array('CalendarsFood.' . $this->CalendarsFood->primaryKey => $id));
		$this->set('calendarsFood', $this->CalendarsFood->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CalendarsFood->create();
			if ($this->CalendarsFood->save($this->request->data)) {
				$this->Flash->success(__('The calendars food has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The calendars food could not be saved. Please, try again.'));
			}
		}
		$foods = $this->CalendarsFood->Food->find('list');
		$this->set(compact('foods'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CalendarsFood->exists($id)) {
			throw new NotFoundException(__('Invalid calendars food'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CalendarsFood->save($this->request->data)) {
				$this->Flash->success(__('The calendars food has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The calendars food could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CalendarsFood.' . $this->CalendarsFood->primaryKey => $id));
			$this->request->data = $this->CalendarsFood->find('first', $options);
		}
		$foods = $this->CalendarsFood->Food->find('list');
		$this->set(compact('foods'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CalendarsFood->id = $id;
		if (!$this->CalendarsFood->exists()) {
			throw new NotFoundException(__('Invalid calendars food'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CalendarsFood->delete()) {
			$this->Flash->success(__('The calendars food has been deleted.'));
		} else {
			$this->Flash->error(__('The calendars food could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * @return boolean
	 */
	public function isAuthorized($user) {
		// All registered users can add posts
		if (in_array($this->action, array('add', 'index'))) {
			return true;
		}

		return parent::isAuthorized($user);
	}

}
