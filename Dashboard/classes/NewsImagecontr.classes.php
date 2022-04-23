<?php
include_once ('../classes/Newsimage.classes.php');
    class NewsImageContr extends NewsImage{

        private $image;
        private $imageId;
        private $extension;

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
    }
?>