<?php 


class LogementsController {
    public function index()
    {
        $logements = Logement::findAll();
        view('logements.logements', compact('logements'));
    }



    public function show($id)
    {
        echo "Affichage du logement";
        $logement = Logement::findOne($id);
        view('logements.logement', compact('logement'));
    }



    public function add()
    {
        view('logements.logement-add');
    }



    public function save()
    {
        dump($_POST);
        dump($_FILES);
        $logement = new Logement;
        
        $logement->setTitle($_POST['title']);
        $logement->setAddress($_POST['address']);
        $logement->setCity($_POST['city']);
        $logement->setCp($_POST['cp']);
        $logement->setSurface($_POST['surface']);
        $logement->setPrice($_POST['price']);
        $logement->setPhoto($_FILES['photo']);
        $logement->setType($_POST['type']);
        $logement->setDescription($_POST['description']);
        
        $logement->save();
        
        //view('logements.logement', compact('logement'));

        //Redirect me donne erreur: Cannot modify header information - headers already sent 
        // redirectTo('logements');
    }
}