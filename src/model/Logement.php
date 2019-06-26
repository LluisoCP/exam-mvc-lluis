<?php
use Symfony\Component\VarDumper\Caster\ExceptionCaster;

class Logement extends Db {

    const TABLE_NAME = "logement";
    /* Properties */
    protected $id;
    protected $title;
    protected $address;
    protected $city;
    protected $cp;
    protected $surface;
    protected $price;
    protected $photo;
    protected $type;
    protected $description;


    /* Methods */

    /* Setters */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title)
    {
        
        if (strlen($title) < 3)
        {
            throw new Exception("Le titre est trop court.");
        }
        
        $this->title = $title;
        return $this;
    }

    public function setAddress($address)
    {
        
        
        
        $this->address = $address;
        return $this;
    }


    public function setCity($city)
    {



        $this->city = $city;
        return $this;
    }

    public function setCp($cp)
    {

        if ( !is_numeric(($cp)) || $cp<1000 || $cp>99999)
        {
            throw new Exception("Le C.P. saisi n'est pas valable.");
        }

        $this->cp = $cp;
        return $this;
    }

    public function setSurface($surface)
    {

        if (!is_numeric($surface))
        {
            throw new Exception("La surface saisie n'est pas valable.");
        }

        $this->surface = $surface;
        return $this;
    }


    public function setPrice($price)
    {

        if (!is_numeric($price)) {
                throw new Exception("Le prix saisi n'est pas valable.");
            }

        $this->price = $price;
        return $this;
    }

    public function setPhoto($photo)
    {

        if (isset($photo) && $photo['error'] == 0) {
            
            if ($photo['size'] <= 10000000) {
                // Check the size
                $infosfichier = pathinfo($photo['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    move_uploaded_file($photo['tmp_name'],  './public/uploads/' . $photo['name']);
                    $this->photo = $photo['name'];
                    return $this;
                }
            } else {
                throw new Exception('LA taille de la photo est trop grande.');
            }
        } else {
            throw new Exception('Une erreur est survenue à l\'upload du fichier.');
        }
    }

    

    public function setType($type)
    {
        $types_valables = ['location', 'vente'];
        if (!in_array($type, $types_valables))
        {
            throw new Exception("Le type du logement doit être soit location soit vente.");        
        }
        // if ($type != 'location' || $type != 'vente')
        // throw new Exception("Le type du logement doit être soit location soit vente.");
        $this->type = $type;
        return $this;
    }

    public function setDescription($description)
    {
        if (strlen($description)<5)
        {
            throw new Exception("La description saisie est trop courte.");
        }


        $this->description = $description;
        return $this;
    }
    /* Getters */
    public function getId()
    {
        return $this->id;
    }


    public function getTitle()
    {
        return $this->title;
    }

    public function getAddress()
    {
        return $this->address;
    }


    public function getCity()
    {
        return $this->city;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getSurface()
    {
        return $this->surface;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDescription()
    {
        return $this->description;
    }


    /* Database Interaction */

    public function save()
    {
        
        $data = [
            "titre"              => $this->title,
            "adresse"            => $this->address,
            "ville"              => $this->city,
            "cp"                 => $this->cp,
            "surface"            => $this->surface,
            "prix"               => $this->price,
            "photo"              => $this->photo,
            "type"               => $this->type,
            "description"        => $this->description
        ];
        //if ($this->id > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);


        //J'ai commenté ces fonctions parce qu'elles me donnent une erreur en lignes 228, 231, 248
        // $this->savePhoto();
        // $this->createMiniature();
        return $this;
    }


    private function savePhoto()
    {
        $photo = $this->getPhoto();
        $extension = pathinfo($photo['name'])['extension'];
        $newName = "logement_" . $this->getId();
        $newNameWithExtension = $newName . "." . $extension;
        move_uploaded_file($photo['tmp_name'], './public/uploads/'  .  $newNameWithExtension);
        $data = [
            'id' => $this->getId(),
            'photo' => $newNameWithExtension
        ];
        Db::dbUpdate(self::TABLE_NAME, $data);
        return $this;
    }
    private function createMiniature()
    {
        /**
         * Gestion de la miniature :
         * Je traite mes variables afin de remplir les arguments de ma fonction createMinature,
         * qui crééera par exemple l'image suivante : "logement_38_300x300.png"
         */
        $photo = $this->getPhoto();
        // 1. On récupère le nom de l'ancienne image
        $extension = pathinfo($photo['name'])['extension'];
        $oldName = "logement_" . $this->getId();
        $oldNameWithExtension = $oldName . "." . $extension;
        $titreAncienneImage = $oldNameWithExtension;                    // Le nom de l'image de départ AVEC extension
        $extension = $extension;                                        // L'extension de départ
        $dossierEnregistrement = './public/uploads';                    // Le dossier de stockage des images, sans "/" !!!
        $titreNouvelleImage = $titreAncienneImage . '_300x300.' . $extension;      // Le nom de la nouvelle image AVEC extension
        $resultMiniature = createMiniature($titreAncienneImage, $extension, $dossierEnregistrement, $titreNouvelleImage);
        if (!$resultMiniature) {
            echo "Il y a eu un problème lors de la création de la miniature.";
            return;
        }
    }
    public static function findAll()
    {
        $data = Db::dbFind(self::TABLE_NAME);
        return $data;
    }

    public static function findOne($id)
    {   
        $data = Db::dbFind(self::TABLE_NAME, [$id]);
        return $data;
    }



}