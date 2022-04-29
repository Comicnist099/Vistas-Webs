<?php
include_once ('../classes/Newsimage.classes.php');
    class NewsImageContr extends NewsImage{

        private $image;
        private $imageId;
        private $extension;
        private $fk_news;
        private $id_Multimedia;


        public function __construct(){ }
            
        public static function withImage($image,$extension){
            $instance = new self();
            $instance->fillWithImage($image,$extension);
            return $instance;
        }

        public static function withImageId($imageId){
            $instance = new self();
            $instance->fillWithImageId($imageId);
            return $instance;
        }

        protected function fillWithImage($image,$extension){
            $this->image = $image;
            $this->extension =$extension;
        }

        protected function fillWithImageId($imageId){
            $this->imageId = $imageId;
        }

        public function uploadImage(){
            $this->upload($this->image,$this->extension);

        }

        public function searchImage(){
            $this->search($this->imageId);
        }

        /////////////////////////////////////////////////////
        public static function UpdateImage($image,$extension,$fk_news,$id_Multimedia){
            $instance = new self();
            $instance->UpdateImageContr($image,$extension,$fk_news,$id_Multimedia);
            return $instance;
        }
        protected function UpdateImageContr($image,$extension,$fk_news,$id_Multimedia){
            $this->image = $image;
            $this->extension =$extension;
            $this->fk_news =$fk_news;
            $this->id_Multimedia =$id_Multimedia;

        }
        public function UpdateImageSql(){
            $this->UpdateImageFin($this->image,$this->extension,$this->fk_news,$this->id_Multimedia);

        }


        
    }
?>