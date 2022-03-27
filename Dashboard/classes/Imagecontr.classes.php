<?php
include ('../classes/Image.classes.php');
    class ImageContr extends Imagen{

        private $image;
        private $imageId;

        public function __construct(){ }
    
        public static function withImage($image){
            $instance = new self();
            $instance->fillWithImage($image);
            return $instance;
        }

        public static function withImageId($imageId){
            $instance = new self();
            $instance->fillWithImageId($imageId);
            return $instance;
        }

        protected function fillWithImage($image){
            $this->image = $image;
        }

        protected function fillWithImageId($imageId){
            $this->imageId = $imageId;
        }

        public function uploadImage(){
            $this->upload($this->image);
        }

        public function searchImage(){
            $this->search($this->imageId);
        }
    }
?>