<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


/**
* @param array $user
* @return redirect to their page by role
*/


	public function login() {
		if($this->request->is('post')){
			if($this->Auth->login()){
				if($this->Auth->user('role') === 'Manager'){
					$this->redirect(array('action'=>'indexOfManager'));
				}
				if($this->Auth->user('role') === 'Staff'){
					$this->redirect(array('action'=>'indexOfStaff'));
				}
				if($this->Auth->user('role') === 'Member'){
					$this->redirect(array('action'=>'home'));
				}
			}
			else {
				$this->Flash->error(__('Sai tài khoản hoặc mật khẩu'));
			}

		}
	}


/**
* @return logout user
*/
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}
/********-------------------------------------end common function that both Manager, Staff and Member users have-----------------------------***/

/****--------------------------Manager users function-----------------------------------------***/
	/**** if recent manager is the boss(id=constant, now is 7), will own some function****/
	/**
	 * list manager
	 */
	public function listManager() {
		$this->set('users', $this->User->find('all', array('conditions'=>array('role'=>'Manager'))));
	}

	/**
	 * @ add new manger
	 */
	public function addManager(){
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Thêm thành công'));
				$this->redirect(array('action' => 'listManager'));
			} $this->Flash->error(__('Không thể thêm người dùng'));
		}
	}

	public function editManager($id = null){
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Người dùng không hợp lệ'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Sửa thông tin thành công ^_^'));
				$this->redirect(array('action' => 'listManager'));
			} else {
				$this->Flash->error(__('Không thể update thông tin :( Vui lòng thử lại!'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	public function deleteManager($id){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->User->delete($id)) {
			$this->Flash->success(
				__('Quản lý có id %s đã bị xóa.', h($id))
			);
		} else {
			$this->Flash->error(
				__('Quản lý có id: %s không thể xóa.', h($id))
			);
		}

		$this->redirect(array('action' => 'listManager'));
	}

	/*********************************/
	public function listStaff(){
		//		$this->User->recursive = 0;
//		$this->set('users', $this->Paginator->paginate());
//		var_dump($_SESSION['Auth']['User']['role']);
		$this->set('users', $this->User->find('all', array('conditions'=>array('role'=>'Staff'))));
	}
	/**
	 * @param $id
	 */
	public function viewManager($id){
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('user', $user);
	}

	/**
	 * @return index page of admin
	 */
	public function indexOfManager(){

	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function viewStaff($id) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('user', $user);
	}


	/**
 * add method
 *
 * @return void
 */
	public function addStaff() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Thêm thành công'));
				$this->redirect(array('action' => 'indexOfmanager'));
			} $this->Flash->error(__('Không thể thêm người dùng'));
		}
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editStaff($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Người dùng không hợp lệ'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Sửa thông tin thành công ^_^'));
				$this->redirect(array('action' => 'indexOfManager'));
			} else {
				$this->Flash->error(__('Không thể update thông tin :( Vui lòng thử lại!'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function deleteStaff($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->User->delete($id)) {
			$this->Flash->success(
				__('Nhân viên có id %s đã bị xóa.', h($id))
			);
		} else {
			$this->Flash->error(
				__('Nhân viên có id: %s không thể xóa.', h($id))
			);
		}

		$this->redirect(array('action' => 'indexOfManager'));
	}

	/********-------------------------------------end Mananger users function-----------------------------***/

	/****--------------------------Staff users function-----------------------------------------***/


	/**
	 * @return this is the page of staff
	 */
	public function indexOfStaff(){
		$this->set('users', $this->User->find('all', array('conditions'=>array('role'=>'Member'))));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function viewMember($id) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('user', $user);
	}


	/**
	 * add method
	 *
	 * @return void
	 */
	public function addMember() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Thêm thành công'));
				$this->redirect(array('action' => 'indexOfStaff'));
			} $this->Flash->error(__('Không thể thêm người dùng'));
		}
	}


	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function editMember($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Người dùng không hợp lệ'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Sửa thông tin thành công ^_^'));
				$this->redirect(array('action' => 'indexOfManager'));
			} else {
				$this->Flash->error(__('Không thể update thông tin :( Vui lòng thử lại!'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function deleteMember($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->User->delete($id)) {
			$this->Flash->success(
				__('Nhân viên có id %s đã bị xóa.', h($id))
			);
		} else {
			$this->Flash->error(
				__('Nhân viên có id: %s không thể xóa.', h($id))
			);
		}

		$this->redirect(array('action' => 'indexOfManager'));
	}
	/**
	 * @return this is the page of Member
	 */
	public function home(){
	}


}
