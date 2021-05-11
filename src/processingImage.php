<?php

use Intervention\Image\ImageManager;

if (!empty($_FILES['imageFile']['tmp_name'])) {
    $manager = new ImageManager(['driver' => 'imagick']);
    $image = $manager->make($_FILES['imageFile']['tmp_name'])->resize(400, null, function ($constraint) {
        $constraint->aspectRatio();
    });

    $image->text(
        "Super\nватермарк",
        $image->width() / 3,
        $image->height() - $image->height() / 4,
        function ($font) {
            $font->file(__DIR__ . DIRECTORY_SEPARATOR . 'Roboto-Regular.ttf');
            $font->size(32);
            $font->color([0, 0, 128, 0.5]);
            $font->align('left');
            $font->valign('bottom');
            $font->angle(15);
        }
    );
    echo $image->response();
}
