<?php

namespace Core;

/* 
  Upload single file
  (new Storage())->file($_FILES['file'])->save("/");
  (new Storage())->file($_FILES['file'])->deletePrevImages('/', ['886381635678c00b413fa04.94287000.jpg', '1051344980678c0041199644.67240229.png'])->save('/');
  
  Upload multiple files
  (new Storage())->files($_FILES['file'])->deletePrevImages('/', ['886381635678c00b413fa04.94287000.jpg', '1051344980678c0041199644.67240229.png'])->save('/');
*/

class Storage
{
  private array $whiteList;
  public $files = null;
  public $file;


  public function __construct(?array $whiteList = null)
  {
    $config = require base_path('config/storage.php');

    // Ha nincs megadva, az alapértelmezett fehér lista értékét a konfigurációból veszjük
    $this->whiteList = $whiteList ?? $config['white_list'];
  }

  public function getSimpleFileType($file)
  {
    return pathinfo($file["name"], PATHINFO_EXTENSION);
  }

  public function getTypeOfFile($file)
  {
    return mime_content_type($file["tmp_name"]);
  }

  public function prevCheckMimeType($files)
  {
    $formattedFiles = $this->formatFilesForSave($files);
    $results = [];

    foreach ($formattedFiles as $file) {
      $fileType = $this->getTypeOfFile($file);
      $results[] =  in_array($fileType, $this->whiteList);
    }
    return $results;
  }


  // Add single file for uplodat,
  public function file($file)
  {
    // Ellenőrizzük hogy a fájl megfelelő formátumban van-e
    if (empty($file) || !isset($file['name'])) {
      return $this;
    }

    // Ha tömb formátumban van (multiple files), akkor az első elemet vesszük
    if (is_array($file['name'])) {
      if (empty($file['name'][0])) {
        return $this;
      }
      // Átalakítjuk single file formátumra
      $this->file = [
        'name' => $file['name'][0],
        'tmp_name' => $file['tmp_name'][0],
        'error' => $file['error'][0],
        'size' => $file['size'][0],
        'type' => $file['type'][0]
      ];
    } else {
      // Single file formátum
      if (empty($file['name'])) {
        return $this;
      }
      $this->file = $file;
    }

    if (!$this->checkMimeType($this->file)) {
      $this->file = null;
      return $this;
    }
    return $this;
  }

  private function formatFilesForSave($files)
  {
    $ret = [];

    foreach ($files as $fieldName => $fields) {

      foreach ($fields as $index => $field) {
        $ret[$index][$fieldName] = $fields[$index];
      }
    }
    return $ret;
  }

  // Add multiple files in array;
  public function files($files)
  {
    if (empty($files['name'][0])) {
      return $this;
    }
    $this->files = $this->formatFilesForSave($files);
    $this->checkMimeTypeByArray($this->files);
    return $this;
  }

  public function deletePrevImages($path, $arr_of_images)
  {
    if (!empty($arr_of_images) && is_array($arr_of_images)) {
      foreach ($arr_of_images as $image) {
        if (empty($image)) continue;

        $imagePath = base_path($path . '/' . $image);

        if (file_exists($imagePath)) {
          if (!unlink($imagePath)) {

          }
        }
      }
    }

    return $this;
  }


  public function save($path)
  {
    if ((!$this->file || is_null($this->file)) && (!$this->files || is_null($this->files))) {
      return null;
    }

    $fileNames = [];

    if (!empty($this->files)) {
      foreach ($this->files as $file) {
        $fileName = $this->saveFile($file, $path);
        if ($fileName) {
          $fileNames[] = $fileName;
        }
      }

      return $fileNames;
    } else {
      $fileName = $this->saveFile($this->file, $path);
      return $fileName;
    }
  }

  private function saveFile($file, $path)
  {
    // Ellenőrizzük hogy nincs-e hiba a fájl feltöltésben
    if ($file['error'] !== UPLOAD_ERR_OK) {
      return false;
    }

    $rand = uniqid(rand(), true);
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $originalFileName = $rand . '.' . $ext;
    $directoryPath = base_path($path);

    if (!is_dir($directoryPath)) {
      if (!mkdir($directoryPath, 0755, true)) {
        return false;
      }
    }

    $destination = $directoryPath . '/' . $originalFileName;

    
    if (!move_uploaded_file($file["tmp_name"], $destination)) {
      return false;
    }

    // Képfájlok optimalizálása
    $this->optimizeImageIfNeeded($destination);


    return $originalFileName;
  }

  private function optimizeImageIfNeeded($filePath)
  {
    // Támogatott képformátumok
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    // Ha nem képfájl, nem csinálunk semmit
    if (!in_array($ext, $imageExtensions)) {
      return;
    }

    try {
      // Formátumtól függően más optimalizálást alkalmazunk
      if ($ext === 'png') {
        $this->optimizePNG($filePath);
      } elseif (in_array($ext, ['jpg', 'jpeg'])) {
        $this->optimizeJPEG($filePath);
      } elseif ($ext === 'gif') {
        $this->optimizeGIF($filePath);
      }
    } catch (\Exception $e) {
    }
  }

  private function optimizePNG($filePath)
  {
    // PNG-t betöltjük memóriába
    $image = imagecreatefrompng($filePath);
    if ($image === false) return;

    // Csökkentjük 256 szín paletára (drasztikus méretcsökkentés)
    imagetruecolortopalette($image, true, 256);
    // Maximális tömörítéssel (9) mentjük vissza az eredeti helyre
    imagepng($image, $filePath, 9);
    // Felszabadítjuk a memóriát (fontos!)
    imagedestroy($image);
  }

  private function optimizeJPEG($filePath)
  {
    // JPG-t betöltjük memóriába
    $image = imagecreatefromjpeg($filePath);
    if ($image === false) return;

    // 80%-os minőséggel mentjük vissza (jó minőség/méret arány)
    imagejpeg($image, $filePath, 80);
    // Felszabadítjuk a memóriát (fontos!)
    imagedestroy($image);
  }

  private function optimizeGIF($filePath)
  {
    // GIF-et betöltjük memóriába
    $image = imagecreatefromgif($filePath);
    if ($image === false) return;

    // Csökkentjük 256 szín paletára
    imagetruecolortopalette($image, true, 256);
    // Mentjük vissza az eredeti helyre
    imagegif($image, $filePath);
    // Felszabadítjuk a memóriát (fontos!)
    imagedestroy($image);
  }

  private function checkMimeType($file)
  {
    // Ellenőrizzük hogy létezik-e a temp fájl
    if (!file_exists($file["tmp_name"])) {
      return false;
    }

    $fileType = mime_content_type($file["tmp_name"]);

    if (!in_array($fileType, $this->whiteList)) {
      return false;
    }

    return true;
  }

  private function checkMimeTypeByArray($files)
  {
    $filtered = [];
    foreach ($files as $file) {
      if ($this->checkMimeType($file)) {
        $filtered[] = $file;
      }
    }
    $this->files = $filtered;
  }



  public function getWhiteList(): array
  {
    return $this->whiteList;
  }

  public function setWhiteList(array $whiteList): self
  {
    $this->whiteList = $whiteList;
    return $this;
  }
}
