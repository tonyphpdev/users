<?php

class Users extends Controller {
	
	public function index()
	{
        $users_model = $this->loadModel('users_model');
	    $users_list = $users_model->all();

	    $countries_model = $this->loadModel('countries_model');

        foreach ($users_list as $user) {

            $user->country_name = $countries_model->getById($user->country_id);
	    }

        $template = $this->loadView('users');
        $template->set('users', $users_list);
        $template->render();
	}

    public function add()
    {
        $users_model = $this->loadModel('users_model');

        $countries_model = $this->loadModel('countries_model');
        $countries_list = $countries_model->all();

        $template = $this->loadView('user_add');
        $template->set('countries', $countries_list);
        $template->render();

        if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['country_id'])) {

            $users_model->add($_POST['user_name'], $_POST['user_email'], $_POST['country_id']);
            header("Location: /");
        }
    }

    public function edit($id)
    {
        $users_model = $this->loadModel('users_model');
        $user = $users_model->getById($id);
        $user = $user[0];

        $countries_model = $this->loadModel('countries_model');
        $countries_list = $countries_model->all();

        $template = $this->loadView('user_edit');
        $template->set('countries', $countries_list);
        $template->set('user', $user);
        $template->render();

        if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['country_id'])) {

            $users_model->edit($id, $_POST['user_name'], $_POST['user_email'], $_POST['country_id']);
            header("Location: /");
        }
    }

    public function delete($id)
    {
        $users_model = $this->loadModel('users_model');
        if ($users_model->delete($id)) {
            header("Location: /");
        }
    }
    
}