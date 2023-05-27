<?php namespace App\Controllers;
use App\Engine\Libraries\Validation;
use \R as R;

class PageController {
    
    // Add new view
    public function new($req, $res) {
        return $res->render("admin/pages/new");
    }


    // Create view
    public function create($req, $res)
    {
        // Valdiate request data
        $validation = new Validation();
        $errors = $validation
                ->with($req->body())
                ->rules([
                    'title|Title' => 'required|string|min[3]|max[100]',
                    'url|url' => 'min[3]|max[100]',
                    'description|Description' => 'string|max[200]',
                    'lang|Lanugage' => 'min[2]|max[2]|alpha'
                ])
                ->validate();
        
        
        if (!empty($errors)) {
            setFlashData('error', $errors);
            setForm($req->body());
            return $res->redirect(baseUrl("page/new"));
        }
        
        if (initModel('page')->save($req->body()))
        {
            setFlashData('success', \App\Engine\Libraries\Languages::translate([
                'ge' => 'გვერდი წარმატებით შეიქმნა',
                'ru' => 'Страница успешно создана',
                'en' => 'Page created successfully',
            ]) );
        } else {
             setFlashData('message', \App\Engine\Libraries\Languages::translate([
                'ge' => 'დაფიქსირდა შეცდომა',
                'ru' => 'Возникла ошибка',
                'en' => 'Error occurred',
            ]) );
        }
        return $res->redirect(baseUrl("page/new"));
    }


    // All items
    public function index($req, $res)
    {
        return $res->render('admin/pages/list', [
            'data' => initModel('page')->list()
        ]);
    }


    // Show view
    public function show($req, $res) {
        return $res->render('pages/page', [
            'page' => initModel('page')->getPage($req->getSegment(2))
        ]);
    }


    // Edit view
    public function edit($req, $res) {
        $id = $req->getSegment(2);
    }


    // Update
    public function update($req, $res) {
        $id = $req->getSegment(2);
    }


    // Delete
    public function delete($req, $res)
    {
        initModel('page');
        R::trash('page', $req->getSegment(2));
        return $res->redirectBack();
    }

}
        