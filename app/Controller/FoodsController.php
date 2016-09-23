<?php

    class FoodsController extends AppController{
        public $helpers = array('Html', 'Form', 'Flash');
        public $components = array('Flash', 'Paginator');

        // for view all products
        public function index(){
            //setting paginator
            $this->Paginator->settings = array('maxLimit' => '10');
            $post = $this->Paginator->paginate('Food');
            $this->set('foods', $post);

            $this->set('foods', $this->Food->find('all', array(
                'order'=>array('Food.id'=>'desc')
                )
                ));
        }

        //when people click on name of any products, this will show them all information
        //of that product
        public function view($id=null){
            if(!$id){
                throw new NotFoundException(__('Invalid product'));
            }

            $food = $this->Food->findById($id);

            if(!$food) {
                throw new NotFoundException(__('Invalid product'));
            }
            $this->set('food', $food);
        }

        /**
         * function add to add more Food
         */
        public function add() {
            if ($this->request->is('post')) {
                //create() : prepare for new place in database to store new data
                $this->Food->create();

                //Check if image has been uploaded
                if (!empty($this->request->data['Food']['image']['name'])) {
                    $file = $this->request->data['Food']['image'];

                    //get the extension
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                    //set allowed extensions
                    $arr_ext = array('jpg', 'jpeg', 'gif','png');

                    if (in_array($ext, $arr_ext)) {
                        //create new parameter to find name of that food
                        $file_name = date("Y-m-d");

                        //create new folder to store images
                        mkdir(WWW_ROOT. 'upload/' . $file_name) ;

                        //upload directory
                        $upload_dir = WWW_ROOT . 'upload/'. $file_name. '/' .$file['name'];

                        //move an uploaded file to new location
                        move_uploaded_file($file['tmp_name'], $upload_dir);

                        //prepare the filename for database entry
                        $this->request->data['Food']['image'] = $file_name.'/'.$file['name'];
                    }
                }

                if ($this->Food->save($this->request->data)) {
                    $this->Flash->success(__('Món mới đã được thêm thành công.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('The food could not be saved. Please, try again.'));
                }
            }
        }


        /**
         * function edit
         */
        public function edit($id = null) {
            if (!$id) {
                throw new NotFoundException(__('Invalid product'));
            }

            $food = $this->Food->findById($id);
            if (!$food) {
                throw new NotFoundException(__('Invalid product'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Food->id = $id;
                if ($this->Food->save($this->request->data)) {
                    $this->Flash->success(__('Your product has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Unable to update your product.'));
            }

            if (!$this->request->data) {
                $this->request->data = $food;
            }
        }


        public function delete($id) {
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }

            if ($this->Food->delete($id)) {
                $this->Flash->success(
                    __('The product with id: %s has been deleted.', h($id))
                );
            } else {
                $this->Flash->error(
                    __('The product with id: %s could not be deleted.', h($id))
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

        /**
         * function paginator
         */
        public $component = array('Paginator');

        public $paginate = array(
            'fields' => array('Food.image'),
            'maxLimit' => 10,
        );

        /**
         *@return check if the action is authorized by recent user
         */
        public function isAuthorized($user)
        {
            // All registered users can access these action
            if (isset($user) && $user['role'] == 'Manager') {
                if (in_array($this->action, array('add', 'view', 'index', 'edit', 'delete'))) {
                    return true;
                }

                return parent::isAuthorized($user);
            }
        }
    }



?>