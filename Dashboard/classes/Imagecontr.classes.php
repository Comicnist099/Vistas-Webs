<?php
include_once ('../classes/Image.classes.php');
    class ImageContr extends Imagen{

        private $image;
        private $imageId;
        private $correo;

        public function __construct(){ }
            
        public static function withImage($image,$correo){
            $instance = new self();
            $instance->fillWithImage($image,$correo);
            return $instance;
        }

        public static function withImageId($imageId){
            $instance = new self();
            $instance->fillWithImageId($imageId);
            return $instance;
        }

        protected function fillWithImage($image,$correo){
            $this->image = $image;
            $this->correo=$correo;
        }

        protected function fillWithImageId($imageId){
            $this->imageId = $imageId;
        }

        public function uploadImage(){
            $this->upload($this->image,$this->correo);
        }

        public function searchImage(){
            $this->search($this->imageId);
        }
    }
?>